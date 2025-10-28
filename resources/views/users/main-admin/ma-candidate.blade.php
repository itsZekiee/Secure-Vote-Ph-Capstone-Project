<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Candidate</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Remix Icon CDN -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        /* Tailwind custom config */
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
    <!-- AlpineJS for modal and basic interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-slate-50 font-sans">
<div x-data="partylistManager()" class="flex min-h-screen">

    <!-- Sidebar include -->
    @include('layout.partials.sidebar')

    <main class="flex-1 p-4 lg:p-8">
        <!-- Header section -->
        <div class="flex items-center mb-8">
            <button x-on:click="collapsed = !collapsed"
                    class="p-2 rounded-xl bg-white shadow-sm border hover:bg-gray-50 transition-colors mr-4 lg:hidden">
                <i class="ri-menu-line text-xl text-gray-600"></i>
            </button>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                        <i class="ri-user-star-line text-white text-lg"></i>
                    </div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">Candidate</h1>
                </div>
                <p class="text-gray-600 text-sm lg:text-base max-w-2xl">
                    View, manage, and analyze all registered candidates and their details for the election.
                </p>
            </div>
        </div>

        <!-- Metrics cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
            <!-- Total Partylists -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Partylists</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $totalPartylists ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                        <i class="ri-flag-line text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Active -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active</p>
                        <p class="text-2xl font-bold text-green-600 mt-1">{{ $activePartylists ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                        <i class="ri-checkbox-circle-line text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total Members -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Members</p>
                        <p class="text-2xl font-bold text-blue-600 mt-1">{{ $totalMembers ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                        <i class="ri-team-line text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Candidates -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Candidates</p>
                        <p class="text-2xl font-bold text-orange-600 mt-1">{{ $totalCandidates ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center">
                        <i class="ri-user-star-line text-orange-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main list container -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                    <div class="flex-1 flex gap-4">
                        <div class="relative flex-1 max-w-md">
                            <!-- Search input -->
                            <input x-model="searchQuery"
                                   type="text"
                                   placeholder="Search partylists..."
                                   class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white" />
                            <i class="ri-search-line absolute left-3 top-3.5 text-gray-400"></i>
                        </div>
                        {{-- Status dropdown removed --}}
                    </div>

                    <div class="flex gap-3">
                        <!-- Export button -->
                        <button class="flex items-center gap-2 px-4 py-3 rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors">
                            <i class="ri-download-line"></i>
                            <span class="hidden sm:block">Export</span>
                        </button>

                        <!-- Add Candidate button toggles modal -->
                        <button @click="showModal = true"
                                class="flex items-center gap-2 bg-gradient-to-r from-purple-600 to-purple-700 text-white px-6 py-3 rounded-xl font-medium hover:from-purple-700 hover:to-purple-800 transition-all shadow-sm">
                            <i class="ri-add-line text-lg"></i>
                            <span>Add Candidate</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Empty state -->
            @if(empty($partylists) || count($partylists) === 0)
                <div class="flex flex-col items-center justify-center py-24 px-6">
                    <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center mb-6">
                        <i class="ri-flag-line text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-2">No candidates found</h3>
                    <p class="text-gray-500 text-center mb-8 max-w-md">
                        There are currently no candidates registered in the system.<br>
                        Get started by adding your first candidate.
                    </p>
                </div>
            @else
                <!-- Table listing partylists -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="text-left p-6 font-semibold text-gray-900 text-sm">Partylist</th>
                            <th class="text-left p-6 font-semibold text-gray-900 text-sm">Leader</th>
                            <th class="text-left p-6 font-semibold text-gray-900 text-sm">Members</th>
                            <th class="text-left p-6 font-semibold text-gray-900 text-sm">Candidates</th>
                            <th class="text-left p-6 font-semibold text-gray-900 text-sm">Status</th>
                            <th class="text-left p-6 font-semibold text-gray-900 text-sm">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        @foreach($partylists as $partylist)
                            <tr class="hover:bg-gray-50 transition-colors group">
                                <td class="p-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold text-lg">
                                            {{ $partylist->acronym ?? \Illuminate\Support\Str::substr($partylist->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">{{ $partylist->name }}</div>
                                            <div class="text-sm text-gray-500">Founded {{ $partylist->founded_year ?? 'N/A' }} • {{ $partylist->platform ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white font-semibold text-xs">
                                            {{ \Illuminate\Support\Str::of($partylist->leader_name)->split('/\s+/')->map(fn($n) => $n[0] ?? '')->implode('') }}
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">{{ $partylist->leader_name }}</div>
                                            <div class="text-sm text-gray-500">Party Leader</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <div class="flex items-center gap-2">
                                        <span class="text-2xl font-bold text-gray-900">{{ $partylist->members_count }}</span>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <div class="flex items-center gap-3">
                                        <span class="text-lg font-semibold text-gray-900">{{ $partylist->candidates_count }}</span>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <!-- Status badges -->
                                    @if($partylist->status === 'active')
                                        <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 px-3 py-1 rounded-lg text-sm font-medium">
                                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                            Active
                                        </span>
                                    @elseif($partylist->status === 'pending')
                                        <span class="inline-flex items-center gap-1 bg-yellow-50 text-yellow-700 px-3 py-1 rounded-lg text-sm font-medium">
                                            <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                            Pending
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 bg-gray-50 text-gray-700 px-3 py-1 rounded-lg text-sm font-medium">
                                            <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="p-6">
                                    <div class="flex items-center gap-2">
                                        <button class="p-2 rounded-lg text-gray-600 hover:text-purple-600 hover:bg-purple-50 transition-colors">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                        <button class="p-2 rounded-lg text-gray-600 hover:text-purple-600 hover:bg-purple-50 transition-colors">
                                            <i class="ri-pencil-line"></i>
                                        </button>
                                        <button class="p-2 rounded-lg text-gray-600 hover:text-red-600 hover:bg-red-50 transition-colors">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Modal: Add New Candidate -->
        <!-- Uses AlpineJS showModal to toggle visibility -->
        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4">
            <div x-show="showModal"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="scale-95 opacity-0"
                 x-transition:enter-end="scale-100 opacity-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="scale-100 opacity-100"
                 x-transition:leave-end="scale-95 opacity-0"
                 class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

                <!-- Modal header -->
                <div class="flex items-center justify-between p-6 border-b border-gray-100">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Add New Candidate</h2>
                        <p class="text-gray-600 text-sm mt-1">Register a candidate for the election</p>
                    </div>
                    <button @click="showModal = false"
                            class="p-2 rounded-xl text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>

                <!-- Enhanced candidate form (incumbent removed) -->
                <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf

                    <!-- Name and Partylist -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Full Name</label>
                            <input name="full_name" type="text" required
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   placeholder="First Last" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Partylist</label>
                            <select name="partylist_id" required
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all">
                                <option value="">Select partylist</option>
                                @foreach($partylists ?? [] as $party)
                                    <option value="{{ $party->id }}">{{ $party->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Position, DOB, Gender -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Position</label>
                            <select name="position_id" required
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all">
                                <option value="">Select position</option>
                                @foreach($positions ?? [] as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Date of Birth</label>
                            <input name="dob" type="date"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Gender</label>
                            <select name="gender"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all">
                                <option value="">Prefer not to say</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <!-- Contact: Email & Phone -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
                            <input name="email" type="email"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all"
                                   placeholder="candidate@example.com" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Phone</label>
                            <input name="phone" type="tel"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all"
                                   placeholder="+63 9xx xxx xxxx" />
                        </div>
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Address</label>
                        <textarea name="address" rows="2"
                                  class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all resize-none"
                                  placeholder="City, Province, Country"></textarea>
                    </div>

                    <!-- Education and Website -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Education</label>
                            <input name="education" type="text"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all"
                                   placeholder="e.g. BS Political Science" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Website / Social Link</label>
                            <input name="website" type="url"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all"
                                   placeholder="https://..." />
                        </div>
                    </div>

                    <!-- Slogan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Campaign Slogan</label>
                        <input name="slogan" type="text"
                               class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all"
                               placeholder="Short campaign slogan" />
                    </div>

                    <!-- Photo and Status (incumbent removed, layout fixed) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Candidate Photo</label>
                            <input name="photo" type="file" accept="image/*"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-600 file:font-medium" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Status</label>
                            <select name="status"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all">
                                <option value="pending">Pending</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Biography -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Biography</label>
                        <textarea name="bio" rows="4"
                                  class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"
                                  placeholder="Short biography, platform, and message to voters..."></textarea>
                    </div>

                    <!-- Modal actions -->
                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <button type="button"
                                @click="showModal = false"
                                class="px-6 py-3 rounded-xl border border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                                class="px-6 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-purple-700 text-white font-medium hover:from-purple-700 hover:to-purple-800 transition-all shadow-sm">
                            Create Candidate
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<!-- AlpineJS component state -->
<script>
    function partylistManager() {
        return {
            collapsed: false,
            showModal: false,
            searchQuery: '',
            loading: false,
            selectedOrganization: '',
            showNewOrgInput: false
        }
    }
</script>
</body>
</html>
