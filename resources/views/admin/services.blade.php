@extends('layouts.admin')

@section('title', 'Service Management - Admin Panel')

@section('content')
    <x-breadcrumb title="Service Management" subtitle="Create, edit, and configure available government portals & e-services" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <strong class="small"><i class="bi bi-exclamation-triangle-fill me-2"></i>Please fix the following errors:</strong>
            <ul class="mb-0 small mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-custom mb-custom">
        <!-- List of Active Services -->
        <div class="col-lg-8 mb-4 mb-lg-0">
            <x-card :hover="false" title="Active E-Services & Portals ({{ $services->count() }} Configured)" class="bg-white border-0 shadow-sm">
                <!-- Search bar -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="input-group style-search" style="max-width: 300px;">
                        <span class="input-group-text bg-light border-0"><i class="bi bi-search text-muted small"></i></span>
                        <input type="text" id="serviceSearch" class="form-control bg-light border-0 small" placeholder="Search service..." onkeyup="filterServices()">
                    </div>
                    <span class="badge bg-success text-white">{{ $services->count() }} Active</span>
                </div>

                <div class="table-responsive" style="max-height: 550px; overflow-y: auto;">
                    <table class="table premium-table align-middle">
                        <thead>
                            <tr>
                                <th style="width: 90px;">Order</th>
                                <th>Service Name</th>
                                <th>Redirect Link</th>
                                <th>Theme Color</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="servicesTableBody">
                            @forelse($services as $s)
                                <tr class="service-row" data-name="{{ strtolower($s->name) }}">
                                    <td>
                                        <input type="number" class="form-control form-control-sm bg-light border-0 text-center service-order-input" data-id="{{ $s->id }}" value="{{ $s->sort_order }}" min="1" style="width: 70px;">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            @php
                                                $isHex = Str::startsWith($s->theme_color, '#');
                                            @endphp
                                            <div class="service-icon-circle bg-opacity-10 d-flex align-items-center justify-content-center rounded text-white p-2 {{ !$isHex ? $s->theme_color : '' }}" 
                                                 style="width: 36px; height: 36px; {{ $isHex ? 'background: ' . $s->theme_color . ';' : '' }}">
                                                @if(str_starts_with($s->icon_class, 'bi '))
                                                    <i class="{{ $s->icon_class }}"></i>
                                                @else
                                                    <img src="{{ asset($s->icon_class) }}" alt="icon" style="width: 18px; height: 18px; object-fit: contain; filter: brightness(0) invert(1);">
                                                @endif
                                            </div>
                                            <span class="fw-bold text-dark">{{ $s->name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ $s->link }}" target="_blank" class="text-decoration-none text-primary-theme small">
                                            <i class="bi bi-box-arrow-up-right me-1"></i> Visit Link
                                        </a>
                                    </td>
                                    <td>
                                        @if($isHex)
                                            <div class="d-flex align-items-center gap-1.5">
                                                <span class="d-inline-block rounded-circle border shadow-sm" style="width: 16px; height: 16px; background: {{ $s->theme_color }};"></span>
                                                <span class="small font-monospace text-muted">{{ $s->theme_color }}</span>
                                            </div>
                                        @else
                                            <span class="badge text-dark bg-light border">{{ $s->theme_color }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <button onclick='openEditServiceModal({!! json_encode($s) !!})' class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit" data-bs-toggle="modal" data-bs-target="#editServiceModal">
                                                <i class="bi bi-pencil small text-primary-theme"></i>
                                            </button>
                                            <form action="{{ route('admin.services.delete', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Delete">
                                                    <i class="bi bi-trash small text-danger"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No E-Services configured.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($services->count())
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" id="saveOrderBtn" class="btn btn-sm btn-primary rounded-pill px-4 shadow-sm">
                            <i class="bi bi-sort-down me-1"></i> Save Order
                        </button>
                    </div>
                @endif
            </x-card>
        </div>

        <!-- Add E-Service panel -->
        <div class="col-lg-4">
            <x-card :hover="false" title="Add E-Service / Portal" class="bg-white border-0 shadow-sm">
                <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="add_name" class="form-label text-muted small fw-bold">Service / Scheme Name</label>
                        <input type="text" name="name" id="add_name" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., Aadhaar Card" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_description" class="form-label text-muted small fw-bold">Description / Short Detail</label>
                        <textarea name="description" id="add_description" class="form-control bg-light border-0 py-2 rounded-3" rows="2" placeholder="e.g., Apply for New Aadhaar or Update..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="add_link" class="form-label text-muted small fw-bold">Redirect URL / Link</label>
                        <input type="url" name="link" id="add_link" class="form-control bg-light border-0 py-2 rounded-3" placeholder="e.g., https://myaadhaar.uidai.gov.in/" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_icon" class="form-label text-muted small fw-bold">Upload Service Icon Image</label>
                        <input type="file" name="icon_image" id="add_icon" class="form-control bg-light border-0 py-2 rounded-3" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_theme" class="form-label text-muted small fw-bold">Theme Style Color</label>
                        <div class="d-flex align-items-center gap-2 border bg-light rounded-3 px-2" style="height: 38px;">
                            <input type="color" name="theme_color" class="form-control form-control-color border-0 bg-transparent p-0" id="add_theme" value="#002984" title="Choose color theme" style="width: 36px; height: 28px; cursor: pointer; min-width: 36px;">
                            <span class="text-muted small fw-bold" id="add-color-hex-val" style="font-size: 0.75rem;">#002984</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="add_is_featured" class="form-label text-muted small fw-bold">Featured status</label>
                        <select name="is_featured" id="add_is_featured" class="form-select bg-light border-0 py-2 rounded-3" required>
                            <option value="1">Yes (Featured)</option>
                            <option value="0" selected>No (Standard)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm fw-bold">Add Service to Portal</button>
                </form>
            </x-card>
        </div>
    </div>

    <!-- Edit Service Modal -->
    <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-primary-theme" id="editServiceModalLabel"><i class="bi bi-pencil-square me-2"></i>Edit E-Service Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editServiceForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label text-muted small fw-bold">Service / Scheme Name</label>
                            <input type="text" name="name" id="edit_name" class="form-control bg-light border-0 py-2 rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label text-muted small fw-bold">Description / Short Detail</label>
                            <textarea name="description" id="edit_description" class="form-control bg-light border-0 py-2 rounded-3" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_link" class="form-label text-muted small fw-bold">Redirect URL / Link</label>
                            <input type="url" name="link" id="edit_link" class="form-control bg-light border-0 py-2 rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_icon" class="form-label text-muted small fw-bold">Replace Service Icon Image (Optional)</label>
                            <input type="file" name="icon_image" id="edit_icon" class="form-control bg-light border-0 py-2 rounded-3" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="edit_theme" class="form-label text-muted small fw-bold">Theme Style Color</label>
                            <div class="d-flex align-items-center gap-2 border bg-light rounded-3 px-2" style="height: 38px;">
                                <input type="color" name="theme_color" class="form-control form-control-color border-0 bg-transparent p-0" id="edit_theme" value="#002984" title="Choose color theme" style="width: 36px; height: 28px; cursor: pointer; min-width: 36px;">
                                <span class="text-muted small fw-bold" id="edit-color-hex-val" style="font-size: 0.75rem;">#002984</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_is_featured" class="form-label text-muted small fw-bold">Featured status</label>
                            <select name="is_featured" id="edit_is_featured" class="form-select bg-light border-0 py-2 rounded-3" required>
                                <option value="1">Yes (Featured)</option>
                                <option value="0">No (Standard)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal" style="font-size: 0.85rem;">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-5 shadow-sm" style="font-size: 0.85rem;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openEditServiceModal(service) {
            document.getElementById('editServiceForm').setAttribute('action', '/admin/services/' + service.id + '/update');
            document.getElementById('edit_name').value = service.name;
            document.getElementById('edit_description').value = service.description;
            document.getElementById('edit_link').value = service.link;
            document.getElementById('edit_is_featured').value = (service.is_featured == 1 || service.is_featured === true) ? "1" : "0";
            
            // Set color picker
            const isHex = service.theme_color.startsWith('#');
            const colorVal = isHex ? service.theme_color : '#002984';
            document.getElementById('edit_theme').value = colorVal;
            document.getElementById('edit-color-hex-val').textContent = colorVal.toUpperCase();
        }

        function saveServiceOrder() {
            var inputs = document.querySelectorAll('.service-order-input');
            var order = [];
            inputs.forEach(function (input) {
                order.push({ id: input.getAttribute('data-id'), sort_order: input.value });
            });

            fetch('{{ route("admin.services.reorder") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ order: order })
            }).then(function (response) {
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert('Failed to save order. Please try again.');
                }
            });
        }

        function filterServices() {
            var searchVal = document.getElementById('serviceSearch').value.toLowerCase();
            var rows = document.querySelectorAll('.service-row');

            rows.forEach(function(row) {
                var text = row.getAttribute('data-name');
                if (text.indexOf(searchVal) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            var saveOrderBtn = document.getElementById('saveOrderBtn');
            if (saveOrderBtn) {
                saveOrderBtn.addEventListener('click', saveServiceOrder);
            }

            // Color Pickers display text listeners
            const addPicker = document.getElementById('add_theme');
            const addLabel = document.getElementById('add-color-hex-val');
            if (addPicker && addLabel) {
                addPicker.addEventListener('input', function () {
                    addLabel.textContent = this.value.toUpperCase();
                });
            }

            const editPicker = document.getElementById('edit_theme');
            const editLabel = document.getElementById('edit-color-hex-val');
            if (editPicker && editLabel) {
                editPicker.addEventListener('input', function () {
                    editLabel.textContent = this.value.toUpperCase();
                });
            }
        });
    </script>
@endsection
