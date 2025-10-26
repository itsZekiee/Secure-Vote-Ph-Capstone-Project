<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - @yield('title', 'Dashboard')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>
<div x-data="{ collapsed: false, loading: false }" class="flex">
    <!-- Sidebar (reusable partial) -->
    @include('layouts.partials.sidebar')

    <!-- Main Content -->
    <main class="flex-grow p-6 bg-gray-100">


        <!-- Page-specific content -->
        @yield('content')
    </main>
</div>

<!-- Full-screen Loader (shared across pages) -->
<div x-show="loading" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
</div>

<!-- Footer (reusable partial) -->
@include('layouts.partials.footer')
</body>
</html>
