<!-- resources/views/users/main-admin/ma-dashboard.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>
<div x-data="{ collapsed: false, loading: false }" class="flex">
    <!-- Sidebar -->
    @include('layout.partials.sidebar')

    <!-- Main Content -->
    <main class="flex-grow p-6 bg-gray-100">
        <div class="flex items-start mb-6">
            <button @click="collapsed = !collapsed" class="p-2 rounded-md focus:outline-none mr-4">
                <i class="ri-menu-line text-2xl" style="color: #444444;"></i>
            </button>
            <div>
                <h1 class="text-4xl font-bold">Dashboard Overview</h1>
                <p class="mt-1 text-sm text-gray-500 max-w-xl">
                    Welcome back! Here's what's happening with your voting system.
                </p>
            </div>
        </div>

        <!-- Analytics: same grid layout pattern as ma-voterRecord -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 transition-all"
             :class="collapsed ? 'gap-6' : 'gap-3'">

            <!-- Total Voters -->
            <div class="bg-white p-4 rounded-lg shadow-md min-w-0 ring-1 ring-gray-100 hover:shadow-lg hover:-translate-y-0.5 transition">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold">Total Voters</span>
                    <i class="ri-group-fill text-2xl text-indigo-400"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-bold text-gray-800 mb-1">1,234</span>
                    <span class="text-sm text-gray-500">Form: Presidential Election 2024</span>
                </div>
            </div>

            <!-- Active Candidates -->
            <div class="bg-white p-4 rounded-lg shadow-md min-w-0 ring-1 ring-gray-100 hover:shadow-lg hover:-translate-y-0.5 transition">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold">Active Candidates</span>
                    <i class="ri-user-star-fill text-2xl text-emerald-400"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-bold text-gray-800 mb-1">25</span>
                    <span class="text-sm text-gray-500">Form: Presidential Election 2024</span>
                </div>
            </div>

            <!-- Total Cast Votes -->
            <div class="bg-white p-4 rounded-lg shadow-md min-w-0 ring-1 ring-gray-100 hover:shadow-lg hover:-translate-y-0.5 transition">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold">Total Cast Votes</span>
                    <i class="ri-checkbox-multiple-fill text-2xl text-blue-400"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-bold text-gray-800 mb-1">980</span>
                    <span class="text-sm text-gray-500">Form: Presidential Election 2024</span>
                </div>
            </div>

            <!-- Days Until Election -->
            <div class="bg-white p-4 rounded-lg shadow-md min-w-0 ring-1 ring-gray-100 hover:shadow-lg hover:-translate-y-0.5 transition">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold">Days Until Election</span>
                    <i class="ri-calendar-event-fill text-2xl text-rose-400"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-bold text-gray-800 mb-1">15</span>
                    <span class="text-sm text-gray-500">Form: Presidential Election 2024</span>
                </div>
            </div>
        </div>

        <!-- Modernized panels -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
            <!-- Recent Activity (Timeline) -->
            <section class="bg-white rounded-lg shadow-md p-6 lg:col-span-2">
                <h2 class="text-xl font-bold">Recent Activity</h2>
                <p class="text-xs text-gray-500 mb-4">Latest system activities and updates</p>

                <ul class="space-y-5 max-h-72 overflow-y-auto">
                    <li class="relative pl-8">
                        <span class="absolute left-0 top-1.5 h-3 w-3 rounded-full bg-indigo-500"></span>
                        <div class="border rounded px-3 py-2 text-sm">
                            <span class="font-medium">[10:30 AM]</span> New voter registered: John Doe
                        </div>
                    </li>
                    <li class="relative pl-8">
                        <span class="absolute left-0 top-1.5 h-3 w-3 rounded-full bg-emerald-500"></span>
                        <div class="border rounded px-3 py-2 text-sm">
                            <span class="font-medium">[09:45 AM]</span> Candidate Jane Smith approved
                        </div>
                    </li>
                    <li class="relative pl-8">
                        <span class="absolute left-0 top-1.5 h-3 w-3 rounded-full bg-blue-500"></span>
                        <div class="border rounded px-3 py-2 text-sm">
                            <span class="font-medium">[08:20 AM]</span> Backup completed successfully
                        </div>
                    </li>
                    <li class="relative pl-8">
                        <span class="absolute left-0 top-1.5 h-3 w-3 rounded-full bg-amber-500"></span>
                        <div class="border rounded px-3 py-2 text-sm">
                            <span class="font-medium">[Yesterday, 05:15 PM]</span> Voting settings updated
                        </div>
                    </li>
                    <li class="relative pl-8">
                        <span class="absolute left-0 top-1.5 h-3 w-3 rounded-full bg-teal-500"></span>
                        <div class="border rounded px-3 py-2 text-sm">
                            <span class="font-medium">[Yesterday, 03:00 PM]</span> New partylist added: Green Party
                        </div>
                    </li>
                    <li class="relative pl-8">
                        <span class="absolute left-0 top-1.5 h-3 w-3 rounded-full bg-gray-500"></span>
                        <div class="border rounded px-3 py-2 text-sm">
                            <span class="font-medium">[2 days ago, 11:30 AM]</span> User admin created a new form
                        </div>
                    </li>
                    <li class="relative pl-8">
                        <span class="absolute left-0 top-1.5 h-3 w-3 rounded-full bg-gray-500"></span>
                        <div class="border rounded px-3 py-2 text-sm">
                            <span class="font-medium">[2 days ago, 09:00 AM]</span> System maintenance completed
                        </div>
                    </li>
                </ul>
            </section>

            <!-- System Status -->
            <section class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold">System Status</h2>
                <p class="text-xs text-gray-500 mb-4">Current system health and alerts</p>

                <ul class="space-y-3 text-sm">
                    <li class="flex items-center justify-between border rounded px-3 py-2">
                        <div class="flex items-center gap-2">
                            <i class="ri-server-fill text-indigo-500"></i>
                            <span class="font-medium">Server</span>
                        </div>
                        <span class="px-2 py-0.5 rounded text-green-700 bg-green-100">Online</span>
                    </li>
                    <li class="flex items-center justify-between border rounded px-3 py-2">
                        <div class="flex items-center gap-2">
                            <i class="ri-database-2-fill text-emerald-500"></i>
                            <span class="font-medium">Database</span>
                        </div>
                        <span class="px-2 py-0.5 rounded text-green-700 bg-green-100">Connected</span>
                    </li>
                    <li class="flex items-center justify-between border rounded px-3 py-2">
                        <div class="flex items-center gap-2">
                            <i class="ri-cloud-fill text-blue-500"></i>
                            <span class="font-medium">Last Backup</span>
                        </div>
                        <span>Today, 03:00 AM</span>
                    </li>
                    <li class="flex items-center justify-between border rounded px-3 py-2">
                        <div class="flex items-center gap-2">
                            <i class="ri-user-smile-fill text-rose-500"></i>
                            <span class="font-medium">Active Users</span>
                        </div>
                        <span>12</span>
                    </li>
                </ul>
            </section>
        </div>
    </main>
</div>
</body>
</html>
