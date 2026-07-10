@extends('layouts.guest')

@section('title', 'About Us - Swacheseva')

@section('content')
    <!-- Inner Page Header -->
    <section class="py-5 bg-white text-dark" style="background-color: #ffffff !important;">
        <div class="container py-3">
            <h1 class="fw-bold mb-2 text-primary-theme">About Swacheseva</h1>
            <p class="lead mb-0 text-muted small" style="max-width: 600px;">
                Learn more about our mission, vision, and the values driving our youth employment initiative.
            </p>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" alt="About Swacheseva Group" class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-lg-6">
                    <span class="text-secondary-theme fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 0.85rem;">OUR ROADMAP</span>
                    <h2 class="fw-bold text-primary-theme mt-2 mb-4">Connecting Potential with Opportunity</h2>
                    
                    <div class="d-flex gap-3 mb-4">
                        <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0; background-color: #e7f1ff; border: 2px solid #0d6efd; color: #0d6efd;">
                            <i class="bi bi-rocket-takeoff fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-primary-theme mb-1">Our Mission</h5>
                            <p class="text-muted small mb-0">
                                To establish a frictionless service network providing modern vocational coaching, direct employment placements, and entrepreneurial incubation for underrepresented youths.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0; background-color: #e7f1ff; border: 2px solid #0d6efd; color: #0d6efd;">
                            <i class="bi bi-eye fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-primary-theme mb-1">Our Vision</h5>
                            <p class="text-muted small mb-0">
                                To foster a highly skilled national workforce with zero unemployment, leveraging public-private collaborations to catalyze societal growth.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="text-secondary-theme fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 0.85rem;">WHAT WE STAND FOR</span>
                <h2 class="fw-bold text-primary-theme mt-2">Our Core Values</h2>
                <div class="mx-auto bg-secondary-theme mt-2" style="width: 60px; height: 3px; border-radius: 5px;"></div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <x-card :hover="true" class="text-center h-100">
                        <i class="bi bi-shield-fill-check text-secondary-theme display-5 mb-3 d-inline-block"></i>
                        <h5 class="fw-bold text-primary-theme">Integrity</h5>
                        <p class="text-muted small mb-0">
                            Transparent verification protocols ensuring premium reliability for both applicants and companies.
                        </p>
                    </x-card>
                </div>
                <div class="col-md-4">
                    <x-card :hover="true" class="text-center h-100">
                        <i class="bi bi-people-fill text-secondary-theme display-5 mb-3 d-inline-block"></i>
                        <h5 class="fw-bold text-primary-theme">Inclusivity</h5>
                        <p class="text-muted small mb-0">
                            Dedicated training modules customized for all socio-economic backgrounds and regions.
                        </p>
                    </x-card>
                </div>
                <div class="col-md-4">
                    <x-card :hover="true" class="text-center h-100">
                        <i class="bi bi-lightbulb-fill text-secondary-theme display-5 mb-3 d-inline-block"></i>
                        <h5 class="fw-bold text-primary-theme">Innovation</h5>
                        <p class="text-muted small mb-0">
                            Continuous upgrading of course materials and training platforms based on current corporate needs.
                        </p>
                    </x-card>
                </div>
            </div>
        </div>
    </section>
@endsection
