@extends('layouts.admin')

@section('title', 'Service Management - Admin Panel')

@section('content')
    <x-breadcrumb title="Service Management" subtitle="Create, edit, and configure available government portals & e-services" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

    <div class="row g-custom mb-custom">
        <!-- List of Active Services (20 configured) -->
        <div class="col-lg-8 mb-4 mb-lg-0">
            <x-card :hover="false" title="Active E-Services & Portals (20 Configured)" class="bg-white border-0 shadow-sm">
                <!-- Search bar -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="input-group style-search" style="max-width: 300px;">
                        <span class="input-group-text bg-light border-0"><i class="bi bi-search text-muted small"></i></span>
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search service...">
                    </div>
                    <span class="badge bg-success-theme text-white">20 Active</span>
                </div>

                <div class="table-responsive" style="max-height: 520px; overflow-y: auto;">
                    <table class="table premium-table align-middle">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Redirect Link</th>
                                <th>Theme Color</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- 1. Aadhaar Card -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #F7941D 0%, #FFB347 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-fingerprint"></i>
                                        </div>
                                        <span class="fw-bold">Aadhaar Card</span>
                                    </div>
                                </td>
                                <td><a href="https://myaadhaar.uidai.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit UIDAI</a></td>
                                <td><span class="badge bg-warning text-dark">Orange-Yellow</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- 2. PAN Card -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #0B4EA2 0%, #1e6bf2 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-card-heading"></i>
                                        </div>
                                        <span class="fw-bold">PAN Card</span>
                                    </div>
                                </td>
                                <td><a href="https://www.onlineservices.nsdl.com/paam/endUserRegisterContact.html" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit NSDL</a></td>
                                <td><span class="badge bg-primary text-white">Blue</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- 3. GST Registration -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-percent"></i>
                                        </div>
                                        <span class="fw-bold">GST Registration</span>
                                    </div>
                                </td>
                                <td><a href="https://www.gst.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit GST</a></td>
                                <td><span class="badge bg-success text-white">Green</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- 4. Driving License -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #7F00FF 0%, #E100FF 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-person-badge-fill"></i>
                                        </div>
                                        <span class="fw-bold">Driving License</span>
                                    </div>
                                </td>
                                <td><a href="https://sarathi.parivahan.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit Sarathi</a></td>
                                <td><span class="badge bg-purple text-white" style="background-color: #7F00FF !important;">Purple</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- 5. Voter ID Card -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #ff007f 0%, #ff5e62 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-person-square"></i>
                                        </div>
                                        <span class="fw-bold">Voter ID Card</span>
                                    </div>
                                </td>
                                <td><a href="https://voters.eci.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit Voter Portal</a></td>
                                <td><span class="badge bg-danger text-white">Red</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- 6. Passport -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #00B4DB 0%, #0083B0 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-globe2"></i>
                                        </div>
                                        <span class="fw-bold">Passport</span>
                                    </div>
                                </td>
                                <td><a href="https://www.passportindia.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit Passport</a></td>
                                <td><span class="badge bg-info text-white" style="background-color: #0083B0 !important;">Teal</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- 7. ITR -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #ff007f 0%, #ff5e62 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-file-earmark-ruled"></i>
                                        </div>
                                        <span class="fw-bold">Income Tax Return</span>
                                    </div>
                                </td>
                                <td><a href="https://www.incometax.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit ITR</a></td>
                                <td><span class="badge bg-danger text-white">Red</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- 8. PF -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #0B4EA2 0%, #1e6bf2 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-piggy-bank"></i>
                                        </div>
                                        <span class="fw-bold">PF Services</span>
                                    </div>
                                </td>
                                <td><a href="https://www.epfindia.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit EPFO</a></td>
                                <td><span class="badge bg-primary text-white">Blue</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- 9. ESI -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-shield-fill-plus"></i>
                                        </div>
                                        <span class="fw-bold">ESI Services</span>
                                    </div>
                                </td>
                                <td><a href="https://www.esic.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit ESIC</a></td>
                                <td><span class="badge bg-success text-white">Green</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- 10. Shop Act -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #F7941D 0%, #FFB347 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-shop"></i>
                                        </div>
                                        <span class="fw-bold">Shop Act License</span>
                                    </div>
                                </td>
                                <td><a href="https://serviceonline.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit Services</a></td>
                                <td><span class="badge bg-warning text-dark">Orange-Yellow</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- 11 to 20 Compact Rows -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #ff007f 0%, #ff5e62 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-file-earmark-person"></i>
                                        </div>
                                        <span class="fw-bold">Birth Certificate</span>
                                    </div>
                                </td>
                                <td><a href="https://crsorgi.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit CRS</a></td>
                                <td><span class="badge bg-danger text-white">Red</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #0B4EA2 0%, #1e6bf2 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-file-earmark-minus"></i>
                                        </div>
                                        <span class="fw-bold">Death Certificate</span>
                                    </div>
                                </td>
                                <td><a href="https://crsorgi.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit CRS</a></td>
                                <td><span class="badge bg-primary text-white">Blue</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #7F00FF 0%, #E100FF 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-heart-fill"></i>
                                        </div>
                                        <span class="fw-bold">Marriage Certificate</span>
                                    </div>
                                </td>
                                <td><a href="https://crsorgi.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit CRS</a></td>
                                <td><span class="badge bg-purple text-white" style="background-color: #7F00FF !important;">Purple</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                        <span class="fw-bold">Caste Certificate</span>
                                    </div>
                                </td>
                                <td><a href="https://serviceonline.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit Services</a></td>
                                <td><span class="badge bg-success text-white">Green</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #F7941D 0%, #FFB347 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-house-check"></i>
                                        </div>
                                        <span class="fw-bold">Residence Certificate</span>
                                    </div>
                                </td>
                                <td><a href="https://serviceonline.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit Services</a></td>
                                <td><span class="badge bg-warning text-dark">Orange-Yellow</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-house-fill"></i>
                                        </div>
                                        <span class="fw-bold">Domicile Certificate</span>
                                    </div>
                                </td>
                                <td><a href="https://serviceonline.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit Services</a></td>
                                <td><span class="badge bg-success text-white">Green</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #F7941D 0%, #FFB347 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-file-earmark-check"></i>
                                        </div>
                                        <span class="fw-bold">BC Certificate</span>
                                    </div>
                                </td>
                                <td><a href="https://serviceonline.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit Services</a></td>
                                <td><span class="badge bg-warning text-dark">Orange-Yellow</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #0B4EA2 0%, #1e6bf2 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-file-earmark-lock"></i>
                                        </div>
                                        <span class="fw-bold">EWS Certificate</span>
                                    </div>
                                </td>
                                <td><a href="https://serviceonline.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit Services</a></td>
                                <td><span class="badge bg-primary text-white">Blue</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #7F00FF 0%, #E100FF 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-briefcase"></i>
                                        </div>
                                        <span class="fw-bold">Udyam Registration</span>
                                    </div>
                                </td>
                                <td><a href="https://udyamregistration.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit Udyam</a></td>
                                <td><span class="badge bg-purple text-white" style="background-color: #7F00FF !important;">Purple</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded text-white p-2" style="background: linear-gradient(135deg, #00B4DB 0%, #0083B0 100%); width: 36px; height: 36px;">
                                            <i class="bi bi-buildings"></i>
                                        </div>
                                        <span class="fw-bold">MSME Registration</span>
                                    </div>
                                </td>
                                <td><a href="https://udyamregistration.gov.in/" target="_blank" class="text-decoration-none text-primary-theme small"><i class="bi bi-box-arrow-up-right me-1"></i> Visit MSME</a></td>
                                <td><span class="badge bg-info text-white" style="background-color: #0083B0 !important;">Teal</span></td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-card>
        </div>

        <!-- Add E-Service panel -->
        <div class="col-lg-4">
            <x-card :hover="false" title="Add E-Service / Portal" class="bg-white border-0 shadow-sm">
                <form enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Service / Scheme Name</label>
                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., Aadhaar Card" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Description / Short Detail</label>
                        <textarea class="form-control bg-light border-0 py-2 rounded-3" rows="2" placeholder="e.g., Apply for New Aadhaar or Update Details..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Redirect URL / Link</label>
                        <input type="url" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., https://myaadhaar.uidai.gov.in/" required>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-7">
                            <label class="form-label text-muted small fw-bold">Upload Service Icon</label>
                            <input type="file" class="form-control bg-light border-0 py-2 rounded-3" accept="image/*" style="font-size: 0.75rem;" required>
                        </div>
                        <div class="col-5">
                            <label class="form-label text-muted small fw-bold">Theme Color</label>
                            <div class="d-flex align-items-center gap-2 border bg-light rounded-3 px-2" style="height: 38px;">
                                <input type="color" class="form-control form-control-color border-0 bg-transparent p-0" id="service-theme-color" value="#002984" title="Choose color theme" style="width: 32px; height: 28px; cursor: pointer; min-width: 32px;">
                                <span class="text-muted small fw-bold" id="color-hex-val" style="font-size: 0.7rem;">#002984</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch pt-1">
                            <input class="form-check-input" type="checkbox" role="switch" id="is-featured" style="cursor: pointer;">
                            <label class="form-check-label text-muted small fw-bold" for="is-featured" style="cursor: pointer;">Featured Service (Featured / Yes or No)</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm fw-bold">Add Service to Portal</button>
                </form>
            </x-card>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const colorPicker = document.getElementById('service-theme-color');
            const colorLabel = document.getElementById('color-hex-val');
            if (colorPicker && colorLabel) {
                colorPicker.addEventListener('input', function () {
                    colorLabel.textContent = this.value.toUpperCase();
                });
            }
        });
    </script>
@endsection
