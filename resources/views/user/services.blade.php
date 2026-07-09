@extends('layouts.user')

@section('title', 'Applied Services - User Portal')

@section('content')
    <x-breadcrumb title="My Service Schemes" subtitle="Monitor and access various government services" parent="Dashboard" parentRoute="{{ route('user.dashboard') }}" />

    <!-- 20 Swacheseva Services & Direct Portals -->
    <div class="row g-custom mb-custom">
        <div class="col-12">
            <x-card :hover="false" title="All Swacheseva E-Services & Portals" class="bg-white border-0 shadow-sm">
                <div class="row g-3">
                    <!-- 1. Aadhaar Card -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-orange-yellow d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-fingerprint"></i>
                                </div>
                                <h5 class="mb-1">Aadhaar Card</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for New Aadhaar or Update Details</p>
                            </div>
                            <a href="https://myaadhaar.uidai.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #F7941D;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit UIDAI Portal
                            </a>
                        </div>
                    </div>

                    <!-- 2. PAN Card -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-blue d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-card-heading"></i>
                                </div>
                                <h5 class="mb-1">PAN Card</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for New PAN or Corrections</p>
                            </div>
                            <a href="https://www.onlineservices.nsdl.com/paam/endUserRegisterContact.html" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #0B4EA2;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit NSDL Portal
                            </a>
                        </div>
                    </div>

                    <!-- 3. GST Registration -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-green d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-percent"></i>
                                </div>
                                <h5 class="mb-1">GST Registration</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Register New GST or Update Details</p>
                            </div>
                            <a href="https://www.gst.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #11998e;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit GST Portal
                            </a>
                        </div>
                    </div>

                    <!-- 4. Driving License -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-purple d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                                <h5 class="mb-1">Driving License</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for New DL or Renewal</p>
                            </div>
                            <a href="https://sarathi.parivahan.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #7F00FF;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit Sarathi Portal
                            </a>
                        </div>
                    </div>

                    <!-- 5. Voter ID Card -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-red d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-person-square"></i>
                                </div>
                                <h5 class="mb-1">Voter ID Card</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for New Voter ID or Corrections</p>
                            </div>
                            <a href="https://voters.eci.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #ff007f;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit Voter Portal
                            </a>
                        </div>
                    </div>

                    <!-- 6. Passport -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-teal d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-globe2"></i>
                                </div>
                                <h5 class="mb-1">Passport</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for New Passport or Re-issue</p>
                            </div>
                            <a href="https://www.passportindia.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #0083B0;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit Passport Portal
                            </a>
                        </div>
                    </div>

                    <!-- 7. Income Tax Return -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-red d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-file-earmark-ruled"></i>
                                </div>
                                <h5 class="mb-1">Income Tax Return</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">File Your Income Tax Return Online</p>
                            </div>
                            <a href="https://www.incometax.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #ff007f;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit ITR Portal
                            </a>
                        </div>
                    </div>

                    <!-- 8. PF Services -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-blue d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-piggy-bank"></i>
                                </div>
                                <h5 class="mb-1">PF Services</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Employee Provident Fund Services</p>
                            </div>
                            <a href="https://www.epfindia.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #0B4EA2;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit EPFO Portal
                            </a>
                        </div>
                    </div>

                    <!-- 9. ESI Services -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-green d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-shield-fill-plus"></i>
                                </div>
                                <h5 class="mb-1">ESI Services</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Employee State Insurance Services</p>
                            </div>
                            <a href="https://www.esic.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #11998e;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit ESIC Portal
                            </a>
                        </div>
                    </div>

                    <!-- 10. Shop Act License -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-orange-yellow d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-shop"></i>
                                </div>
                                <h5 class="mb-1">Shop Act License</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for Shop & Establishment License</p>
                            </div>
                            <a href="https://serviceonline.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #F7941D;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit Services Portal
                            </a>
                        </div>
                    </div>

                    <!-- 11. Birth Certificate -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-red d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-file-earmark-person"></i>
                                </div>
                                <h5 class="mb-1">Birth Certificate</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for Birth Certificate Registry</p>
                            </div>
                            <a href="https://crsorgi.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #ff007f;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit CRS Portal
                            </a>
                        </div>
                    </div>

                    <!-- 12. Death Certificate -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-blue d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-file-earmark-minus"></i>
                                </div>
                                <h5 class="mb-1">Death Certificate</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for Death Certificate Registry</p>
                            </div>
                            <a href="https://crsorgi.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #0B4EA2;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit CRS Portal
                            </a>
                        </div>
                    </div>

                    <!-- 13. Marriage Certificate -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-purple d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-heart-fill"></i>
                                </div>
                                <h5 class="mb-1">Marriage Certificate</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for Marriage Certificate</p>
                            </div>
                            <a href="https://crsorgi.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #7F00FF;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit CRS Portal
                            </a>
                        </div>
                    </div>

                    <!-- 14. Caste Certificate -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-green d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                                <h5 class="mb-1">Caste Certificate</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for Caste Certificate online</p>
                            </div>
                            <a href="https://serviceonline.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #11998e;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit Services Portal
                            </a>
                        </div>
                    </div>

                    <!-- 15. Residence Certificate -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-orange-yellow d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-house-check"></i>
                                </div>
                                <h5 class="mb-1">Residence Certificate</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for Residence Certificate</p>
                            </div>
                            <a href="https://serviceonline.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #F7941D;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit Services Portal
                            </a>
                        </div>
                    </div>

                    <!-- 16. Domicile Certificate -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-green d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-house-fill"></i>
                                </div>
                                <h5 class="mb-1">Domicile Certificate</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for Domicile Certificate</p>
                            </div>
                            <a href="https://serviceonline.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #11998e;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit Services Portal
                            </a>
                        </div>
                    </div>

                    <!-- 17. BC Certificate -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-orange-yellow d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-file-earmark-check"></i>
                                </div>
                                <h5 class="mb-1">BC Certificate</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for BC Certificate online</p>
                            </div>
                            <a href="https://serviceonline.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #F7941D;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit Services Portal
                            </a>
                        </div>
                    </div>

                    <!-- 18. EWS Certificate -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-blue d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-file-earmark-lock"></i>
                                </div>
                                <h5 class="mb-1">EWS Certificate</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Apply for EWS Income Certificate</p>
                            </div>
                            <a href="https://serviceonline.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #0B4EA2;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit Services Portal
                            </a>
                        </div>
                    </div>

                    <!-- 19. Udyam Registration -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-purple d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-briefcase"></i>
                                </div>
                                <h5 class="mb-1">Udyam Registration</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Register Your MSME Business online</p>
                            </div>
                            <a href="https://udyamregistration.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #7F00FF;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit Udyam Portal
                            </a>
                        </div>
                    </div>

                    <!-- 20. MSME Registration -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="service-grid-card card-grad-teal d-flex flex-column justify-content-between p-3" style="min-height: 160px;">
                            <div>
                                <div class="service-icon-circle mb-2">
                                    <i class="bi bi-buildings"></i>
                                </div>
                                <h5 class="mb-1">MSME Registration</h5>
                                <p class="text-white-50 mb-3" style="font-size: 0.72rem; line-height: 1.3;">Register MSME / Udyam Business</p>
                            </div>
                            <a href="https://udyamregistration.gov.in/" target="_blank" class="btn btn-light btn-sm w-100 fw-bold" style="font-size: 0.72rem; border-radius: 8px; color: #0083B0;">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Visit MSME Portal
                            </a>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
@endsection
