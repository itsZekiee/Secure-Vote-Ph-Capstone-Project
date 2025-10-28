<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Analytics</title>
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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 font-sans">
<div x-data="analyticsData()" class="flex min-h-screen">
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
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                        <i class="ri-bar-chart-line text-white text-lg"></i>
                    </div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">Analytics Dashboard</h1>
                </div>
                <p class="text-gray-600 text-sm lg:text-base max-w-2xl">
                    Comprehensive voting analytics and insights for secure election management and monitoring.
                </p>
            </div>
            <div class="flex gap-3">
                @php
                    // remove once create a database
                    $organizations = $organizations ?? [
                        ['id' => 'comelec', 'name' => 'Commission on Elections (COMELEC)'],
                        ['id' => 'deped',  'name' => 'Department of Education (DepEd)'],
                        ['id' => 'dilg',   'name' => 'Department of the Interior and Local Government (DILG)'],
                    ];
                @endphp

                <select id="organizationSelect" name="organization"
                        class="w-56 px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Select organization</option>
                    @foreach($organizations as $org)
                        <option value="{{ $org['id'] }}">{{ $org['name'] }}</option>
                    @endforeach
                </select>

                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="ri-download-line mr-2"></i>Export
                </button>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Voters</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1" x-text="stats.totalVoters.toLocaleString()"></p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                        <i class="ri-user-line text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-green-600 text-sm font-medium">+12%</span>
                    <span class="text-gray-600 text-sm ml-2">vs last month</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Elections</p>
                        <p class="text-2xl font-bold text-emerald-600 mt-1" x-text="stats.activeElections"></p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center">
                        <i class="ri-vote-line text-emerald-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-green-600 text-sm font-medium">+3</span>
                    <span class="text-gray-600 text-sm ml-2">new this week</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Votes Cast</p>
                        <p class="text-2xl font-bold text-purple-600 mt-1" x-text="stats.votesCast.toLocaleString()"></p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                        <i class="ri-checkbox-line text-purple-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-green-600 text-sm font-medium">+8.5%</span>
                    <span class="text-gray-600 text-sm ml-2">turnout rate</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Security Score</p>
                        <p class="text-2xl font-bold text-orange-600 mt-1">98.7%</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center">
                        <i class="ri-shield-check-line text-orange-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-green-600 text-sm font-medium">Excellent</span>
                    <span class="text-gray-600 text-sm ml-2">system health</span>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Voting Trends Chart -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <h3 class="text-lg font-semibold text-gray-900">Voting Trends</h3>
                        <select x-model="selectedTrendsView" @change="updateTrendsChart()" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="votes">Total Votes</option>
                            <option value="turnout">Turnout Rate</option>
                            <option value="registrations">New Registrations</option>
                            <option value="participation">Participation Rate</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button x-bind:class="selectedTrendsPeriod === 'daily' ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-gray-100'" @click="selectedTrendsPeriod = 'daily'; updateTrendsChart()" class="px-3 py-1 text-sm rounded-md">Daily</button>
                        <button x-bind:class="selectedTrendsPeriod === 'weekly' ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-gray-100'" @click="selectedTrendsPeriod = 'weekly'; updateTrendsChart()" class="px-3 py-1 text-sm rounded-md">Weekly</button>
                        <button x-bind:class="selectedTrendsPeriod === 'monthly' ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-gray-100'" @click="selectedTrendsPeriod = 'monthly'; updateTrendsChart()" class="px-3 py-1 text-sm rounded-md">Monthly</button>
                    </div>
                </div>
                <div class="h-64 relative">
                    <canvas id="votingTrendsChart"></canvas>
                </div>
            </div>

            <!-- Voter Demographics -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <h3 class="text-lg font-semibold text-gray-900">Voter Demographics</h3>
                        <select x-model="selectedDemographicView" @change="updateDemographicsChart()" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="age">Partylist 1</option>
                            <option value="gender">Partylist 2</option>
                            <option value="region">Partylist 3</option>
                            <option value="education">Partylist 4</option>
                            <option value="occupation">Partylist 5</option>
                        </select>
                    </div>
                    <div class="text-sm text-gray-500">
                        <span x-text="getTotalDemographicCount()"></span> voters
                    </div>
                </div>
                <div class="h-64 relative">
                    <canvas id="demographicsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Election Results & Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Elections -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Recent Elections</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 font-medium text-gray-600">Election</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-600">Date</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-600">Turnout</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-600">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <template x-for="election in recentElections" :key="election.id">
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="font-medium text-gray-900" x-text="election.name"></div>
                                    <div class="text-sm text-gray-600" x-text="election.type"></div>
                                </td>
                                <td class="py-3 px-4 text-gray-600" x-text="election.date"></td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="w-12 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-blue-600 h-2 rounded-full" :style="`width: ${election.turnout}%`"></div>
                                        </div>
                                        <span class="text-sm text-gray-600" x-text="`${election.turnout}%`"></span>
                                    </div>
                                </td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-2 py-1 text-xs rounded-full font-medium"
                                        :class="election.status === 'Completed' ? 'bg-green-100 text-green-700' : election.status === 'Active' ? 'bg-blue-100 text-blue-700' : 'bg-yellow-100 text-yellow-700'"
                                        x-text="election.status">
                                    </span>
                                </td>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- System Activity -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">System Activity</h3>
                <div class="space-y-4">
                    <template x-for="activity in systemActivity" :key="activity.id">
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 rounded-full bg-blue-500 mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900" x-text="activity.description"></p>
                                <p class="text-xs text-gray-500 mt-1" x-text="activity.time"></p>
                            </div>
                        </div>
                    </template>
                </div>
                <button class="w-full mt-4 py-2 text-sm text-blue-600 hover:text-blue-700 border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors">
                    View All Activities
                </button>
            </div>
        </div>
    </main>
</div>

<script>
    function analyticsData() {
        return {
            collapsed: false,
            stats: {
                totalVoters: 145820,
                activeElections: 7,
                votesCast: 98547
            },
            recentElections: [
                { id: 1, name: 'Presidential Election 2024', type: 'National', date: 'Dec 15, 2024', turnout: 87, status: 'Completed' },
                { id: 2, name: 'Local Government Elections', type: 'Regional', date: 'Dec 10, 2024', turnout: 72, status: 'Completed' },
                { id: 3, name: 'Senate Elections', type: 'National', date: 'Dec 5, 2024', turnout: 65, status: 'Active' },
                { id: 4, name: 'Municipal Elections', type: 'Local', date: 'Nov 28, 2024', turnout: 58, status: 'Pending' }
            ],
            systemActivity: [
                { id: 1, description: 'New voter registration approved', time: '2 minutes ago' },
                { id: 2, description: 'Election security audit completed', time: '15 minutes ago' },
                { id: 3, description: 'Backup system synchronized', time: '1 hour ago' },
                { id: 4, description: 'Vote tallying process initiated', time: '2 hours ago' },
                { id: 5, description: 'System maintenance completed', time: '3 hours ago' }
            ],
            selectedTrendsView: 'votes',
            selectedTrendsPeriod: 'monthly',
            selectedDemographicView: 'age',
            getTotalDemographicCount() {
                return '145,820';
            },
            updateTrendsChart() {
                // Chart update logic
            },
            updateDemographicsChart() {
                // Chart update logic
            },
            initCharts() {
                // Voting Trends Chart
                const trendsCtx = document.getElementById('votingTrendsChart').getContext('2d');
                new Chart(trendsCtx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Votes Cast',
                            data: [12000, 15000, 13500, 18000, 16500, 20000, 22000, 19500, 21000, 24000, 26500, 28000],
                            borderColor: '#2563eb',
                            backgroundColor: 'rgba(37, 99, 235, 0.1)',
                            tension: 0.4,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: '#f3f4f6'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });

                // Demographics Chart
                const demoCtx = document.getElementById('demographicsChart').getContext('2d');
                new Chart(demoCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['18-25', '26-35', '36-45', '46-55', '55+'],
                        datasets: [{
                            data: [23, 28, 22, 15, 12],
                            backgroundColor: [
                                '#2563eb',
                                '#06B6D4',
                                '#10B981',
                                '#F59E0B',
                                '#EF4444'
                            ],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 20,
                                    usePointStyle: true
                                }
                            }
                        }
                    }
                });
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(() => {
            const data = analyticsData();
            data.initCharts();
        }, 100);
    });
</script>
</body>
</html>
