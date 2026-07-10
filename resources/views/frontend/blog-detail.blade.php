@extends('layouts.guest')

@section('title', $blog->title . ' - Swacheseva')

@section('content')
    <!-- Inner Page Header -->
    <section class="py-5 bg-primary-theme text-white">
        <div class="container py-3">
            <span class="badge bg-secondary-theme text-white mb-2 px-3 py-1 rounded-pill small fw-semibold">NEWS & ANNOUNCEMENTS</span>
            <h1 class="fw-bold mb-2 text-white" style="font-size: 2.2rem; max-width: 800px;">{{ $blog->title }}</h1>
            <p class="mb-0 text-white-50 small d-flex align-items-center gap-3">
                <span><i class="bi bi-person-fill text-white"></i> {{ $blog->author_name }}</span>
                <span><i class="bi bi-calendar-event-fill text-white"></i> {{ $blog->created_at->format('M d, Y') }}</span>
            </p>
        </div>
    </section>

    <!-- Main Content and Sidebar -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row g-4">
                <!-- Blog Content -->
                <div class="col-lg-8">
                    <x-card :hover="false" class="p-4 mb-4 bg-white border-0 shadow-sm">
                        <img src="{{ $blog->image_path ? (Str::startsWith($blog->image_path, ['http://', 'https://']) ? $blog->image_path : asset($blog->image_path)) : 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=1200&q=80' }}" alt="{{ $blog->title }}" class="img-fluid rounded-4 mb-4 w-100" style="max-height: 400px; object-fit: cover;">
                        
                        <div class="text-dark fs-6" style="line-height: 1.8;">
                            {!! nl2br(e($blog->content)) !!}
                        </div>
                    </x-card>
                </div>

                <!-- Sidebar Content -->
                <div class="col-lg-4">
                    <!-- Popular Articles -->
                    <x-card :hover="false" class="p-4 mb-4 bg-white border-0 shadow-sm" title="Recent Posts">
                        @forelse($recentBlogs as $rb)
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{ $rb->image_path ? (Str::startsWith($rb->image_path, ['http://', 'https://']) ? $rb->image_path : asset($rb->image_path)) : 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=150&q=80' }}" alt="{{ $rb->title }}" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-1" style="font-size: 0.82rem; line-height: 1.4;">
                                        <a href="{{ route('blog.detail', $rb->slug) }}" class="text-decoration-none text-dark hover-primary">{{ $rb->title }}</a>
                                    </h6>
                                    <small class="text-muted" style="font-size: 0.7rem;">{{ $rb->created_at->format('M d, Y') }}</small>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted small mb-0">No other recent posts found.</p>
                        @endforelse
                    </x-card>

                    <div class="text-center">
                        <a href="{{ route('blog') }}" class="btn btn-outline-primary rounded-pill px-4" style="font-size: 0.8rem;"><i class="bi bi-arrow-left me-1"></i> Back to Blog Feed</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
