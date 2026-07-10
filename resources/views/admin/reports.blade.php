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
                            @forelse($users as $user)
                                <tr>
                                    <td class="small">{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td class="fw-bold">{{ $user->name }}</td>
                                    <td>Candidate Submitted Application</td>
                                    <td>UTR: {{ $user->utr_code }}</td>
                                    <td>{{ request()->ip() ?? '127.0.0.1' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No system activities recorded.</td>
                                </tr>
                            @endforelse
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
                    labels: ['Pending', 'Approved', 'Rejected'],
                    datasets: [{
                        label: 'Applications count',
                        data: [{{ $stats['pending'] }}, {{ $stats['approved'] }}, {{ $stats['rejected'] }}],
                        backgroundColor: ['#FE7B01', '#198754', '#dc3545'],
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
