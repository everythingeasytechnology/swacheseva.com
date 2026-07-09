<aside id="sidebar" class="d-flex flex-column">
    <!-- Sidebar Header -->
    <div class="sidebar-header d-flex align-items-center justify-content-center py-3">
        <a href="{{ route('admin.dashboard') }}" class="d-flex flex-column align-items-center text-white text-decoration-none">
            <img src="{{ asset('swach-eseva-logo.png') }}" alt="Swacheseva Logo" style="height: 48px; width: auto; object-fit: contain;" class="mb-2">
            <small class="text-secondary-theme fs-8 d-block fw-bold" style="font-size: 0.65rem; letter-spacing: 1px;">ADMIN PANEL</small>
        </a>
    </div>

    <!-- Sidebar Menu Items -->
    <ul class="sidebar-menu flex-grow-1">
        <li class="sidebar-item">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin.users') }}" class="sidebar-link {{ Route::currentRouteName() == 'admin.users' ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i>
                <span>Users</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="{{ route('admin.services') }}" class="sidebar-link {{ Route::currentRouteName() == 'admin.services' ? 'active' : '' }}">
                <i class="bi bi-briefcase-fill"></i>
                <span>Services</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin.blogs') }}" class="sidebar-link {{ Route::currentRouteName() == 'admin.blogs' ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i>
                <span>Blogs</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="{{ route('admin.settings') }}" class="sidebar-link {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}">
                <i class="bi bi-gear-fill"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>

    <!-- Sidebar Bottom Action -->
    <div class="sidebar-item mt-auto mb-4">
        <a href="{{ route('home') }}" class="sidebar-link text-white-50 hover-white">
            <i class="bi bi-box-arrow-left"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>
