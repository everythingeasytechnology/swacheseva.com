@extends('layouts.admin')

@section('title', 'Blog Management - Admin Panel')

@section('content')
    <x-breadcrumb title="Blog Management" subtitle="Write and schedule article updates" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

    <!-- Blogs Table & Creation -->
    <div class="row g-3 mb-custom">
        <!-- List Blogs -->
        <div class="col-lg-8">
            <x-card :hover="false" title="Published Articles" class="bg-white border-0 shadow-sm">
                <div class="table-responsive">
                    <table class="table premium-table">
                        <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=100&q=80" alt="blog thumb" class="rounded" style="width: 48px; height: 36px; object-fit: cover;">
                                </td>
                                <td class="fw-bold small">Top Skills in Demand for Better Career</td>
                                <td><span class="badge bg-light text-primary border border-primary-subtle py-1 px-2 rounded">Career Tips</span></td>
                                <td><span class="badge bg-success-subtle text-success border border-success-subtle py-1 px-2 rounded">Published</span></td>
                                <td class="text-center">
                                    <div class="btn-group gap-1">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=100&q=80" alt="blog thumb" class="rounded" style="width: 48px; height: 36px; object-fit: cover;">
                                </td>
                                <td class="fw-bold small">How Government Schemes Help Youth</td>
                                <td><span class="badge bg-light text-primary border border-primary-subtle py-1 px-2 rounded">Government Schemes</span></td>
                                <td><span class="badge bg-success-subtle text-success border border-success-subtle py-1 px-2 rounded">Published</span></td>
                                <td class="text-center">
                                    <div class="btn-group gap-1">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?auto=format&fit=crop&w=100&q=80" alt="blog thumb" class="rounded" style="width: 48px; height: 36px; object-fit: cover;">
                                </td>
                                <td class="fw-bold small">From Training to Success: Stories</td>
                                <td><span class="badge bg-light text-primary border border-primary-subtle py-1 px-2 rounded">Success Story</span></td>
                                <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle py-1 px-2 rounded">Draft</span></td>
                                <td class="text-center">
                                    <div class="btn-group gap-1">
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;"><i class="bi bi-pencil small text-primary-theme"></i></button>
                                        <button class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;"><i class="bi bi-trash small text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-card>
        </div>

        <!-- Write Blog -->
        <div class="col-lg-4">
            <x-card :hover="false" title="Compose Article" class="bg-white border-0 shadow-sm">
                <form>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Post Title</label>
                        <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Enter title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Category</label>
                        <select class="form-select bg-light border-0 py-2 rounded-3" required>
                            <option value="">Select category</option>
                            <option value="1">Career Tips</option>
                            <option value="2">Government Schemes</option>
                            <option value="3">Success Story</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Featured Image URL</label>
                        <input type="url" class="form-control bg-light border-0 py-2 rounded-3" placeholder="https://images.unsplash.com/...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Content Markup</label>
                        <textarea class="form-control bg-light border-0 py-2 rounded-3" rows="4" placeholder="Write article content..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm">Publish Article</button>
                </form>
            </x-card>
        </div>
    </div>
@endsection
