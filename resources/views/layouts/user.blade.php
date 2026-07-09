<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'User Portal - Swacheseva')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
        <x-user-sidebar />

        <!-- Main Content Area -->
        <div id="main-content">
            <!-- Top Navbar Component -->
            <x-admin-navbar />

            <!-- Dynamic User Content -->
            <div class="dashboard-content-area">
                <!-- Content yield -->
                @yield('content')
            </div>

            <!-- User Footer -->
            <footer class="py-3 px-4 bg-white border-top text-center mt-auto text-muted small">
                &copy; {{ date('Y') }} <strong>Swacheseva User Portal</strong>. All Rights Reserved.
            </footer>
        </div>
    </div>

    @yield('scripts')
</body>
</html>
