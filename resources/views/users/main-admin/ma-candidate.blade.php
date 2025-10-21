<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Candidate</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-slate-50 font-sans">
<div x-data="partylistManager()" class="flex min-h-screen">
    @include('layout.partials.sidebar')
    <main class="flex-1 p-4 lg:p-8">
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
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
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
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                    <div class="flex-1 flex gap-4">
                        <div class="relative flex-1 max-w-md">
                            <input x-model="searchQuery"
                                   type="text"
                                   placeholder="Search partylists..."
                                   class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white" />
                            <i class="ri-search-line absolute left-3 top-3.5 text-gray-400"></i>
                        </div>
                        {{-- Status dropdown removed --}}
                    </div>
                    <div class="flex gap-3">
                        <button class="flex items-center gap-2 px-4 py-3 rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors">
                            <i class="ri-download-line"></i>
                            <span class="hidden sm:block">Export</span>
                        </button>
                        <button @click="showModal = true"
                                class="flex items-center gap-2 bg-gradient-to-r from-purple-600 to-purple-700 text-white px-6 py-3 rounded-xl font-medium hover:from-purple-700 hover:to-purple-800 transition-all shadow-sm">
                            <i class="ri-add-line text-lg"></i>
                            <span>Add Partylist</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Empty State --}}
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
                {{-- Table --}}
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
                {{-- Pagination (optional, if using pagination) --}}
                {{-- <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                    {{ $partylists->links() }}
                </div> --}}
            @endif
        </div>
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
                <div class="flex items-center justify-between p-6 border-b border-gray-100">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Add New Partylist</h2>
                        <p class="text-gray-600 text-sm mt-1">Create a new political partylist organization</p>
                    </div>
                    <button @click="showModal = false"
                            class="p-2 rounded-xl text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
                <form class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Partylist Name *</label>
                            <input type="text"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   placeholder="Enter partylist name" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Acronym</label>
                            <input type="text"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   placeholder="e.g., PA, DC, UF" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Party Leader *</label>
                            <input type="text"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   placeholder="Enter leader's name" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Founded Year</label>
                            <input type="number"
                                   min="1900"
                                   max="2024"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   placeholder="2024" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Contact Email</label>
                            <input type="email"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   placeholder="contact@partylist.com" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Party Logo</label>
                            <input type="file"
                                   accept="image/*"
                                   class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-600 file:font-medium" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Party Platform</label>
                        <textarea rows="4"
                                  class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"
                                  placeholder="Describe the partylist's mission, vision, and political platform..."></textarea>
                    </div>
                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <button type="button"
                                @click="showModal = false"
                                class="px-6 py-3 rounded-xl border border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                                class="px-6 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-purple-700 text-white font-medium hover:from-purple-700 hover:to-purple-800 transition-all shadow-sm">
                            Create Partylist
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<script>
    function partylistManager() {
        return {
            collapsed: false,
            showModal: false,
            searchQuery: '',
            loading: false
        }
    }
</script>
</body>
</html>
