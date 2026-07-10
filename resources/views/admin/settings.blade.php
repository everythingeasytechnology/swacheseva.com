@extends('layouts.admin')

@section('title', 'Admin Settings - Admin Panel')

@section('content')
    <x-breadcrumb title="System Settings" subtitle="Manage your administrator credentials and franchisee configurations" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

    <!-- Flash Messages -->
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

    <div class="row g-custom mb-custom">
        <!-- Account Settings & Password change forms -->
        <div class="col-12">
            <!-- Email & Phone Update Card -->
            <x-card :hover="false" title="Update Profile Details" class="bg-white border-0 shadow-sm mb-4">
                <form action="{{ route('admin.settings.profile') }}" method="POST">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="admin_email" class="form-label text-muted small fw-bold">Administrator Email Address</label>
                            <input type="email" name="admin_email" id="admin_email" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('admin_email', $settings['admin_email']) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="admin_phone" class="form-label text-muted small fw-bold">Contact Mobile Number</label>
                            <input type="tel" name="admin_phone" id="admin_phone" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('admin_phone', $settings['admin_phone']) }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm" style="font-size: 0.85rem;">Save Details</button>
                </form>
            </x-card>

            <!-- Website Public Contact Settings Card -->
            <x-card :hover="false" title="Website Public Contact Settings" class="bg-white border-0 shadow-sm mb-4">
                <form action="{{ route('admin.settings.contact') }}" method="POST">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="website_email" class="form-label text-muted small fw-bold">Website Primary Email</label>
                            <input type="email" name="website_email" id="website_email" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('website_email', $settings['website_email']) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="website_email_secondary" class="form-label text-muted small fw-bold">Website Secondary Email</label>
                            <input type="email" name="website_email_secondary" id="website_email_secondary" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('website_email_secondary', $settings['website_email_secondary']) }}" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="website_phone" class="form-label text-muted small fw-bold">Website Phone Number</label>
                            <input type="tel" name="website_phone" id="website_phone" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('website_phone', $settings['website_phone']) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="website_address" class="form-label text-muted small fw-bold">Website Footer Address</label>
                            <input type="text" name="website_address" id="website_address" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('website_address', $settings['website_address']) }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm" style="font-size: 0.85rem;">Save Website Settings</button>
                </form>
            </x-card>

            <!-- Franchisee Payment Settings Card (QR Code & UPI ID) -->
            <x-card :hover="false" title="Franchisee Payment Settings" class="bg-white border-0 shadow-sm mb-4">
                <form action="{{ route('admin.settings.payment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="payment_upi_id" class="form-label text-muted small fw-bold">Payment UPI ID</label>
                            <input type="text" name="payment_upi_id" id="payment_upi_id" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('payment_upi_id', $settings['payment_upi_id']) }}" placeholder="e.g., UPI ID" required>
                        </div>
                        <div class="col-md-6">
                            <label for="franchisee_fee" class="form-label text-muted small fw-bold">Franchisee Fee (INR)</label>
                            <input type="number" name="franchisee_fee" id="franchisee_fee" class="form-control bg-light border-0 py-2 rounded-3" value="{{ old('franchisee_fee', $settings['franchisee_fee']) }}" placeholder="e.g., 164" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3 align-items-center">
                        <div class="col-md-8">
                            <label for="qr_code_image" class="form-label text-muted small fw-bold">Upload QR Code Image</label>
                            <input type="file" name="qr_code_image" id="qr-code-input" class="form-control bg-light border-0 py-2 rounded-3" accept="image/*">
                            <small class="text-muted d-block mt-1" style="font-size: 0.7rem;">Select a new QR Code image to replace the current scanner image on the register page.</small>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-label text-muted small fw-bold d-block">Current QR Code</label>
                            <div class="border rounded-3 p-2 bg-light d-inline-block shadow-sm">
                                <img src="{{ asset($settings['qr_code_path']) }}" id="qr-code-preview" alt="QR Code Preview" style="width: 100px; height: 100px; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm" style="font-size: 0.85rem;">Save Payment Settings</button>
                </form>
            </x-card>

            <!-- Hero Slideshow Images Manager Card -->
            <x-card :hover="false" title="Manage Hero Slideshow Images" class="bg-white border-0 shadow-sm mb-4">
                <form action="{{ route('admin.settings.slide.add') }}" method="POST" enctype="multipart/form-data" class="mb-4 border-bottom pb-4">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-md-5">
                            <label for="slide_image" class="form-label text-muted small fw-bold">Upload New Slide Image</label>
                            <input type="file" name="slide_image" id="slide_image" class="form-control bg-light border-0 py-2 rounded-3" accept="image/*" required>
                        </div>
                        <div class="col-md-5">
                            <label for="caption" class="form-label text-muted small fw-bold">Slide Caption / Title</label>
                            <input type="text" name="caption" id="caption" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., Youth Education Banner">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm fw-bold" style="font-size: 0.82rem; border-radius: 6px;">Add Slide</button>
                        </div>
                    </div>
                </form>

                <label class="form-label text-muted small fw-bold mb-3 d-block">Current Slideshow Gallery ({{ $slides->count() }} Slides Active)</label>
                <div class="row g-3">
                    @forelse($slides as $slide)
                        <div class="col-md-4 mb-3">
                            <div class="position-relative border rounded-3 overflow-hidden shadow-sm" style="height: 140px;">
                                <img src="{{ Str::startsWith($slide->image_path, ['http://', 'https://']) ? $slide->image_path : asset($slide->image_path) }}" alt="{{ $slide->caption }}" class="w-100 h-100" style="object-fit: cover;">
                                
                                <div class="position-absolute top-0 end-0 p-2">
                                    <form action="{{ route('admin.settings.slide.delete', $slide->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this slide?');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm p-1 rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; opacity: 0.9;" title="Delete Slide">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 text-white px-2 py-1.5 fw-semibold" style="font-size: 0.7rem; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    {{ $slide->caption ?? 'Slide Image' }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center text-muted py-4">No custom slideshow slides added. Fallback background image will be used.</div>
                    @endforelse
                </div>
            </x-card>

            <!-- Password Update Card -->
            <x-card :hover="false" title="Change Account Password" class="bg-white border-0 shadow-sm">
                <form action="{{ route('user.password.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password" class="form-label text-muted small fw-bold">Current Administrator Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="••••••••" required>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label text-muted small fw-bold">New Security Password</label>
                            <input type="password" name="password" id="password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="••••••••" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label text-muted small fw-bold">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-light border-0 py-2 rounded-3" placeholder="••••••••" required>
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
