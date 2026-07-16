@extends('layouts.app')

@section('title', 'Reset Password - Swacheseva')

@section('content')
<div class="container-fluid px-0">
    <div class="row g-0 min-vh-100">
        <!-- Left Side: Theme Graphic Image -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center bg-white position-relative overflow-hidden p-0">
            <img src="{{ asset('login.png') }}" alt="Reset Password Cover Image" style="width: 100%; height: 100vh; object-fit: cover;">
        </div>

        <!-- Right Side: Reset Password Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light">
            <div class="p-5 w-100" style="max-width: 480px;">
                <div class="mb-4 text-center text-lg-start">
                    <a href="{{ route('home') }}" class="d-inline-block mb-3">
                        <img src="{{ asset('bk-logo.png') }}" alt="Swacheseva Logo" style="height: 60px; width: auto; object-fit: contain;">
                    </a>
                    <h3 class="fw-bold text-primary-theme mb-2">Create New Password</h3>
                    <p class="text-muted small">Set up a strong password to protect your candidate account</p>
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

                <x-card :hover="false" class="p-4 bg-white border shadow-sm">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" class="form-control bg-light border-0 py-2 text-muted" value="{{ $email }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label text-muted small fw-bold">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-shield-lock text-muted"></i></span>
                                <input type="password" name="password" id="password" class="form-control bg-light border-0 py-2" placeholder="Min 6 characters" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label text-muted small fw-bold">Confirm New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-shield-lock-fill text-muted"></i></span>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-light border-0 py-2" placeholder="Confirm password" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm mb-3">Reset Password</button>
                    </form>
                </x-card>
            </div>
        </div>
    </div>
</div>
@endsection
