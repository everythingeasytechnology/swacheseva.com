@extends('layouts.admin')

@section('title', 'Admin Settings - Admin Panel')

@section('content')
    <x-breadcrumb title="System Settings" subtitle="Manage your administrator credentials and password security" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

    <div class="row g-custom mb-custom">
        <!-- Account Settings & Password change forms -->
        <div class="col-12">
            <!-- Email & Phone Update Card -->
            <x-card :hover="false" title="Update Profile Details" class="bg-white border-0 shadow-sm mb-4">
                <form>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">Administrator Email Address</label>
                            <input type="email" class="form-control bg-light border-0 py-2 rounded-3" value="admin@swacheseva.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">Contact Mobile Number</label>
                            <input type="tel" class="form-control bg-light border-0 py-2 rounded-3" value="+91 9876543210" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm" style="font-size: 0.85rem;">Save Details</button>
                </form>
            </x-card>

            <!-- Franchisee Payment Settings Card (QR Code & UPI ID) -->
            <x-card :hover="false" title="Franchisee Payment Settings" class="bg-white border-0 shadow-sm mb-4">
                <form enctype="multipart/form-data">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">Payment UPI ID</label>
                            <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="9154252555-1@okbizaxis" placeholder="e.g., UPI ID" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">Franchisee Fee (INR)</label>
                            <input type="number" class="form-control bg-light border-0 py-2 rounded-3" value="164" placeholder="e.g., 164" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-8">
                            <label class="form-label text-muted small fw-bold">Upload QR Code Image</label>
                            <input type="file" id="qr-code-input" class="form-control bg-light border-0 py-2 rounded-3" accept="image/*">
                            <small class="text-muted d-block mt-1" style="font-size: 0.7rem;">Select a new QR Code image to replace the current scanner image on the register page.</small>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-label text-muted small fw-bold d-block">Current QR Code</label>
                            <div class="border rounded-3 p-2 bg-light d-inline-block">
                                <img src="{{ asset('images/qr-code.png') }}" id="qr-code-preview" alt="QR Code Preview" style="width: 80px; height: 80px; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm" style="font-size: 0.85rem;">Save Payment Settings</button>
                </form>
            </x-card>

            <!-- Hero Slideshow Images Manager Card -->
            <x-card :hover="false" title="Manage Hero Slideshow Images" class="bg-white border-0 shadow-sm mb-4">
                <form enctype="multipart/form-data" class="mb-4">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-5">
                            <label class="form-label text-muted small fw-bold">Upload New Slide Image</label>
                            <input type="file" class="form-control bg-light border-0 py-2 rounded-3" accept="image/*" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label text-muted small fw-bold">Slide Caption / Title</label>
                            <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., Youth Education Banner">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm fw-bold" style="font-size: 0.82rem; border-radius: 6px;">Add Slide</button>
                        </div>
                    </div>
                </form>

                <label class="form-label text-muted small fw-bold mb-3 d-block">Current Slideshow Gallery (3 Slides Active)</label>
                <div class="row g-3">
                    <!-- Slide 1 -->
                    <div class="col-md-4">
                        <div class="position-relative border rounded-3 overflow-hidden" style="height: 120px;">
                            <img src="{{ asset('hero-india.jpg') }}" alt="Slide 1" class="w-100 h-100" style="object-fit: cover;">
                            <div class="position-absolute top-0 end-0 p-1">
                                <button type="button" class="btn btn-danger btn-sm p-1 rounded-circle d-flex align-items-center justify-content-center" style="width: 24px; height: 24px; opacity: 0.9;" title="Delete Slide">
                                    <i class="bi bi-trash small"></i>
                                </button>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-70 text-white px-2 py-1" style="font-size: 0.65rem;">
                                India Heritage Banner
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="col-md-4">
                        <div class="position-relative border rounded-3 overflow-hidden" style="height: 120px;">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" alt="Slide 2" class="w-100 h-100" style="object-fit: cover;">
                            <div class="position-absolute top-0 end-0 p-1">
                                <button type="button" class="btn btn-danger btn-sm p-1 rounded-circle d-flex align-items-center justify-content-center" style="width: 24px; height: 24px; opacity: 0.9;" title="Delete Slide">
                                    <i class="bi bi-trash small"></i>
                                </button>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-70 text-white px-2 py-1" style="font-size: 0.65rem;">
                                Youth Education
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="col-md-4">
                        <div class="position-relative border rounded-3 overflow-hidden" style="height: 120px;">
                            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097798?auto=format&fit=crop&w=1200&q=80" alt="Slide 3" class="w-100 h-100" style="object-fit: cover;">
                            <div class="position-absolute top-0 end-0 p-1">
                                <button type="button" class="btn btn-danger btn-sm p-1 rounded-circle d-flex align-items-center justify-content-center" style="width: 24px; height: 24px; opacity: 0.9;" title="Delete Slide">
                                    <i class="bi bi-trash small"></i>
                                </button>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-70 text-white px-2 py-1" style="font-size: 0.65rem;">
                                Skill Development
                            </div>
                        </div>
                    </div>
                </div>
            </x-card>

            <!-- Password Update Card -->
            <x-card :hover="false" title="Change Account Password" class="bg-white border-0 shadow-sm">
                <form>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Current Administrator Password</label>
                        <input type="password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="••••••••" required>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">New Security Password</label>
                            <input type="password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="••••••••" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">Confirm New Password</label>
                            <input type="password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="••••••••" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm" style="font-size: 0.85rem;">Update Password</button>
                </form>
            </x-card>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const qrInput = document.getElementById('qr-code-input');
            const qrPreview = document.getElementById('qr-code-preview');
            if (qrInput && qrPreview) {
                qrInput.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            qrPreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
@endsection
