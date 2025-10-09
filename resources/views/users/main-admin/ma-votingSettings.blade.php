<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Voting Settings</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0c4a6e',
                        },
                        dark: {
                            800: '#1f2937',
                            900: '#111827',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'pulse-subtle': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            from { transform: translateY(10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-50 font-inter antialiased">
<div x-data="{ collapsed: false, activeTab: 'registration' }" class="flex min-h-screen">
    <!-- Sidebar -->
    @include('layout.partials.sidebar')

    <!-- Main Content -->
    <main class="flex-grow p-6 bg-gray-100">
        <!-- Header -->
        <header class="sticky top-0 z-40 bg-white/80 backdrop-blur-xl border-b border-gray-200/50 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button @click="collapsed = !collapsed"
                            class="lg:hidden p-2 rounded-xl hover:bg-gray-100 transition-colors">
                        <i class="ri-menu-line text-xl text-gray-600"></i>
                    </button>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Voting Settings</h1>
                        <p class="text-sm text-gray-500">Configure voter registration and security settings</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2 px-3 py-1.5 bg-green-50 text-green-700 rounded-full text-sm font-medium">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse-subtle"></div>
                        System Active
                    </div>
                </div>
            </div>
        </header>

        <!-- Tab Navigation -->
        <nav class="px-6 pt-6 pb-2">
            <div class="flex space-x-1 bg-gray-100 p-1 rounded-xl max-w-fit">
                <button @click="activeTab = 'registration'"
                        :class="activeTab === 'registration' ? 'bg-white text-primary-600 shadow-sm' : 'text-gray-600 hover:text-gray-900'"
                        class="flex items-center gap-2 px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 whitespace-nowrap">
                    <i class="ri-user-add-line"></i>Registration
                </button>
                <button @click="activeTab = 'verification'"
                        :class="activeTab === 'verification' ? 'bg-white text-primary-600 shadow-sm' : 'text-gray-600 hover:text-gray-900'"
                        class="flex items-center gap-2 px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 whitespace-nowrap">
                    <i class="ri-shield-check-line"></i>Verification
                </button>
                <button @click="activeTab = 'geolocation'"
                        :class="activeTab === 'geolocation' ? 'bg-white text-primary-600 shadow-sm' : 'text-gray-600 hover:text-gray-900'"
                        class="flex items-center gap-2 px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 whitespace-nowrap">
                    <i class="ri-map-pin-line"></i>Geo Restrictions
                </button>
                <button @click="activeTab = 'security'"
                        :class="activeTab === 'security' ? 'bg-white text-primary-600 shadow-sm' : 'text-gray-600 hover:text-gray-900'"
                        class="flex items-center gap-2 px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 whitespace-nowrap">
                    <i class="ri-lock-2-line"></i>Security
                </button>
                <button @click="activeTab = 'notifications'"
                        :class="activeTab === 'notifications' ? 'bg-white text-primary-600 shadow-sm' : 'text-gray-600 hover:text-gray-900'"
                        class="flex items-center gap-2 px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 whitespace-nowrap">
                    <i class="ri-notification-3-line"></i>Notifications
                </button>
            </div>
        </nav>

        <!-- Content Panels -->
        <div class="p-6 space-y-6">
            <!-- Registration Settings -->
            <div x-show="activeTab === 'registration'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 class="max-w-5xl">
                <form x-data="{ saving: false }" class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center">
                                <i class="ri-user-add-line text-primary-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">Registration Configuration</h2>
                                <p class="text-sm text-gray-500">Define voter registration rules and requirements</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 space-y-8">
                        <!-- Basic Settings -->
                        <div class="space-y-4">
                            <h3 class="text-base font-medium text-gray-900 flex items-center gap-2">
                                <i class="ri-settings-3-line text-primary-600"></i>
                                Basic Registration Rules
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div class="space-y-2">
                                    <label for="min_age" class="block text-sm font-medium text-gray-700">Minimum Age</label>
                                    <input id="min_age" name="min_age" type="number" min="0" value="18"
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200">
                                </div>

                                <div class="space-y-2">
                                    <label for="registration_deadline" class="block text-sm font-medium text-gray-700">Registration Deadline</label>
                                    <input id="registration_deadline" name="registration_deadline" type="datetime-local"
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200">
                                </div>

                                <div class="space-y-2">
                                    <label for="max_reg_per_ip" class="block text-sm font-medium text-gray-700">Max Registrations per IP (daily)</label>
                                    <input id="max_reg_per_ip" name="max_reg_per_ip" type="number" min="0" value="5"
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="allowed_domains" class="block text-sm font-medium text-gray-700">Allowed Email Domains</label>
                                <input id="allowed_domains" name="allowed_domains" type="text"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200"
                                       placeholder="example.com, university.edu (leave empty to allow all)">
                            </div>
                        </div>

                        <!-- Registration Methods -->
                        <div class="space-y-4">
                            <h3 class="text-base font-medium text-gray-900 flex items-center gap-2">
                                <i class="ri-login-box-line text-primary-600"></i>
                                Registration Methods
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-mail-line text-blue-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Email Registration</p>
                                            <p class="text-sm text-gray-500">Allow signup via email address</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="allow_email_registration" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-phone-line text-green-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Phone Registration</p>
                                            <p class="text-sm text-gray-500">Allow signup via mobile number</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="allow_phone_registration" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Verification Requirements -->
                        <div class="space-y-4">
                            <h3 class="text-base font-medium text-gray-900 flex items-center gap-2">
                                <i class="ri-verified-badge-line text-primary-600"></i>
                                Verification Requirements
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-id-card-line text-purple-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">ID Verification Required</p>
                                            <p class="text-sm text-gray-500">Require valid government ID upload</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="require_id_verification" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-checkbox-circle-line text-green-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Auto-Approve Registration</p>
                                            <p class="text-sm text-gray-500">Skip manual admin approval</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="auto_approve_registration" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500">Changes will be applied immediately</p>
                            <button type="submit"
                                    @click.prevent="saving=true; setTimeout(()=>saving=false,2000)"
                                    :disabled="saving"
                                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-primary-600 text-white font-medium rounded-xl hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                                <span x-show="!saving">Save Changes</span>
                                <span x-show="saving" class="flex items-center gap-2">
                                    <i class="ri-loader-4-line animate-spin"></i>
                                    Saving...
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Geo-Location Restrictions -->
            <div x-show="activeTab === 'geolocation'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 class="max-w-5xl">
                <form x-data="{ saving: false, geoEnabled: false, centerLat: '', centerLng: '', radiusKm: 10 }" class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center">
                                <i class="ri-map-pin-line text-indigo-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">Geo-Location Restrictions</h2>
                                <p class="text-sm text-gray-500">Set geographical boundaries for voting locations</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 space-y-8">
                        <!-- Enable Geo Restrictions -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 border-2 border-dashed border-indigo-200 rounded-xl bg-indigo-50">
                                <div class="flex items-center gap-3">
                                    <i class="ri-global-line text-indigo-600 text-xl"></i>
                                    <div>
                                        <p class="font-medium text-gray-900">Enable Geo-Location Restrictions</p>
                                        <p class="text-sm text-gray-500">Restrict voting to specific geographic areas</p>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="enable_geo_restrictions" x-model="geoEnabled" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                                </label>
                            </div>
                        </div>

                        <!-- Geo Configuration -->
                        <div x-show="geoEnabled" class="space-y-6">
                            <!-- Center Point Configuration -->
                            <div class="space-y-4">
                                <h3 class="text-base font-medium text-gray-900 flex items-center gap-2">
                                    <i class="ri-focus-3-line text-indigo-600"></i>
                                    Voting Center Location
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label for="center_latitude" class="block text-sm font-medium text-gray-700">Center Latitude</label>
                                        <input id="center_latitude" name="center_latitude" type="number" step="any" x-model="centerLat"
                                               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200"
                                               placeholder="14.5995">
                                    </div>
                                    <div class="space-y-2">
                                        <label for="center_longitude" class="block text-sm font-medium text-gray-700">Center Longitude</label>
                                        <input id="center_longitude" name="center_longitude" type="number" step="any" x-model="centerLng"
                                               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200"
                                               placeholder="120.9842">
                                    </div>
                                </div>
                                <button type="button" class="inline-flex items-center gap-2 px-4 py-2 text-sm text-indigo-600 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors">
                                    <i class="ri-crosshair-line"></i>
                                    Get Current Location
                                </button>
                            </div>

                            <!-- Radius Configuration -->
                            <div class="space-y-4">
                                <h3 class="text-base font-medium text-gray-900 flex items-center gap-2">
                                    <i class="ri-radio-button-line text-indigo-600"></i>
                                    Allowed Voting Radius
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label for="voting_radius_km" class="block text-sm font-medium text-gray-700">Radius (kilometers)</label>
                                        <input id="voting_radius_km" name="voting_radius_km" type="number" min="0.1" step="0.1" x-model="radiusKm"
                                               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200"
                                               placeholder="10">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Radius in Miles</label>
                                        <input type="text" readonly :value="(radiusKm * 0.621371).toFixed(2)"
                                               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-100 text-gray-500">
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Preset Buttons -->
                            <div class="space-y-4">
                                <h4 class="text-sm font-medium text-gray-700">Quick Presets</h4>
                                <div class="flex flex-wrap gap-3">
                                    <button type="button" @click="radiusKm = 1" class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">1 km</button>
                                    <button type="button" @click="radiusKm = 5" class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">5 km</button>
                                    <button type="button" @click="radiusKm = 10" class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">10 km</button>
                                    <button type="button" @click="radiusKm = 25" class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">25 km</button>
                                    <button type="button" @click="radiusKm = 50" class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">50 km</button>
                                </div>
                            </div>

                            <!-- Additional Geo Settings -->
                            <div class="space-y-4">
                                <h3 class="text-base font-medium text-gray-900 flex items-center gap-2">
                                    <i class="ri-settings-4-line text-indigo-600"></i>
                                    Additional Settings
                                </h3>
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center gap-3">
                                            <i class="ri-wifi-off-line text-orange-600"></i>
                                            <div>
                                                <p class="font-medium text-gray-900">Allow Offline Verification</p>
                                                <p class="text-sm text-gray-500">Allow voting when GPS is temporarily unavailable</p>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="allow_offline_geo_verification" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                                        </label>
                                    </div>

                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center gap-3">
                                            <i class="ri-alarm-warning-line text-red-600"></i>
                                            <div>
                                                <p class="font-medium text-gray-900">Strict Location Enforcement</p>
                                                <p class="text-sm text-gray-500">Block voting attempts from outside the radius</p>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="strict_geo_enforcement" checked class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                                        </label>
                                    </div>

                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center gap-3">
                                            <i class="ri-record-circle-line text-blue-600"></i>
                                            <div>
                                                <p class="font-medium text-gray-900">Log Location Data</p>
                                                <p class="text-sm text-gray-500">Store voter location data for audit purposes</p>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="log_location_data" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Preview Area -->
                            <div class="space-y-4" x-show="centerLat && centerLng">
                                <h3 class="text-base font-medium text-gray-900 flex items-center gap-2">
                                    <i class="ri-eye-line text-indigo-600"></i>
                                    Location Preview
                                </h3>
                                <div class="p-4 bg-indigo-50 rounded-xl border border-indigo-200">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                        <div>
                                            <p class="font-medium text-gray-900">Center Point</p>
                                            <p class="text-gray-600" x-text="`${centerLat}, ${centerLng}`"></p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Coverage Area</p>
                                            <p class="text-gray-600" x-text="`${radiusKm} km radius`"></p>
                                        </div>
                                    </div>
                                    <div class="mt-3 p-3 bg-white rounded-lg border">
                                        <p class="text-xs text-gray-500 mb-2">Map Preview (Interactive map would be integrated here)</p>
                                        <div class="h-32 bg-gradient-to-br from-blue-100 to-indigo-200 rounded flex items-center justify-center">
                                            <i class="ri-map-2-line text-4xl text-indigo-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Warning Message -->
                        <div x-show="!geoEnabled" class="p-4 bg-amber-50 border border-amber-200 rounded-xl">
                            <div class="flex items-start gap-3">
                                <i class="ri-information-line text-amber-600 mt-0.5"></i>
                                <div>
                                    <p class="text-sm font-medium text-amber-800">Geo-location restrictions are currently disabled</p>
                                    <p class="text-sm text-amber-700">Voters can cast their votes from any location when this feature is disabled.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500">Changes will be applied immediately</p>
                            <button type="submit"
                                    @click.prevent="saving=true; setTimeout(()=>saving=false,2000)"
                                    :disabled="saving"
                                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-indigo-600 text-white font-medium rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                                <span x-show="!saving">Save Changes</span>
                                <span x-show="saving" class="flex items-center gap-2">
                                    <i class="ri-loader-4-line animate-spin"></i>
                                    Saving...
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Verification Settings -->
            <div x-show="activeTab === 'verification'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 class="max-w-4xl">
                <form x-data="{ saving: false }" class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center">
                                <i class="ri-shield-check-line text-emerald-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">Verification Settings</h2>
                                <p class="text-sm text-gray-500">Configure voter verification methods and security</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="verification_method" class="block text-sm font-medium text-gray-700">Primary Verification Method</label>
                                <select id="verification_method" name="verification_method"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200">
                                    <option value="email">Email Verification</option>
                                    <option value="sms">SMS Verification</option>
                                    <option value="otp-app">Authenticator App</option>
                                    <option value="gov-id">Government ID</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label for="verification_timeout" class="block text-sm font-medium text-gray-700">Verification Timeout (minutes)</label>
                                <input id="verification_timeout" name="verification_timeout" type="number" min="1" value="10"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label for="max_verification_attempts" class="block text-sm font-medium text-gray-700">Max Verification Attempts</label>
                                <input id="max_verification_attempts" name="max_verification_attempts" type="number" min="1" value="5"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200">
                            </div>
                        </div>

                        <!-- Security Features -->
                        <div class="space-y-4">
                            <h3 class="text-base font-medium text-gray-900">Security Features</h3>
                            <div class="grid grid-cols-1 gap-4">
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-lock-password-line text-primary-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Two-Factor Authentication</p>
                                            <p class="text-sm text-gray-500">Add extra security layer for verification</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="enable_2fa" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-user-forbid-line text-amber-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Duplicate Detection</p>
                                            <p class="text-sm text-gray-500">Prevent multiple account registrations</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="duplicate_detection" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-map-pin-line text-red-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Geo-Location Monitoring</p>
                                            <p class="text-sm text-gray-500">Flag registrations from unusual locations</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="geo_location_detection" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500">Changes will be applied immediately</p>
                            <button type="submit"
                                    @click.prevent="saving=true; setTimeout(()=>saving=false,2000)"
                                    :disabled="saving"
                                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-emerald-600 text-white font-medium rounded-xl hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                                <span x-show="!saving">Save Changes</span>
                                <span x-show="saving" class="flex items-center gap-2">
                                        <i class="ri-loader-4-line animate-spin"></i>
                                        Saving...
                                    </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Security & Privacy -->
            <div x-show="activeTab === 'security'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 class="max-w-4xl">
                <form x-data="{ saving: false }" class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center">
                                <i class="ri-lock-2-line text-red-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">Security & Privacy</h2>
                                <p class="text-sm text-gray-500">Configure data protection and security measures</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="space-y-2">
                                <label for="data_retention_years" class="block text-sm font-medium text-gray-700">Data Retention (years)</label>
                                <input id="data_retention_years" name="data_retention_years" type="number" min="0" value="2"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label for="ip_rate_limit" class="block text-sm font-medium text-gray-700">IP Rate Limit (req/min)</label>
                                <input id="ip_rate_limit" name="ip_rate_limit" type="number" min="0" value="60"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label for="session_timeout" class="block text-sm font-medium text-gray-700">Session Timeout (min)</label>
                                <input id="session_timeout" name="session_timeout" type="number" min="1" value="30"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200">
                            </div>
                        </div>

                        <!-- Security Options -->
                        <div class="space-y-4">
                            <h3 class="text-base font-medium text-gray-900">Privacy & Security Options</h3>
                            <div class="grid grid-cols-1 gap-4">
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-shield-keyhole-line text-blue-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Encrypt Personal Data</p>
                                            <p class="text-sm text-gray-500">AES-256 encryption for sensitive information</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="encrypt_personal_data" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-file-list-3-line text-purple-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Audit Trail</p>
                                            <p class="text-sm text-gray-500">Log all sensitive system actions</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="audit_trail" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-user-unfollow-line text-gray-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Anonymous Voting</p>
                                            <p class="text-sm text-gray-500">Hide voter identity in vote records</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="anonymous_voting" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500">Changes will be applied immediately</p>
                            <button type="submit"
                                    @click.prevent="saving=true; setTimeout(()=>saving=false,2000)"
                                    :disabled="saving"
                                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-red-600 text-white font-medium rounded-xl hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                                <span x-show="!saving">Save Changes</span>
                                <span x-show="saving" class="flex items-center gap-2">
                                        <i class="ri-loader-4-line animate-spin"></i>
                                        Saving...
                                    </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Notifications & Alerts -->
            <div x-show="activeTab === 'notifications'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 class="max-w-4xl">
                <form x-data="{ saving: false }" class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center">
                                <i class="ri-notification-3-line text-orange-600 text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">Notifications & Alerts</h2>
                                <p class="text-sm text-gray-500">Configure system notifications and communication settings</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="webhook_url" class="block text-sm font-medium text-gray-700">Webhook URL</label>
                                <input id="webhook_url" name="webhook_url" type="url"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200"
                                       placeholder="https://example.com/webhook">
                            </div>

                            <div class="space-y-2">
                                <label for="sms_sender_id" class="block text-sm font-medium text-gray-700">SMS Sender ID</label>
                                <input id="sms_sender_id" name="sms_sender_id" type="text"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200"
                                       placeholder="SECUREVOTE">
                            </div>
                        </div>

                        <!-- Verification Code Delivery -->
                        <div class="space-y-3">
                            <label class="block text-sm font-medium text-gray-700">Verification Code Delivery Method</label>
                            <div class="flex flex-wrap gap-4">
                                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl hover:bg-gray-50 cursor-pointer">
                                    <input type="radio" name="code_delivery" value="email" class="text-primary-600 focus:ring-primary-500">
                                    <div class="flex items-center gap-2">
                                        <i class="ri-mail-line text-primary-600"></i>
                                        <span class="text-sm font-medium text-gray-700">Email Only</span>
                                    </div>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl hover:bg-gray-50 cursor-pointer">
                                    <input type="radio" name="code_delivery" value="sms" class="text-primary-600 focus:ring-primary-500">
                                    <div class="flex items-center gap-2">
                                        <i class="ri-message-3-line text-primary-600"></i>
                                        <span class="text-sm font-medium text-gray-700">SMS Only</span>
                                    </div>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl hover:bg-gray-50 cursor-pointer">
                                    <input type="radio" name="code_delivery" value="both" checked class="text-primary-600 focus:ring-primary-500">
                                    <div class="flex items-center gap-2">
                                        <i class="ri-notification-badge-line text-primary-600"></i>
                                        <span class="text-sm font-medium text-gray-700">Both Methods</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Notification Settings -->
                        <div class="space-y-4">
                            <h3 class="text-base font-medium text-gray-900">Notification Preferences</h3>
                            <div class="grid grid-cols-1 gap-4">
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-mail-check-line text-green-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Registration Confirmation</p>
                                            <p class="text-sm text-gray-500">Send email confirmation after successful registration</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="notify_registration_confirmation" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-alarm-warning-line text-red-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Suspicious Activity Alerts</p>
                                            <p class="text-sm text-gray-500">Notify administrators of security risks</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="alert_suspicious_activity" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <i class="ri-file-chart-line text-blue-600"></i>
                                        <div>
                                            <p class="font-medium text-gray-900">Daily Summary Report</p>
                                            <p class="text-sm text-gray-500">Daily digest of system activity and statistics</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="daily_summary_email" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500">Changes will be applied immediately</p>
                            <button type="submit"
                                    @click.prevent="saving=true; setTimeout(()=>saving=false,2000)"
                                    :disabled="saving"
                                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-orange-600 text-white font-medium rounded-xl hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                                <span x-show="!saving">Save Changes</span>
                                <span x-show="saving" class="flex items-center gap-2">
                                        <i class="ri-loader-4-line animate-spin"></i>
                                        Saving...
                                    </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>
