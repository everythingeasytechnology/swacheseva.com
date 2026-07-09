@extends('layouts.guest')

@section('title', 'Blog & Updates - Swacheseva')

@section('content')
    <!-- Inner Page Header -->
    <section class="py-5 bg-primary-theme text-white">
        <div class="container py-3">
            <h1 class="fw-bold mb-2 text-white">Blog & News Updates</h1>
            <p class="lead mb-0 text-white-50 small" style="max-width: 600px;">
                Stay updated with the latest trends in the job market, skills development, and scheme announcements.
            </p>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <!-- Search & Filters -->
            <div class="row g-3 mb-5 align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="d-flex gap-2 flex-wrap">
                        <button class="btn btn-sm btn-primary px-3">All</button>
                        <button class="btn btn-sm btn-light px-3 text-muted">Career Tips</button>
                        <button class="btn btn-sm btn-light px-3 text-muted">Government Schemes</button>
                        <button class="btn btn-sm btn-light px-3 text-muted">Success Stories</button>
                        <button class="btn btn-sm btn-light px-3 text-muted">Tech Trends</button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 text-md-end">
                    <div class="input-group ms-md-auto" style="max-width: 320px;">
                        <input type="text" class="form-control bg-white border-0 shadow-sm rounded-start-pill ps-3" placeholder="Search articles...">
                        <button class="btn btn-primary border-0 rounded-end-pill px-3" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Blog Grid -->
            <div class="row g-4">
                <!-- Blog 1 -->
                <div class="col-lg-4 col-md-6">
                    <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column">
                        <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=500&q=80" alt="Career Tips" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Career Tips</span>
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> May 20, 2026</small>
                            </div>
                            <h5 class="fw-bold mb-3 fs-6"><a href="{{ route('blog.detail') }}" class="text-decoration-none text-dark hover-primary">Top Skills in Demand for Better Career Opportunities</a></h5>
                            <p class="text-muted small mb-4 flex-grow-1">
                                Discover the most sought-after industry skills in tech, operations, and management for 2026.
                            </p>
                            <a href="{{ route('blog.detail') }}" class="text-primary-theme fw-bold text-decoration-none small">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </x-card>
                </div>

                <!-- Blog 2 -->
                <div class="col-lg-4 col-md-6">
                    <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=500&q=80" alt="Government Schemes" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Government Schemes</span>
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> May 18, 2026</small>
                            </div>
                            <h5 class="fw-bold mb-3 fs-6"><a href="{{ route('blog.detail') }}" class="text-decoration-none text-dark hover-primary">How Government Schemes Help Youth Start Businesses</a></h5>
                            <p class="text-muted small mb-4 flex-grow-1">
                                A comprehensive look at subsidy schemes and seed funds supporting small business creation.
                            </p>
                            <a href="{{ route('blog.detail') }}" class="text-primary-theme fw-bold text-decoration-none small">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </x-card>
                </div>

                <!-- Blog 3 -->
                <div class="col-lg-4 col-md-6">
                    <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column">
                        <img src="https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?auto=format&fit=crop&w=500&q=80" alt="Success Story" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Success Story</span>
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> May 15, 2026</small>
                            </div>
                            <h5 class="fw-bold mb-3 fs-6"><a href="{{ route('blog.detail') }}" class="text-decoration-none text-dark hover-primary">From Training to Success: Stories of Transformation</a></h5>
                            <p class="text-muted small mb-4 flex-grow-1">
                                Real stories of candidates who secured top jobs through the Swacheseva portal.
                            </p>
                            <a href="{{ route('blog.detail') }}" class="text-primary-theme fw-bold text-decoration-none small">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </x-card>
                </div>

                <!-- Blog 4 -->
                <div class="col-lg-4 col-md-6">
                    <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=500&q=80" alt="Tech Trends" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Tech Trends</span>
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> May 12, 2026</small>
                            </div>
                            <h5 class="fw-bold mb-3 fs-6"><a href="{{ route('blog.detail') }}" class="text-decoration-none text-dark hover-primary">Artificial Intelligence and the Future of Junior Coding Jobs</a></h5>
                            <p class="text-muted small mb-4 flex-grow-1">
                                Learn how AI tools are reshaping developer roles and what skills you need to stay relevant.
                            </p>
                            <a href="{{ route('blog.detail') }}" class="text-primary-theme fw-bold text-decoration-none small">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </x-card>
                </div>

                <!-- Blog 5 -->
                <div class="col-lg-4 col-md-6">
                    <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column">
                        <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=500&q=80" alt="Interview Tips" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Career Tips</span>
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> May 10, 2026</small>
                            </div>
                            <h5 class="fw-bold mb-3 fs-6"><a href="{{ route('blog.detail') }}" class="text-decoration-none text-dark hover-primary">How to Ace Virtual Interviews: Recruiter Secrets</a></h5>
                            <p class="text-muted small mb-4 flex-grow-1">
                                Practical advice on lighting, body language, and tech setup to win your next remote job interview.
                            </p>
                            <a href="{{ route('blog.detail') }}" class="text-primary-theme fw-bold text-decoration-none small">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </x-card>
                </div>

                <!-- Blog 6 -->
                <div class="col-lg-4 col-md-6">
                    <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column">
                        <img src="https://images.unsplash.com/photo-1542744094-3a31f103e35f?auto=format&fit=crop&w=500&q=80" alt="Startup Mentorship" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Success Story</span>
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> May 08, 2026</small>
                            </div>
                            <h5 class="fw-bold mb-3 fs-6"><a href="{{ route('blog.detail') }}" class="text-decoration-none text-dark hover-primary">Incubating ideas: From College project to funded Startup</a></h5>
                            <p class="text-muted small mb-4 flex-grow-1">
                                An encouraging journey of three graduates who built a logistics tool using seed funding.
                            </p>
                            <a href="{{ route('blog.detail') }}" class="text-primary-theme fw-bold text-decoration-none small">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </x-card>
                </div>
            </div>

            <!-- Pagination UI Component -->
            <nav aria-label="Blog pagination" class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link rounded-start-pill px-3" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link rounded-end-pill px-3" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
@endsection
