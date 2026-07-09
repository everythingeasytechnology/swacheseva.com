<nav class="navbar navbar-expand dashboard-navbar sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Left Section: Sidebar Collapse Toggle -->
        <div class="d-flex align-items-center">
            <button type="button" id="sidebarCollapse" class="btn btn-light bg-transparent border-0 me-3">
                <i class="bi bi-justify fs-4 text-primary-theme"></i>
            </button>
            
            <!-- Quick Search Bar (Muted on small screens) -->
            <form class="d-none d-md-flex" style="width: 250px;">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small rounded-start-pill ps-3" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
                    <button class="btn btn-light bg-light border-0 rounded-end-pill px-3" type="button">
                        <i class="bi bi-search text-muted small"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Section: Alerts and Profile dropdown -->
        <ul class="navbar-nav align-items-center gap-3">
            <!-- Dark Mode Toggle -->
            <li class="nav-item">
                <button type="button" id="theme-toggle" class="btn btn-light bg-transparent border-0 p-2 text-muted" title="Toggle Theme">
                    <i class="bi bi-moon-fill fs-5" id="theme-toggle-icon"></i>
                </button>
            </li>

            <!-- User Info & Avatar Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center p-0" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile avatar" class="rounded-circle border" style="width: 36px; height: 36px; object-fit: cover;">
                    <div class="ms-2 d-none d-lg-block text-start leading-none" style="margin-top: 2px;">
                        <span class="fw-bold text-dark fs-8 d-block" style="font-size: 0.85rem;">Rahul Kumar</span>
                        <small class="text-muted fs-9 d-block" style="font-size: 0.7rem; margin-top: -3px;">Verified Applicant</small>
                    </div>
                </a>
                
                <!-- User Menu Dropdown -->
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('user.profile') }}">
                            <i class="bi bi-person me-2 text-primary-theme"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('user.dashboard') }}">
                            <i class="bi bi-grid me-2 text-primary-theme"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('user.password') }}">
                            <i class="bi bi-shield-lock me-2 text-primary-theme"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center py-2 text-danger" href="{{ route('home') }}">
                            <i class="bi bi-box-arrow-left me-2"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
