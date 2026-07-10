@extends('layouts.guest')

@section('title', 'Blog & Updates - Swacheseva')

@section('content')
    <!-- Inner Page Header -->
    <section class="py-5 bg-primary-theme text-white">
        <div class="container py-3">
            <h1 class="fw-bold mb-2 text-white">Blog & News Updates</h1>
            <p class="lead mb-0 text-white-50 small" style="max-width: 600px;">
                Stay updated with the latest trends in the job market, skills development, and scheme announcements.
            </p>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <!-- Blog Grid -->
            <div class="row g-4">
                @forelse($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <x-card :hover="true" class="h-100 p-0 overflow-hidden d-flex flex-column bg-white shadow-sm border-0">
                            <img src="{{ $blog->image_path ? (Str::startsWith($blog->image_path, ['http://', 'https://']) ? $blog->image_path : asset($blog->image_path)) : 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=500&q=80' }}" alt="{{ $blog->title }}" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                            <div class="p-4 d-flex flex-column flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-primary-theme bg-opacity-10 text-primary-theme fw-semibold" style="font-size: 0.75rem;">Swacheseva News</span>
                                    <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ $blog->created_at->format('M d, Y') }}</small>
                                </div>
                                <h5 class="fw-bold mb-3 fs-6">
                                    <a href="{{ route('blog.detail', $blog->slug) }}" class="text-decoration-none text-dark hover-primary">{{ $blog->title }}</a>
                                </h5>
                                <p class="text-muted small mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.5;">
                                    {{ strip_tags($blog->content) }}
                                </p>
                                <a href="{{ route('blog.detail', $blog->slug) }}" class="text-primary-theme fw-bold text-decoration-none small">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                            </div>
                        </x-card>
                    </div>
                @empty
                    <div class="col-12 text-center py-4">
                        <p class="text-muted mb-0">No updates or blogs published yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination UI Component -->
            <div class="mt-5 d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>
@endsection
