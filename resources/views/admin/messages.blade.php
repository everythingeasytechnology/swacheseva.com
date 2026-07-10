@extends('layouts.admin')

@section('title', 'Support Messages - Admin Panel')

@section('content')
    <x-breadcrumb title="Support Queries &amp; Messages" subtitle="View and manage messages submitted from the public contact form" parent="Dashboard" parentRoute="{{ route('admin.dashboard') }}" />

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Support Queries Grid & Table -->
    <x-card :hover="false" class="bg-white border-0 shadow-sm p-3">
        <div class="table-responsive">
            <table class="table premium-table align-middle">
                <thead>
                    <tr>
                        <th style="width: 15%;">Sender</th>
                        <th style="width: 15%;">Email</th>
                        <th style="width: 20%;">Subject</th>
                        <th style="width: 30%;">Message Details</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr style="{{ $msg->status === 'unread' ? 'background-color: rgba(13, 110, 253, 0.02); font-weight: 600;' : '' }}">
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center {{ $msg->status === 'unread' ? 'bg-primary text-white' : 'bg-light text-muted' }}" style="width: 32px; height: 32px;">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <span>{{ $msg->name }}</span>
                                </div>
                            </td>
                            <td>
                                <a href="mailto:{{ $msg->email }}" class="text-decoration-none text-primary-theme small">
                                    <i class="bi bi-envelope me-1"></i> {{ $msg->email }}
                                </a>
                            </td>
                            <td class="text-dark small">{{ $msg->subject ?? 'General Inquiry' }}</td>
                            <td class="text-muted small" style="max-width: 300px; word-break: break-word;">
                                {{ $msg->message }}
                            </td>
                            <td>
                                @if($msg->status === 'unread')
                                    <span class="badge bg-danger text-white"><i class="bi bi-envelope-fill me-1"></i> Unread</span>
                                @else
                                    <span class="badge bg-light text-dark border"><i class="bi bi-envelope-open me-1"></i> Read</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center align-items-center">
                                    @if($msg->status === 'unread')
                                        <form action="{{ route('admin.messages.read', $msg->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Mark as Read">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.messages.delete', $msg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message query?');">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Delete Query">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No support messages submitted yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-card>
@endsection
