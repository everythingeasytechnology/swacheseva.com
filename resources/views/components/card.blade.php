@props([
    'title' => '',
    'subtitle' => '',
    'hover' => true,
    'class' => ''
])

<div class="premium-card {{ $hover ? 'hover-card' : '' }} {{ $class }}">
    @if($title || $slot->isNotEmpty())
        @if($title)
            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                <div>
                    <h5 class="fw-bold mb-0 text-primary-theme">{{ $title }}</h5>
                    @if($subtitle)
                        <small class="text-muted">{{ $subtitle }}</small>
                    @endif
                </div>
            </div>
        @endif
        
        <div class="card-body-content">
            {{ $slot }}
        </div>
    @endif
</div>
