@extends('layouts.admin')

@section('title', 'User Management - Admin Panel')

@section('content')
    <x-breadcrumb title="User Management" subtitle="Manage, create, and approve youth registrations" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <strong class="small"><i class="bi bi-exclamation-triangle-fill me-2"></i>Please fix the following validation errors:</strong>
            <ul class="mb-0 small mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Filters and Actions Toolbar -->
    <div class="mb-custom">
        <x-card :hover="false" class="p-3 bg-white border-0 shadow-sm">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <!-- Search & Filters -->
                <div class="d-flex flex-wrap gap-2 align-items-center flex-grow-1">
                    <select id="statusFilter" class="form-select bg-light border-0 small" style="max-width: 200px;" onchange="filterUsers()">
                        <option value="">All Verification Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending Verification</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Approved & Active</option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected / Hold</option>
                    </select>
                    
                    <div class="input-group" style="max-width: 280px;">
                        <input type="text" id="searchInput" class="form-control bg-light border-0 small" placeholder="Search by name, email..." onkeyup="filterUsers()">
                        <button class="btn btn-primary btn-sm px-3" type="button"><i class="bi bi-search"></i></button>
                    </div>
                </div>

                <!-- Create & Export Actions -->
                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                    <div class="d-flex align-items-center gap-1 border bg-light rounded-pill px-3 py-1" style="height: 38px;">
                        <span class="text-muted small me-2 d-none d-lg-inline fw-bold" style="font-size: 0.75rem;">EXPORT:</span>
                        <a href="{{ route('admin.users.export.csv') }}" class="btn btn-sm btn-link text-success p-0 me-2" title="Export Excel (.csv)" style="line-height: 1;"><i class="bi bi-file-earmark-excel-fill fs-5"></i></a>
                        <a href="{{ route('admin.users.export.csv') }}" class="btn btn-sm btn-link text-secondary p-0" title="Export CSV" style="line-height: 1;"><i class="bi bi-file-earmark-csv-fill fs-5"></i></a>
                    </div>
                    <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#createUserModal" style="font-size: 0.8rem; height: 38px;">
                        <i class="bi bi-person-plus-fill me-1"></i> Create User
                    </button>
                </div>
            </div>
        </x-card>
    </div>

    <!-- Users Table Card -->
    <x-card :hover="false" class="bg-white border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table premium-table align-middle" id="usersTable" style="table-layout: fixed; width: 100%;">
                <colgroup>
                    <col style="width: 10%;">
                    <col style="width: 20%;">
                    <col style="width: 22%;">
                    <col style="width: 12%;">
                    <col style="width: 12%;">
                    <col style="width: 12%;">
                    <col style="width: 12%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <!-- <th>Payment UTR</th> -->
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="user-row" data-status="{{ $user->status }}" data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}">
                            <td class="font-monospace text-muted text-truncate" style="font-size: 0.8rem;">
                                SWAC-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="fw-bold text-dark">
                                <div class="d-flex align-items-center gap-2">
                                    <!-- <div class="bg-primary-theme bg-opacity-10 text-primary-theme rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 30px; height: 30px; font-size: 0.85rem;">
                                        <i class="bi bi-person-fill"></i>
                                    </div> -->
                                    <span class="text-truncate" style="max-width: 160px;" title="{{ $user->name }}">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="text-muted text-truncate" title="{{ $user->email }}"><i class="bi bi-envelope text-muted me-1"></i> {{ $user->email }}</td>
                            <td class="text-truncate"><i class="bi bi-telephone text-muted me-1"></i> {{ $user->phone }}</td>
                            <!-- <td>
                                <span class="badge bg-light text-dark font-monospace border">{{ $user->utr_code ?? 'N/A' }}</span>
                            </td> -->
                            <td>
                                @if($user->status === 'pending')
                                    <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i> Pending Approval</span>
                                @elseif($user->status === 'active')
                                    <span class="badge bg-success text-white"><i class="bi bi-check-circle-fill me-1"></i> Active</span>
                                @else
                                    <span class="badge bg-danger text-white"><i class="bi bi-x-circle-fill me-1"></i> Rejected</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center align-items-center">
                                    <!-- Print Profile PDF -->
                                    <a href="{{ route('admin.users.pdf', $user->id) }}" target="_blank" class="btn btn-sm btn-outline-info rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Print Profile PDF">
                                        <i class="bi bi-file-earmark-pdf"></i>
                                    </a>

                                    <!-- Impersonate candidate -->
                                    <form action="{{ route('admin.users.impersonate', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-dark rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Impersonate Candidate Session">
                                            <i class="bi bi-person-bounding-box"></i>
                                        </button>
                                    </form>

                                    <!-- Edit User Modal Button -->
                                    <button onclick='openEditUserModal({!! json_encode($user) !!})' class="btn btn-sm btn-outline-warning rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Edit User Details" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    @if($user->status !== 'active')
                                        <form action="{{ route('admin.users.approve', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Approve Request">
                                                <i class="bi bi-check"></i>
                                            </button>
                                        </form>
                                    @endif

                                    @if($user->status !== 'rejected')
                                        <form action="{{ route('admin.users.reject', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Reject Request">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No candidates registered yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination UI Component -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </x-card>

    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-primary-theme" id="createUserModalLabel"><i class="bi bi-person-plus-fill me-2"></i>Create New User Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.users.create') }}" method="POST">
                    @csrf
                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label for="create_name" class="form-label text-muted small fw-bold">Full Name</label>
                            <input type="text" name="name" id="create_name" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., Priya Sharma" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_email" class="form-label text-muted small fw-bold">Email Address</label>
                            <input type="email" name="email" id="create_email" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., priya@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_phone" class="form-label text-muted small fw-bold">Phone Number</label>
                            <input type="tel" name="phone" id="create_phone" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., 9876543210" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_password" class="form-label text-muted small fw-bold">Login Password</label>
                            <input type="password" name="password" id="create_password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Min 6 characters" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_status" class="form-label text-muted small fw-bold">Assign Verification Status</label>
                            <select name="status" id="create_status" class="form-select bg-light border-0 py-2 rounded-3">
                                <option value="pending" selected>Pending Verification</option>
                                <option value="active">Approved & Active</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body pt-0 pb-3 text-center border-top-0">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4 me-2" data-bs-dismiss="modal" style="font-size: 0.85rem;">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm" style="font-size: 0.85rem;">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal (Expanded to Large for 36-Fields Editing) -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-warning" id="editUserModalLabel"><i class="bi bi-pencil-square me-2"></i>Edit Candidate Profile Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editUserForm" method="POST">
                    @csrf
                    <div class="modal-body py-3">
                        
                        <!-- Navigation Tabs inside Edit Modal -->
                        <ul class="nav nav-pills gap-2 mb-3 border-bottom pb-2" id="modalTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active rounded-pill fw-bold text-uppercase" id="m-personal-tab" data-bs-toggle="tab" data-bs-target="#m-personal" type="button" role="tab" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    Personal Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill fw-bold text-uppercase" id="m-address-tab" data-bs-toggle="tab" data-bs-target="#m-address" type="button" role="tab" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    Address & Edu
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill fw-bold text-uppercase" id="m-shop-tab" data-bs-toggle="tab" data-bs-target="#m-shop" type="button" role="tab" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    Shop & KYC
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill fw-bold text-uppercase" id="m-bank-tab" data-bs-toggle="tab" data-bs-target="#m-bank" type="button" role="tab" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    Bank & Security
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill fw-bold text-uppercase" id="m-other-tab" data-bs-toggle="tab" data-bs-target="#m-other" type="button" role="tab" style="font-size: 0.7rem; padding: 0.4rem 1rem;">
                                    Other Details
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2" id="modalTabContent">
                            
                            <!-- TAB 1: Personal Details -->
                            <div class="tab-pane fade show active" id="m-personal" role="tabpanel">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_name" class="form-label text-muted small fw-bold">Full Name</label>
                                        <input type="text" name="name" id="edit_name" class="form-control bg-light border-0 py-2 rounded-3" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_email" class="form-label text-muted small fw-bold">Email Address</label>
                                        <input type="email" name="email" id="edit_email" class="form-control bg-light border-0 py-2 rounded-3" required>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_phone" class="form-label text-muted small fw-bold">Phone Number</label>
                                        <input type="tel" name="phone" id="edit_phone" class="form-control bg-light border-0 py-2 rounded-3" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_alt_phone" class="form-label text-muted small fw-bold">Alternate Phone</label>
                                        <input type="tel" name="alt_phone" id="edit_alt_phone" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_father_name" class="form-label text-muted small fw-bold">Father's Name</label>
                                        <input type="text" name="father_name" id="edit_father_name" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_mother_name" class="form-label text-muted small fw-bold">Mother's Name</label>
                                        <input type="text" name="mother_name" id="edit_mother_name" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label for="edit_date_birth" class="form-label text-muted small fw-bold">Date of Birth</label>
                                        <input type="date" name="date_birth" id="edit_date_birth" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="edit_gender" class="form-label text-muted small fw-bold">Gender</label>
                                        <select name="gender" id="edit_gender" class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="edit_marital_status" class="form-label text-muted small fw-bold">Marital Status</label>
                                        <select name="marital_status" id="edit_marital_status" class="form-select bg-light border-0 py-2 rounded-3">
                                            <option value="">Select Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_category" class="form-label text-muted small fw-bold">Category</label>
                                    <select name="category" id="edit_category" class="form-select bg-light border-0 py-2 rounded-3">
                                        <option value="">Select Category</option>
                                        <option value="General">General</option>
                                        <option value="OBC">OBC</option>
                                        <option value="SC">SC</option>
                                        <option value="ST">ST</option>
                                        <option value="EWS">EWS</option>
                                    </select>
                                </div>
                            </div>

                            <!-- TAB 2: Address & Education -->
                            <div class="tab-pane fade" id="m-address" role="tabpanel">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_state" class="form-label text-muted small fw-bold">State</label>
                                        <input type="text" name="state" id="edit_state" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_district" class="form-label text-muted small fw-bold">District</label>
                                        <input type="text" name="district" id="edit_district" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label for="edit_tehsil" class="form-label text-muted small fw-bold">Tehsil</label>
                                        <input type="text" name="tehsil" id="edit_tehsil" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="edit_post_office" class="form-label text-muted small fw-bold">Post Office</label>
                                        <input type="text" name="post_office" id="edit_post_office" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="edit_village" class="form-label text-muted small fw-bold">Village</label>
                                        <input type="text" name="village" id="edit_village" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_pincode" class="form-label text-muted small fw-bold">Pincode</label>
                                        <input type="text" name="pincode" id="edit_pincode" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_qualification" class="form-label text-muted small fw-bold">Highest Qualification</label>
                                        <input type="text" name="qualification" id="edit_qualification" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 3: Shop & KYC -->
                            <div class="tab-pane fade" id="m-shop" role="tabpanel">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_shop_name" class="form-label text-muted small fw-bold">Shop / Center Name</label>
                                        <input type="text" name="shop_name" id="edit_shop_name" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_shop_pincode" class="form-label text-muted small fw-bold">Shop Pincode</label>
                                        <input type="text" name="shop_pincode" id="edit_shop_pincode" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_shop_district" class="form-label text-muted small fw-bold">Shop District</label>
                                        <input type="text" name="shop_district" id="edit_shop_district" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_shop_state" class="form-label text-muted small fw-bold">Shop State</label>
                                        <input type="text" name="shop_state" id="edit_shop_state" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_shop_address" class="form-label text-muted small fw-bold">Shop Full Location Address</label>
                                    <textarea name="shop_address" id="edit_shop_address" class="form-control bg-light border-0 py-2 rounded-3" rows="2"></textarea>
                                </div>
                                <hr class="my-3">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="edit_aadhaar_no" class="form-label text-muted small fw-bold">Aadhaar Card Number</label>
                                        <input type="text" name="aadhaar_no" id="edit_aadhaar_no" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_pan_no" class="form-label text-muted small fw-bold">PAN Card Number</label>
                                        <input type="text" name="pan_no" id="edit_pan_no" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 4: Bank, Security & Status -->
                            <div class="tab-pane fade" id="m-bank" role="tabpanel">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_bank_name" class="form-label text-muted small fw-bold">Bank Name</label>
                                        <input type="text" name="bank_name" id="edit_bank_name" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_holder_name" class="form-label text-muted small fw-bold">Account Holder Name</label>
                                        <input type="text" name="holder_name" id="edit_holder_name" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_account_no" class="form-label text-muted small fw-bold">Bank Account Number</label>
                                        <input type="text" name="account_no" id="edit_account_no" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_ifsc_code" class="form-label text-muted small fw-bold">Bank IFSC Code</label>
                                        <input type="text" name="ifsc_code" id="edit_ifsc_code" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_password" class="form-label text-muted small fw-bold">Reset Password (Leave blank to keep same)</label>
                                        <input type="password" name="password" id="edit_password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="New Password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_security_pin" class="form-label text-muted small fw-bold">Security PIN</label>
                                        <input type="text" name="security_pin" id="edit_security_pin" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Security PIN">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_status" class="form-label text-muted small fw-bold">Update Verification Status</label>
                                    <select name="status" id="edit_status" class="form-select bg-light border-0 py-2 rounded-3" required>
                                        <option value="pending">Pending Verification</option>
                                        <option value="active">Approved & Active</option>
                                        <option value="rejected">Rejected / Disabled</option>
                                    </select>
                                </div>
                            </div>

                            <!-- TAB 5: Other Details -->
                            <div class="tab-pane fade" id="m-other" role="tabpanel">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_physicall_handicap" class="form-label text-muted small fw-bold">Physically Handicapped</label>
                                        <input type="text" name="physicall_handicap" id="edit_physicall_handicap" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_year_of_passing" class="form-label text-muted small fw-bold">Year of Passing</label>
                                        <input type="text" name="year_of_passing" id="edit_year_of_passing" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_institute_name" class="form-label text-muted small fw-bold">Institute Name</label>
                                        <input type="text" name="institute_name" id="edit_institute_name" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_country" class="form-label text-muted small fw-bold">Country</label>
                                        <input type="text" name="country" id="edit_country" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_shop_location" class="form-label text-muted small fw-bold">Shop Location</label>
                                        <input type="text" name="shop_location" id="edit_shop_location" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_shop_location_2" class="form-label text-muted small fw-bold">Shop Location 2</label>
                                        <input type="text" name="shop_location_2" id="edit_shop_location_2" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_house_address" class="form-label text-muted small fw-bold">House Address</label>
                                    <textarea name="house_address" id="edit_house_address" class="form-control bg-light border-0 py-2 rounded-3" rows="2"></textarea>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_alt_occuation_type" class="form-label text-muted small fw-bold">Alternate Occupation Type</label>
                                        <input type="text" name="alt_occuation_type" id="edit_alt_occuation_type" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_marketing_area" class="form-label text-muted small fw-bold">Marketing Area</label>
                                        <input type="text" name="marketing_area" id="edit_marketing_area" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="edit_online_service" class="form-label text-muted small fw-bold">Online Service</label>
                                        <input type="text" name="online_service" id="edit_online_service" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_service" class="form-label text-muted small fw-bold">Service</label>
                                        <input type="text" name="service" id="edit_service" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="edit_bank_account_type" class="form-label text-muted small fw-bold">Bank Account Type</label>
                                        <input type="text" name="bank_account_type" id="edit_bank_account_type" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="edit_fee" class="form-label text-muted small fw-bold">Fee</label>
                                        <input type="number" step="0.01" name="fee" id="edit_fee" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="edit_date_payment" class="form-label text-muted small fw-bold">Date of Payment</label>
                                        <input type="date" name="date_payment" id="edit_date_payment" class="form-control bg-light border-0 py-2 rounded-3">
                                    </div>
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

    <script>
        function openEditUserModal(user) {
            document.getElementById('editUserForm').setAttribute('action', '/admin/users/' + user.id + '/update');
            document.getElementById('edit_name').value = user.name;
            document.getElementById('edit_email').value = user.email;
            document.getElementById('edit_phone').value = user.phone;
            document.getElementById('edit_status').value = user.status;
            document.getElementById('edit_security_pin').value = user.security_pin || '';
            document.getElementById('edit_password').value = '';

            // Populate all 36 fields in the large modal form
            document.getElementById('edit_father_name').value = user.father_name || '';
            document.getElementById('edit_mother_name').value = user.mother_name || '';
            document.getElementById('edit_alt_phone').value = user.alt_phone || '';
            document.getElementById('edit_date_birth').value = user.date_birth || '';
            document.getElementById('edit_gender').value = user.gender || '';
            document.getElementById('edit_marital_status').value = user.marital_status || '';
            document.getElementById('edit_category').value = user.category || '';
            
            document.getElementById('edit_state').value = user.state || '';
            document.getElementById('edit_district').value = user.district || '';
            document.getElementById('edit_tehsil').value = user.tehsil || '';
            document.getElementById('edit_post_office').value = user.post_office || '';
            document.getElementById('edit_village').value = user.village || '';
            document.getElementById('edit_pincode').value = user.pincode || '';
            document.getElementById('edit_qualification').value = user.qualification || '';
            
            document.getElementById('edit_shop_name').value = user.shop_name || '';
            document.getElementById('edit_shop_address').value = user.shop_address || '';
            document.getElementById('edit_shop_district').value = user.shop_district || '';
            document.getElementById('edit_shop_state').value = user.shop_state || '';
            document.getElementById('edit_shop_pincode').value = user.shop_pincode || '';
            
            document.getElementById('edit_bank_name').value = user.bank_name || '';
            document.getElementById('edit_holder_name').value = user.holder_name || '';
            document.getElementById('edit_account_no').value = user.account_no || '';
            document.getElementById('edit_ifsc_code').value = user.ifsc_code || '';
            
            document.getElementById('edit_aadhaar_no').value = user.aadhaar_no || '';
            document.getElementById('edit_pan_no').value = user.pan_no || '';

            document.getElementById('edit_physicall_handicap').value = user.physicall_handicap || '';
            document.getElementById('edit_year_of_passing').value = user.year_of_passing || '';
            document.getElementById('edit_institute_name').value = user.institute_name || '';
            document.getElementById('edit_country').value = user.country || '';
            document.getElementById('edit_shop_location').value = user.shop_location || '';
            document.getElementById('edit_shop_location_2').value = user.shop_location_2 || '';
            document.getElementById('edit_house_address').value = user.house_address || '';
            document.getElementById('edit_alt_occuation_type').value = user.alt_occuation_type || '';
            document.getElementById('edit_marketing_area').value = user.marketing_area || '';
            document.getElementById('edit_online_service').value = user.online_service || '';
            document.getElementById('edit_service').value = user.service || '';
            document.getElementById('edit_bank_account_type').value = user.bank_account_type || '';
            document.getElementById('edit_fee').value = user.fee || '';
            document.getElementById('edit_date_payment').value = user.date_payment || '';
        }

        function filterUsers() {
            var statusVal = document.getElementById('statusFilter').value.toLowerCase();
            var searchVal = document.getElementById('searchInput').value.toLowerCase();
            var rows = document.querySelectorAll('.user-row');

            rows.forEach(function(row) {
                var matchesStatus = (statusVal === '') || (row.getAttribute('data-status') === statusVal);
                var matchesSearch = (searchVal === '') || 
                                    (row.getAttribute('data-name').indexOf(searchVal) > -1) || 
                                    (row.getAttribute('data-email').indexOf(searchVal) > -1);

                if (matchesStatus && matchesSearch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
@endsection
