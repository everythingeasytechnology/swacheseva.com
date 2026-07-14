<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Profile - SW-CAND-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS for structured grid layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            color: #333333;
            background-color: #ffffff;
            font-size: 13px;
            line-height: 1.5;
        }
        
        .print-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px;
        }

        .pdf-header {
            border-bottom: 3px double #0B4EA2;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .brand-title {
            color: #0B4EA2;
            font-weight: 800;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .section-title {
            color: #0B4EA2;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 6px;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .avatar-box img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #dee2e6;
        }

        .label-cell {
            font-weight: 600;
            color: #6c757d;
            width: 35%;
            padding: 6px 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }

        .value-cell {
            padding: 6px 10px;
            border: 1px solid #dee2e6;
            font-weight: 600;
            color: #212529;
        }

        .badge-active {
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 3px 10px;
            border-radius: 50px;
            font-size: 10px;
            font-weight: bold;
        }

        .badge-pending {
            background-color: #fff3cd;
            color: #664d03;
            padding: 3px 10px;
            border-radius: 50px;
            font-size: 10px;
            font-weight: bold;
        }

        .badge-rejected {
            background-color: #f8d7da;
            color: #842029;
            padding: 3px 10px;
            border-radius: 50px;
            font-size: 10px;
            font-weight: bold;
        }

        @media print {
            body {
                background: none;
                color: #000;
            }
            .print-container {
                padding: 0;
                max-width: 100%;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Header Actions (Visible in Browser, Hidden in PDF/Print) -->
    <div class="container py-3 no-print text-end border-bottom mb-3">
        <button onclick="window.print()" class="btn btn-primary btn-sm px-4 rounded-pill shadow-sm">
            <i class="bi bi-printer-fill me-1"></i> Print / Save as PDF
        </button>
        <button onclick="window.close()" class="btn btn-outline-secondary btn-sm px-4 rounded-pill ms-2">
            Close Window
        </button>
    </div>

    <!-- Printable Content Wrapper -->
    <div class="print-container">
        
        <!-- Header Section -->
        <div class="pdf-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <img src="{{ asset('bk-logo.png') }}" alt="Swacheseva Logo" style="height: 50px; width: auto; object-fit: contain;" class="mb-2">
                    <h5 class="text-muted fw-normal mb-0" style="font-size: 14px;">Youth Employment Service Centre Registry</h5>
                    <p class="text-muted mb-0 small mt-1">Generated At: {{ date('Y-m-d H:i:s') }}</p>
                </div>
                <div class="col-4 text-end">
                    <div class="avatar-box">
                        <img src="{{ $user->avatar ? asset($user->avatar) : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' }}" alt="Candidate Photo">
                    </div>
                </div>
            </div>
        </div>

        <!-- Application Header Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="border rounded p-3 bg-light text-center">
                    <span class="text-muted small d-block mb-1">Candidate ID</span>
                    <strong class="font-monospace fs-6">SWAC-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</strong>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded p-3 bg-light text-center">
                    <span class="text-muted small d-block mb-1">Verification Status</span>
                    <span class="mt-1 d-inline-block">
                        @if($user->status === 'active')
                            <span class="badge-active">APPROVED & ACTIVE</span>
                        @elseif($user->status === 'pending')
                            <span class="badge-pending">PENDING VERIFICATION</span>
                        @else
                            <span class="badge-rejected">REJECTED / HOLD</span>
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded p-3 bg-light text-center">
                    <span class="text-muted small d-block mb-1">Registration Date</span>
                    <strong class="fs-6">{{ $user->created_at->format('M d, Y') }}</strong>
                </div>
            </div>
        </div>

        <!-- SECTION 1: Personal & Contact Information -->
        <div class="section-title">1. Personal &amp; Contact Details</div>
        <table class="table table-bordered mb-0">
            <tbody>
                <tr>
                    <td class="label-cell">Candidate Full Name</td>
                    <td class="value-cell">{{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Father's Name</td>
                    <td class="value-cell">{{ $user->father_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Mother's Name</td>
                    <td class="value-cell">{{ $user->mother_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Date of Birth</td>
                    <td class="value-cell">{{ $user->date_birth ? date('d-M-Y', strtotime($user->date_birth)) : 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Gender</td>
                    <td class="value-cell">{{ $user->gender ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Marital Status</td>
                    <td class="value-cell">{{ $user->marital_status ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Category Group</td>
                    <td class="value-cell">{{ $user->category ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Mobile Number</td>
                    <td class="value-cell">{{ $user->phone }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Alternate Mobile Number</td>
                    <td class="value-cell">{{ $user->alt_phone ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Email Address</td>
                    <td class="value-cell">{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>

        <!-- SECTION 2: Address & Education details -->
        <div class="section-title">2. Address &amp; Qualifications</div>
        <table class="table table-bordered mb-0">
            <tbody>
                <tr>
                    <td class="label-cell">Permanent State</td>
                    <td class="value-cell">{{ $user->state ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">District Name</td>
                    <td class="value-cell">{{ $user->district ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Tehsil / Sub-district</td>
                    <td class="value-cell">{{ $user->tehsil ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Post Office</td>
                    <td class="value-cell">{{ $user->post_office ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Village / Locality</td>
                    <td class="value-cell">{{ $user->village ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Pincode Code</td>
                    <td class="value-cell">{{ $user->pincode ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Educational Qualification</td>
                    <td class="value-cell">{{ $user->qualification ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>

        <!-- SECTION 3: Shop & Centre details -->
        <div class="section-title">3. Franchisee Shop &amp; Centre Configuration</div>
        <table class="table table-bordered mb-0">
            <tbody>
                <tr>
                    <td class="label-cell">Shop Name</td>
                    <td class="value-cell">{{ $user->shop_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Shop District</td>
                    <td class="value-cell">{{ $user->shop_district ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Shop State</td>
                    <td class="value-cell">{{ $user->shop_state ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Shop Pincode</td>
                    <td class="value-cell">{{ $user->shop_pincode ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Shop Location Address</td>
                    <td class="value-cell">{{ $user->shop_address ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>

        <!-- SECTION 4: Bank Details & KYC Verification -->
        <div class="section-title">4. Bank Account &amp; KYC Verification</div>
        <table class="table table-bordered mb-0">
            <tbody>
                <tr>
                    <td class="label-cell">Bank Name</td>
                    <td class="value-cell">{{ $user->bank_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Account Holder Name</td>
                    <td class="value-cell">{{ $user->holder_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Account Number</td>
                    <td class="value-cell">{{ $user->account_no ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Bank IFSC Code</td>
                    <td class="value-cell">{{ $user->ifsc_code ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Aadhaar Card Number</td>
                    <td class="value-cell">{{ $user->aadhaar_no ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">PAN Card Number</td>
                    <td class="value-cell">{{ $user->pan_no ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Franchisee Transaction UTR Code</td>
                    <td class="value-cell font-monospace text-primary fw-bold">{{ $user->utr_code ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Security PIN</td>
                    <td class="value-cell font-monospace">{{ $user->security_pin ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Certificate Declaration Footer -->
        <div class="mt-5 pt-4 text-center border-top">
            <p class="text-muted small">This is a system generated registration certificate profile summary sheet for Swacheseva Portal.</p>
        </div>

    </div>

    <!-- Script to trigger print page on render -->
    <script>
        window.onload = function() {
            // Auto open browser print layout
            window.print();
        };
    </script>
</body>
</html>
