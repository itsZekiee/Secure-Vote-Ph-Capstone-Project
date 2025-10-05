<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Voter's Record</title>

    <!-- Google Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Alpine.js for interactivity -->
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
                    <h1 class="text-4xl font-bold">Voters Record</h1>
                    <p class="mt-1 text-sm text-gray-500 max-w-xl">
                        A confidential database entry tracking an individual's election registration, voting history, and participation to verify eligibility and prevent fraud.
                    </p>
                </div>
            </div>

            {{-- Analytics cards: responsive grid with dynamic gap based on `collapsed` --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 transition-all"
                 :class="collapsed ? 'gap-6' : 'gap-3'">

                <!-- Analytics Card: Total Voters -->
                <div class="bg-white p-4 rounded-lg shadow-md min-w-0">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Total Voters</span>
                        <i class="ri-group-fill text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-bold text-gray-800 mb-1">{{ $totalVoters ?? '1,234' }}</span>
                        <span class="text-sm text-gray-500">Registered voters</span>
                    </div>
                </div>

                <!-- Analytics Card: Verified Voters -->
                <div class="bg-white p-4 rounded-lg shadow-md min-w-0">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Verified Voters</span>
                        <i class="ri-shield-check-fill text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-bold text-gray-800 mb-1">{{ $verifiedVoters ?? '1,050' }}</span>
                        <span class="text-sm text-gray-500">Identity confirmed</span>
                    </div>
                </div>

                <!-- Analytics Card: Vote Cast -->
                <div class="bg-white p-4 rounded-lg shadow-md min-w-0">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Vote Cast</span>
                        <i class="ri-checkbox-multiple-fill text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-bold text-gray-800 mb-1">{{ $votesCast ?? '980' }}</span>
                        <span class="text-sm text-gray-500">Ballots submitted</span>
                    </div>
                </div>

                <!-- Analytics Card: Turnout Rate -->
                <div class="bg-white p-4 rounded-lg shadow-md min-w-0">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Turnout Rate</span>
                        <i class="ri-pie-chart-2-fill text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-bold text-gray-800 mb-1">{{ $turnoutRate ?? '79%' }}</span>
                        <span class="text-sm text-gray-500">Of registered voters</span>
                    </div>
                </div>
            </div>

            {{-- Voter Directory panel (place below the analytics grid) --}}
            <section class="bg-white rounded-lg shadow-md p-6 mt-8">
                <h2 class="text-xl font-bold">Voter Directory</h2>
                <p class="text-xs text-gray-500 mb-4">View and manage all registered voters</p>

                <form method="GET" class="flex flex-col sm:flex-row gap-3 sm:items-center mb-4">
                    <div class="relative flex-1">
                        <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input
                            type="text"
                            name="q"
                            value="{{ request('q') }}"
                            placeholder="Search voters..."
                            class="w-full border rounded-md pl-10 pr-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        />
                    </div>

                    <select name="by" class="border rounded-md py-2 px-3 text-sm">
                        <option value="">Filter by</option>
                        <option value="name" {{ request('by')=='name' ? 'selected' : '' }}>Full Name</option>
                        <option value="email" {{ request('by')=='email' ? 'selected' : '' }}>Email</option>
                        <option value="contact" {{ request('by')=='contact' ? 'selected' : '' }}>Contact Number</option>
                        <option value="id" {{ request('by')=='id' ? 'selected' : '' }}>User ID</option>
                    </select>

                    <button type="submit" class="bg-indigo-600 text-white text-sm font-medium px-4 py-2 rounded-md">Search</button>
                    <a href="{{ url()->current() }}" class="text-sm text-gray-600 underline">Reset</a>
                </form>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left font-medium text-gray-600">USER ID</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-600">Full Name</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-600">Email</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-600">Password \[hash code\]</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-600">Contact Number</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-600">Last Log In</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        @forelse(($voters ?? []) as $voter)
                            @php
                                $full = trim(($voter->first_name ?? '').' '.($voter->last_name ?? ''));
                                $full = $full !== '' ? $full : ($voter->name ?? 'N/A');
                                $hash = $voter->password ?? '';
                                $lastLogin = $voter->last_login_at ?? $voter->last_login ?? null;
                            @endphp
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-800">{{ $voter->id ?? '—' }}</td>
                                <td class="px-4 py-3">{{ $full }}</td>
                                <td class="px-4 py-3">{{ $voter->email ?? '—' }}</td>
                                <td class="px-4 py-3">
                                    <span class="font-mono inline-block max-w-[240px] truncate align-bottom" title="{{ $hash }}">{{ $hash }}</span>
                                </td>
                                <td class="px-4 py-3">{{ $voter->contact_number ?? $voter->phone ?? '—' }}</td>
                                <td class="px-4 py-3 text-gray-600">
                                    @if($lastLogin)
                                        {{ \Illuminate\Support\Carbon::parse($lastLogin)->diffForHumans() }}
                                    @else
                                        —
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">No voters found.</td>
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
