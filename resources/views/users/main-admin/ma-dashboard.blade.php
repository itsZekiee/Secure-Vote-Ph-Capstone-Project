<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Dashboard</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif']
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8'
                        }
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-slate-50 font-sans">
@auth
    <div x-data="{
        collapsed: false,
        stats: {
            voters: 1234,
            candidates: 25,
            votes: 980,
            daysLeft: 15
        }
    }" class="flex min-h-screen">
        <!-- Sidebar -->
        @include('layout.partials.sidebar')

        <!-- Main Content -->
        <main class="flex-1 p-4 lg:p-8">
            <!-- Header Section -->
            <div class="flex items-center mb-8">
                <button x-on:click="collapsed = !collapsed"
                        class="p-2 rounded-xl bg-white shadow-sm border hover:bg-gray-50 transition-colors mr-4 lg:hidden">
                    <i class="ri-menu-line text-xl text-gray-600"></i>
                </button>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                            <i class="ri-dashboard-line text-white text-lg"></i>
                        </div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">Dashboard</h1>
                    </div>
                    <p class="text-gray-600 text-sm lg:text-base max-w-2xl">
                        Welcome back, {{ auth()->user()->name }}. Monitor election progress, track voting statistics, and manage system activities.
                    </p>
                </div>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition
                     class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center justify-between mb-8">
                    <div class="flex items-center gap-2">
                        <i class="ri-check-circle-line text-emerald-600"></i>
                        {{ session('success') }}
                    </div>
                    <button @click="show = false" class="text-emerald-600 hover:text-emerald-800">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Voters</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1" x-text="stats.voters.toLocaleString()"></p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center">
                            <i class="ri-group-fill text-indigo-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Active Candidates</p>
                            <p class="text-2xl font-bold text-emerald-600 mt-1" x-text="stats.candidates"></p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <i class="ri-user-star-fill text-emerald-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Votes Cast</p>
                            <p class="text-2xl font-bold text-blue-600 mt-1" x-text="stats.votes.toLocaleString()"></p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <i class="ri-checkbox-multiple-fill text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Days Remaining</p>
                            <p class="text-2xl font-bold text-rose-600 mt-1" x-text="stats.daysLeft"></p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center">
                            <i class="ri-calendar-event-fill text-rose-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Activity Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Voting Progress Chart -->
                <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Voting Progress</h2>
                            <p class="text-sm text-gray-500">Real-time voting statistics</p>
                        </div>
                        <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 focus:bg-white">
                            <option>Last 7 days</option>
                            <option>Last 30 days</option>
                            <option>All time</option>
                        </select>
                    </div>

                    <!-- Mock Chart Area -->
                    <div class="h-64 bg-gray-50 rounded-xl flex items-center justify-center">
                        <div class="text-center">
                            <i class="ri-bar-chart-line text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">Chart visualization area</p>
                            <p class="text-sm text-gray-400">Integration with Chart.js or similar</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Timeline -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Recent Activity</h2>
                            <p class="text-sm text-gray-500">Latest system events</p>
                        </div>
                        <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">View all</button>
                    </div>

                    <div class="space-y-4 max-h-80 overflow-y-auto">
                        <div class="flex gap-3">
                            <div class="flex-shrink-0 w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                <i class="ri-user-add-line text-indigo-600 text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-900 font-medium">New voter registered</p>
                                <p class="text-sm text-gray-500">John Doe joined the system</p>
                                <p class="text-xs text-gray-400 mt-1">10:30 AM</p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <div class="flex-shrink-0 w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                <i class="ri-user-star-line text-emerald-600 text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-900 font-medium">Candidate approved</p>
                                <p class="text-sm text-gray-500">Jane Smith was approved</p>
                                <p class="text-xs text-gray-400 mt-1">09:45 AM</p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="ri-database-2-line text-blue-600 text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-900 font-medium">Backup completed</p>
                                <p class="text-sm text-gray-500">System backup successful</p>
                                <p class="text-xs text-gray-400 mt-1">08:20 AM</p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <div class="flex-shrink-0 w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center">
                                <i class="ri-settings-3-line text-amber-600 text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-900 font-medium">Settings updated</p>
                                <p class="text-sm text-gray-500">Voting configuration changed</p>
                                <p class="text-xs text-gray-400 mt-1">Yesterday, 5:15 PM</p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <div class="flex-shrink-0 w-8 h-8 bg-teal-100 rounded-full flex items-center justify-center">
                                <i class="ri-group-line text-teal-600 text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-900 font-medium">New partylist added</p>
                                <p class="text-sm text-gray-500">Green Party registered</p>
                                <p class="text-xs text-gray-400 mt-1">Yesterday, 3:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@else
    <script>
        window.location.href = "{{ route('home') }}";
    </script>
@endauth
</body>
</html>
