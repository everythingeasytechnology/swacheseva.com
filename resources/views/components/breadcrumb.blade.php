@props([
    'title' => 'Dashboard',
    'subtitle' => '',
    'parent' => '',
    'parentRoute' => '#'
])

<div class="d-md-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1 text-primary-theme">{{ $title }}</h4>
        @if($subtitle)
            <p class="text-muted small mb-0">{{ $subtitle }}</p>
        @endif
    </div>
    
    <nav aria-label="breadcrumb" class="mt-2 mt-md-0">
        <ol class="breadcrumb mb-0 bg-transparent p-0">
            @if($parent)
                <li class="breadcrumb-item"><a href="{{ $parentRoute }}" class="text-primary-theme text-decoration-none fw-medium small">{{ $parent }}</a></li>
            @endif
            <li class="breadcrumb-item active text-muted small" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>
</div>
