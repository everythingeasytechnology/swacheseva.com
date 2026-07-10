@extends('layouts.guest')

@section('title', 'Swacheseva - Empowering Youth, Building a Better Tomorrow')

@section('content')
    <!-- Hero Section with Background Slideshow -->
    <section class="hero-section position-relative overflow-hidden py-5" style="min-height: 600px;">
        <!-- Background Slideshow Carousel -->
        <div id="heroBgCarousel" class="carousel slide carousel-fade position-absolute top-0 start-0 w-100 h-100" data-bs-ride="carousel" data-bs-interval="4000" style="z-index: 1;">
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100">
                    <img src="{{ asset('hero-india.jpg') }}" class="d-block w-100 h-100" alt="Empowerment Banner" style="object-fit: cover; object-position: center right;">
                </div>
                <div class="carousel-item h-100">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" class="d-block w-100 h-100" alt="Youth Education" style="object-fit: cover; object-position: center right;">
                </div>
                <div class="carousel-item h-100">
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097798?auto=format&fit=crop&w=1200&q=80" class="d-block w-100 h-100" alt="Skill Development" style="object-fit: cover; object-position: center right;">
                </div>
            </div>
        </div>

        <!-- Glass Overlay to ensure legibility -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.8) 50%, rgba(255, 255, 255, 0.4) 100%); z-index: 2;"></div>

        <!-- Hero Content (above the background carousel) -->
        <div class="container position-relative py-5" style="z-index: 3;">
            <div class="row align-items-center gx-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-pill mb-4 px-3 py-2" style="background: rgba(254, 123, 1, 0.12); color: #FE7B01; letter-spacing: 0.3px; font-weight: 600; font-size: 0.95rem;">
                        Empowering youth for a brighter future
                    </div>
                    <h1 class="display-4 fw-bold mb-4" style="line-height: 1.05; color: #002984;">
                        Empowering Youth,<br>
                        <span class="text-secondary-theme">Building a Better Tomorrow</span>
                    </h1>
                    <p class="text-muted fs-6 mb-4" style="max-width: 520px; line-height: 1.75;">
                        Swacheseva is dedicated to connecting skilled youth with valuable opportunities for a brighter future.
                    </p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start mb-5">
                        <a href="{{ route('services') }}" class="btn btn-primary px-4 py-2.5 text-white fw-bold shadow-sm" style="border-radius: 6px; font-size: 0.95rem;">Explore Services</a>
                        <a href="{{ route('register') }}" class="btn btn-secondary-theme px-4 py-2.5 text-white fw-bold shadow-sm" style="border-radius: 6px; font-size: 0.95rem;">Apply Now</a>
                    </div>
                    <div class="row g-3 justify-content-center justify-content-lg-start">
                        <div class="col-6 col-sm-4">
                            <div class="premium-card d-flex align-items-center gap-2 p-3" style="border-radius: 18px; background: rgba(255,255,255,0.95); border: 1px solid rgba(11,78,162,0.08);">
                                <i class="bi bi-people-fill text-primary-theme fs-4"></i>
                                <div>
                                    <h5 class="fw-bold mb-0">1250+</h5>
                                    <small class="text-muted">Youth Trained</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="premium-card d-flex align-items-center gap-2 p-3" style="border-radius: 18px; background: rgba(255,255,255,0.95); border: 1px solid rgba(11,78,162,0.08);">
                                <i class="bi bi-briefcase-fill text-secondary-theme fs-4"></i>
                                <div>
                                    <h5 class="fw-bold mb-0">850+</h5>
                                    <small class="text-muted">Jobs Placed</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="premium-card d-flex align-items-center gap-2 p-3" style="border-radius: 18px; background: rgba(255,255,255,0.95); border: 1px solid rgba(11,78,162,0.08);">
                                <i class="bi bi-building-fill text-primary-theme fs-4"></i>
                                <div>
                                    <h5 class="fw-bold mb-0">300+</h5>
                                    <small class="text-muted">Companies</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5"></div>
            </div>
        </div>
    </section>
        <section class="py-5 bg-white">
        <div class="container py-3">
            <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
                <h2 class="fw-bold mb-0" style="color: #002984; font-size: 2rem;">Our Services &amp; Process</h2>
                <div class="d-flex gap-2">
                    <button class="rounded-circle border d-flex align-items-center justify-content-center bg-white" type="button" data-bs-target="#servicesProcessCarousel" data-bs-slide="prev" style="width: 44px; height: 44px; color: #002984;">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="rounded-circle border d-flex align-items-center justify-content-center bg-white" type="button" data-bs-target="#servicesProcessCarousel" data-bs-slide="next" style="width: 44px; height: 44px; color: #002984;">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div id="servicesProcessCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="h-100 d-flex flex-column flex-sm-row overflow-hidden shadow-sm" style="border-radius: 16px; border: 1px solid rgba(0,41,132,0.08); height: 420px;">
                                    <div style="flex: 0 0 42%; height: 100%; overflow: hidden;">
                                        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=1400&q=80" alt="Terms & Conditions for Franchisee" class="w-100 h-100" style="object-fit: cover; transform: scale(1.15); transform-origin: center;">
                                    </div>
                                    <div class="p-4 d-flex flex-column justify-content-center" style="overflow: hidden; min-height: 0;">
                                        <h4 class="fw-bold mb-3" style="color: #002984;">Terms &amp; Conditions for Franchisee</h4>
                                        <p class="text-muted mb-0" style="line-height: 1.7;">While doing SWACHESEVA E-services Franchisees should have complete knowledge on using a computer with internet and online transaction services.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="h-100 d-flex flex-column flex-sm-row overflow-hidden shadow-sm" style="border-radius: 16px; border: 1px solid rgba(0,41,132,0.08); height: 420px;">
                                    <div style="flex: 0 0 42%; height: 100%; overflow: hidden;">
                                        <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=2000&q=80" alt="Franchisee Allocation Process" class="w-100 h-100" style="object-fit: cover; transform: scale(2.2); transform-origin: center;">
                                    </div>
                                    <div class="p-4 d-flex flex-column justify-content-center" style="overflow: hidden; min-height: 0;">
                                        <h4 class="fw-bold mb-3" style="color: #002984;">Franchisee Allocation Process</h4>
                                        <p class="text-muted mb-0" style="line-height: 1.7;">A New Franchisee allocated to those who have a minimum of 100sft area and having the all requirements mentioned in the Franchisee Registration details, Franchisee allocation is made only after all the verifications done by SWACHESEVA Concerned authorities.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="h-100 d-flex flex-column flex-sm-row overflow-hidden shadow-sm" style="border-radius: 16px; border: 1px solid rgba(0,41,132,0.08); height: 420px;">
                                    <div style="flex: 0 0 42%; height: 100%;">
                                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=600&q=80" alt="Franchisee Registration" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                    <div class="p-4 d-flex flex-column justify-content-center" style="overflow: hidden; min-height: 0;">
                                        <h4 class="fw-bold mb-3" style="color: #002984;">Franchisee Registration</h4>
                                        <p class="text-muted mb-0" style="line-height: 1.7;">SWACHESEVA is an e-Services portal. This portal has E-Services AEPS, BBPS, PAN Card Service, Tours &amp; Travels, Ticket Bookings, Recharges, Insurance Premiums and many more eservices. To apply for Franchisee follow the instructions step by step which provided on Franchisee registration section. This Section is distributed using a Swacheseva Registration steps.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="h-100 d-flex flex-column flex-sm-row overflow-hidden shadow-sm" style="border-radius: 16px; border: 1px solid rgba(0,41,132,0.08); height: 420px;">
                                    <div style="flex: 0 0 42%; height: 100%;">
                                        <img src="https://images.unsplash.com/photo-1601597111158-2fceff292cdc?auto=format&fit=crop&w=600&q=80" alt="Micro ATM Service" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                    <div class="p-4 d-flex flex-column justify-content-center" style="overflow: hidden; min-height: 0;">
                                        <h4 class="fw-bold mb-3" style="color: #002984;">Micro ATM Service</h4>
                                        <p class="text-muted mb-0" style="line-height: 1.7;">Similar to Bank ATMs, the micro Automated Teller Machine (ATM) also provide traditional services like withdrawing cash, balance enquiry, cash deposits and much more. However, the micro ATMs are best for carrying out cash transactions in situation when bigger ATMs are running dry. Micro ATMs as the name suggests are a mini version of an ATM. They are developed with features like point of sales (POS), connecting banking networks through GPRS for carrying bank-related transactions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-indicators position-relative mb-0 mt-4" style="gap: 8px;">
                    <button type="button" data-bs-target="#servicesProcessCarousel" data-bs-slide-to="0" class="active" style="background-color: #002984; width: 10px; height: 10px; border-radius: 50%; border: 0;"></button>
                    <button type="button" data-bs-target="#servicesProcessCarousel" data-bs-slide-to="1" style="background-color: #002984; width: 10px; height: 10px; border-radius: 50%; border: 0; opacity: 0.3;"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="py-5 bg-white">
        <div class="container py-3">
            <!-- Separator Header style: --- Our Services --- -->
            <div class="text-center mb-5 d-flex align-items-center justify-content-center gap-3 flex-wrap">
                <div class="border-top" style="width: 40px; border-color: rgba(0, 41, 132, 0.2); border-width: 2px;"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="fs-9" style="color: #FE7B01;"><i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i></span>
                    <h2 class="fw-bold mb-0 text-uppercase d-inline-block" style="font-size: 1.5rem; letter-spacing: 1px;">
                        <span style="color: #002984;">Our</span> <span style="color: #FE7B01;">Services</span>
                    </h2>
                    <span class="fs-9" style="color: #FE7B01;"><i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i></span>
                </div>
                <div class="border-top" style="width: 40px; border-color: rgba(0, 41, 132, 0.2); border-width: 2px;"></div>
            </div>

            <!-- 20 Service Cards in a grid -->
            <div class="row g-4 justify-content-center">
                <!-- 1. Aadhaar Card -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-orange-yellow">
                        <div class="service-icon-circle">
                            <i class="bi bi-fingerprint"></i>
                        </div>
                        <h5>Aadhaar Card</h5>
                        <p>Apply for New Aadhaar or Update Details</p>
                    </div>
                </div>

                <!-- 2. PAN Card -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-blue">
                        <div class="service-icon-circle">
                            <i class="bi bi-card-heading"></i>
                        </div>
                        <h5>PAN Card</h5>
                        <p>Apply for New PAN or Corrections</p>
                    </div>
                </div>

                <!-- 3. GST Registration -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-green">
                        <div class="service-icon-circle">
                            <i class="bi bi-percent"></i>
                        </div>
                        <h5>GST Registration</h5>
                        <p>Register New GST or Update Details</p>
                    </div>
                </div>

                <!-- 4. Driving License -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-purple">
                        <div class="service-icon-circle">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <h5>Driving License</h5>
                        <p>Apply for New DL or Renewal</p>
                    </div>
                </div>

                <!-- 5. Voter ID Card -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-red">
                        <div class="service-icon-circle">
                            <i class="bi bi-person-square"></i>
                        </div>
                        <h5>Voter ID Card</h5>
                        <p>Apply for New Voter ID or Corrections</p>
                    </div>
                </div>

                <!-- 6. Passport -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-teal">
                        <div class="service-icon-circle">
                            <i class="bi bi-globe2"></i>
                        </div>
                        <h5>Passport</h5>
                        <p>Apply for New Passport or Re-issue</p>
                    </div>
                </div>

                <!-- 7. Income Tax Return -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-red">
                        <div class="service-icon-circle">
                            <i class="bi bi-file-earmark-ruled"></i>
                        </div>
                        <h5>Income Tax Return</h5>
                        <p>File Your Income Tax Return Online</p>
                    </div>
                </div>

                <!-- 8. PF Services -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-blue">
                        <div class="service-icon-circle">
                            <i class="bi bi-piggy-bank"></i>
                        </div>
                        <h5>PF Services</h5>
                        <p>Employee Provident Fund Services</p>
                    </div>
                </div>

                <!-- 9. ESI Services -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-green">
                        <div class="service-icon-circle">
                            <i class="bi bi-shield-fill-plus"></i>
                        </div>
                        <h5>ESI Services</h5>
                        <p>Employee State Insurance Services</p>
                    </div>
                </div>

                <!-- 10. Shop Act License -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-orange-yellow">
                        <div class="service-icon-circle">
                            <i class="bi bi-shop"></i>
                        </div>
                        <h5>Shop Act License</h5>
                        <p>Apply for Shop & Establishment License</p>
                    </div>
                </div>

                <!-- 11. Birth Certificate -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-red">
                        <div class="service-icon-circle">
                            <i class="bi bi-file-earmark-person"></i>
                        </div>
                        <h5>Birth Certificate</h5>
                        <p>Apply for Birth Certificate</p>
                    </div>
                </div>

                <!-- 12. Death Certificate -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-blue">
                        <div class="service-icon-circle">
                            <i class="bi bi-file-earmark-minus"></i>
                        </div>
                        <h5>Death Certificate</h5>
                        <p>Apply for Death Certificate</p>
                    </div>
                </div>

                <!-- 13. Marriage Certificate -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-purple">
                        <div class="service-icon-circle">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h5>Marriage Certificate</h5>
                        <p>Apply for Marriage Certificate</p>
                    </div>
                </div>

                <!-- 14. Caste Certificate -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-green">
                        <div class="service-icon-circle">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h5>Caste Certificate</h5>
                        <p>Apply for Caste Certificate</p>
                    </div>
                </div>

                <!-- 15. Residence Certificate -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-orange-yellow">
                        <div class="service-icon-circle">
                            <i class="bi bi-house-check"></i>
                        </div>
                        <h5>Residence Certificate</h5>
                        <p>Apply for Residence Certificate</p>
                    </div>
                </div>

                <!-- 16. Domicile Certificate -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-green">
                        <div class="service-icon-circle">
                            <i class="bi bi-house-fill"></i>
                        </div>
                        <h5>Domicile Certificate</h5>
                        <p>Apply for Domicile Certificate</p>
                    </div>
                </div>

                <!-- 17. BC Certificate -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-orange-yellow">
                        <div class="service-icon-circle">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <h5>BC Certificate</h5>
                        <p>Apply for BC Certificate</p>
                    </div>
                </div>

                <!-- 18. EWS Certificate -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-blue">
                        <div class="service-icon-circle">
                            <i class="bi bi-file-earmark-lock"></i>
                        </div>
                        <h5>EWS Certificate</h5>
                        <p>Apply for EWS Certificate</p>
                    </div>
                </div>

                <!-- 19. Udyam Registration -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-purple">
                        <div class="service-icon-circle">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <h5>Udyam Registration</h5>
                        <p>Register Your MSME Business</p>
                    </div>
                </div>

                <!-- 20. MSME Registration -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-grid-card card-grad-teal">
                        <div class="service-icon-circle">
                            <i class="bi bi-buildings"></i>
                        </div>
                        <h5>MSME Registration</h5>
                        <p>Register Your MSME Business</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
        </div>
    </section>

    <!-- Our Services & Process Section -->


    <!-- Statistics Section (Below services cards) -->
    <section class="py-4 shadow-sm" style="background-color: #002984;">
        <div class="container">
            <div class="row g-4 text-center justify-content-center">
                <!-- Stat 1 -->
                <div class="col-6 col-md-2 border-end border-white-10">
                    <div class="d-flex flex-column align-items-center">
                        <i class="bi bi-mortarboard-fill fs-3 text-white-50 mb-1"></i>
                        <h4 class="fw-bold mb-0 text-white">1250+</h4>
                        <small class="text-white-50 fs-9 text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.5px;">Youth Trained</small>
                    </div>
                </div>
                <!-- Stat 2 -->
                <div class="col-6 col-md-2 border-end border-white-10">
                    <div class="d-flex flex-column align-items-center">
                        <i class="bi bi-briefcase-fill fs-3 text-white-50 mb-1"></i>
                        <h4 class="fw-bold mb-0 text-white">850+</h4>
                        <small class="text-white-50 fs-9 text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.5px;">Jobs Placed</small>
                    </div>
                </div>
                <!-- Stat 3 -->
                <div class="col-6 col-md-2 border-end border-white-10">
                    <div class="d-flex flex-column align-items-center">
                        <i class="bi bi-building-fill fs-3 text-white-50 mb-1"></i>
                        <h4 class="fw-bold mb-0 text-white">300+</h4>
                        <small class="text-white-50 fs-9 text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.5px;">Companies</small>
                    </div>
                </div>
                <!-- Stat 4 -->
                <div class="col-6 col-md-2 border-end border-white-10">
                    <div class="d-flex flex-column align-items-center">
                        <i class="bi bi-geo-alt-fill fs-3 text-white-50 mb-1"></i>
                        <h4 class="fw-bold mb-0 text-white">50+</h4>
                        <small class="text-white-50 fs-9 text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.5px;">Locations</small>
                    </div>
                </div>
                <!-- Stat 5 -->
                <div class="col-6 col-md-2">
                    <div class="d-flex flex-column align-items-center">
                        <i class="bi bi-clock-history fs-3 text-white-50 mb-1"></i>
                        <h4 class="fw-bold mb-0 text-white">10+</h4>
                        <small class="text-white-50 fs-9 text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.5px;">Years of Service</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Blogs Section -->


    <!-- Query CTA Banner -->
    

    <!-- Common Services List Section -->
    <section class="py-5 bg-white">
        <div class="container py-3">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3" style="font-size: 1.85rem;">
                    <span style="color: #002984;">Some Common List of</span> <span style="color: #FE7B01;">Swacheseva Center Services</span>
                </h2>
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <span style="color: #002984; font-size: 0.6rem;"><i class="bi bi-circle-fill"></i></span>
                    <span style="color: #002984; font-size: 0.6rem;"><i class="bi bi-circle-fill"></i></span>
                    <span style="color: #FE7B01; font-size: 0.9rem;"><i class="bi bi-circle-fill"></i></span>
                    <span style="color: #002984; font-size: 0.6rem;"><i class="bi bi-circle-fill"></i></span>
                    <span style="color: #002984; font-size: 0.6rem;"><i class="bi bi-circle-fill"></i></span>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">AEPS Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Cash Withdrawal</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Balance Enquiry</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Mini Statement</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Pensions</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Cash Collections</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Money Transfers</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">BBPS Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Insurance Premiums</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Broadband Postpaid</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">LPG Gas Payments</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Education Fees</a></li>
                        <li class="mb-0"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Cable TV Payments</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Electricity Bills Payments</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Housing Society Bills</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Mobile Postpaid</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Mobile Prepaid</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">All Payments and Bills</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Tours and Travels</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Ticket Bookings</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Flight Ticket Bookings</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Hotel Ticket Bookings</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Bus Ticket Bookings</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Car Ticket Bookings</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Loan RePayments</a></li>
                        <li class="mb-0"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Subscription Services</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">PAN CARD Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Mini ATM Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">FASTag Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Insurance Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Loans Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">BULK SMS Service</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Bulk Whatsapp</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">GST Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Kisan Sabha Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Stock Market Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Digital Signature Services</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">Wallet Recharge Request</a></li>
                        <li class="mb-0"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">AEPS Activation</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">ISO Certifications</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">ISO 9001:2015</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">ISO 14001:2015</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">OHSAS 18001:2017</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">ISO 20000:2011</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">ISO 22000:2005</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">ISO 27001:2013</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">ISO 29990:2010</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">ISO 50001:2011</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">GMP Certification</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">HACCP Certification</a></li>
                        <li class="mb-3"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">CE Certification</a></li>
                        <li class="mb-0"><a href="#" class="text-decoration-none fw-semibold" style="color: #002984;">CMMI Certification</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5" style="background-color: #FE7B01;">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-3 text-center">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 130px; height: 130px; background: rgba(255,255,255,0.15);">
                        <i class="bi bi-envelope-paper-heart-fill text-white" style="font-size: 3.5rem;"></i>
                    </div>
                </div>
                <div class="col-md-9 text-center text-md-start">
                    <p class="text-white fw-bold mb-0" style="font-size: 1.4rem; line-height: 1.5;">
                        For any queries regarding SWACHESEVA, send an email to "care@swacheseva.com", then we will clarify your queries through your email.
                    </p>
                </div>
            </div>
        </div>
    </section>
        <section class="py-5 bg-light">
        <div class="container py-4">
            <!-- Header style: --- Latest Blogs --- and View all link on right -->
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="d-flex align-items-center gap-2">
                    <div class="border-top" style="width: 25px; border-color: rgba(0, 41, 132, 0.2); border-width: 2px;"></div>
                    <span class="fs-9" style="color: #FE7B01;"><i class="bi bi-circle-fill" style="font-size: 0.4rem;"></i></span>
                    <h3 class="fw-bold mb-0 text-uppercase d-inline-block" style="font-size: 1.3rem; letter-spacing: 1px;">
                        <span style="color: #002984;">Latest</span> <span style="color: #FE7B01;">Blogs</span>
                    </h3>
                    <span class="fs-9" style="color: #FE7B01;"><i class="bi bi-circle-fill" style="font-size: 0.4rem;"></i></span>
                    <div class="border-top" style="width: 25px; border-color: rgba(0, 41, 132, 0.2); border-width: 2px;"></div>
                </div>
                <a href="{{ route('blog') }}" class="text-decoration-none fw-bold small hover-underline" style="color: #002984;">View All Blogs <i class="bi bi-arrow-right ms-1"></i></a>
            </div>

            <!-- 4 Blog cards in a row -->
            <div class="row g-4">
                <!-- Blog 1 -->
                <div class="col-lg-3 col-md-6">
                    <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column bg-white shadow-sm border border-light" style="border-radius: 12px;">
                        <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=400&q=80" alt="Career Tips" class="img-fluid w-100" style="height: 160px; object-fit: cover;">
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge text-white px-2 py-1" style="font-size: 0.7rem; background-color: #002984;">Career Tips</span>
                                <small class="text-muted" style="font-size: 0.75rem;">May 20, 2024</small>
                            </div>
                            <h6 class="fw-bold mb-3 flex-grow-1" style="font-size: 0.9rem; line-height: 1.4;"><a href="{{ route('blog.detail') }}" class="text-decoration-none text-dark hover-primary">Top Skills in Demand for Better Career Opportunities</a></h6>
                            <a href="{{ route('blog.detail') }}" class="fw-bold text-decoration-none small hover-underline" style="color: #002984; font-size: 0.8rem;">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </x-card>
                </div>

                <!-- Blog 2 -->
                <div class="col-lg-3 col-md-6">
                    <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column bg-white shadow-sm border border-light" style="border-radius: 12px;">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=400&q=80" alt="Government Schemes" class="img-fluid w-100" style="height: 160px; object-fit: cover;">
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge text-white px-2 py-1" style="font-size: 0.7rem; background-color: #002984;">Government Schemes</span>
                                <small class="text-muted" style="font-size: 0.75rem;">May 18, 2024</small>
                            </div>
                            <h6 class="fw-bold mb-3 flex-grow-1" style="font-size: 0.9rem; line-height: 1.4;"><a href="{{ route('blog.detail') }}" class="text-decoration-none text-dark hover-primary">How Government Schemes Help Youth Grow</a></h6>
                            <a href="{{ route('blog.detail') }}" class="fw-bold text-decoration-none small hover-underline" style="color: #002984; font-size: 0.8rem;">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </x-card>
                </div>

                <!-- Blog 3 -->
                <div class="col-lg-3 col-md-6">
                    <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column bg-white shadow-sm border border-light" style="border-radius: 12px;">
                        <img src="https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?auto=format&fit=crop&w=400&q=80" alt="Success Story" class="img-fluid w-100" style="height: 160px; object-fit: cover;">
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge text-white px-2 py-1" style="font-size: 0.7rem; background-color: #002984;">Success Story</span>
                                <small class="text-muted" style="font-size: 0.75rem;">May 15, 2024</small>
                            </div>
                            <h6 class="fw-bold mb-3 flex-grow-1" style="font-size: 0.9rem; line-height: 1.4;"><a href="{{ route('blog.detail') }}" class="text-decoration-none text-dark hover-primary">From Training to Success: Real Stories of Change</a></h6>
                            <a href="{{ route('blog.detail') }}" class="fw-bold text-decoration-none small hover-underline" style="color: #002984; font-size: 0.8rem;">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </x-card>
                </div>

                <!-- Blog 4 -->
                <div class="col-lg-3 col-md-6">
                    <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column bg-white shadow-sm border border-light" style="border-radius: 12px;">
                        <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=400&q=80" alt="Entrepreneurship" class="img-fluid w-100" style="height: 160px; object-fit: cover;">
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge text-white px-2 py-1" style="font-size: 0.7rem; background-color: #002984;">Entrepreneurship</span>
                                <small class="text-muted" style="font-size: 0.75rem;">May 12, 2024</small>
                            </div>
                            <h6 class="fw-bold mb-3 flex-grow-1" style="font-size: 0.9rem; line-height: 1.4;"><a href="{{ route('blog.detail') }}" class="text-decoration-none text-dark hover-primary">Start Your Own Business with the Right Support</a></h6>
                            <a href="{{ route('blog.detail') }}" class="fw-bold text-decoration-none small hover-underline" style="color: #002984; font-size: 0.8rem;">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </section>
@endsection
