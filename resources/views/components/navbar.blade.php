<!-- Top Bar -->
<div class="bg-primary-theme py-2 text-white text-opacity-85" style="font-size: 0.85rem; border-bottom: 1px solid rgba(255,255,255,0.1); background-color: #002984 !important;">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <!-- <i class="bi bi-envelope-fill me-1 text-secondary-theme"></i> Mail us : {{ \App\Models\Setting::get('website_email_secondary', 'swacheseva@gmail.com') }} <span class="mx-2">|</span> {{ \App\Models\Setting::get('website_email', 'care@swacheseva.com') }} -->
        </div>
        <div class="d-flex align-items-center gap-3">
            <span><i class="bi bi-clock-fill me-1 text-secondary-theme"></i> Opening Hours : Monday - Friday: 10:00AM to 5:00PM</span>
            <span class="d-none d-md-inline"></span>
            <!-- <a href="{{ route('register') }}" class="text-white text-decoration-none fw-semibold d-none d-md-inline">Swacheseva Application Form</a> -->
        </div>
    </div>
</div>

<!-- Sticky Navbar -->
<nav class="navbar navbar-expand-lg sticky-navbar ">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" style=" padding:0; margin:0;">
            <img src="{{ asset('bk-logo.png') }}" alt="Swacheseva" style="height: 75px; width: auto;">
        </a>

        <!-- Responsive Toggler -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#frontendNavbar" aria-controls="frontendNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list text-primary-theme fs-1"></i>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="frontendNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'services' ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'blog' || Route::currentRouteName() == 'blog.detail' ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>

            <!-- CTA Buttons -->
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('register') }}" class="btn btn-secondary-theme px-4 py-2 text-white fw-bold shadow-sm d-inline-flex align-items-center gap-2" style="border-radius: 6px;">Apply Now <i class="bi bi-arrow-right"></i></a>
                <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2 text-white fw-bold shadow-sm d-inline-flex align-items-center gap-2" style="border-radius: 6px;"><i class="bi bi-person-fill"></i> Login <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</nav>
