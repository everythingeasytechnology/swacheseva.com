@extends('layouts.app')

@section('title', 'Forgot Password - Swacheseva')

@section('content')
<div class="container-fluid px-0">
    <div class="row g-0 min-vh-100">
        <!-- Left Side: Theme Graphic Image -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center bg-white position-relative overflow-hidden p-0">
            <img src="{{ asset('login.png') }}" alt="Forgot Password Cover Image" style="width: 100%; height: 100vh; object-fit: cover;">
        </div>

        <!-- Right Side: Request Reset Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light">
            <div class="p-5 w-100" style="max-width: 480px;">
                <div class="mb-4 text-center text-lg-start">
                    <a href="{{ route('home') }}" class="d-inline-block mb-3">
                        <img src="{{ asset('bk-logo.png') }}" alt="Swacheseva Logo" style="height: 60px; width: auto; object-fit: contain;">
                    </a>
                    <h3 class="fw-bold text-primary-theme mb-2">Forgot Password?</h3>
                    <p class="text-muted small">Enter your email and we'll send you a link to reset your password</p>
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
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label text-muted small fw-bold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" name="email" id="email" class="form-control bg-light border-0 py-2" placeholder="user@swacheseva.com" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm mb-3">Send Password Reset Link</button>
                        
                        <p class="mb-0 text-center text-muted small">
                            Remember your password? <a href="{{ route('login') }}" class="text-secondary-theme fw-bold text-decoration-none">Sign In</a>
                        </p>
                    </form>
                </x-card>
            </div>
        </div>
    </div>
</div>
@endsection
