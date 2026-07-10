@extends('layouts.app')

@section('title', 'Login - Swacheseva')

@section('content')
<div class="container-fluid px-0">
    <div class="row g-0 min-vh-100">
        <!-- Left Side: Theme Graphic -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center position-relative overflow-hidden" style="background: #002984;">
            <img src="{{ asset('login.png') }}" alt="Swacheseva Portal" style="max-width: 100%; max-height: 100%; object-fit: contain;">
        </div>

        <!-- Right Side: Login Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light">
            <div class="p-5 w-100" style="max-width: 480px;">
                <div class="mb-4 text-center text-lg-start">
                    <a href="{{ route('home') }}" class="d-inline-block mb-3">
                        <img src="{{ asset('bk-logo.png') }}" alt="Swacheseva Logo" style="height: 60px; width: auto; object-fit: contain;">
                    </a>
                    <h3 class="fw-bold text-primary-theme mb-2">Welcome Back</h3>
                    <p class="text-muted small">Please sign in to access your portal</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-3" role="alert">
                        <ul class="mb-0 small ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-3" role="alert">
                        <span class="small"><i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <x-card :hover="false" class="p-4 bg-white border shadow-sm">
                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label text-muted small fw-bold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" name="email" id="email" class="form-control bg-light border-0 py-2" placeholder="user@swacheseva.com" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <label for="password" class="form-label text-muted small fw-bold mb-0">Password</label>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-shield-lock text-muted"></i></span>
                                <input type="password" name="password" id="password" class="form-control bg-light border-0 py-2" placeholder="••••••••" required>
                            </div>
                        </div>
                        <div class="mb-4 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
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
@endsection
