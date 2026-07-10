@extends('layouts.admin')

@section('title', 'Admin Dashboard - Swacheseva')

@section('content')
    <!-- Breadcrumb header -->
    <x-breadcrumb title="Dashboard" subtitle="Swacheseva portal overview and stats panel" />

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- 8 Statistics Cards in 2 Rows (4 columns per row) -->
    <div class="row g-custom mb-custom">
        <!-- Row 1 Card 1: Total Requests -->
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Total Requests</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ number_format($stats['total']) }}</h3>
                    <a href="{{ route('admin.users') }}" class="text-primary-theme fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all requests <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 1 Card 2: Pending Requests -->
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Pending Requests</span>
                    <h3 class="fw-bold mb-0 text-warning">{{ number_format($stats['pending']) }}</h3>
                    <a href="{{ route('admin.users') }}?status=pending" class="text-secondary-theme fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all pending <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 1 Card 3: Approved Users -->
        <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Approved Users</span>
                    <h3 class="fw-bold mb-0 text-success">{{ number_format($stats['approved']) }}</h3>
                    <a href="{{ route('admin.users') }}?status=active" class="text-success fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all users <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 1 Card 4: Rejected Users -->
        <div class="col-xl-3 col-md-6">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Rejected Users</span>
                    <h3 class="fw-bold mb-0 text-danger">{{ number_format($stats['rejected']) }}</h3>
                    <a href="{{ route('admin.users') }}?status=rejected" class="text-danger fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all rejected <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>
    </div>

    <div class="row g-custom mb-custom">
        <!-- Row 2 Card 1: Active Users -->
        <div class="col-lg-4 col-sm-6 mb-3 mb-lg-0">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Active Users</span>
                    <h3 class="fw-bold mb-0 text-dark">{{ number_format($stats['active_users']) }}</h3>
                    <a href="{{ route('admin.users') }}" class="text-primary-theme fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View active users <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 2 Card 2: Total Services -->
        <div class="col-lg-4 col-sm-6 mb-3 mb-lg-0">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Total Services</span>
                    <h3 class="fw-bold mb-0 text-info">{{ number_format($stats['services']) }}</h3>
                    <a href="{{ route('admin.services') }}" class="text-warning fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all services <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 2 Card 3: Total Blogs -->
        <div class="col-lg-4 col-sm-12">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Total Blogs</span>
                    <h3 class="fw-bold mb-0 text-success">{{ number_format($stats['blogs']) }}</h3>
                    <a href="{{ route('admin.blogs') }}" class="text-success fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all blogs <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>
    </div>

    <!-- Latest Registration Requests Table -->
    <div class="row g-custom mb-custom" id="requests">
        <div class="col-12">
            <x-card :hover="false" class="bg-white border-0 shadow-sm">
                <!-- Custom Card Header with 'Create User' Button -->
                <div class="d-flex align-items-center justify-content-between mb-4 border-bottom pb-2">
                    <div>
                        <h5 class="fw-bold mb-0 text-primary-theme">Latest Registration Requests</h5>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#createUserModal" style="font-size: 0.8rem;">
                            <i class="bi bi-person-plus-fill me-1"></i> Create User
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table premium-table align-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentRequests as $r)
                                <tr>
                                    <td class="fw-bold text-dark">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-primary-theme bg-opacity-10 text-primary-theme rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.8rem;">
                                                <i class="bi bi-person-fill"></i>
                                            </div>
                                            <span>{{ $r->name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <i class="bi bi-envelope-fill text-muted me-1" style="font-size: 0.85rem;"></i> {{ $r->email }}
                                    </td>
                                    <td>
                                        <i class="bi bi-telephone-fill text-muted me-1" style="font-size: 0.85rem;"></i> {{ $r->phone }}
                                    </td>
                                    <td>
                                        @if($r->status === 'pending')
                                            <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i> Pending</span>
                                        @elseif($r->status === 'active')
                                            <span class="badge bg-success text-white"><i class="bi bi-check-circle-fill me-1"></i> Active</span>
                                        @else
                                            <span class="badge bg-danger text-white"><i class="bi bi-x-circle-fill me-1"></i> Rejected</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center align-items-center">
                                            <form action="{{ route('admin.users.impersonate', $r->id) }}" method="POST" class="d-inline">
                                                 @csrf
                                                 <button type="submit" class="btn btn-sm btn-outline-dark rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Impersonate Candidate Session">
                                                     <i class="bi bi-person-bounding-box"></i>
                                                 </button>
                                             </form>
                                            
                                            <button onclick='openEditUserModal({!! json_encode($r) !!})' class="btn btn-sm btn-outline-warning rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Edit User" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                                <i class="bi bi-pencil"></i>
                                            </button>

                                            @if($r->status !== 'active')
                                                <form action="{{ route('admin.users.approve', $r->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-success rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Approve Request">
                                                        <i class="bi bi-check"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            @if($r->status !== 'rejected')
                                                <form action="{{ route('admin.users.reject', $r->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Reject Request">
                                                        <i class="bi bi-x"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No recent registration requests.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.users') }}" class="btn btn-primary btn-sm px-4 rounded-pill">View All Requests</a>
                </div>
            </x-card>
        </div>
    </div>

    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-primary-theme" id="createUserModalLabel"><i class="bi bi-person-plus-fill me-2"></i>Create New User Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.users.create') }}" method="POST">
                    @csrf
                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label for="create_name" class="form-label text-muted small fw-bold">Full Name</label>
                            <input type="text" name="name" id="create_name" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., Priya Sharma" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_email" class="form-label text-muted small fw-bold">Email Address</label>
                            <input type="email" name="email" id="create_email" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., priya@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_phone" class="form-label text-muted small fw-bold">Phone Number</label>
                            <input type="tel" name="phone" id="create_phone" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., 9876543210" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_password" class="form-label text-muted small fw-bold">Login Password</label>
                            <input type="password" name="password" id="create_password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Min 6 characters" required>
                        </div>
                        <div class="mb-3">
                            <label for="create_status" class="form-label text-muted small fw-bold">Assign Verification Status</label>
                            <select name="status" id="create_status" class="form-select bg-light border-0 py-2 rounded-3">
                                <option value="pending" selected>Pending Verification</option>
                                <option value="active">Approved & Active</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body pt-0 pb-3 text-center border-top-0">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4 me-2" data-bs-dismiss="modal" style="font-size: 0.85rem;">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm" style="font-size: 0.85rem;">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-warning" id="editUserModalLabel"><i class="bi bi-pencil-square me-2"></i>Edit User Account Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editUserForm" method="POST">
                    @csrf
                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label text-muted small fw-bold">Full Name</label>
                            <input type="text" name="name" id="edit_name" class="form-control bg-light border-0 py-2 rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label text-muted small fw-bold">Email Address</label>
                            <input type="email" name="email" id="edit_email" class="form-control bg-light border-0 py-2 rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_phone" class="form-label text-muted small fw-bold">Phone Number</label>
                            <input type="tel" name="phone" id="edit_phone" class="form-control bg-light border-0 py-2 rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_password" class="form-label text-muted small fw-bold">Update Password (Leave blank to keep current)</label>
                            <input type="password" name="password" id="edit_password" class="form-control bg-light border-0 py-2 rounded-3" placeholder="New Password">
                        </div>
                        <div class="mb-3">
                            <label for="edit_security_pin" class="form-label text-muted small fw-bold">Security PIN</label>
                            <input type="text" name="security_pin" id="edit_security_pin" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Security PIN">
                        </div>
                        <div class="mb-3">
                            <label for="edit_status" class="form-label text-muted small fw-bold">Update Verification Status</label>
                            <select name="status" id="edit_status" class="form-select bg-light border-0 py-2 rounded-3">
                                <option value="pending">Pending Verification</option>
                                <option value="active">Approved & Active</option>
                                <option value="rejected">Rejected / Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body pt-0 pb-3 text-center border-top-0">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4 me-2" data-bs-dismiss="modal" style="font-size: 0.85rem;">Cancel</button>
                        <button type="submit" class="btn btn-warning rounded-pill px-4 text-white shadow-sm" style="font-size: 0.85rem;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openEditUserModal(user) {
            document.getElementById('editUserForm').setAttribute('action', '/admin/users/' + user.id + '/update');
            document.getElementById('edit_name').value = user.name;
            document.getElementById('edit_email').value = user.email;
            document.getElementById('edit_phone').value = user.phone;
            document.getElementById('edit_status').value = user.status;
            document.getElementById('edit_security_pin').value = user.security_pin || '';
            document.getElementById('edit_password').value = '';
        }
    </script>
@endsection
