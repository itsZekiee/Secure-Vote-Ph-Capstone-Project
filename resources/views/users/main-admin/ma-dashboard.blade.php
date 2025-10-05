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
    <div x-data="{ collapsed: false }" class="flex">
        <!-- Sidebar -->
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
                            <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
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
                    <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
                    <ul class="max-h-64 overflow-y-auto space-y-3 text-sm">
                        <li>
                            <span class="font-medium">Admin</span> gave <span class="font-medium">Editor</span> role to <span class="font-medium">John Doe</span>
                            <span class="text-gray-400 ml-2">2 mins ago</span>
                        </li>
                        <li>
                            <span class="font-medium">Voting configuration</span> updated by <span class="font-medium">Jane Smith</span>
                            <span class="text-gray-400 ml-2">10 mins ago</span>
                        </li>
                        <li>
                            <span class="font-medium">Candidate</span> <span class="font-medium">Maria Cruz</span> added
                            <span class="text-gray-400 ml-2">30 mins ago</span>
                        </li>
                        <!-- More logs... -->
                    </ul>
                </div>
                <!-- System Status Panel -->
                <div class="bg-white rounded-lg shadow-md p-6 w-80">
                    <h2 class="text-xl font-semibold mb-4">System Status</h2>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <span class="font-medium">Server:</span> <span class="text-green-600">Online</span>
                        </li>
                        <li>
                            <span class="font-medium">Database:</span> <span class="text-green-600">Connected</span>
                        </li>
                        <li>
                            <span class="font-medium">Last Backup:</span> <span>Today, 03:00 AM</span>
                        </li>
                        <li>
                            <span class="font-medium">Active Users:</span> <span>12</span>
                        </li>
                        <!-- More status info... -->
                    </ul>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
