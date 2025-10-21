<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <div class="h-64 bg-gray-50 rounded-xl flex items-center justify-center chart-area">
                        <div class="text-center">
                            <i class="ri-bar-chart-line text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">Select a form to view its voting progress</p>
                            <p class="text-sm text-gray-400">Charts will display here</p>
                        </div>
                    </div>
                </div>

                <!-- Previous Forms Panel -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100" x-data="previousForms()">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Previous Forms</h2>
                            <p class="text-sm text-gray-500">Your created voting forms</p>
                        </div>
                        <a href="{{ route('ma-createForm') }}"
                           class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center gap-1">
                            <i class="ri-add-line"></i>
                            Create New
                        </a>
                    </div>

                    <div class="space-y-4 max-h-80 overflow-y-auto">
                        <template x-for="form in forms" :key="form.id">
                            <div class="group border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors cursor-pointer"
                                 @click="selectForm(form)">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-2">
                                            <h3 class="text-sm font-semibold text-gray-900 truncate" x-text="form.title"></h3>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium"
                                                  :class="form.status === 'active' ? 'bg-green-100 text-green-800' :
                                                         form.status === 'upcoming' ? 'bg-blue-100 text-blue-800' :
                                                         'bg-gray-100 text-gray-800'"
                                                  x-text="form.status.charAt(0).toUpperCase() + form.status.slice(1)">
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-1" x-text="form.organization"></p>
                                        <div class="flex items-center gap-4 text-xs text-gray-500">
                                            <span class="flex items-center gap-1">
                                                <i class="ri-group-line"></i>
                                                <span x-text="form.total_voters"></span> voters
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <i class="ri-checkbox-multiple-line"></i>
                                                <span x-text="form.total_votes"></span> votes
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-400 mt-2">
                                            Created <span x-text="formatDate(form.created_at)"></span>
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-2 ml-3">
                                        <button @click.stop="editForm(form)"
                                                class="opacity-0 group-hover:opacity-100 transition-opacity p-2 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600">
                                            <i class="ri-edit-line text-sm"></i>
                                        </button>
                                        <button @click.stop="viewResults(form)"
                                                class="opacity-0 group-hover:opacity-100 transition-opacity p-2 rounded-lg bg-gray-50 hover:bg-gray-100 text-gray-600">
                                            <i class="ri-bar-chart-line text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Empty State -->
                        <div x-show="forms.length === 0" class="text-center py-8">
                            <i class="ri-file-list-3-line text-4xl text-gray-300 mb-3"></i>
                            <p class="text-gray-500 text-sm">No forms created yet</p>
                            <a href="{{ route('ma-createForm') }}"
                               class="inline-flex items-center gap-2 mt-3 text-blue-600 hover:text-blue-700 text-sm font-medium">
                                <i class="ri-add-line"></i>
                                Create your first form
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function previousForms() {
            return {
                forms: [
                    {
                        id: 1,
                        title: "Student Government Election 2024",
                        organization: "University of the Philippines",
                        status: "active",
                        total_voters: 1234,
                        total_votes: 856,
                        created_at: "2024-01-15T10:30:00Z",
                        voting_data: [120, 150, 180, 200, 156, 134, 189]
                    },
                    {
                        id: 2,
                        title: "Department Head Selection",
                        organization: "Computer Science Department",
                        status: "completed",
                        total_voters: 45,
                        total_votes: 42,
                        created_at: "2024-01-10T14:20:00Z",
                        voting_data: [5, 8, 12, 15, 2, 0, 0]
                    },
                    {
                        id: 3,
                        title: "Club President Election",
                        organization: "Programming Society",
                        status: "upcoming",
                        total_voters: 67,
                        total_votes: 0,
                        created_at: "2024-01-20T09:15:00Z",
                        voting_data: [0, 0, 0, 0, 0, 0, 0]
                    }
                ],

                selectForm(form) {
                    this.updateMainChart(form);
                    this.$dispatch('form-selected', form);
                },

                editForm(form) {
                    // Create edit URL with form data as query parameters
                    const editUrl = `{{ route('ma-createForm') }}?edit=${form.id}&title=${encodeURIComponent(form.title)}&organization=${encodeURIComponent(form.organization)}`;
                    window.location.href = editUrl;
                },

                viewResults(form) {
                    // Redirect to results page or open modal
                    const resultsUrl = `/ma-elections/results/${form.id}`;
                    window.location.href = resultsUrl;
                },

                updateMainChart(form) {
                    const chartArea = document.querySelector('.chart-area');
                    if (chartArea) {
                        const maxVotes = Math.max(...form.voting_data);
                        chartArea.innerHTML = `
                            <div class="w-full h-full p-4">
                                <div class="text-center mb-6">
                                    <h4 class="font-semibold text-gray-800 mb-2">${form.title}</h4>
                                    <p class="text-sm text-gray-600 mb-4">Voting Progress Over Time</p>
                                </div>
                                <div class="grid grid-cols-7 gap-2 text-xs h-32">
                                    ${form.voting_data.map((votes, index) => `
                                        <div class="flex flex-col items-center justify-end h-full">
                                            <div class="bg-blue-500 rounded-t w-8 transition-all duration-500"
                                                 style="height: ${maxVotes > 0 ? (votes/maxVotes) * 80 : 4}px; min-height: 4px;"></div>
                                            <div class="mt-2 text-gray-500">Day ${index + 1}</div>
                                            <div class="font-medium text-gray-800">${votes}</div>
                                        </div>
                                    `).join('')}
                                </div>
                                <div class="mt-4 text-center">
                                    <div class="inline-flex items-center gap-4 text-sm text-gray-600">
                                        <span class="flex items-center gap-1">
                                            <div class="w-3 h-3 bg-blue-500 rounded"></div>
                                            Total Votes: ${form.total_votes}
                                        </span>
                                        <span>Participation: ${((form.total_votes/form.total_voters) * 100).toFixed(1)}%</span>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                },

                formatDate(dateString) {
                    const date = new Date(dateString);
                    return date.toLocaleDateString('en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric'
                    });
                },

                async loadForms() {
                    try {
                        const response = await fetch('/api/user-forms', {
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            }
                        });

                        if (response.ok) {
                            const data = await response.json();
                            this.forms = data.forms || this.forms;
                        }
                    } catch (error) {
                        console.error('Error loading forms:', error);
                    }
                },

                init() {
                    this.loadForms();

                    this.$watch('forms', () => {
                        if (this.forms.length > 0) {
                            const activeForm = this.forms.find(f => f.status === 'active') || this.forms[0];
                            this.selectForm(activeForm);
                        }
                    });

                    // Auto-select first form on load
                    this.$nextTick(() => {
                        if (this.forms.length > 0) {
                            const activeForm = this.forms.find(f => f.status === 'active') || this.forms[0];
                            this.selectForm(activeForm);
                        }
                    });
                }
            }
        }
    </script>

@else
    <script>
        window.location.href = "{{ route('home') }}";
    </script>
@endauth
</body>
</html>
