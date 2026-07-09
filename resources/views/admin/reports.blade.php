@extends('layouts.admin')

@section('title', 'Reports & System Logs - Admin Panel')

@section('content')
    <x-breadcrumb title="Reports & Activity Logs" subtitle="Inspect portal status and analytics" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

    <!-- Report charts -->
    <div class="row g-custom mb-custom">
        <div class="col-lg-6">
            <x-card :hover="false" title="Sector Distribution" subtitle="Active sectors that users are registering in" class="bg-white border-0 shadow-sm">
                <div style="height: 250px; position: relative;">
                    <canvas id="sectorDistributionChart"></canvas>
                </div>
            </x-card>
        </div>

        <div class="col-lg-6">
            <x-card :hover="false" title="Verification Performance" subtitle="Application status distribution" class="bg-white border-0 shadow-sm">
                <div style="height: 250px; position: relative;">
                    <canvas id="verificationPerformanceChart"></canvas>
                </div>
            </x-card>
        </div>
    </div>

    <!-- Activity Logs table -->
    <div id="activity" class="row g-custom">
        <div class="col-12">
            <x-card :hover="false" title="System Activity Logs" class="bg-white border-0 shadow-sm">
                <div class="table-responsive">
                    <table class="table premium-table">
                        <thead>
                            <tr>
                                <th>Timestamp</th>
                                <th>Actor</th>
                                <th>Action</th>
                                <th>Entity Affected</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="small">2026-07-06 21:28:24</td>
                                <td class="fw-bold">Admin</td>
                                <td>Created Service: IT Training</td>
                                <td>Service Schema</td>
                                <td>192.168.1.1</td>
                            </tr>
                            <tr>
                                <td class="small">2026-07-06 21:15:00</td>
                                <td class="fw-bold">Rahul Kumar</td>
                                <td>Completed Registration Form</td>
                                <td>Applicant Profile</td>
                                <td>103.45.12.90</td>
                            </tr>
                            <tr>
                                <td class="small">2026-07-06 20:45:10</td>
                                <td class="fw-bold">Priya Sharma</td>
                                <td>Uploaded Profile Avatar</td>
                                <td>User Storage</td>
                                <td>157.23.45.12</td>
                            </tr>
                            <tr>
                                <td class="small">2026-07-06 19:30:12</td>
                                <td class="fw-bold">System Daemon</td>
                                <td>Generated Weekly Excel Report</td>
                                <td>Email Distribution</td>
                                <td>127.0.0.1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-card>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sector distribution chart
        const sectorCtx = document.getElementById('sectorDistributionChart');
        if (sectorCtx) {
            new Chart(sectorCtx, {
                type: 'doughnut',
                data: {
                    labels: ['IT & Software', 'Core Engineering', 'Healthcare', 'Banking & Finance', 'Sales & Marketing'],
                    datasets: [{
                        data: [45, 20, 15, 12, 8],
                        backgroundColor: ['#002984', '#FE7B01', '#198754', '#dc3545', '#0dcaf0'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        // Verification performance chart
        const verificationCtx = document.getElementById('verificationPerformanceChart');
        if (verificationCtx) {
            new Chart(verificationCtx, {
                type: 'bar',
                data: {
                    labels: ['Pending', 'Approved', 'Rejected', 'Under Escalation'],
                    datasets: [{
                        label: 'Applications count',
                        data: [320, 780, 150, 45],
                        backgroundColor: ['#FE7B01', '#198754', '#dc3545', '#002984'],
                        borderWidth: 0,
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
</script>
@endsection
