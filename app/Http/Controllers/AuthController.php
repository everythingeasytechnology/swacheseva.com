<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show the login page.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return Auth::user()->role === 'admin' 
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
        }
        return view('frontend.login');
    }

    /**
     * Process authentication.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user = Auth::user();
            
            // Allow administrators unconditionally
            if ($user->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard')->with('success', 'Logged in as Admin successfully.');
            }
            
            // Guard candidate accounts check
            if ($user->status !== 'active') {
                $status = $user->status;
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                if ($status === 'pending') {
                    return back()->withErrors([
                        'email' => 'Your Swacheseva Franchisee application is currently pending approval. Please check back later.',
                    ])->onlyInput('email');
                } else {
                    return back()->withErrors([
                        'email' => 'Your Swacheseva Franchisee application has been rejected or put on hold. Please contact support.',
                    ])->onlyInput('email');
                }
            }

            $request->session()->regenerate();
            return redirect()->route('user.dashboard')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Show the registration page.
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return Auth::user()->role === 'admin' 
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
        }

        $fee = Setting::get('franchisee_fee', '164');
        $upi = Setting::get('payment_upi_id', '9154252555-1@okbizaxis');
        $qrPath = Setting::get('qr_code_path', 'images/qr-code.png');

        return view('frontend.register', compact('fee', 'upi', 'qrPath'));
    }

    /**
     * Process candidate registration.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'phone' => 'required|string|max:15',
            'alt_phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'aadhar' => 'nullable|string|max:20',
            'pan' => 'required|string|max:20',
            'utr_code' => 'required|string|max:100',
            'shop_address' => 'required|string',
            'payment_screenshot' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle file upload
        $screenshotPath = null;
        if ($request->hasFile('payment_screenshot')) {
            $file = $request->file('payment_screenshot');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/payments'), $filename);
            $screenshotPath = 'uploads/payments/' . $filename;
        }

        $user = User::create([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'alt_phone' => $request->alt_phone,
            'aadhaar_no' => $request->aadhar,
            'pan_no' => $request->pan,
            'utr_code' => $request->utr_code,
            'shop_address' => $request->shop_address,
            'payment_screenshot' => $screenshotPath,
            'role' => 'user',
            'status' => 'pending'
        ]);

        // Redirect back with success message without auto-logging in the user
        return redirect()->route('register')->with('success', 'Your Swacheseva Franchisee application form has been submitted successfully.');
    }

    /**
     * Terminate session.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
