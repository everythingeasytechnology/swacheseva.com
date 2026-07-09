<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Swacheseva - Youth Employment Service')</title>
    
    <!-- Meta tags for SEO -->
    <meta name="description" content="Swacheseva is a premium portal dedicated to connecting skilled youth with valuable opportunities for a brighter future. Discover job placements, skill development, career counseling and government schemes.">
    <meta name="keywords" content="youth employment, government schemes, skill development, career counseling, job placement">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @yield('styles')
</head>
<body>

    <!-- Sticky Header / Navbar -->
    <x-navbar />

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    <x-footer />

    @yield('scripts')
</body>
</html>
