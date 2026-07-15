@extends('layouts.user')

@section('title', 'Applied Services - User Portal')

@section('content')
    <x-breadcrumb title="My Service Schemes" subtitle="Monitor and access various government services" parent="Dashboard" parentRoute="{{ route('user.dashboard') }}" />

    <!-- 20 Swacheseva Services & Direct Portals -->
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
