@extends('layouts.app')

@section('title', 'Login - Swacheseva')

@section('content')
<div class="container-fluid px-0">
    <div class="row g-0 min-vh-100">
        <!-- Left Side: Theme Graphic -->
        <div class="col-lg-6 d-none d-lg-flex bg-primary-theme align-items-center justify-content-center text-white position-relative overflow-hidden" style="background: #002984;">
            <div class="position-absolute opacity-10 end-0 top-0" style="font-size: 25rem; transform: translate(30%, -20%);">
                <i class="bi bi-person-workspace text-white"></i>
            </div>
            
            <div class="p-5 text-center position-relative" style="max-width: 500px; z-index: 10;">
                <div class="bg-white p-3 rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center shadow" style="width: 80px; height: 80px;">
                    <i class="bi bi-person-workspace text-primary-theme fs-1"></i>
                </div>
                <h2 class="fw-bold mb-3">Swacheseva Portal</h2>
                <p class="text-white-50 lead fs-6 mb-4">
                    Access your personalized applicant dashboard to check scheme request status, update career training profiles, and download notifications.
                </p>
                <div class="bg-white bg-opacity-10 p-3 rounded-3 border border-white-10 text-start">
                    <p class="mb-1 text-secondary-theme fw-bold small"><i class="bi bi-info-circle me-1"></i> MOCK LOGIN DETAILS</p>
                    <p class="mb-0 text-white-50 small"><strong>Admin:</strong> admin@swacheseva.com / admin123</p>
                    <p class="mb-0 text-white-50 small"><strong>User:</strong> user@swacheseva.com / user123</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light">
            <div class="p-5 w-100" style="max-width: 480px;">
                <div class="mb-5 text-center text-lg-start">
                    <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none justify-content-center justify-content-lg-start mb-4">
                        <div class="bg-primary-theme p-2 rounded-circle me-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                            <i class="bi bi-person-workspace text-white"></i>
                        </div>
                        <span class="fw-bold fs-5 text-primary-theme">Swacheseva</span>
                    </a>
                    <h3 class="fw-bold text-primary-theme mb-2">Welcome Back</h3>
                    <p class="text-muted small">Please sign in to access your portal</p>
                </div>

                <x-card :hover="false" class="p-4 bg-white border shadow-sm">
                    <!-- Target logins to user or admin dashboard for demonstration purposes -->
                    <form action="#" method="GET" id="loginForm">
                        <div class="mb-3">
                            <label for="email" class="form-label text-muted small fw-bold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" id="email" class="form-control bg-light border-0 py-2" placeholder="user@swacheseva.com" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <label for="password" class="form-label text-muted small fw-bold mb-0">Password</label>
                                <a href="#" class="text-secondary-theme text-decoration-none small">Forgot Password?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-shield-lock text-muted"></i></span>
                                <input type="password" id="password" class="form-control bg-light border-0 py-2" placeholder="••••••••" required>
                            </div>
                        </div>
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label text-muted small" for="rememberMe">Remember my session</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm mb-3">Sign In</button>
                        
                        <p class="mb-0 text-center text-muted small">
                            Don't have an account? <a href="{{ route('register') }}" class="text-secondary-theme fw-bold text-decoration-none">Sign Up</a>
                        </p>
                    </form>
                </x-card>
            </div>
        </div>
    </div>
</div>

<script>
    // Demo routing helper to simulate redirects depending on input
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('loginForm');
        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const emailInput = document.getElementById('email').value.trim().toLowerCase();
                if (emailInput.includes('admin')) {
                    window.location.href = "{{ route('admin.dashboard') }}";
                } else {
                    window.location.href = "{{ route('user.dashboard') }}";
                }
            });
        }
    });
</script>
@endsection
