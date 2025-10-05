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
    <div x-data="{ collapsed: false, loading: false }" class="flex">        <!-- Sidebar -->
        <aside :class="collapsed ? 'w-20' : 'w-64'" class="bg-[#444444] text-white min-h-screen flex flex-col transition-all duration-300">
            <div class="p-6 flex-1 flex flex-col">
                <div class="flex items-center space-x-2 mb-4">
                    <i class="ri-shield-keyhole-fill header-icon text-2xl"></i>
                    <h2 class="text-lg font-semibold" x-show="!collapsed">Secure Vote Ph</h2>
                </div>
                <nav class="nav flex-1">
                    <ul class="nav__list">
                        <li class="mb-4 nav__items active flex items-center justify-start">
                            <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
                                <i class="ri-dashboard-fill mr-2"></i>
                                <span x-show="!collapsed">Dashboard</span>
                            </a>
                        </li>
                        <li class="mb-4 nav__items flex items-center justify-start">
                            <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
                                <i class="ri-group-fill mr-2"></i>
                                <span x-show="!collapsed">Partylist</span>
                            </a>
                        </li>
                        <li class="mb-4 nav__items flex items-center justify-start">
                            <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
                                <i class="ri-user-star-fill mr-2"></i>
                                <span x-show="!collapsed">Candidates</span>
                            </a>
                        </li>
                        <li class="mb-4 nav__items flex items-center justify-start">
                            <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
                                <i class="ri-file-list-3-fill mr-2"></i>
                                <span x-show="!collapsed">Voter Record</span>
                            </a>
                        </li>
                        <li class="mb-4 nav__items flex items-center justify-start">
                            <a
                                href="{{ route('voting.settings') }}"
                                class="hover:text-gray-400 nav__link flex items-center text-left"
                                @click.prevent="loading = true; window.location.href = '{{ route('voting.settings') }}';"
                            >
                                <i class="ri-settings-3-fill mr-2"></i>
                                <span x-show="!collapsed">Voting Settings</span>
                            </a>
                        </li>
                        <li class="mb-4 nav__items flex items-center justify-start">
                            <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
                                <i class="ri-bar-chart-2-fill mr-2"></i>
                                <span x-show="!collapsed">Analytics</span>
                            </a>
                        </li>
                        <li class="mb-4 nav__items flex items-center justify-start">
                            <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
                                <i class="ri-file-add-fill mr-2"></i>
                                <span x-show="!collapsed">Create a Form</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Logout button left-aligned, icon only when collapsed -->
            <div class="p-6" x-show="!collapsed">
                <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
                    <i class="ri-logout-box-fill mr-2"></i> Logout
                </a>
            </div>
            <div class="p-6" x-show="collapsed">
                <a href="#" class="hover:text-gray-400 nav__link flex items-center justify-start">
                    <i class="ri-logout-box-fill"></i>
                </a>
            </div>

            <!-- Loader Animation (place near main content) -->
            <div x-show="loading" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-6 bg-gray-100">
            <div class="flex items-center mb-2">
                <button @click="collapsed = !collapsed" class="p-2 rounded-md focus:outline-none mr-4">
                    <i class="ri-menu-line text-2xl" style="color: #444444;"></i>
                </button>
                <h1 class="text-4xl font-bold">Dashboard Overview</h1>
            </div>
            <p class="text-sm text-gray-500 mb-6">Welcome back! Here's what's happening with your voting system.</p>
            <div class="flex flex-row flex-wrap gap-2">
                <!-- Analytics Card: Total Voter -->
                <div class="bg-white p-4 rounded-lg shadow-md max-w-xs w-72">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Total Voter</span>
                        <i class="ri-user-3-fill text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-bold text-gray-800 mb-1">1,234</span>
                        <span class="text-sm text-gray-500">Form Name: Presidential Election 2024</span>
                    </div>
                </div>
                <!-- Analytics Card: Active Candidates -->
                <div class="bg-white p-4 rounded-lg shadow-md max-w-xs w-72">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Active Candidates</span>
                        <i class="ri-user-star-fill text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-bold text-gray-800 mb-1">25</span>
                        <span class="text-sm text-gray-500">Form Name: Presidential Election 2024</span>
                    </div>
                </div>
                <!-- Analytics Card: Total Cast Votes -->
                <div class="bg-white p-4 rounded-lg shadow-md max-w-xs w-72">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Total Cast Votes</span>
                        <i class="ri-checkbox-multiple-fill text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-bold text-gray-800 mb-1">980</span>
                        <span class="text-sm text-gray-500">Form Name: Presidential Election 2024</span>
                    </div>
                </div>
                <!-- Analytics Card: Days Until Election -->
                <div class="bg-white p-4 rounded-lg shadow-md max-w-xs w-72">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Days Until Election</span>
                        <i class="ri-calendar-event-fill text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-bold text-gray-800 mb-1">15</span>
                        <span class="text-sm text-gray-500">Form Name: Presidential Election 2024</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-row gap-6 mt-8">
                <!-- Recent Activity Panel -->
                <div class="bg-white rounded-lg shadow-md p-6 flex-1 max-w-2xl">
                    <h2 class="text-xl font-bold mb-1">Recent Activity</h2>
                    <p class="text-xs text-gray-500 mb-4">Latest system activities and updates</p>
                    <ul class="max-h-64 overflow-y-auto space-y-3 text-sm">
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">[10:30 AM]</span> New voter registered: John Doe
                        </li>
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">[09:45 AM]</span> Candidate Jane Smith approved
                        </li>
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">[08:20 AM]</span> Backup completed successfully
                        </li>
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">[Yesterday, 05:15 PM]</span> Voting settings updated
                        </li>
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">[Yesterday, 03:00 PM]</span> New partylist added: Green Party
                        </li>
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">[2 days ago, 11:30 AM]</span> User admin created a new form
                        </li>
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">[2 days ago, 09:00 AM]</span> System maintenance completed
                        </li>
                        <li class="border rounded px-3 py-2">
                    </ul>
                </div>

                <!-- System Status Panel -->
                <div class="bg-white rounded-lg shadow-md p-6 w-80">
                    <h2 class="text-xl font-bold mb-1">System Status</h2>
                    <p class="text-xs text-gray-500 mb-4">Current system health and alerts</p>
                    <ul class="space-y-2 text-sm">
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">Server:</span> <span class="text-green-600">Online</span>
                        </li>
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">Database:</span> <span class="text-green-600">Connected</span>
                        </li>
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">Last Backup:</span> <span>Today, 03:00 AM</span>
                        </li>
                        <li class="border rounded px-3 py-2">
                            <span class="font-medium">Active Users:</span> <span>12</span>
                        </li>
                    </ul>
                </div>
            </div>


        </main>
    </div>
</body>
</html>
