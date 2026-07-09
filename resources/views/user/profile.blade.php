@extends('layouts.user')

@section('title', 'My Profile - User Portal')

@section('content')
    <x-breadcrumb title="My Profile" subtitle="Update your personal details and certificates" parent="Dashboard" parentRoute="{{ route('user.dashboard') }}" />

    <!-- Profile Editor Form -->
    <div class="row g-custom mb-custom">
        <!-- Avatar and Actions Column -->
        <div class="col-lg-3 text-center mb-4 mb-lg-0">
            <x-card :hover="false" class="bg-white border-0 shadow-sm mb-3">
                <div class="profile-avatar-wrapper mb-3 position-relative d-inline-block">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Avatar Preview" id="avatar-preview" class="profile-avatar" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid var(--border-color);">
                </div>
                <h5 class="fw-bold mb-1 text-primary-theme">Rahul Kumar</h5>
                <p class="text-muted small mb-3">Verified Applicant</p>
                
                <div class="mb-3">
                    <label for="avatar-input" class="btn btn-outline-primary btn-sm px-4 rounded-pill" style="font-size: 0.8rem;">
                        <i class="bi bi-upload me-1"></i> Upload Photo
                    </label>
                    <input type="file" id="avatar-input" class="d-none" accept="image/*">
                </div>
                <small class="text-muted d-block" style="font-size: 0.7rem;">Supports JPG, PNG under 2MB</small>
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
                            <i class="bi bi-shop-window me-1"></i> Shop & Center Location
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill fw-bold text-uppercase" id="bank-tab" data-bs-toggle="tab" data-bs-target="#bank" type="button" role="tab" aria-controls="bank" aria-selected="false" style="font-size: 0.72rem; padding: 0.5rem 1.2rem;">
                            <i class="bi bi-credit-card-2-front-fill me-1"></i> Bank & Payment
                        </button>
                    </li>
                </ul>

                <form>
                    <div class="tab-content" id="profileTabContent">
                        
                        <!-- TAB 1: Personal & Contact Details -->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-person-badge-fill me-2"></i>Personal & Contact Details</h5>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold mb-1">Full Name (application_name)</label>
                                    <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Rahul Kumar" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold mb-1">Father's Name (father_name)</label>
                                    <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Shri Suresh Kumar" required>
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
                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-mortarboard-fill me-2"></i>Education & Address Details</h5>
                            
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
                                <textarea class="form-control bg-light border-0 py-2 rounded-3" rows="3" required>A-12, Sector 62, Noida, Uttar Pradesh</textarea>
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
                        <div class="tab-pane fade" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-shop-window me-2"></i>Shop & Center Preference</h5>
                            
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
                                <textarea class="form-control bg-light border-0 py-2 rounded-3" rows="3" required>Commercial Plaza, Sector 62, Noida, Uttar Pradesh - 201301</textarea>
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
                        <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-credit-card-2-front-fill me-2"></i>Bank & Franchisee Payment Details</h5>
                            
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

                            <hr class="my-4">

                            <h5 class="fw-bold mb-3 text-primary-theme"><i class="bi bi-patch-check-fill me-2"></i>Franchisee Application Fee & Services Opted</h5>

                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label text-muted small fw-bold mb-1">Non-Refundable Fee (fee)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-muted small fw-bold">₹</span>
                                        <input type="text" class="form-control bg-light border-0 py-2 rounded-end-3" value="164.00" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted small fw-bold mb-1">Date of Payment (date_payment)</label>
                                    <input type="date" class="form-control bg-light border-0 py-2 rounded-3" value="2026-07-06" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted small fw-bold mb-1">Application Status (status)</label>
                                    <div class="pt-2">
                                        <span class="badge bg-success-theme text-white"><i class="bi bi-check-circle-fill me-1"></i> Active / Verified</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold mb-1">Opted Services (service)</label>
                                <textarea class="form-control bg-light border-0 py-2 rounded-3 text-muted" rows="3" readonly>All E-Services, Aadhaar Card Services, PAN Card Services, GST Registration, Voter ID Services, Passport Services, Income Tax Return filing support</textarea>
                            </div>
                        </div>

                    </div>

                    <!-- Sticky Bottom Form Actions -->
                    <div class="border-top pt-3 mt-4 d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-outline-secondary px-4 rounded-pill" style="font-size: 0.85rem;">Cancel</button>
                        <button type="submit" class="btn btn-primary px-5 rounded-pill shadow-sm" style="font-size: 0.85rem;">Save Profile Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
