<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Voter's Record</title>

    <!-- Google Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50 font-inter">
<div x-data="{ collapsed: false, loading: false }" class="flex min-h-screen">
    <!-- Sidebar -->
    @include('layout.partials.sidebar')

    <!-- Main Content -->
    <main class="flex-grow p-8 bg-gray-50">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row items-start gap-6 mb-8">
            <button
                @click="collapsed = !collapsed"
                class="p-3 rounded-lg bg-white shadow-sm hover:shadow-md hover:bg-gray-50 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                aria-label="Toggle sidebar"
            >
                <i class="ri-menu-line text-2xl text-gray-700"></i>
            </button>
            <div class="flex-1">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight leading-tight">Voters Record</h1>
                <p class="mt-3 text-base text-gray-600 max-w-2xl leading-relaxed">
                    A confidential database entry tracking an individual's election registration, voting history, and participation to verify eligibility and prevent fraud.
                </p>
            </div>
        </div>

        <!-- Analytics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 transition-all duration-300 mb-8"
             :class="collapsed ? 'gap-6' : 'gap-4'">

            <!-- Total Voters Card -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-200">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold text-gray-900">Total Voters</span>
                    <div class="p-2 bg-blue-50 rounded-lg">
                        <i class="ri-group-fill text-2xl text-blue-600"></i>
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-bold text-gray-900 mb-1">{{ $totalVoters ?? '1,234' }}</span>
                    <span class="text-sm text-gray-500">Registered voters</span>
                </div>
            </div>

            <!-- Verified Voters Card -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-200">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold text-gray-900">Verified Voters</span>
                    <div class="p-2 bg-green-50 rounded-lg">
                        <i class="ri-shield-check-fill text-2xl text-green-600"></i>
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-bold text-gray-900 mb-1">{{ $verifiedVoters ?? '1,050' }}</span>
                    <span class="text-sm text-gray-500">Identity confirmed</span>
                </div>
            </div>

            <!-- Vote Cast Card -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-200">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold text-gray-900">Vote Cast</span>
                    <div class="p-2 bg-purple-50 rounded-lg">
                        <i class="ri-checkbox-multiple-fill text-2xl text-purple-600"></i>
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-bold text-gray-900 mb-1">{{ $votesCast ?? '980' }}</span>
                    <span class="text-sm text-gray-500">Ballots submitted</span>
                </div>
            </div>

            <!-- Turnout Rate Card -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-200">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold text-gray-900">Turnout Rate</span>
                    <div class="p-2 bg-orange-50 rounded-lg">
                        <i class="ri-pie-chart-2-fill text-2xl text-orange-600"></i>
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="text-3xl font-bold text-gray-900 mb-1">{{ $turnoutRate ?? '79%' }}</span>
                    <span class="text-sm text-gray-500">Of registered voters</span>
                </div>
            </div>
        </div>

        <!-- Voter Directory Section -->
        <section class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
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
                            class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors"
                        />
                    </div>
                </div>

                <div class="sm:min-w-[140px]">
                    <label for="filter" class="block text-sm font-medium text-gray-700 mb-2">Filter By</label>
                    <select
                        id="filter"
                        name="by"
                        class="w-full border border-gray-300 rounded-lg py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors"
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
                        class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-3 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
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
