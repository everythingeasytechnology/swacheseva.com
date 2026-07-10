<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\HeroSlide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSettingController extends Controller
{
    /**
     * Show admin setting forms.
     */
    public function index()
    {
        $settings = [
            'admin_email' => Setting::get('admin_email', 'admin@swacheseva.com'),
            'admin_phone' => Setting::get('admin_phone', '+91 9876543210'),
            'franchisee_fee' => Setting::get('franchisee_fee', '164'),
            'payment_upi_id' => Setting::get('payment_upi_id', '9154252555-1@okbizaxis'),
            'qr_code_path' => Setting::get('qr_code_path', 'images/qr-code.png'),
            
            // Public contact details configurations
            'website_email' => Setting::get('website_email', 'care@swacheseva.com'),
            'website_email_secondary' => Setting::get('website_email_secondary', 'swacheseva@gmail.com'),
            'website_phone' => Setting::get('website_phone', '+91 9154252555'),
            'website_address' => Setting::get('website_address', '123, Swacheseva Bhawan, Sansad Marg, Connaught Place, New Delhi - 110001')
        ];

        $slides = HeroSlide::all();

        return view('admin.settings', compact('settings', 'slides'));
    }

    /**
     * Update administrator email & contact details.
     */
    public function updateProfileSettings(Request $request)
    {
        $request->validate([
            'admin_email' => 'required|email',
            'admin_phone' => 'required|string',
        ]);

        Setting::set('admin_email', $request->admin_email);
        Setting::set('admin_phone', $request->admin_phone);

        // Also update logged in administrator user details
        $admin = Auth::user();
        User::where('id', $admin->id)->update([
            'email' => $request->admin_email,
            'phone' => $request->admin_phone,
        ]);

        return back()->with('success', 'Admin profile settings updated successfully.');
    }

    /**
     * Update Franchisee UPI, Fee amount, and upload QR code image.
     */
    public function updatePaymentSettings(Request $request)
    {
        $request->validate([
            'payment_upi_id' => 'required|string',
            'franchisee_fee' => 'required|integer',
            'qr_code_image' => 'nullable|image|max:2048'
        ]);

        Setting::set('payment_upi_id', $request->payment_upi_id);
        Setting::set('franchisee_fee', $request->franchisee_fee);

        if ($request->hasFile('qr_code_image')) {
            $file = $request->file('qr_code_image');
            $filename = 'qr_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            
            Setting::set('qr_code_path', 'uploads/settings/' . $filename);
        }

        return back()->with('success', 'Franchisee payment configurations saved.');
    }

    /**
     * Add new image background slide to slideshow.
     */
    public function addSlide(Request $request)
    {
        $request->validate([
            'slide_image' => 'required|image|max:3072',
            'caption' => 'nullable|string|max:255'
        ]);

        if ($request->hasFile('slide_image')) {
            $file = $request->file('slide_image');
            $filename = 'slide_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slides'), $filename);
            
            HeroSlide::create([
                'image_path' => 'uploads/slides/' . $filename,
                'caption' => $request->caption
            ]);
        }

        return back()->with('success', 'New slide added to home slider.');
    }

    /**
     * Delete active background slide.
     */
    public function deleteSlide($id)
    {
        $slide = HeroSlide::findOrFail($id);
        
        // Remove file if exists
        $filePath = public_path($slide->image_path);
        if (file_exists($filePath) && is_file($filePath)) {
            @unlink($filePath);
        }

        $slide->delete();

        return back()->with('success', 'Slide deleted from homepage slider.');
    }

    /**
     * Update website public contact information settings.
     */
    public function updateContactSettings(Request $request)
    {
        $request->validate([
            'website_email' => 'required|email',
            'website_email_secondary' => 'required|email',
            'website_phone' => 'required|string',
            'website_address' => 'required|string',
        ]);

        Setting::set('website_email', $request->website_email);
        Setting::set('website_email_secondary', $request->website_email_secondary);
        Setting::set('website_phone', $request->website_phone);
        Setting::set('website_address', $request->website_address);

        return back()->with('success', 'Website contact settings updated successfully.');
    }
}
