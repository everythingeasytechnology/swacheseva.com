@extends('layouts.user')

@section('title', 'Change Password - User Portal')

@section('content')
    <x-breadcrumb title="Change Password" subtitle="Manage your security configuration" parent="Dashboard" parentRoute="{{ route('user.dashboard') }}" />

    <!-- Password form -->
    <div class="row g-custom mb-custom">
        <div class="col-lg-6">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 mb-3" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-3" role="alert">
                    <ul class="mb-0 small">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <x-card :hover="false" title="Security Settings" class="bg-white border-0 shadow-sm">
                <form action="{{ route('user.password.update') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="current_password" class="form-label text-muted small fw-bold">Current Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-key-fill text-muted"></i></span>
                            <input type="password" name="current_password" id="current_password" class="form-control bg-light border-0 py-2" placeholder="Enter current password" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-muted small fw-bold">New Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-shield-lock-fill text-muted"></i></span>
                            <input type="password" name="password" id="password" class="form-control bg-light border-0 py-2" placeholder="Enter new password" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label text-muted small fw-bold">Confirm New Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-shield-lock-fill text-muted"></i></span>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-light border-0 py-2" placeholder="Re-enter new password" required>
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
