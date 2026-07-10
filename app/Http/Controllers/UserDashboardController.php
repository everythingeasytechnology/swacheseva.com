<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserDashboardController extends Controller
{
    /**
     * Display candidate dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        $services = Service::all();
        $blogs = Blog::where('status', 'published')->latest()->take(3)->get();
        return view('user.dashboard', compact('user', 'services', 'blogs'));
    }

    /**
     * Show candidate profile tabs.
     */
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Update candidate profile.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate basic parameters
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'secondary_email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:15',
            'alt_phone' => 'nullable|string|max:15',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'date_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'category' => 'nullable|string',
            'qualification' => 'nullable|string',
            
            // Address details
            'village' => 'nullable|string|max:255',
            'post_office' => 'nullable|string|max:255',
            'tehsil' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:10',

            // Shop / Centre details
            'shop_name' => 'nullable|string|max:255',
            'shop_address' => 'nullable|string',
            'shop_district' => 'nullable|string|max:255',
            'shop_state' => 'nullable|string|max:255',
            'shop_pincode' => 'nullable|string|max:10',

            // Bank details
            'bank_name' => 'nullable|string|max:255',
            'account_no' => 'nullable|string|max:50',
            'ifsc_code' => 'nullable|string|max:20',
            'holder_name' => 'nullable|string|max:255',

            // KYC details
            'aadhaar_no' => 'nullable|string|max:20',
            'pan_no' => 'nullable|string|max:20',
            'security_pin' => 'nullable|string|max:10',

            // Uploaded Documents validation
            'avatar' => 'nullable|image|max:1024',
            'shop_photo' => 'nullable|image|max:2048',
            'qualification_doc' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'aadhaar_front' => 'nullable|image|max:2048',
            'aadhaar_back' => 'nullable|image|max:2048',
            'pan_doc' => 'nullable|image|max:2048',
            'passbook_doc' => 'nullable|image|max:2048',
        ]);

        // Upload documents helper
        $filesToUpload = [
            'avatar', 'shop_photo', 'qualification_doc', 
            'aadhaar_front', 'aadhaar_back', 'pan_doc', 'passbook_doc'
        ];

        $uploadedPaths = [];
        foreach ($filesToUpload as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
                $filename = time() . '_' . $fieldName . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/documents'), $filename);
                $uploadedPaths[$fieldName] = 'uploads/documents/' . $filename;
            }
        }

        // Fill all attributes
        $data = $request->except(array_merge($filesToUpload, ['_token']));
        $data = array_merge($data, $uploadedPaths);
        
        // Handle declaration checkbox
        $data['declaration_signed'] = $request->has('declaration_signed');

        // Update database record
        User::where('id', $user->id)->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Show candidate services list.
     */
    public function services()
    {
        $user = Auth::user();
        $services = Service::all();
        return view('user.services', compact('user', 'services'));
    }

    /**
     * Show user blogs feed.
     */
    public function blogs()
    {
        $blogs = Blog::where('status', 'published')->latest()->paginate(9);
        return view('user.blogs', compact('blogs'));
    }

    /**
     * Show candidate password management.
     */
    public function password()
    {
        return view('user.password');
    }

    /**
     * Update candidate password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match our records.']);
        }

        User::where('id', $user->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password changed successfully.');
    }
}
