<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Admin Dashboard</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Remixicon CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    {{-- Custom Styles (Optional) --}}
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">
<nav class="p-4 bg-indigo-600 text-white flex justify-between items-center shadow">
    <h1 class="text-xl font-bold">Secure Vote PH - Main Admin</h1>
    <i class="ri-shield-user-line text-2xl"></i>
</nav>

<div class="container mt-5">
    <div class="p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-lg font-semibold mb-4">Welcome, Main Admin!</h2>
        <p class="text-gray-600">This is your dashboard. Manage users, sub-admins, and monitor the voting system here.</p>
    </div>
</div>
</body>
</html>
