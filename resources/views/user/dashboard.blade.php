@extends('layouts.user')

@section('title', 'Applicant Dashboard - Swacheseva')

@section('content')
    <!-- Breadcrumb header -->
    <x-breadcrumb title="Dashboard" subtitle="Welcome back to your Swacheseva applicant dashboard" />

    <!-- Row 1: Welcome banner & Profile Card widget -->
    <div class="row g-custom mb-custom">
        <!-- Welcome banner -->
        <div class="col-lg-8 mb-3 mb-lg-0">
            <div class="p-4 bg-primary-theme text-white rounded-4 shadow-sm position-relative overflow-hidden h-100 d-flex flex-column justify-content-center" style="background: #002984; min-height: 140px;">
                <!-- Decorative background vector -->
                <div class="position-absolute end-0 bottom-0 opacity-10" style="font-size: 8rem; transform: translate(10%, 20%); z-index: 1;">
                    <i class="bi bi-person-workspace text-white"></i>
                </div>
                
                <div class="position-relative" style="z-index: 2;">
                    <h3 class="fw-bold text-white mb-2">Welcome Back, {{ $user->name }}</h3>
                    <p class="text-white-50 mb-0 small" style="max-width: 600px;">
                        Your profile status is currently 
                        @if($user->status === 'active')
                            <span class="badge bg-success text-white px-2.5 py-1">Verified & Active</span>. 
                        @elseif($user->status === 'pending')
                            <span class="badge bg-warning text-dark px-2.5 py-1">Pending Approval</span>. Your application is under review. Portal links will activate once verified by the administrator.
                        @else
                            <span class="badge bg-danger text-white px-2.5 py-1">Application Rejected</span>. Please verify your payment details or contact support for rectification.
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Profile card widget -->
        <div class="col-lg-4">
            <x-card :hover="false" class="bg-white border-0 shadow-sm text-center h-100 p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="profile-avatar-wrapper flex-shrink-0">
                        <img src="{{ $user->avatar ? asset($user->avatar) : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' }}" alt="{{ $user->name }}" class="profile-avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                    </div>
                    <div class="text-start">
                        <h6 class="fw-bold text-primary-theme mb-0">{{ $user->name }}</h6>
                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">
                            {{ $user->status === 'active' ? 'Verified Candidate' : ($user->status === 'pending' ? 'Pending Verification' : 'Rejected Candidate') }}
                        </small>
                    </div>
                    <a href="{{ route('user.profile') }}" class="btn btn-outline-primary btn-sm ms-auto px-3 rounded-pill" style="font-size: 0.75rem;">Edit Profile</a>
                </div>
                <div class="mt-2 text-start bg-light p-2 rounded-3 small text-muted border border-light" style="font-size: 0.75rem;">
                    <div class="mb-1"><strong>Swacheseva ID:</strong> <span class="font-monospace text-primary-theme fw-bold">SWAC-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</span></div>
                    <div class="mb-1"><strong>Email:</strong> {{ $user->email }}</div>
                    <div><strong>Phone:</strong> {{ $user->phone }}</div>
                </div>
            </x-card>
        </div>
    </div>

    <!-- Row 2: All 20 Swacheseva Services & Direct Portals -->
    <div class="row g-custom mb-custom">
        <div class="col-12">
            <x-card :hover="false" title="All Swacheseva E-Services & Portals" class="bg-white border-0 shadow-sm">
                <div class="row g-3">
                    @foreach($services as $service)
                        @php
                            $isHex = Str::startsWith($service->theme_color, '#');
                        @endphp
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="service-grid-card {{ !$isHex ? $service->theme_color : '' }} d-flex flex-column justify-content-between p-3" 
                                 style="min-height: 130px; {{ $isHex ? 'background: linear-gradient(135deg, ' . $service->theme_color . ' 0%, ' . $service->theme_color . 'dd 100%); border: 0;' : '' }}">
                                <div>
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div class="service-icon-circle mb-0 flex-shrink-0">
                                            @if(str_starts_with($service->icon_class, 'bi '))
                                                <i class="{{ $service->icon_class }}"></i>
                                            @else
                                                <img src="{{ asset($service->icon_class) }}" alt="icon" style="width: 22px; height: 22px; object-fit: contain; border-radius: 50%;">
                                            @endif
                                        </div>
                                        <h5 class="mb-0 text-white" style="font-size: 0.95rem; line-height: 1.2;">{{ $service->name }}</h5>
                                    </div>
                                    <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">{{ $service->description }}</p>
                                </div>
                                <a href="{{ $user->status === 'active' ? $service->link : '#' }}" 
                                   onclick="{{ $user->status === 'active' ? '' : "alert('Application under review. Portal links will activate once verification is complete.'); return false;" }}" 
                                   target="_blank" 
                                   class="btn btn-light btn-sm mx-auto fw-bold" 
                                   style="font-size: 0.72rem; border-radius: 8px; width: 65%;">
                                    <i class="bi bi-box-arrow-up-right me-1"></i> Visit Portal
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>


@endsection
