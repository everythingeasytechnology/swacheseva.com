@extends('layouts.user')

@section('title', 'Recommended Blogs - User Portal')

@section('content')
    <x-breadcrumb title="Resource Feed" subtitle="Browse published guides, news, and tips" parent="Dashboard" parentRoute="{{ route('user.dashboard') }}" />

    <!-- Articles Feed -->
    <div class="row g-custom">
        @forelse($blogs as $blog)
            <div class="col-lg-4 col-md-6 mb-4">
                <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column bg-white shadow-sm border-0">
                    <img src="{{ $blog->image_path ? (Str::startsWith($blog->image_path, ['http://', 'https://']) ? $blog->image_path : asset($blog->image_path)) : 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=500&q=80' }}" alt="{{ $blog->title }}" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Swacheseva News</span>
                            <small class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-calendar3 me-1"></i> {{ $blog->created_at->format('M d, Y') }}</small>
                        </div>
                        <h6 class="fw-bold mb-3">
                            <a href="{{ route('blog.detail', $blog->slug) }}" target="_blank" class="text-decoration-none text-dark hover-primary">{{ $blog->title }}</a>
                        </h6>
                        <p class="text-muted small mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ strip_tags($blog->content) }}
                        </p>
                        <a href="{{ route('blog.detail', $blog->slug) }}" target="_blank" class="text-primary-theme fw-bold text-decoration-none small">Read Article <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </x-card>
            </div>
        @empty
            <div class="col-12 text-center py-4">
                <p class="text-muted mb-0">No resources or news available.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
@endsection
