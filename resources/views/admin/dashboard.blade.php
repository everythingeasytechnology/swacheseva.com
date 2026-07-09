@extends('layouts.admin')

@section('title', 'Admin Dashboard - Swacheseva')

@section('content')
    <!-- Breadcrumb header -->
    <x-breadcrumb title="Dashboard" subtitle="Swacheseva portal overview and stats panel" />

    <!-- 8 Statistics Cards in 2 Rows (4 columns per row) -->
    <div class="row g-custom mb-custom">
        <!-- Row 1 Card 1: Total Requests -->
        <div class="col-xl-3 col-md-6">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Total Requests</span>
                    <h3 class="fw-bold mb-0 text-dark">1,250</h3>
                    <a href="#" class="text-primary-theme fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all requests <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 1 Card 2: Pending Requests -->
        <div class="col-xl-3 col-md-6">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Pending Requests</span>
                    <h3 class="fw-bold mb-0 text-dark">320</h3>
                    <a href="#" class="text-secondary-theme fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all pending <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 1 Card 3: Approved Users -->
        <div class="col-xl-3 col-md-6">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Approved Users</span>
                    <h3 class="fw-bold mb-0 text-dark">780</h3>
                    <a href="#" class="text-success fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all users <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 1 Card 4: Rejected Users -->
        <div class="col-xl-3 col-md-6">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Rejected Users</span>
                    <h3 class="fw-bold mb-0 text-dark">150</h3>
                    <a href="#" class="text-danger fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all rejected <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>
    </div>

    <div class="row g-custom mb-custom">
        <!-- Row 2 Card 1: Active Users -->
        <div class="col-xl-3 col-md-6">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Active Users</span>
                    <h3 class="fw-bold mb-0 text-dark">630</h3>
                    <a href="#" class="text-primary-theme fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View active users <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 2 Card 2: Total Services -->
        <div class="col-xl-3 col-md-6">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Total Services</span>
                    <h3 class="fw-bold mb-0 text-dark">245</h3>
                    <a href="#" class="text-warning fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all services <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 2 Card 3: Total Blogs -->
        <div class="col-xl-3 col-md-6">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Total Blogs</span>
                    <h3 class="fw-bold mb-0 text-dark">85</h3>
                    <a href="#" class="text-success fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View all blogs <i class="bi bi-arrow-right small"></i></a>
                </div>
            </x-card>
        </div>

        <!-- Row 2 Card 4: Total Locations -->
        <div class="col-xl-3 col-md-6">
            <x-card :hover="true" class="h-100 p-3 bg-white border-0 shadow-sm">
                <div>
                    <span class="text-muted small fw-bold d-block text-uppercase mb-1" style="font-size: 0.75rem;">Total Locations</span>
                    <h3 class="fw-bold mb-0 text-dark">50</h3>
                    <a href="#" class="text-danger fs-8 text-decoration-none d-inline-block mt-2" style="font-size: 0.75rem;">View locations <i class="bi bi-arrow-right small"></i></a>
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
                            <!-- Row 1 -->
                            <tr>
                                <td class="fw-bold text-dark">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-primary-theme bg-opacity-10 text-primary-theme rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.8rem;">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <span>Rahul Kumar</span>
                                    </div>
                                </td>
                                <td>
                                    <i class="bi bi-envelope-fill text-muted me-1" style="font-size: 0.85rem;"></i> rahul@example.com
                                </td>
                                <td>
                                    <i class="bi bi-telephone-fill text-muted me-1" style="font-size: 0.85rem;"></i> 9876543210
                                </td>
                                <td>
                                    <span class="badge-pending"><i class="bi bi-hourglass-split me-1"></i> Pending</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-outline-primary rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="View Details"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-warning rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Edit User" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-sm btn-outline-success rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Approve Request"><i class="bi bi-check"></i></button>
                                        <button class="btn btn-sm btn-outline-danger rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Reject Request"><i class="bi bi-x"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr>
                                <td class="fw-bold text-dark">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-primary-theme bg-opacity-10 text-primary-theme rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.8rem;">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <span>Priya Sharma</span>
                                    </div>
                                </td>
                                <td>
                                    <i class="bi bi-envelope-fill text-muted me-1" style="font-size: 0.85rem;"></i> priya@example.com
                                </td>
                                <td>
                                    <i class="bi bi-telephone-fill text-muted me-1" style="font-size: 0.85rem;"></i> 8765432109
                                </td>
                                <td>
                                    <span class="badge-pending"><i class="bi bi-hourglass-split me-1"></i> Pending</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-outline-primary rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="View Details"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-warning rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Edit User" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-sm btn-outline-success rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Approve Request"><i class="bi bi-check"></i></button>
                                        <button class="btn btn-sm btn-outline-danger rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Reject Request"><i class="bi bi-x"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr>
                                <td class="fw-bold text-dark">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-primary-theme bg-opacity-10 text-primary-theme rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.8rem;">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <span>Amit Verma</span>
                                    </div>
                                </td>
                                <td>
                                    <i class="bi bi-envelope-fill text-muted me-1" style="font-size: 0.85rem;"></i> amit@example.com
                                </td>
                                <td>
                                    <i class="bi bi-telephone-fill text-muted me-1" style="font-size: 0.85rem;"></i> 7654321098
                                </td>
                                <td>
                                    <span class="badge-pending"><i class="bi bi-hourglass-split me-1"></i> Pending</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-outline-primary rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="View Details"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-warning rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Edit User" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-sm btn-outline-success rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Approve Request"><i class="bi bi-check"></i></button>
                                        <button class="btn btn-sm btn-outline-danger rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Reject Request"><i class="bi bi-x"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr>
                                <td class="fw-bold text-dark">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-primary-theme bg-opacity-10 text-primary-theme rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.8rem;">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <span>Neha Singh</span>
                                    </div>
                                </td>
                                <td>
                                    <i class="bi bi-envelope-fill text-muted me-1" style="font-size: 0.85rem;"></i> neha@example.com
                                </td>
                                <td>
                                    <i class="bi bi-telephone-fill text-muted me-1" style="font-size: 0.85rem;"></i> 6543210987
                                </td>
                                <td>
                                    <span class="badge-pending"><i class="bi bi-hourglass-split me-1"></i> Pending</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-outline-primary rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="View Details"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-warning rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Edit User" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-sm btn-outline-success rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Approve Request"><i class="bi bi-check"></i></button>
                                        <button class="btn btn-sm btn-outline-danger rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Reject Request"><i class="bi bi-x"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 5 -->
                            <tr>
                                <td class="fw-bold text-dark">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-primary-theme bg-opacity-10 text-primary-theme rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.8rem;">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <span>Vikash Yadav</span>
                                    </div>
                                </td>
                                <td>
                                    <i class="bi bi-envelope-fill text-muted me-1" style="font-size: 0.85rem;"></i> vikash@example.com
                                </td>
                                <td>
                                    <i class="bi bi-telephone-fill text-muted me-1" style="font-size: 0.85rem;"></i> 5432109876
                                </td>
                                <td>
                                    <span class="badge-pending"><i class="bi bi-hourglass-split me-1"></i> Pending</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-outline-primary rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="View Details"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-warning rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Edit User" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-sm btn-outline-success rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Approve Request"><i class="bi bi-check"></i></button>
                                        <button class="btn btn-sm btn-outline-danger rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Reject Request"><i class="bi bi-x"></i></button>
                                    </div>
                                </td>
                            </tr>
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
                <form>
                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Full Name</label>
                            <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., Priya Sharma" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Email Address</label>
                            <input type="email" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., priya@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Phone Number</label>
                            <input type="tel" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., 9876543210" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Assign Verification Status</label>
                            <select class="form-select bg-light border-0 py-2 rounded-3">
                                <option value="pending" selected>Pending Verification</option>
                                <option value="approved">Approved & Active</option>
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
                <form>
                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Full Name</label>
                            <input type="text" class="form-control bg-light border-0 py-2 rounded-3" value="Rahul Kumar" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Email Address</label>
                            <input type="email" class="form-control bg-light border-0 py-2 rounded-3" value="rahul@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Phone Number</label>
                            <input type="tel" class="form-control bg-light border-0 py-2 rounded-3" value="9876543210" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Update Verification Status</label>
                            <select class="form-select bg-light border-0 py-2 rounded-3">
                                <option value="pending" selected>Pending Verification</option>
                                <option value="approved">Approved & Active</option>
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
@endsection
