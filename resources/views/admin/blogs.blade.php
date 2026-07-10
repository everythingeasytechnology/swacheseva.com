@extends('layouts.admin')

@section('title', 'Blog Management - Admin Panel')

@section('content')
    <x-breadcrumb title="Blog Management" subtitle="Write, compose, and manage news articles & announcements" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

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

    <!-- Blogs Table & Creation -->
    <div class="row g-custom mb-custom">
        <!-- List Blogs -->
        <div class="col-lg-8">
            <x-card :hover="false" title="Published Articles" class="bg-white border-0 shadow-sm">
                <div class="table-responsive" style="max-height: 520px; overflow-y: auto;">
                    <table class="table premium-table align-middle">
                        <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($blogs as $b)
                                <tr>
                                    <td>
                                        <img src="{{ $b->image_path ? (Str::startsWith($b->image_path, ['http://', 'https://']) ? $b->image_path : asset($b->image_path)) : 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=100&q=80' }}" alt="blog thumb" class="rounded shadow-sm" style="width: 48px; height: 36px; object-fit: cover;">
                                    </td>
                                    <td class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $b->title }}</td>
                                    <td class="small text-muted">{{ $b->author_name }}</td>
                                    <td>
                                        @if($b->status === 'published')
                                            <span class="badge bg-success text-white">Published</span>
                                        @else
                                            <span class="badge bg-secondary text-white">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <button onclick='openEditBlogModal({!! json_encode($b) !!})' class="btn btn-sm btn-light p-1" style="width: 28px; height: 28px;" title="Edit" data-bs-toggle="modal" data-bs-target="#editBlogModal">
                                                <i class="bi bi-pencil small text-primary-theme"></i>
                                            </button>
                                            <form action="{{ route('admin.blogs.delete', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this article?');">
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
                                    <td colspan="5" class="text-center text-muted py-4">No news articles published yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-card>
        </div>

        <!-- Compose Blog -->
        <div class="col-lg-4">
            <x-card :hover="false" title="Compose Article" class="bg-white border-0 shadow-sm">
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="add_title" class="form-label text-muted small fw-bold">Post Title</label>
                        <input type="text" name="title" id="add_title" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Enter title" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_author" class="form-label text-muted small fw-bold">Author Name</label>
                        <input type="text" name="author_name" id="add_author" class="form-control bg-light border-0 py-2 rounded-3" value="Swacheseva Team" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_status" class="form-label text-muted small fw-bold">Publication Status</label>
                        <select name="status" id="add_status" class="form-select bg-light border-0 py-2 rounded-3" required>
                            <option value="published" selected>Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="add_image" class="form-label text-muted small fw-bold">Featured Image File</label>
                        <input type="file" name="image" id="add_image" class="form-control bg-light border-0 py-2 rounded-3" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="add_content" class="form-label text-muted small fw-bold">Content Markup</label>
                        <textarea name="content" id="add_content" class="form-control bg-light border-0 py-2 rounded-3" rows="5" placeholder="Write article content here..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm fw-bold">Publish Article</button>
                </form>
            </x-card>
        </div>
    </div>

    <!-- Edit Blog Modal -->
    <div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-primary-theme" id="editBlogModalLabel"><i class="bi bi-pencil-square me-2"></i>Edit Article Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editBlogForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label for="edit_title" class="form-label text-muted small fw-bold">Post Title</label>
                            <input type="text" name="title" id="edit_title" class="form-control bg-light border-0 py-2 rounded-3" required>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="edit_author" class="form-label text-muted small fw-bold">Author Name</label>
                                <input type="text" name="author_name" id="edit_author" class="form-control bg-light border-0 py-2 rounded-3" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_status" class="form-label text-muted small fw-bold">Publication Status</label>
                                <select name="status" id="edit_status" class="form-select bg-light border-0 py-2 rounded-3" required>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_image" class="form-label text-muted small fw-bold">Replace Featured Image File (Optional)</label>
                            <input type="file" name="image" id="edit_image" class="form-control bg-light border-0 py-2 rounded-3" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="edit_content" class="form-label text-muted small fw-bold">Content Markup</label>
                            <textarea name="content" id="edit_content" class="form-control bg-light border-0 py-2 rounded-3" rows="6" required></textarea>
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
        function openEditBlogModal(blog) {
            document.getElementById('editBlogForm').setAttribute('action', '/admin/blogs/' + blog.id + '/update');
            document.getElementById('edit_title').value = blog.title;
            document.getElementById('edit_author').value = blog.author_name;
            document.getElementById('edit_status').value = blog.status;
            document.getElementById('edit_content').value = blog.content;
        }
    </script>
@endsection
