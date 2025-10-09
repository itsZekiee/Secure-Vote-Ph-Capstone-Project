<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Voter's Record</title>
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
<body class="bg-gray-50 font-sans">
<div x-data="{ collapsed: false, loading: false }" class="flex min-h-screen">
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
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                        <i class="ri-user-search-line text-white text-lg"></i>
                    </div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">Voters Record</h1>
                </div>
                <p class="text-gray-600 text-sm lg:text-base max-w-2xl">
                    A confidential database entry tracking an individual's election registration, voting history, and participation to verify eligibility and prevent fraud.
                </p>
            </div>
        </div>

        <!-- Analytics Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
            <!-- Total Voters Card -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Voters</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $totalVoters ?? '1,234' }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                        <i class="ri-group-fill text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-gray-500 text-sm">Registered voters</span>
                </div>
            </div>

            <!-- Verified Voters Card -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Verified Voters</p>
                        <p class="text-2xl font-bold text-emerald-600 mt-1">{{ $verifiedVoters ?? '1,050' }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center">
                        <i class="ri-shield-check-fill text-emerald-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-gray-500 text-sm">Identity confirmed</span>
                </div>
            </div>

            <!-- Vote Cast Card -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Vote Cast</p>
                        <p class="text-2xl font-bold text-purple-600 mt-1">{{ $votesCast ?? '980' }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                        <i class="ri-checkbox-multiple-fill text-purple-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-gray-500 text-sm">Ballots submitted</span>
                </div>
            </div>

            <!-- Turnout Rate Card -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Turnout Rate</p>
                        <p class="text-2xl font-bold text-orange-600 mt-1">{{ $turnoutRate ?? '79%' }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center">
                        <i class="ri-pie-chart-2-fill text-orange-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-gray-500 text-sm">Of registered voters</span>
                </div>
            </div>
        </div>

        <!-- Voter Directory Section -->
        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Voter Directory</h2>
                <p class="text-sm text-gray-600">View and manage all registered voters</p>
            </div>

            <!-- Search and Filter Form -->
            <form method="GET" class="flex flex-col sm:flex-row gap-4 sm:items-end mb-6">
                <div class="relative flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Voters</label>
                    <div class="relative">
                        <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input
                            type="text"
                            id="search"
                            name="q"
                            value="{{ request('q') }}"
                            placeholder="Search voters..."
                            class="w-full border border-gray-200 rounded-lg pl-10 pr-4 py-3 text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
                        />
                    </div>
                </div>

                <div class="sm:min-w-[140px]">
                    <label for="filter" class="block text-sm font-medium text-gray-700 mb-2">Filter By</label>
                    <select
                        id="filter"
                        name="by"
                        class="w-full border border-gray-200 rounded-lg py-3 px-4 text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
                    >
                        <option value="">All Fields</option>
                        <option value="name" {{ request('by')=='name' ? 'selected' : '' }}>Full Name</option>
                        <option value="email" {{ request('by')=='email' ? 'selected' : '' }}>Email</option>
                        <option value="contact" {{ request('by')=='contact' ? 'selected' : '' }}>Contact Number</option>
                        <option value="id" {{ request('by')=='id' ? 'selected' : '' }}>User ID</option>
                    </select>
                </div>

                <div class="flex gap-3">
                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-6 py-3 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        Search
                    </button>
                    <a
                        href="{{ url()->current() }}"
                        class="text-sm text-gray-600 hover:text-gray-800 underline px-3 py-3 transition-colors"
                    >
                        Reset
                    </a>
                </div>
            </form>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700">USER ID</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700">Full Name</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700">Password \[hash code\]</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700">Contact Number</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700">Last Log In</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse(($voters ?? []) as $voter)
                        @php
                            $full = trim(($voter->first_name ?? '').' '.($voter->last_name ?? ''));
                            $full = $full !== '' ? $full : ($voter->name ?? 'N/A');
                            $hash = $voter->password ?? '';
                            $lastLogin = $voter->last_login_at ?? $voter->last_login ?? null;
                        @endphp
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-gray-900 font-medium">{{ $voter->id ?? '—' }}</td>
                            <td class="px-6 py-4 text-gray-900">{{ $full }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $voter->email ?? '—' }}</td>
                            <td class="px-6 py-4">
                                <span class="font-mono text-xs bg-gray-100 px-2 py-1 rounded inline-block max-w-[200px] truncate align-bottom" title="{{ $hash }}">{{ $hash }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $voter->contact_number ?? $voter->phone ?? '—' }}</td>
                            <td class="px-6 py-4 text-gray-600">
                                @if($lastLogin)
                                    <span class="text-sm">{{ \Illuminate\Support\Carbon::parse($lastLogin)->diffForHumans() }}</span>
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="ri-user-search-line text-4xl text-gray-300 mb-4"></i>
                                    <p class="text-gray-500 font-medium">No voters found</p>
                                    <p class="text-gray-400 text-sm">Try adjusting your search criteria</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>
</body>
</html>
