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
@endsection
