@extends('layouts.app')

@section('title', 'Registration - Swacheseva')

@section('content')
<div class="container-fluid px-0">
    <div class="row g-0 min-vh-100">
        <!-- Left Side: Franchise Payment QR & Info -->
        <div class="col-lg-6 d-flex flex-column align-items-center justify-content-center text-white py-5 px-4 position-relative overflow-hidden" style="background: linear-gradient(135deg, #002984 0%, #001e63 100%);">

            <div class="p-4 text-center position-relative" style="max-width: 520px; z-index: 10;">
                <div class="bg-white p-2 rounded-3 mx-auto mb-4 d-flex align-items-center justify-content-center shadow-lg" style="width: 70px; height: 70px;">
                    <i class="bi bi-qr-code-scan text-primary-theme fs-2" style="color: #002984;"></i>
                </div>
                <h3 class="fw-bold mb-3 text-white text-uppercase" style="letter-spacing: 1px;">Swacheseva Franchisee</h3>
                
                <p class="mb-4 text-white small" style="line-height: 1.6; font-size: 0.9rem;">
                    To Apply for Swacheseva Franchisee First pay the Non-Refundable Franchisee Application Fee of <strong class="text-white text-decoration-underline" style="color: #FE7B01 !important;">Rs. 164/-</strong> through below UPI Scan Code using any UPI App and fill the Franchisee Application form which is displayed here.
                </p>

                <!-- QR Scanner Block -->
                <div class="bg-white p-3 rounded-4 shadow-lg mx-auto mb-3" style="max-width: 280px;">
                    <img src="{{ asset('images/qr-code.png') }}" class="img-fluid rounded-3 mb-2" alt="Swacheseva Franchisee Payment QR Code" style="width: 220px; height: 220px; object-fit: contain;">
                    <div class="bg-light py-1 px-2 rounded text-dark small font-monospace fw-bold" style="font-size: 0.75rem; letter-spacing: -0.5px;">
                        9154252555-1@okbizaxis
                    </div>
                </div>

                <!-- UPI Apps Badges -->
                <div class="d-flex flex-wrap align-items-center justify-content-center gap-2 mt-4 text-white-50 small">
                    <span class="badge bg-white bg-opacity-10 text-white border border-white-10 py-1.5 px-2.5 rounded-pill"><i class="bi bi-wallet2 me-1"></i> Google Pay</span>
                    <span class="badge bg-white bg-opacity-10 text-white border border-white-10 py-1.5 px-2.5 rounded-pill"><i class="bi bi-wallet2 me-1"></i> PhonePe</span>
                    <span class="badge bg-white bg-opacity-10 text-white border border-white-10 py-1.5 px-2.5 rounded-pill"><i class="bi bi-wallet2 me-1"></i> Paytm</span>
                    <span class="badge bg-white bg-opacity-10 text-white border border-white-10 py-1.5 px-2.5 rounded-pill"><i class="bi bi-wallet2 me-1"></i> Amazon Pay</span>
                    <span class="badge bg-white bg-opacity-10 text-white border border-white-10 py-1.5 px-2.5 rounded-pill"><i class="bi bi-wallet2 me-1"></i> BHIM UPI</span>
                </div>
            </div>
        </div>

        <!-- Right Side: Registration form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light">
            <div class="p-5 w-100" style="max-width: 540px;">
                <div class="mb-4 text-center text-lg-start">
                    <a href="{{ route('home') }}" class="d-inline-block mb-3">
                        <img src="{{ asset('bk-logo.png') }}" alt="Swacheseva Logo" style="height: 60px; width: auto; object-fit: contain;">
                    </a>
                    <h3 class="fw-bold text-primary-theme mb-1">Centre Application Form</h3>
                    <p class="text-muted small">Establish your franchise under Youth Employment Service</p>
                </div>

                <x-card :hover="false" class="p-4 bg-white border shadow-sm">
                    <form action="{{ route('user.dashboard') }}" method="GET">
                        <!-- Name & Father Name -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label text-muted small fw-bold">Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="father_name" class="form-label text-muted small fw-bold">Father's Name</label>
                                <input type="text" id="father_name" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Father's Full Name">
                            </div>
                        </div>

                        <!-- Mobile Number & Alternate Mobile Number -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label text-muted small fw-bold">Mobile Number <span class="text-danger">*</span></label>
                                <input type="tel" id="phone" class="form-control bg-light border-0 py-2 rounded-3" placeholder="9876543210" required>
                            </div>
                            <div class="col-md-6">
                                <label for="alt_phone" class="form-label text-muted small fw-bold">Alternate Mobile Number <span class="text-danger">*</span></label>
                                <input type="tel" id="alt_phone" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Alternate Mobile Number" required>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-muted small fw-bold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" id="email" class="form-control bg-light border-0 py-2 rounded-3" placeholder="akhilgusain2@gmail.com" required>
                        </div>

                        <!-- Aadhaar Card Number & PAN Card Number -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="aadhar" class="form-label text-muted small fw-bold">Aadhaar Card Number</label>
                                <input type="text" id="aadhar" class="form-control bg-light border-0 py-2 rounded-3" placeholder="12-digit Aadhaar Number">
                            </div>
                            <div class="col-md-6">
                                <label for="pan" class="form-label text-muted small fw-bold">PAN Card Number <span class="text-danger">*</span></label>
                                <input type="text" id="pan" class="form-control bg-light border-0 py-2 rounded-3" placeholder="10-digit PAN Number" required>
                            </div>
                        </div>

                        <!-- Swacheseva Centre Code / Payment UTR No -->
                        <div class="mb-3">
                            <label for="utr_code" class="form-label text-muted small fw-bold">Swacheseva Centre Code / Payment UTR No <span class="text-danger">*</span></label>
                            <input type="text" id="utr_code" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Enter Centre Code or Transaction UTR Number" required>
                        </div>

                        <!-- Shop Location Full Address -->
                        <div class="mb-4">
                            <label for="shop_address" class="form-label text-muted small fw-bold">Shop Location Full Address with Pincode <span class="text-danger">*</span></label>
                            <textarea id="shop_address" class="form-control bg-light border-0 py-2 rounded-3" rows="3" placeholder="Enter complete address where you want to establish the Centre, along with the Pincode" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm mb-3">Submit Application</button>

                        <p class="mb-0 text-center text-muted small">
                            Already registered? <a href="{{ route('login') }}" class="text-secondary-theme fw-bold text-decoration-none">Login</a>
                        </p>
                    </form>
                </x-card>
            </div>
        </div>
    </div>
</div>
@endsection
