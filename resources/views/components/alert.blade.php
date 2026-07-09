@props([
    'type' => 'info',
    'message' => '',
    'dismissible' => true
])

@php
    $classes = [
        'success' => 'alert-success border-success text-success bg-success-subtle',
        'danger' => 'alert-danger border-danger text-danger bg-danger-subtle',
        'warning' => 'alert-warning border-warning text-warning bg-warning-subtle',
        'info' => 'alert-info border-info text-info bg-info-subtle'
    ][$type] ?? 'alert-info border-info text-info bg-info-subtle';

    $icons = [
        'success' => 'bi-check-circle-fill',
        'danger' => 'bi-exclamation-triangle-fill',
        'warning' => 'bi-exclamation-circle-fill',
        'info' => 'bi-info-circle-fill'
    ][$type] ?? 'bi-info-circle-fill';
@endphp

<div class="alert {{ $classes }} d-flex align-items-center shadow-sm {{ $dismissible ? 'alert-dismissible fade show' : '' }}" role="alert" style="border-radius: 8px;">
    <i class="bi {{ $icons }} fs-5 me-2"></i>
    <div class="small fw-medium">
        {{ $message ?: $slot }}
    </div>
    @if($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 1.1rem 1rem;"></button>
    @endif
</div>
