@extends('layouts.admin')

@section('title', 'Admin Settings - Admin Panel')

@section('content')
    <x-breadcrumb title="System Settings" subtitle="Manage your administrator credentials and password security" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

    <div class="row g-custom mb-custom">
        <!-- Account Settings & Password change forms -->
        <div class="col-lg-8 mb-4 mb-lg-0">
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

        <!-- Administrator Overview Info Card -->
        <div class="col-lg-4">
            <x-card :hover="false" class="bg-white border-0 shadow-sm text-center p-3 h-100 d-flex flex-column justify-content-center align-items-center" style="min-height: 300px;">
                <div class="profile-avatar-wrapper mb-3 position-relative d-inline-block">
                    <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Admin Avatar" class="profile-avatar" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 4px solid var(--border-color);">
                </div>
                <h5 class="fw-bold mb-1 text-primary-theme">Super Administrator</h5>
                <span class="badge bg-danger-theme text-white mb-3" style="font-size: 0.7rem; padding: 0.35rem 0.8rem; border-radius: 50px;">Root / System Owner</span>
                
                <div class="w-100 text-start bg-light p-3 rounded-3 small text-muted border" style="font-size: 0.78rem;">
                    <p class="mb-2"><strong>Role ID:</strong> SW-ROOT-001</p>
                    <p class="mb-2"><strong>Authority Level:</strong> Full Access</p>
                    <p class="mb-0"><strong>Status:</strong> Secure & Active</p>
                </div>
            </x-card>
        </div>
    </div>
@endsection
