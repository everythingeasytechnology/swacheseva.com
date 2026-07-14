<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    /**
     * Display administrative overview.
     */
    public function index()
    {
        $stats = [
            'total' => User::where('role', 'user')->count(),
            'pending' => User::where('role', 'user')->where('status', 'pending')->count(),
            'approved' => User::where('role', 'user')->where('status', 'active')->count(),
            'rejected' => User::where('role', 'user')->where('status', 'rejected')->count(),
            'active_users' => User::where('role', 'user')->where('status', 'active')->count(),
            'services' => \App\Models\Service::count(),
            'blogs' => \App\Models\Blog::count(),
            'locations' => User::where('role', 'user')->whereNotNull('district')->distinct('district')->count() ?: 1,
        ];

        // Fetch recent registration requests
        $recentRequests = User::where('role', 'user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentRequests'));
    }

    /**
     * Display users list view.
     */
    public function users()
    {
        $users = User::where('role', 'user')->latest()->paginate(15);
        return view('admin.users', compact('users'));
    }

    /**
     * Create user from admin panel.
     */
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string',
            'password' => 'required|min:6',
            'status' => 'required|in:pending,active,rejected',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => $request->status,
        ]);

        return back()->with('success', 'Candidate user account created successfully.');
    }

    /**
     * Update candidate profile from admin controls.
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string',
            'status' => 'required|in:pending,active,rejected',
            'security_pin' => 'nullable|string',
            'secondary_email' => 'nullable|email',
            
            // Validate all 36 profile fields
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'date_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'category' => 'nullable|string',
            'qualification' => 'nullable|string',
            'village' => 'nullable|string|max:255',
            'post_office' => 'nullable|string|max:255',
            'tehsil' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:10',
            'shop_name' => 'nullable|string|max:255',
            'shop_address' => 'nullable|string',
            'shop_district' => 'nullable|string|max:255',
            'shop_state' => 'nullable|string|max:255',
            'shop_pincode' => 'nullable|string|max:10',
            'bank_name' => 'nullable|string|max:255',
            'account_no' => 'nullable|string|max:50',
            'ifsc_code' => 'nullable|string|max:20',
            'holder_name' => 'nullable|string|max:255',
            'aadhaar_no' => 'nullable|string|max:20',
            'pan_no' => 'nullable|string|max:20',

            'physicall_handicap' => 'nullable|string|max:255',
            'year_of_passing' => 'nullable|string|max:10',
            'institute_name' => 'nullable|string|max:255',
            'shop_location' => 'nullable|string|max:255',
            'shop_location_2' => 'nullable|string|max:255',
            'house_address' => 'nullable|string',
            'country' => 'nullable|string|max:255',
            'alt_occuation_type' => 'nullable|string|max:255',
            'marketing_area' => 'nullable|string|max:255',
            'online_service' => 'nullable|string|max:255',
            'bank_account_type' => 'nullable|string|max:255',
            'fee' => 'nullable|numeric',
            'date_payment' => 'nullable|date',
            'service' => 'nullable|string|max:255',
        ]);

        $data = $request->only([
            'name', 'email', 'secondary_email', 'phone', 'status', 'security_pin',
            'father_name', 'mother_name', 'date_birth', 'gender', 'marital_status',
            'category', 'qualification', 'village', 'post_office', 'tehsil',
            'district', 'state', 'pincode', 'shop_name', 'shop_address',
            'shop_district', 'shop_state', 'shop_pincode', 'bank_name',
            'account_no', 'ifsc_code', 'holder_name', 'aadhaar_no', 'pan_no',
            'physicall_handicap', 'year_of_passing', 'institute_name', 'shop_location', 'shop_location_2',
            'house_address', 'country', 'alt_occuation_type', 'marketing_area', 'online_service',
            'bank_account_type', 'fee', 'date_payment', 'service',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'Candidate profile updated successfully.');
    }

    /**
     * Impersonate candidate login session.
     */
    public function impersonateUser($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot impersonate an administrator.');
        }

        // Login as target user
        Auth::login($user);

        return redirect()->route('user.dashboard')->with('success', 'Logged in as candidate: ' . $user->name);
    }

    /**
     * Approve candidate registration.
     */
    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'active']);
        return back()->with('success', 'Candidate application approved.');
    }

    /**
     * Reject candidate registration.
     */
    public function rejectUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'rejected']);
        return back()->with('success', 'Candidate application rejected.');
    }

    /**
     * Generate visual statistical reports views.
     */
    public function reports()
    {
        $stats = [
            'total' => User::where('role', 'user')->count(),
            'pending' => User::where('role', 'user')->where('status', 'pending')->count(),
            'approved' => User::where('role', 'user')->where('status', 'active')->count(),
            'rejected' => User::where('role', 'user')->where('status', 'rejected')->count(),
        ];

        // Active candidates breakdown lists
        $users = User::where('role', 'user')->latest()->get();

        return view('admin.reports', compact('stats', 'users'));
    }

    /**
     * Display printable PDF format profile details.
     */
    public function downloadPdf($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-pdf', compact('user'));
    }

    /**
     * Export all registered candidate profiles to CSV format.
     */
    public function exportCsv()
    {
        $users = User::where('role', 'user')->latest()->get();
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="swacheseva_candidates_' . date('Y-m-d') . '.csv"',
        ];

        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');
            
            // CSV Headers (all 32 keys)
            fputcsv($file, [
                'Candidate ID', 'Name', 'Email', 'Phone', 'Alternate Phone', 
                'Father Name', 'Mother Name', 'Date of Birth', 'Gender', 'Marital Status', 
                'Category', 'Qualification', 'State', 'District', 'Tehsil', 'Post Office', 
                'Village', 'Pincode', 'Shop Name', 'Shop Address', 'Shop District', 
                'Shop State', 'Shop Pincode', 'Bank Name', 'Account Holder', 'Account Number', 
                'IFSC Code', 'Aadhaar Card', 'PAN Card', 'UTR Code', 'Status', 'Registered At'
            ]);

            foreach ($users as $u) {
                fputcsv($file, [
                    'SW-CAND-' . str_pad($u->id, 4, '0', STR_PAD_LEFT),
                    $u->name,
                    $u->email,
                    $u->phone,
                    $u->alt_phone,
                    $u->father_name,
                    $u->mother_name,
                    $u->date_birth,
                    $u->gender,
                    $u->marital_status,
                    $u->category,
                    $u->qualification,
                    $u->state,
                    $u->district,
                    $u->tehsil,
                    $u->post_office,
                    $u->village,
                    $u->pincode,
                    $u->shop_name,
                    $u->shop_address,
                    $u->shop_district,
                    $u->shop_state,
                    $u->shop_pincode,
                    $u->bank_name,
                    $u->holder_name,
                    $u->account_no,
                    $u->ifsc_code,
                    $u->aadhaar_no,
                    $u->pan_no,
                    $u->utr_code,
                    strtoupper($u->status),
                    $u->created_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
