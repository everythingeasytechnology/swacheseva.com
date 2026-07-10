<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel - Swacheseva')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Chart.js for Admin Analytics Mocks -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    @yield('styles')
</head>
<body class="bg-light">
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark-mode');
        }
    </script>

    <div class="dashboard-wrapper">
        <!-- Sidebar Navigation Component -->
        <x-admin-sidebar />

        <!-- Main Content Area -->
        <div id="main-content">
            <!-- Top Navbar Component -->
            <x-admin-navbar />

            <!-- Dynamic Admin Content -->
            <div class="dashboard-content-area">
                <!-- Breadcrumbs & Page Header -->
                @yield('content')
            </div>

            <!-- Admin Footer -->
            <footer class="py-3 px-4 bg-white border-top d-flex flex-wrap justify-content-between align-items-center mt-auto text-muted small">
                <span>&copy; {{ date('Y') }} <strong>Swacheseva Admin Panel</strong>. All Rights Reserved.</span>
                <span>Design by <a href="http://everythingeasy.in/" target="_blank" class="text-primary text-decoration-none fw-bold"><i class="bi bi-globe me-1"></i>Everything Easy</a></span>
            </footer>
        </div>
    </div>

    @yield('scripts')
</body>
</html>
