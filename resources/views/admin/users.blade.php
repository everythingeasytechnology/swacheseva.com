@extends('layouts.admin')

@section('title', 'User Management - Admin Panel')

@section('content')
    <x-breadcrumb title="User Management" subtitle="Manage, create, and approve youth registrations" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

    <!-- Filters and Actions Toolbar (Unified to prevent UI shifting) -->
    <div class="mb-custom">
        <x-card :hover="false" class="p-3 bg-white border-0 shadow-sm">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <!-- Search & Filters -->
                <div class="d-flex flex-wrap gap-2 align-items-center flex-grow-1">
                    <select class="form-select bg-light border-0 small" style="max-width: 180px;">
                        <option value="">Filter by Role</option>
                        <option value="1">Admin</option>
                        <option value="2">Verified Applicant</option>
                        <option value="3">Unverified Applicant</option>
                    </select>
                    <select class="form-select bg-light border-0 small" style="max-width: 200px;">
                        <option value="">Filter by Scheme</option>
                        <option value="1">Skill Development</option>
                        <option value="2">Job Placement</option>
                        <option value="3">Career Counseling</option>
                        <option value="4">Entrepreneurship</option>
                    </select>
                    <div class="input-group" style="max-width: 280px;">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search users...">
                        <button class="btn btn-primary btn-sm px-3" type="button"><i class="bi bi-search"></i></button>
                    </div>
                </div>

                <!-- Create & Export Actions -->
                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                    <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#createUserModal" style="font-size: 0.8rem; height: 38px;">
                        <i class="bi bi-person-plus-fill me-1"></i> Create User
                    </button>
                    <div class="d-flex align-items-center gap-1 border bg-light rounded-pill px-2 py-1" style="height: 38px;">
                        <span class="text-muted small me-1 d-none d-lg-inline px-1">Export:</span>
                        <button class="btn btn-sm btn-link text-success p-0 me-1" title="Export Excel" style="line-height: 1;"><i class="bi bi-file-earmark-excel fs-5"></i></button>
                        <button class="btn btn-sm btn-link text-primary p-0 me-1" title="Export PDF" style="line-height: 1;"><i class="bi bi-file-earmark-pdf fs-5"></i></button>
                        <button class="btn btn-sm btn-link text-secondary p-0" title="Export CSV" style="line-height: 1;"><i class="bi bi-file-earmark-csv fs-5"></i></button>
                    </div>
                </div>
            </div>
        </x-card>
    </div>

    <!-- Users Table Card -->
    <x-card :hover="false" class="bg-white border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table premium-table align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Applied Scheme</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td>USR001</td>
                        <td class="fw-bold">
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary-theme bg-opacity-10 text-primary-theme rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; font-size: 0.85rem;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <span>Rahul Kumar</span>
                            </div>
                        </td>
                        <td class="text-muted"><i class="bi bi-envelope text-muted me-1"></i> rahul@example.com</td>
                        <td><i class="bi bi-telephone text-muted me-1"></i> 9876543210</td>
                        <td>Skill Development</td>
                        <td><span class="badge-pending"><i class="bi bi-hourglass-split me-1"></i> Pending Approval</span></td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('user.dashboard') }}" class="btn btn-sm btn-outline-success rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Direct Login as User"><i class="bi bi-box-arrow-in-right"></i></a>
                                <button class="btn btn-sm btn-outline-primary rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Edit Info & Password" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-sm btn-outline-danger rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Delete User"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr>
                        <td>USR002</td>
                        <td class="fw-bold">
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary-theme bg-opacity-10 text-primary-theme rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; font-size: 0.85rem;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <span>Priya Sharma</span>
                            </div>
                        </td>
                        <td class="text-muted"><i class="bi bi-envelope text-muted me-1"></i> priya@example.com</td>
                        <td><i class="bi bi-telephone text-muted me-1"></i> 8765432109</td>
                        <td>Job Placement</td>
                        <td><span class="badge-approved"><i class="bi bi-check-circle me-1"></i> Approved</span></td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('user.dashboard') }}" class="btn btn-sm btn-outline-success rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Direct Login as User"><i class="bi bi-box-arrow-in-right"></i></a>
                                <button class="btn btn-sm btn-outline-primary rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Edit Info & Password" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-sm btn-outline-danger rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Delete User"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination UI -->
        <nav aria-label="Table navigation" class="mt-4">
            <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                    <a class="page-link rounded-start-pill px-3" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link rounded-end-pill px-3" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </x-card>

    <!-- Create User Modal (Featuring the full 4-tab 36-field profile registration form) -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-primary-theme" id="createUserModalLabel"><i class="bi bi-person-plus-fill me-2"></i>Create New User Account (Full Profile Form)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form>
                    <div class="modal-body py-3">
                        <!-- Navigation Tabs inside Modal -->
                        <ul class="nav nav-pills gap-2 mb-3 border-bottom pb-3" id="createProfileTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active rounded-pill fw-bold text-uppercase" id="create-personal-tab" data-bs-toggle="tab" data-bs-target="#create-personal" type="button" role="tab" aria-controls="create-personal" aria-selected="true" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    <i class="bi bi-person-fill me-1"></i> Personal & Contact
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill fw-bold text-uppercase" id="create-education-tab" data-bs-toggle="tab" data-bs-target="#create-education" type="button" role="tab" aria-controls="create-education" aria-selected="false" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    <i class="bi bi-mortarboard-fill me-1"></i> Education & Address
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill fw-bold text-uppercase" id="create-shop-tab" data-bs-toggle="tab" data-bs-target="#create-shop" type="button" role="tab" aria-controls="create-shop" aria-selected="false" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    <i class="bi bi-shop-window me-1"></i> Shop & Center Location
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill fw-bold text-uppercase" id="create-bank-tab" data-bs-toggle="tab" data-bs-target="#create-bank" type="button" role="tab" aria-controls="create-bank" aria-selected="false" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    <i class="bi bi-credit-card-2-front-fill me-1"></i> Bank & Payment
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="createProfileTabContent">
                            <!-- TAB 1: Personal & Contact Details -->
                            <div class="tab-pane fade show active" id="create-personal" role="tabpanel" aria-labelledby="create-personal-tab">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Full Name (application_name)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., Rahul Kumar" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Father's Name (father_name)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Father name" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Account Password (new_password)</label>
                                        <input type="password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Date of Birth (date_birth)</label>
                                        <input type="date" class="form-control bg-light border-0 py-2 rounded-3" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Gender (gender)</label>
                                        <select class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="Male" selected>Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Category (category)</label>
                                        <select class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="General" selected>General</option>
                                            <option value="OBC">OBC</option>
                                            <option value="SC">SC</option>
                                            <option value="ST">ST</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Physically Handicapped (physicall_handicap)</label>
                                        <select class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="No" selected>No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Email Address (email)</label>
                                        <input type="email" class="form-control bg-light border-0 py-2 rounded-3" placeholder="email@example.com" required>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Mobile Number (phone)</label>
                                        <input type="tel" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., 9876543210" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Alternate Mobile (altranative_mobile)</label>
                                        <input type="tel" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Alternate phone">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">WhatsApp Number (mobile_2)</label>
                                        <input type="tel" class="form-control bg-light border-0 py-2 rounded-3" placeholder="WhatsApp number">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Aadhaar Card Number (aadhar)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="12-digit Aadhaar number" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">PAN Card Number (pan_number)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="10-digit PAN ID" required>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 2: Education & Address Details -->
                            <div class="tab-pane fade" id="create-education" role="tabpanel" aria-labelledby="create-education-tab">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Highest Education (highest_edu)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Highest Degree" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Institute/University Name (institute_name)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Institute Name" required>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Course Name (course)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Course details" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Year of Passing (date_passing)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Year of Passing" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold mb-1">House Address (house_address)</label>
                                    <textarea class="form-control bg-light border-0 py-2 rounded-3" rows="2" placeholder="Full residential address" required></textarea>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">District (district)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="District name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Country (country)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="India" required>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 3: Shop & Center Preference -->
                            <div class="tab-pane fade" id="create-shop" role="tabpanel" aria-labelledby="create-shop-tab">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Shop/Office Name (shop_name)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., Apex E-Seva Center" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Shop House/Office No (shop_house_no)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Office No / Shop No" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold mb-1">Shop Location Address (shop_address)</label>
                                    <textarea class="form-control bg-light border-0 py-2 rounded-3" rows="2" placeholder="Full shop address" required></textarea>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Marketing Area (marketing_area)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Local sector or village area" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Alternative Occupation Type (alt_occuation_type)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Alternative work" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold mb-1">Online Services Operated Currently (online_service)</label>
                                    <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Currently offered services" required>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Center Location Preference 1 (center_location)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="First preference area" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Center Location Preference 2 (center_location_2)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Second preference area" required>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 4: Bank & Payment Details -->
                            <div class="tab-pane fade" id="create-bank" role="tabpanel" aria-labelledby="create-bank-tab">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Bank Account Name (bank_account_name)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Account Holder Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Bank Account Type (bank_account_type)</label>
                                        <select class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="Savings" selected>Savings Account</option>
                                            <option value="Current">Current Account</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Bank Account Number (bank_account_number)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Account Number" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Bank IFSC Code (bank_ifsc_code)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="IFSC Code" required>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Non-Refundable Fee (fee)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="164.00" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Date of Payment (date_payment)</label>
                                        <input type="date" class="form-control bg-light border-0 py-2 rounded-3" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Application Status (status)</label>
                                        <select class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="pending" selected>Pending Approval</option>
                                            <option value="approved">Approved & Active</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold mb-1">Opted Services (service)</label>
                                    <textarea class="form-control bg-light border-0 py-2 rounded-3" rows="2" placeholder="List of opted services e.g., Aadhaar Card, PAN Card..." required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal" style="font-size: 0.85rem;">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-5 shadow-sm" style="font-size: 0.85rem;">Save & Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal (Featuring the full 4-tab 36-field profile registration form) -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-warning" id="editUserModalLabel"><i class="bi bi-pencil-square me-2"></i>Edit User Account Details & Credentials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form>
                    <div class="modal-body py-3">
                        <!-- Navigation Tabs inside Modal -->
                        <ul class="nav nav-pills gap-2 mb-3 border-bottom pb-3" id="editProfileTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active rounded-pill fw-bold text-uppercase" id="edit-personal-tab" data-bs-toggle="tab" data-bs-target="#edit-personal" type="button" role="tab" aria-controls="edit-personal" aria-selected="true" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    <i class="bi bi-person-fill me-1"></i> Personal & Contact
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill fw-bold text-uppercase" id="edit-education-tab" data-bs-toggle="tab" data-bs-target="#edit-education" type="button" role="tab" aria-controls="edit-education" aria-selected="false" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    <i class="bi bi-mortarboard-fill me-1"></i> Education & Address
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill fw-bold text-uppercase" id="edit-shop-tab" data-bs-toggle="tab" data-bs-target="#edit-shop" type="button" role="tab" aria-controls="edit-shop" aria-selected="false" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    <i class="bi bi-shop-window me-1"></i> Shop & Center Location
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill fw-bold text-uppercase" id="edit-bank-tab" data-bs-toggle="tab" data-bs-target="#edit-bank" type="button" role="tab" aria-controls="edit-bank" aria-selected="false" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    <i class="bi bi-credit-card-2-front-fill me-1"></i> Bank & Payment
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="editProfileTabContent">
                            <!-- TAB 1: Personal & Contact Details -->
                            <div class="tab-pane fade show active" id="edit-personal" role="tabpanel" aria-labelledby="edit-personal-tab">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Full Name (application_name)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Rahul Kumar" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Father's Name (father_name)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Shri Suresh Kumar" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Reset Password (new_password)</label>
                                        <input type="password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Leave empty to keep current">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Date of Birth (date_birth)</label>
                                        <input type="date" class="form-control bg-light border-0 py-2 rounded-3" value="1998-05-15" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Gender (gender)</label>
                                        <select class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="Male" selected>Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Category (category)</label>
                                        <select class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="General" selected>General</option>
                                            <option value="OBC">OBC</option>
                                            <option value="SC">SC</option>
                                            <option value="ST">ST</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Physically Handicapped (physicall_handicap)</label>
                                        <select class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="No" selected>No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Email Address (email)</label>
                                        <input type="email" class="form-control bg-light border-0 py-2 rounded-3" value="rahul@example.com" required>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Mobile Number (phone)</label>
                                        <input type="tel" class="form-control bg-light border-0 py-2 rounded-3" value="+91 9876543210" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Alternate Mobile (altranative_mobile)</label>
                                        <input type="tel" class="form-control bg-light border-0 py-2 rounded-3" value="+91 8765432109">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">WhatsApp Number (mobile_2)</label>
                                        <input type="tel" class="form-control bg-light border-0 py-2 rounded-3" value="+91 9876543210">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Aadhaar Card Number (aadhar)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="1234-5678-9012" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">PAN Card Number (pan_number)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="ABCDE1234F" required>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 2: Education & Address Details -->
                            <div class="tab-pane fade" id="edit-education" role="tabpanel" aria-labelledby="edit-education-tab">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Highest Education (highest_edu)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Master's in Computer Application" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Institute/University Name (institute_name)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Institute of Information Technology" required>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Course Name (course)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="MCA - Computer Application" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Year of Passing (date_passing)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="2021" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold mb-1">House Address (house_address)</label>
                                    <textarea class="form-control bg-light border-0 py-2 rounded-3" rows="2" required>A-12, Sector 62, Noida, Uttar Pradesh</textarea>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">District (district)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Gautam Buddha Nagar" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Country (country)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="India" required>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 3: Shop & Center Preference -->
                            <div class="tab-pane fade" id="edit-shop" role="tabpanel" aria-labelledby="edit-shop-tab">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Shop/Office Name (shop_name)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Rahul E-Seva Kendra" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Shop House/Office No (shop_house_no)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Shop No. G-4" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold mb-1">Shop Location Address (shop_address)</label>
                                    <textarea class="form-control bg-light border-0 py-2 rounded-3" rows="2" required>Commercial Plaza, Sector 62, Noida, Uttar Pradesh - 201301</textarea>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Marketing Area (marketing_area)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Noida Urban" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Alternative Occupation Type (alt_occuation_type)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="IT Consultant" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold mb-1">Online Services Operated Currently (online_service)</label>
                                    <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Aadhaar, PAN, Utility Bills payment" required>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Center Location Preference 1 (center_location)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Sector 62, Noida" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Center Location Preference 2 (center_location_2)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Sector 63, Noida" required>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 4: Bank & Payment Details -->
                            <div class="tab-pane fade" id="edit-bank" role="tabpanel" aria-labelledby="edit-bank-tab">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Bank Account Name (bank_account_name)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Rahul Kumar" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Bank Account Type (bank_account_type)</label>
                                        <select class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="Savings" selected>Savings Account</option>
                                            <option value="Current">Current Account</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Bank Account Number (bank_account_number)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="987654321098" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-bold mb-1">Bank IFSC Code (bank_ifsc_code)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="SBIN0001234" required>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Non-Refundable Fee (fee)</label>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="164.00" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Date of Payment (date_payment)</label>
                                        <input type="date" class="form-control bg-light border-0 py-2 rounded-3" value="2026-07-06" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-bold mb-1">Application Status (status)</label>
                                        <select class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="pending">Pending Approval</option>
                                            <option value="approved" selected>Approved & Active</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold mb-1">Opted Services (service)</label>
                                    <textarea class="form-control bg-light border-0 py-2 rounded-3" rows="2" required>All E-Services, Aadhaar Card Services, PAN Card Services, GST Registration, Voter ID Services, Passport Services, Income Tax Return filing support</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal" style="font-size: 0.85rem;">Cancel</button>
                        <button type="submit" class="btn btn-warning rounded-pill px-5 text-white shadow-sm" style="font-size: 0.85rem;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
