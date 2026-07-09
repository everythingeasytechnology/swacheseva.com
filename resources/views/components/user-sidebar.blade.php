<aside id="sidebar" class="d-flex flex-column">
    <!-- Sidebar Header -->
    <div class="sidebar-header d-flex align-items-center justify-content-center py-3">
        <a href="{{ route('user.dashboard') }}" class="d-flex flex-column align-items-center text-white text-decoration-none">
            <img src="{{ asset('swach-eseva-logo.png') }}" alt="Swacheseva Logo" style="height: 48px; width: auto; object-fit: contain;" class="mb-2">
            <small class="text-secondary-theme fs-8 d-block fw-bold" style="font-size: 0.65rem; letter-spacing: 1px;">USER PORTAL</small>
        </a>
    </div>

    <!-- Sidebar Menu Items -->
    <ul class="sidebar-menu flex-grow-1">
        <li class="sidebar-item">
            <a href="{{ route('user.dashboard') }}" class="sidebar-link {{ Route::currentRouteName() == 'user.dashboard' ? 'active' : '' }}">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('user.profile') }}" class="sidebar-link {{ Route::currentRouteName() == 'user.profile' ? 'active' : '' }}">
                <i class="bi bi-person-bounding-box"></i>
                <span>My Profile</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('user.services') }}" class="sidebar-link {{ Route::currentRouteName() == 'user.services' ? 'active' : '' }}">
                <i class="bi bi-briefcase-fill"></i>
                <span>Services</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="{{ route('user.password') }}" class="sidebar-link {{ Route::currentRouteName() == 'user.password' ? 'active' : '' }}">
                <i class="bi bi-shield-lock-fill"></i>
                <span>Change Password</span>
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
