<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use App\Mail\RegistrationSubmittedMail;
use App\Mail\NewRegistrationAdminMail;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        // Send email notification to candidate
        try {
            Mail::to($user->email)->send(new RegistrationSubmittedMail($user, $request->password));
        } catch (\Exception $e) {
            Log::error('Failed to send registration email to candidate', [
                'email' => $user->email,
                'error' => $e->getMessage()
            ]);
        }

        // Send email notification to administrator (care@swacheseva.com & swacheseva@gmail.com)
        try {
            Mail::to(['care@swacheseva.com', 'swacheseva@gmail.com'])->send(new NewRegistrationAdminMail($user));
        } catch (\Exception $e) {
            Log::error('Failed to send registration notification email to admin', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);
        }

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

    /**
     * Show forgot password request form.
     */
    public function showForgotPassword()
    {
        return view('frontend.forgot-password');
    }

    /**
     * Send password reset token email link.
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'No user account found with this email address.'
        ]);

        $token = Str::random(64);

        // Delete existing reset tokens for this email
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Insert new reset token
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Send Reset Email
        try {
            Mail::to($request->email)->send(new PasswordResetMail($request->email, $token));
        } catch (\Exception $e) {
            Log::error('Failed to send password reset email', [
                'email' => $request->email,
                'error' => $e->getMessage()
            ]);
            return back()->withErrors(['email' => 'Unable to send password reset email. Please try again later.']);
        }

        return back()->with('success', 'A secure password reset link has been dispatched to your email address.');
    }

    /**
     * Show actual password reset form screen.
     */
    public function showResetPassword($token, Request $request)
    {
        return view('frontend.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Update user password using token request.
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        // Retrieve token record from database
        $tokenData = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$tokenData) {
            return back()->withErrors(['email' => 'Invalid reset token or email address mismatch.']);
        }

        // Verify if token has expired (60 minutes expiry limit)
        if (now()->subMinutes(60)->gt($tokenData->created_at)) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return back()->withErrors(['email' => 'This password reset link has expired. Please request a new one.']);
        }

        // Update database user password
        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        // Clean up token record
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Password reset completed successfully! You can now log in.');
    }
}
