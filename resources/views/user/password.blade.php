@extends('layouts.user')

@section('title', 'Change Password - User Portal')

@section('content')
    <x-breadcrumb title="Change Password" subtitle="Manage your security configuration" parent="Dashboard" parentRoute="{{ route('user.dashboard') }}" />

    <!-- Password form -->
    <div class="row g-custom mb-custom">
        <div class="col-lg-6">
            <x-card :hover="false" title="Security Settings" class="bg-white border-0 shadow-sm">
                <form>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Current Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-key-fill text-muted"></i></span>
                            <input type="password" class="form-control bg-light border-0 py-2" placeholder="Enter current password" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">New Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-shield-lock-fill text-muted"></i></span>
                            <input type="password" class="form-control bg-light border-0 py-2" placeholder="Enter new password" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-muted small fw-bold">Confirm New Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-shield-lock-fill text-muted"></i></span>
                            <input type="password" class="form-control bg-light border-0 py-2" placeholder="Re-enter new password" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary px-5 shadow-sm">Update Password</button>
                </form>
            </x-card>
        </div>

        <div class="col-lg-6">
            <x-card :hover="false" title="Password Requirements" class="bg-white border-0 shadow-sm">
                <p class="text-muted small">To maintain a secure account, ensure your password satisfies the following parameters:</p>
                <ul class="list-unstyled text-muted small">
                    <li class="mb-2"><i class="bi bi-info-circle text-primary-theme me-2"></i> Minimum 8 characters in length.</li>
                    <li class="mb-2"><i class="bi bi-info-circle text-primary-theme me-2"></i> Must contain at least one uppercase letter (A-Z).</li>
                    <li class="mb-2"><i class="bi bi-info-circle text-primary-theme me-2"></i> Must contain at least one numerical digit (0-9).</li>
                    <li class="mb-2"><i class="bi bi-info-circle text-primary-theme me-2"></i> Must contain at least one special symbol (e.g. @, #, $).</li>
                </ul>
            </x-card>
        </div>
    </div>
@endsection
