@extends('layouts.guest')

@section('title', 'Our Services - Swacheseva')

@section('content')
    <!-- Inner Page Header -->
    <section class="py-5 bg-primary-theme text-white">
        <div class="container py-3">
            <h1 class="fw-bold mb-2 text-white">Youth Development Services</h1>
            <p class="lead mb-0 text-white-50 small" style="max-width: 600px;">
                Explore various service schemes designed to boost your training, career, and entrepreneurial ambitions.
            </p>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row g-4 justify-content-center">
                @forelse($services as $service)
                    @php
                        $isHex = Str::startsWith($service->theme_color, '#');
                    @endphp
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="{{ route('register') }}" class="text-decoration-none text-white">
                            <div class="service-grid-card {{ !$isHex ? $service->theme_color : '' }}" 
                                 style="{{ $isHex ? 'background: linear-gradient(135deg, ' . $service->theme_color . ' 0%, ' . $service->theme_color . 'dd 100%); border: 0;' : '' }}">
                                <div class="service-icon-circle">
                                    @if(str_starts_with($service->icon_class, 'bi '))
                                        <i class="{{ $service->icon_class }}"></i>
                                    @else
                                        <img src="{{ asset($service->icon_class) }}" alt="icon" style="width: 22px; height: 22px; object-fit: contain; border-radius: 50%;">
                                    @endif
                                </div>
                                <h5>{{ $service->name }}</h5>
                                <p>{{ $service->description }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-4">
                        <p class="text-muted mb-0">No services configured yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
