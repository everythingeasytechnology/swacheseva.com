@extends('layouts.user')

@section('title', 'Recommended Blogs - User Portal')

@section('content')
    <x-breadcrumb title="Resource Feed" subtitle="Browse published guides, news, and tips" parent="Dashboard" parentRoute="{{ route('user.dashboard') }}" />

    <!-- Articles Feed -->
    <div class="row g-custom">
        <div class="col-lg-4 col-md-6">
            <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column bg-white">
                <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=500&q=80" alt="Career Tips" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                <div class="p-4 d-flex flex-column flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Career Tips</span>
                        <small class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-calendar3 me-1"></i> May 20, 2026</small>
                    </div>
                    <h6 class="fw-bold mb-3"><a href="#" class="text-decoration-none text-dark hover-primary">Top Skills in Demand for Better Career Opportunities</a></h6>
                    <p class="text-muted small mb-4 flex-grow-1">
                        Discover the most sought-after industry skills in tech, operations, and management for 2026.
                    </p>
                    <a href="#" class="text-primary-theme fw-bold text-decoration-none small">Read Article <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </x-card>
        </div>

        <div class="col-lg-4 col-md-6">
            <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column bg-white">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=500&q=80" alt="Government Schemes" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                <div class="p-4 d-flex flex-column flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Government Schemes</span>
                        <small class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-calendar3 me-1"></i> May 18, 2026</small>
                    </div>
                    <h6 class="fw-bold mb-3"><a href="#" class="text-decoration-none text-dark hover-primary">How Government Schemes Help Youth Start Businesses</a></h6>
                    <p class="text-muted small mb-4 flex-grow-1">
                        A comprehensive look at subsidy schemes and seed funds supporting small business creation.
                    </p>
                    <a href="#" class="text-primary-theme fw-bold text-decoration-none small">Read Article <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </x-card>
        </div>

        <div class="col-lg-4 col-md-6">
            <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column bg-white">
                <img src="https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?auto=format&fit=crop&w=500&q=80" alt="Success Story" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                <div class="p-4 d-flex flex-column flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Success Story</span>
                        <small class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-calendar3 me-1"></i> May 15, 2026</small>
                    </div>
                    <h6 class="fw-bold mb-3"><a href="#" class="text-decoration-none text-dark hover-primary">From Training to Success: Stories of Transformation</a></h6>
                    <p class="text-muted small mb-4 flex-grow-1">
                        Real stories of candidates who secured top jobs through the Swacheseva portal.
                    </p>
                    <a href="#" class="text-primary-theme fw-bold text-decoration-none small">Read Article <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </x-card>
        </div>
    </div>
@endsection
