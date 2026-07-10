@extends('layouts.user')

@section('title', 'My Profile - User Portal')

@section('content')
    <x-breadcrumb title="My Profile" subtitle="Update your personal details and certificates" parent="Dashboard" parentRoute="{{ route('user.dashboard') }}" />

    <!-- Validation / Success Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <strong class="small"><i class="bi bi-exclamation-triangle-fill me-2"></i>Please fix the following errors:</strong>
            <ul class="mb-0 small mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Profile Editor Form -->
    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row g-custom mb-custom">
            <!-- Avatar and Actions Column -->
            <div class="col-lg-3 text-center mb-4 mb-lg-0">
                <x-card :hover="false" class="bg-white border-0 shadow-sm mb-3">
                    <div class="profile-avatar-wrapper mb-3 position-relative d-inline-block">
                        <img src="{{ $user->avatar ? asset($user->avatar) : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' }}" alt="Avatar Preview" id="avatar-preview" class="profile-avatar shadow-sm" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid var(--border-color);">
                    </div>
                    <h5 class="fw-bold mb-1 text-primary-theme">{{ $user->name }}</h5>
                    <p class="text-muted small mb-3">
                        @if($user->status === 'active')
                            <span class="badge bg-success text-white">Verified Candidate</span>
                        @elseif($user->status === 'pending')
                            <span class="badge bg-warning text-dark">Pending Verification</span>
                        @else
                            <span class="badge bg-danger text-white">Rejected Candidate</span>
                        @endif
                    </p>
                    
                    <div class="mb-3">
                        <label for="avatar" class="btn btn-outline-primary btn-sm px-4 rounded-pill" style="font-size: 0.8rem;">
                            <i class="bi bi-upload me-1"></i> Upload Photo
                        </label>
                        <input type="file" name="avatar" id="avatar" class="d-none" accept="image/*" onchange="previewImage(this)">
                    </div>
                    <small class="text-muted d-block" style="font-size: 0.7rem;">Supports JPG, PNG under 1MB</small>
                </x-card>
            </div>

            <!-- Edit Form Column (Tabbed Interface for 36 Fields) -->
            <div class="col-lg-9">
                <div class="bg-white rounded-4 shadow-sm border-0 p-4">
                    <!-- Navigation Tabs -->
                    <ul class="nav nav-pills gap-2 mb-4 border-bottom pb-3" id="profileTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-pill fw-bold text-uppercase" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true" style="font-size: 0.72rem; padding: 0.5rem 1.2rem;">
                                <i class="bi bi-person-fill me-1"></i> Personal & Contact
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill fw-bold text-uppercase" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab" aria-controls="education" aria-selected="false" style="font-size: 0.72rem; padding: 0.5rem 1.2rem;">
                                <i class="bi bi-mortarboard-fill me-1"></i> Education & Address
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill fw-bold text-uppercase" id="shop-tab" data-bs-toggle="tab" data-bs-target="#shop" type="button" role="tab" aria-controls="shop" aria-selected="false" style="font-size: 0.72rem; padding: 0.5rem 1.2rem;">
                                <i class="bi bi-shop-window me-1"></i> Shop & Documents
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill fw-bold text-uppercase" id="bank-tab" data-bs-toggle="tab" data-bs-target="#bank" type="button" role="tab" aria-controls="bank" aria-selected="false" style="font-size: 0.72rem; padding: 0.5rem 1.2rem;">
                                <i class="bi bi-credit-card-2-front-fill me-1"></i> Bank & KYC
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="profileTabContent">
                        
                        <!-- TAB 1: Personal & Contact Details -->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-person-badge-fill me-2"></i>Personal & Contact Details</h5>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label text-muted small fw-bold mb-1">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="father_name" class="form-label text-muted small fw-bold mb-1">Father's Name</label>
                                    <input type="text" name="father_name" id="father_name" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('father_name', $user->father_name) }}">
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="mother_name" class="form-label text-muted small fw-bold mb-1">Mother's Name</label>
                                    <input type="text" name="mother_name" id="mother_name" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('mother_name', $user->mother_name) }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="date_birth" class="form-label text-muted small fw-bold mb-1">Date of Birth</label>
                                    <input type="date" name="date_birth" id="date_birth" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('date_birth', $user->date_birth) }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="gender" class="form-label text-muted small fw-bold mb-1">Gender</label>
                                    <select name="gender" id="gender" class="form-select bg-light border-0 py-2 rounded-3">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{ old('gender', $user->gender) === 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender', $user->gender) === 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender', $user->gender) === 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="marital_status" class="form-label text-muted small fw-bold mb-1">Marital Status</label>
                                    <select name="marital_status" id="marital_status" class="form-select bg-light border-0 py-2 rounded-3">
                                        <option value="">Select Status</option>
                                        <option value="Single" {{ old('marital_status', $user->marital_status) === 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ old('marital_status', $user->marital_status) === 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Divorced" {{ old('marital_status', $user->marital_status) === 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="category" class="form-label text-muted small fw-bold mb-1">Category</label>
                                    <select name="category" id="category" class="form-select bg-light border-0 py-2 rounded-3">
                                        <option value="">Select Category</option>
                                        <option value="General" {{ old('category', $user->category) === 'General' ? 'selected' : '' }}>General</option>
                                        <option value="OBC" {{ old('category', $user->category) === 'OBC' ? 'selected' : '' }}>OBC (Other Backward Classes)</option>
                                        <option value="SC" {{ old('category', $user->category) === 'SC' ? 'selected' : '' }}>SC (Scheduled Caste)</option>
                                        <option value="ST" {{ old('category', $user->category) === 'ST' ? 'selected' : '' }}>ST (Scheduled Tribe)</option>
                                        <option value="EWS" {{ old('category', $user->category) === 'EWS' ? 'selected' : '' }}>EWS (Economically Weaker Sections)</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-telephone-fill me-2"></i>Contact Details</h5>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label text-muted small fw-bold mb-1">Mobile Number</label>
                                    <input type="tel" name="phone" id="phone" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('phone', $user->phone) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="alt_phone" class="form-label text-muted small fw-bold mb-1">Alternate Mobile Number</label>
                                    <input type="tel" name="alt_phone" id="alt_phone" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('alt_phone', $user->alt_phone) }}">
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label text-muted small fw-bold mb-1">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('email', $user->email) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="secondary_email" class="form-label text-muted small fw-bold mb-1">Secondary Email Address</label>
                                    <input type="email" name="secondary_email" id="secondary_email" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('secondary_email', $user->secondary_email) }}" placeholder="e.g., secondary@example.com">
                                </div>
                            </div>
                        </div>

                        <!-- TAB 2: Education & Address Details -->
                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-mortarboard-fill me-2"></i>Educational Details</h5>
                            <div class="mb-3">
                                <label for="qualification" class="form-label text-muted small fw-bold mb-1">Highest Academic Qualification</label>
                                <input type="text" name="qualification" id="qualification" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('qualification', $user->qualification) }}" placeholder="e.g. B.Tech / BCA / Class 12th">
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-geo-alt-fill me-2"></i>Permanent Address Details</h5>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="village" class="form-label text-muted small fw-bold mb-1">Village / Town / Sector</label>
                                    <input type="text" name="village" id="village" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('village', $user->village) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="post_office" class="form-label text-muted small fw-bold mb-1">Post Office</label>
                                    <input type="text" name="post_office" id="post_office" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('post_office', $user->post_office) }}">
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="tehsil" class="form-label text-muted small fw-bold mb-1">Tehsil / Sub-district</label>
                                    <input type="text" name="tehsil" id="tehsil" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('tehsil', $user->tehsil) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="district" class="form-label text-muted small fw-bold mb-1">District</label>
                                    <input type="text" name="district" id="district" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('district', $user->district) }}">
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="state" class="form-label text-muted small fw-bold mb-1">State</label>
                                    <input type="text" name="state" id="state" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('state', $user->state) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="pincode" class="form-label text-muted small fw-bold mb-1">Pincode</label>
                                    <input type="text" name="pincode" id="pincode" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('pincode', $user->pincode) }}">
                                </div>
                            </div>
                        </div>

                        <!-- TAB 3: Shop & Centre Location -->
                        <div class="tab-pane fade" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-shop me-2"></i>Proposed Centre / Shop Details</h5>
                            <div class="mb-3">
                                <label for="shop_name" class="form-label text-muted small fw-bold mb-1">Proposed Swacheseva Centre Name</label>
                                <input type="text" name="shop_name" id="shop_name" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('shop_name', $user->shop_name) }}" placeholder="e.g. Swacheseva Digital Kendra">
                            </div>

                            <div class="mb-3">
                                <label for="shop_address" class="form-label text-muted small fw-bold mb-1">Shop Address with Landmark</label>
                                <textarea name="shop_address" id="shop_address" class="form-control bg-light border-0 py-2 rounded-3" rows="2">{{ old('shop_address', $user->shop_address) }}</textarea>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label for="shop_district" class="form-label text-muted small fw-bold mb-1">Shop District</label>
                                    <input type="text" name="shop_district" id="shop_district" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('shop_district', $user->shop_district) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="shop_state" class="form-label text-muted small fw-bold mb-1">Shop State</label>
                                    <input type="text" name="shop_state" id="shop_state" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('shop_state', $user->shop_state) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="shop_pincode" class="form-label text-muted small fw-bold mb-1">Shop Pincode</label>
                                    <input type="text" name="shop_pincode" id="shop_pincode" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('shop_pincode', $user->shop_pincode) }}">
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-file-earmark-arrow-up-fill me-2"></i>Documents & Certificates Upload</h5>
                            <p class="text-muted small mb-4">Please upload clear scan copies of your original credentials. Support formats: PDF, JPG, PNG under 2MB.</p>

                            <!-- Document grid -->
                            <div class="row g-3">
                                <!-- Qual Document -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-4 border border-light h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <label class="form-label text-muted small fw-bold mb-1 d-flex align-items-center justify-content-between">
                                                <span>Highest Qualification Certificate</span>
                                                @if($user->qualification_doc)
                                                    <a href="{{ asset($user->qualification_doc) }}" target="_blank" class="text-success text-decoration-none small"><i class="bi bi-check-circle-fill"></i> View File</a>
                                                @endif
                                            </label>
                                            <input type="file" name="qualification_doc" class="form-control bg-white border-0 py-1.5 rounded-3" accept=".pdf,image/*">
                                        </div>
                                    </div>
                                </div>

                                <!-- Shop Photo -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-4 border border-light h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <label class="form-label text-muted small fw-bold mb-1 d-flex align-items-center justify-content-between">
                                                <span>Shop Front/Location Photograph</span>
                                                @if($user->shop_photo)
                                                    <a href="{{ asset($user->shop_photo) }}" target="_blank" class="text-success text-decoration-none small"><i class="bi bi-check-circle-fill"></i> View File</a>
                                                @endif
                                            </label>
                                            <input type="file" name="shop_photo" class="form-control bg-white border-0 py-1.5 rounded-3" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <!-- Aadhaar Front -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-4 border border-light h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <label class="form-label text-muted small fw-bold mb-1 d-flex align-items-center justify-content-between">
                                                <span>Aadhaar Card (Front Page)</span>
                                                @if($user->aadhaar_front)
                                                    <a href="{{ asset($user->aadhaar_front) }}" target="_blank" class="text-success text-decoration-none small"><i class="bi bi-check-circle-fill"></i> View File</a>
                                                @endif
                                            </label>
                                            <input type="file" name="aadhaar_front" class="form-control bg-white border-0 py-1.5 rounded-3" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <!-- Aadhaar Back -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-4 border border-light h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <label class="form-label text-muted small fw-bold mb-1 d-flex align-items-center justify-content-between">
                                                <span>Aadhaar Card (Back Page)</span>
                                                @if($user->aadhaar_back)
                                                    <a href="{{ asset($user->aadhaar_back) }}" target="_blank" class="text-success text-decoration-none small"><i class="bi bi-check-circle-fill"></i> View File</a>
                                                @endif
                                            </label>
                                            <input type="file" name="aadhaar_back" class="form-control bg-white border-0 py-1.5 rounded-3" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <!-- PAN Card Doc -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-4 border border-light h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <label class="form-label text-muted small fw-bold mb-1 d-flex align-items-center justify-content-between">
                                                <span>PAN Card Document</span>
                                                @if($user->pan_doc)
                                                    <a href="{{ asset($user->pan_doc) }}" target="_blank" class="text-success text-decoration-none small"><i class="bi bi-check-circle-fill"></i> View File</a>
                                                @endif
                                            </label>
                                            <input type="file" name="pan_doc" class="form-control bg-white border-0 py-1.5 rounded-3" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <!-- Passbook Doc -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-4 border border-light h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <label class="form-label text-muted small fw-bold mb-1 d-flex align-items-center justify-content-between">
                                                <span>Bank Passbook / Cancelled Cheque</span>
                                                @if($user->passbook_doc)
                                                    <a href="{{ asset($user->passbook_doc) }}" target="_blank" class="text-success text-decoration-none small"><i class="bi bi-check-circle-fill"></i> View File</a>
                                                @endif
                                            </label>
                                            <input type="file" name="passbook_doc" class="form-control bg-white border-0 py-1.5 rounded-3" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 4: Bank & Payment Details -->
                        <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-credit-card-2-front-fill me-2"></i>Bank Details</h5>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="holder_name" class="form-label text-muted small fw-bold mb-1">Account Holder's Name</label>
                                    <input type="text" name="holder_name" id="holder_name" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('holder_name', $user->holder_name) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="bank_name" class="form-label text-muted small fw-bold mb-1">Bank Name</label>
                                    <input type="text" name="bank_name" id="bank_name" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('bank_name', $user->bank_name) }}">
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="account_no" class="form-label text-muted small fw-bold mb-1">Bank Account Number</label>
                                    <input type="text" name="account_no" id="account_no" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('account_no', $user->account_no) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="ifsc_code" class="form-label text-muted small fw-bold mb-1">Bank IFSC Code</label>
                                    <input type="text" name="ifsc_code" id="ifsc_code" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('ifsc_code', $user->ifsc_code) }}">
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-shield-lock-fill me-2"></i>KYC Verification Details</h5>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="aadhaar_no" class="form-label text-muted small fw-bold mb-1">Aadhaar Card Number</label>
                                    <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('aadhaar_no', $user->aadhaar_no) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="pan_no" class="form-label text-muted small fw-bold mb-1">PAN Card Number</label>
                                    <input type="text" name="pan_no" id="pan_no" class="form-control bg-light border-0 py-2 rounded-3 text-muted" value="{{ old('pan_no', $user->pan_no) }}" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="security_pin" class="form-label text-muted small fw-bold mb-1">Reset Portal Security PIN</label>
                                    <input type="text" name="security_pin" id="security_pin" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('security_pin', $user->security_pin) }}" placeholder="Create secure 4 or 6-digit PIN">
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-patch-check-fill me-2"></i>Franchisee Registration Reference Details</h5>

                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label text-muted small fw-bold mb-1">Payment Reference UTR</label>
                                    <input type="text" class="form-control bg-light border-0 py-2 rounded-3 text-muted" value="{{ $user->utr_code }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted small fw-bold mb-1">Payment Screenshot Preview</label>
                                    <div class="pt-1">
                                        @if($user->payment_screenshot)
                                            <a href="{{ asset($user->payment_screenshot) }}" target="_blank" class="btn btn-outline-secondary btn-sm px-3 rounded-pill" style="font-size: 0.75rem;"><i class="bi bi-file-earmark-image"></i> View UTR Screenshot</a>
                                        @else
                                            <span class="text-danger small">No Screenshot Found</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted small fw-bold mb-1">Account Application Date</label>
                                    <input type="text" class="form-control bg-light border-0 py-2 rounded-3 text-muted" value="{{ $user->created_at->format('d M Y') }}" readonly>
                                </div>
                            </div>

                            <div class="p-3 bg-light rounded-4 border mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="declaration_signed" id="declaration_signed" value="1" {{ $user->declaration_signed ? 'checked' : '' }} required>
                                    <label class="form-check-label text-muted small" for="declaration_signed">
                                        I hereby declare that all details provided in this franchisee registry are true, accurate, and correct. I will comply with all Swacheseva Youth Centre guidelines and e-services standards.
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Sticky Bottom Form Actions -->
                    <div class="border-top pt-3 mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary px-4 rounded-pill" style="font-size: 0.85rem;">Cancel</a>
                        <button type="submit" class="btn btn-primary px-5 rounded-pill shadow-sm" style="font-size: 0.85rem;">Save Profile Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar-preview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
