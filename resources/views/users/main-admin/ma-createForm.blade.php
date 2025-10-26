<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Create Voting Form</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Google Maps API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&libraries=places,geometry&callback=initMap"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-slate-50 to-slate-100 font-inter min-h-screen">
<div x-data="{ collapsed: false }" class="flex min-h-screen">
    <!-- Sidebar -->
    @include('layout.partials.sidebar')
    <main class="flex-grow p-4 md:p-8 mb-12">
        <!-- Header -->
        <div class="flex items-center mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-1">Create Voting Form</h1>
                <p class="text-slate-500">Design and configure a new voting form for elections</p>
            </div>
        </div>

        <div x-data="formWizard()" class="max-w-4xl mx-auto">
            <!-- Progress Indicator -->
            <div class="mb-12">
                <div class="flex items-center justify-between mb-4">
                    <template x-for="i in 4" :key="i">
                        <div class="flex items-center" :class="i < 4 ? 'flex-1' : ''">
                            <div class="relative">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold transition-all duration-300"
                                     :class="step >= i ? 'bg-primary-500 text-white shadow-lg' : 'bg-slate-200 text-slate-500'">
                                    <span x-text="i"></span>
                                </div>
                                <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs font-medium whitespace-nowrap"
                                     :class="step >= i ? 'text-primary-600' : 'text-slate-400'"
                                     x-text="['Basic Info', 'Positions', 'Settings', 'Share Form'][i-1]">
                                </div>
                            </div>
                            <div x-show="i < 4" class="flex-1 h-0.5 mx-4 transition-colors duration-300"
                                 :class="step > i ? 'bg-primary-500' : 'bg-slate-200'">
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Panel 1: Basic Information -->
            <form x-show="step === 1" @submit.prevent="nextStep"
                  x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform translate-x-8"
                  x-transition:enter-end="opacity-100 transform translate-x-0"
                  class="bg-white p-6 md:p-8 rounded-2xl shadow-xl border border-slate-200">

                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mr-4">
                        <i class="ri-file-text-line text-xl text-primary-600"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-800">Basic Information</h2>
                        <p class="text-slate-500 text-sm">Set up the foundation of your voting form</p>
                    </div>
                </div>

                <div class="grid gap-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Form Title <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.title"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                   placeholder="e.g., Student Government Election 2024"
                                   maxlength="100" required>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Organization Name <span class="text-red-500">*</span></label>

                            <select x-model="form.organizationSelected"
                                    @change="form.organization = $event.target.value === 'other' ? '' : $event.target.value"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors bg-white"
                                    required>
                                <option value="" disabled selected>Select organization</option>
                                <option value="University of the Philippines">University of the Philippines</option>
                                <option value="Ateneo de Manila University">Ateneo de Manila University</option>
                                <option value="De La Salle University">De La Salle University</option>
                                <option value="other">Other (enter below)</option>
                            </select>

                            <input x-show="form.organizationSelected === 'other'"
                                   x-cloak
                                   type="text" x-model="form.organization"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors mt-3"
                                   placeholder="Enter organization name"
                                   maxlength="100"
                                   required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Description <span class="text-red-500">*</span></label>
                        <textarea x-model="form.description"
                                  class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none"
                                  rows="4"
                                  placeholder="Describe the purpose and context of this voting form..."
                                  maxlength="800" required></textarea>
                        <div class="flex justify-between text-xs text-slate-500">
                            <span>Provide a clear description for voters</span>
                            <span x-text="`${form.description.length}/800`"></span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Instructions for Voters</label>
                        <textarea x-model="form.instructions"
                                  class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none"
                                  rows="3"
                                  placeholder="Optional: Add specific voting instructions or guidelines..."
                                  maxlength="400"></textarea>
                        <div class="text-xs text-slate-500 text-right">
                            <span x-text="`${form.instructions.length}/400`"></span>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Voting Start <span class="text-red-500">*</span></label>
                            <input type="datetime-local" x-model="form.start"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                   required>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Voting End <span class="text-red-500">*</span></label>
                            <input type="datetime-local" x-model="form.end"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                   required :min="form.start">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-8">
                    <button type="submit"
                            class="px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
                        Continue
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </div>
            </form>

            <!-- Panel 2: Positions & Candidates -->
            <form x-show="step === 2" @submit.prevent="nextStep"
                  x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform translate-x-8"
                  x-transition:enter-end="opacity-100 transform translate-x-0"
                  class="bg-white p-6 md:p-8 rounded-2xl shadow-xl border border-slate-200">

                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mr-4">
                        <i class="ri-group-line text-xl text-primary-600"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-800">Positions & Candidates</h2>
                        <p class="text-slate-500 text-sm">Define the positions and their candidates</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <template x-for="(position, i) in positions" :key="i">
                        <div class="border border-slate-200 rounded-xl p-6 bg-gradient-to-r from-slate-50 to-white relative">
                            <button type="button"
                                    class="absolute top-4 right-4 w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg flex items-center justify-center transition-colors"
                                    @click="removePosition(i)"
                                    x-show="positions.length > 1">
                                <i class="ri-delete-bin-line text-sm"></i>
                            </button>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                                        Position Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" x-model="position.name"
                                           class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                           placeholder="e.g., President, Vice President, Secretary"
                                           required>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-3">
                                        Candidates <span class="text-red-500">*</span>
                                    </label>
                                    <div class="space-y-3">
                                        <template x-for="(candidate, j) in position.candidates" :key="j">
                                            <div class="flex gap-3">
                                                <input type="text" x-model="position.candidates[j]"
                                                       class="flex-1 px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                                       :placeholder="`Candidate ${j + 1} name`"
                                                       required>
                                                <button type="button"
                                                        class="w-12 h-12 bg-red-100 hover:bg-red-200 text-red-600 rounded-xl flex items-center justify-center transition-colors"
                                                        @click="removeCandidate(i, j)"
                                                        x-show="position.candidates.length > 1">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </div>
                                        </template>
                                    </div>
                                    <button type="button"
                                            class="mt-3 px-4 py-2 text-primary-600 hover:text-primary-700 hover:bg-primary-50 rounded-lg transition-colors flex items-center gap-2 text-sm font-medium"
                                            @click="addCandidate(i)">
                                        <i class="ri-add-line"></i>
                                        Add Candidate
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>

                    <button type="button"
                            class="w-full py-4 border-2 border-dashed border-slate-300 hover:border-primary-400 hover:bg-primary-50 rounded-xl text-slate-600 hover:text-primary-600 transition-colors flex items-center justify-center gap-2 font-medium"
                            @click="addPosition()">
                        <i class="ri-add-line text-xl"></i>
                        Add New Position
                    </button>
                </div>

                <div class="flex justify-between mt-8">
                    <button type="button"
                            class="px-8 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-xl transition-colors flex items-center gap-2"
                            @click="step = 1">
                        <i class="ri-arrow-left-line"></i>
                        Back
                    </button>
                    <button type="submit"
                            class="px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
                        Continue
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </div>
            </form>

            <!-- Panel 3: Form Settings -->
            <form x-show="step === 3" @submit.prevent="createForm"
                  x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform translate-x-8"
                  x-transition:enter-end="opacity-100 transform translate-x-0"
                  class="bg-white p-6 md:p-8 rounded-2xl shadow-xl border border-slate-200">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mr-4">
                        <i class="ri-settings-3-line text-xl text-primary-600"></i>
                    </div>

                    <div>
                        <h2 class="text-2xl font-semibold text-slate-800">Form Settings</h2>
                        <p class="text-slate-500 text-sm">Configure advanced settings and restrictions</p>
                    </div>
                </div>
                <!-- Allowed Email Domain -->
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">
                            Allowed Email Domains
                            <span class="text-xs text-slate-400 font-normal">(comma-separated, e.g. up.edu.ph, myschool.edu)</span>
                        </label>
                        <input type="text"
                               x-model="settings.allowedDomains"
                               class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                               placeholder="e.g. up.edu.ph, myschool.edu">
                        <div class="text-xs text-slate-500">
                            Only users with emails from these domains can register. Leave blank to allow all.
                        </div>
                    </div>

                    <!-- New field for admin access emails -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Admin Access Emails</label>
                        <textarea x-model="settings.adminEmails"
                                  class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none"
                                  rows="3"
                                  placeholder="e.g., admin@university.edu, supervisor@company.com (separate with commas)"
                                  maxlength="500"></textarea>
                        <div class="flex justify-between text-xs text-slate-500">
                            <span>Email addresses that can edit and view voting records. Leave empty to restrict access to form creator only.</span>
                            <span x-text="`${settings.adminEmails.length}/500`"></span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Geo-Location Restrictions</label>
                        <div class="space-y-3" x-data="{ ...geoConfig(), geoEnabled: settings.enableGeoRestriction, centerLat: '', centerLng: '', radiusKm: 1 }" x-init="
                            $watch('geoEnabled', value => settings.enableGeoRestriction = value);
                            $watch('centerLat', value => settings.centerLat = value);
                            $watch('centerLng', value => settings.centerLng = value);
                            $watch('radiusKm', value => settings.radius = value);
                            $watch('selectedAddress', value => settings.selectedAddress = value);
                            $watch('locationDetails', value => settings.locationDetails = value);
                            init();
                        ">
                            <div class="flex items-center">
                                <input type="checkbox" x-model="geoEnabled" id="enableGeo"
                                       class="w-5 h-5 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 focus:ring-2">
                                <label for="enableGeo" class="ml-3 text-sm font-medium text-slate-700">
                                    Enable geographical restrictions
                                </label>
                            </div>
                            <div x-show="geoEnabled"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 class="bg-slate-50 p-4 rounded-lg border border-slate-200 space-y-6">
                                <!-- Center Point Configuration -->
                                <div class="space-y-4">
                                    <h3 class="text-base font-medium text-gray-900 flex items-center gap-2">
                                        <i class="ri-focus-3-line text-primary-600"></i>
                                        Voting Center Location
                                    </h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Center Latitude</label>
                                            <input type="number" step="any" x-model="centerLat"
                                                   @input="updateMapCenter()"
                                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200"
                                                   placeholder="14.5995">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Center Longitude</label>
                                            <input type="number" step="any" x-model="centerLng"
                                                   @input="updateMapCenter()"
                                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200"
                                                   placeholder="120.9842">
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap gap-3">
                                        <button type="button" @click="getCurrentLocation()"
                                                class="inline-flex items-center gap-2 px-4 py-2 text-sm text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-100 transition-colors">
                                            <i class="ri-crosshair-line"></i>
                                            Get Current Location
                                        </button>
                                        <button type="button" @click="searchLocation()"
                                                class="inline-flex items-center gap-2 px-4 py-2 text-sm text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-100 transition-colors">
                                            <i class="ri-search-line"></i>
                                            Search Address
                                        </button>
                                    </div>
                                    <div x-show="showSearch" class="space-y-2">
                                        <div class="flex gap-2">
                                            <input id="address_search" type="text"
                                                   placeholder="Search for schools, hospitals, malls, barangays, cities..."
                                                   class="flex-1 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200">
                                            <button type="button" @click="performSearch()"
                                                    class="px-4 py-3 bg-primary-600 text-white rounded-xl hover:bg-primary-700 transition-colors">
                                                <i class="ri-search-line"></i>
                                            </button>
                                        </div>
                                        <div class="text-xs text-gray-500 px-2">
                                            <p class="mb-1"><strong>Examples:</strong></p>
                                            <div class="flex flex-wrap gap-2">
                                                <span class="px-2 py-1 bg-gray-100 rounded">University of the Philippines Diliman</span>
                                                <span class="px-2 py-1 bg-gray-100 rounded">SM Mall of Asia</span>
                                                <span class="px-2 py-1 bg-gray-100 rounded">Makati City Hall</span>
                                            </div>
                                        </div>
                                        <div id="search-suggestions" class="hidden bg-white border border-gray-200 rounded-xl shadow-lg max-h-60 overflow-y-auto"></div>
                                    </div>
                                </div>
                                <!-- Radius Configuration -->
                                <div class="space-y-4">
                                    <h3 class="text-base font-medium text-gray-900 flex items-center gap-2">
                                        <i class="ri-radio-button-line text-primary-600"></i>
                                        Allowed Voting Radius
                                    </h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Radius (kilometers)</label>
                                            <input type="number" min="0.1" step="0.1" x-model="radiusKm"
                                                   @input="updateRadius()"
                                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-500/20 transition-all duration-200"
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
                                        <button type="button" @click="setRadius(1)" class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">1 km</button>
                                        <button type="button" @click="setRadius(5)" class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">5 km</button>
                                        <button type="button" @click="setRadius(10)" class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">10 km</button>
                                        <button type="button" @click="setRadius(25)" class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">25 km</button>
                                        <button type="button" @click="setRadius(50)" class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">50 km</button>
                                    </div>
                                </div>
                                <!-- Location Preview -->
                                <div class="space-y-4" x-show="centerLat && centerLng">
                                    <h3 class="text-base font-medium text-gray-900 flex items-center gap-2">
                                        <i class="ri-eye-line text-primary-600"></i>
                                        Location Preview
                                    </h3>
                                    <div class="p-4 bg-primary-50 rounded-xl border border-primary-200">
                                        <div x-show="selectedAddress" class="mb-4 p-3 bg-white rounded-lg border border-primary-200">
                                            <h4 class="font-medium text-gray-900 text-sm mb-1">Selected Location</h4>
                                            <p class="text-sm text-gray-700" x-text="selectedAddress"></p>
                                            <div x-show="locationDetails?.name" class="mt-1">
                                                <span class="text-xs px-2 py-1 bg-primary-100 text-primary-700 rounded" x-text="locationDetails.name"></span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm mb-4">
                                            <div>
                                                <span class="font-medium text-gray-700">Coordinates:</span>
                                                <span x-text="`${parseFloat(centerLat).toFixed(6)}, ${parseFloat(centerLng).toFixed(6)}`" class="text-primary-600"></span>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-700">Radius:</span>
                                                <span x-text="`${radiusKm} km`" class="text-primary-600"></span>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-700">Coverage:</span>
                                                <span x-text="`${(radiusKm * 0.621371).toFixed(2)} miles`" class="text-primary-600"></span>
                                            </div>
                                        </div>
                                        <div class="space-y-4">
                                            <h4 class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                                <i class="ri-map-2-line text-primary-600"></i>
                                                Interactive Map
                                            </h4>
                                            <div class="relative">
                                                <div id="google-map" class="w-full h-96 rounded-xl border border-gray-200 bg-gray-100"></div>
                                                <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm rounded-lg px-3 py-2 text-xs text-gray-600 shadow-sm">
                                                    <i class="ri-information-line mr-1"></i>
                                                    Click map, drag marker, or resize circle to adjust settings
                                                </div>
                                                <div class="absolute bottom-4 left-4 bg-white/95 backdrop-blur-sm rounded-lg px-3 py-2 text-xs text-gray-600 shadow-sm">
                                                    <i class="ri-focus-3-line mr-1"></i>
                                                    Coverage area: <span x-text="`${Math.round(Math.PI * Math.pow(radiusKm, 2) * 100) / 100} km²`"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs text-slate-500 bg-amber-50 p-3 rounded border border-amber-200">
                                    <i class="ri-information-line text-amber-600 mr-1"></i>
                                    Voters will be required to allow location access. Only users within the specified radius from the selected location can register and vote.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-8">
                    <button type="button"
                            class="px-8 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-xl transition-colors flex items-center gap-2"
                            @click="step = 2">
                        <i class="ri-arrow-left-line"></i>
                        Back
                    </button>
                    <button type="submit" :disabled="isLoading"
                            class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2 disabled:opacity-50">
                        <span x-show="!isLoading">Create Form</span>
                        <span x-show="isLoading">Creating...</span>
                        <i class="ri-check-line" x-show="!isLoading"></i>
                        <i class="ri-loader-line animate-spin" x-show="isLoading"></i>
                    </button>
                </div>
            </form>

            <!-- Panel 4: Share Form -->
            <div x-show="step === 4"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-x-8"
                 x-transition:enter-end="opacity-100 transform translate-x-0"
                 class="bg-white p-6 md:p-8 rounded-2xl shadow-xl border border-slate-200">

                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-check-line text-2xl text-green-600"></i>
                    </div>
                    <h2 class="text-2xl font-semibold text-slate-800 mb-2">Form Created Successfully!</h2>
                    <p class="text-slate-500">Share the link or QR code with voters to start collecting responses</p>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-3">Share Link</label>
                        <div class="flex gap-3">
                            <input type="text"
                                   class="flex-1 px-4 py-3 border border-slate-300 rounded-xl bg-slate-50 text-slate-600"
                                   :value="shareLink" readonly>
                            <button type="button"
                                    class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-xl transition-colors flex items-center gap-2"
                                    @click="copyLink">
                                <i class="ri-file-copy-line"></i>
                                Copy
                            </button>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="text-center">
                            <label class="block text-sm font-semibold text-slate-700 mb-3">QR Code</label>
                            <div class="bg-gradient-to-br from-slate-100 to-slate-200 p-8 rounded-xl border-2 border-dashed border-slate-300">
                                <div class="w-32 h-32 bg-white rounded-lg shadow-inner mx-auto flex items-center justify-center">
                                    <span class="text-slate-400 text-xs">QR Code</span>
                                </div>
                            </div>
                            <button type="button"
                                    class="mt-4 px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium rounded-lg transition-colors flex items-center gap-2 mx-auto">
                                <i class="ri-download-line"></i>
                                Download QR
                            </button>
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-slate-800">Quick Actions</h3>
                            <div class="space-y-3">
                                <button class="w-full px-4 py-3 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg transition-colors flex items-center gap-3">
                                    <i class="ri-mail-line"></i>
                                    Send via Email
                                </button>
                                <button class="w-full px-4 py-3 bg-green-50 hover:bg-green-100 text-green-700 rounded-lg transition-colors flex items-center gap-3">
                                    <i class="ri-whatsapp-line"></i>
                                    Share on WhatsApp
                                </button>
                                <button class="w-full px-4 py-3 bg-purple-50 hover:bg-purple-100 text-purple-700 rounded-lg transition-colors flex items-center gap-3">
                                    <i class="ri-facebook-line"></i>
                                    Share on Facebook
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-8">
                    <button type="button"
                            class="px-8 py-3 bg-slate-800 hover:bg-slate-900 text-white font-semibold rounded-xl transition-colors"
                            @click="window.location.href = '{{ route('dashboard') }}'">
                        Go to Dashboard
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    function geoConfig() {
        return {
            showSearch: false,
            map: null,
            circle: null,
            marker: null,
            autocomplete: null,
            searchResults: [],
            showSuggestions: false,
            selectedAddress: '',
            locationDetails: null,
            init() {
                this.$nextTick(() => {
                    this.$watch('geoEnabled', (newValue) => {
                        if (newValue) {
                            setTimeout(() => {
                                if (this.centerLat && this.centerLng) {
                                    this.initializeMap();
                                } else {
                                    this.centerLat = '14.5995';
                                    this.centerLng = '120.9842';
                                    this.initializeMap();
                                }
                            }, 200);
                        }
                    });
                    if (this.geoEnabled) {
                        setTimeout(() => {
                            if (this.centerLat && this.centerLng) {
                                this.initializeMap();
                            }
                        }, 200);
                    }
                });
            },
            getCurrentLocation() {
                if (!navigator.geolocation) {
                    this.showLocationError('Geolocation is not supported by this browser.');
                    return;
                }
                const button = event.target.closest('button');
                const originalContent = button.innerHTML;
                button.innerHTML = '<i class="ri-loader-4-line animate-spin"></i> Getting location...';
                button.disabled = true;
                navigator.geolocation.getCurrentPosition(
                    async (position) => {
                        this.centerLat = position.coords.latitude.toFixed(6);
                        this.centerLng = position.coords.longitude.toFixed(6);
                        await this.reverseGeocode(position.coords.latitude, position.coords.longitude);
                        if (!this.map) {
                            setTimeout(() => this.initializeMap(), 100);
                        } else {
                            this.updateMapCenter();
                        }
                        button.innerHTML = originalContent;
                        button.disabled = false;
                    },
                    (error) => {
                        let errorMessage = 'Unable to get your current location.';
                        switch(error.code) {
                            case error.PERMISSION_DENIED:
                                errorMessage = 'Location access denied. Please enable location permissions and try again.'; break;
                            case error.POSITION_UNAVAILABLE:
                                errorMessage = 'Location information unavailable. Please check your GPS settings.'; break;
                            case error.TIMEOUT:
                                errorMessage = 'Location request timed out. Please try again.'; break;
                        }
                        this.showLocationError(errorMessage);
                        button.innerHTML = originalContent;
                        button.disabled = false;
                    },
                    { enableHighAccuracy: true, timeout: 15000, maximumAge: 60000 }
                );
            },
            searchLocation() {
                this.showSearch = !this.showSearch;
                if (this.showSearch) {
                    this.$nextTick(() => {
                        const searchInput = document.getElementById('address_search');
                        if (searchInput) {
                            searchInput.focus();
                            this.setupAdvancedSearch(searchInput);
                        }
                    });
                } else {
                    this.clearSearchResults();
                }
            },
            setupAdvancedSearch(input) {
                if (!window.google?.maps?.places) return;
                if (this.autocomplete) {
                    google.maps.event.clearInstanceListeners(this.autocomplete);
                }
                this.autocomplete = new google.maps.places.Autocomplete(input, {
                    types: ['establishment', 'geocode'],
                    componentRestrictions: { country: 'ph' },
                    fields: ['geometry', 'formatted_address', 'name', 'place_id', 'types', 'address_components']
                });
                this.autocomplete.addListener('place_changed', () => {
                    const place = this.autocomplete.getPlace();
                    if (place.geometry?.location) {
                        this.setLocationFromPlace(place);
                    }
                });
                input.addEventListener('input', this.debounce((e) => {
                    const query = e.target.value.trim();
                    if (query.length >= 3) {
                        this.performTextSearch(query);
                    } else {
                        this.clearSearchResults();
                    }
                }, 300));
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        this.clearSearchResults();
                    }
                });
            },
            async performTextSearch(query) {
                if (!window.google?.maps) return;
                try {
                    const service = new google.maps.places.PlacesService(document.createElement('div'));
                    const request = {
                        query: query,
                        location: new google.maps.LatLng(14.5995, 120.9842),
                        radius: 50000,
                        fields: ['geometry', 'formatted_address', 'name', 'place_id', 'types', 'rating']
                    };
                    service.textSearch(request, (results, status) => {
                        if (status === google.maps.places.PlacesServiceStatus.OK && results) {
                            this.searchResults = results.slice(0, 8).map(place => ({
                                name: place.name,
                                address: place.formatted_address,
                                location: place.geometry.location,
                                placeId: place.place_id,
                                types: place.types,
                                rating: place.rating
                            }));
                            this.showSearchSuggestions();
                        } else {
                            this.clearSearchResults();
                        }
                    });
                } catch (error) {
                    this.clearSearchResults();
                }
            },
            showSearchSuggestions() {
                const container = document.getElementById('search-suggestions');
                if (!container || this.searchResults.length === 0) return;
                container.innerHTML = this.searchResults.map(result => `
                <div class="suggestion-item p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100 last:border-b-0"
                     data-lat="${result.location.lat()}"
                     data-lng="${result.location.lng()}"
                     data-name="${result.name}"
                     data-address="${result.address}">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="ri-map-pin-line text-primary-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-medium text-gray-900 text-sm truncate">${result.name}</h4>
                            <p class="text-xs text-gray-500 truncate">${result.address}</p>
                            <div class="flex items-center gap-2 mt-1">
                                ${result.rating ? `
                                    <div class="flex items-center gap-1">
                                        <i class="ri-star-fill text-yellow-400 text-xs"></i>
                                        <span class="text-xs text-gray-600">${result.rating}</span>
                                    </div>
                                ` : ''}
                                <span class="text-xs px-2 py-0.5 bg-gray-100 text-gray-600 rounded">
                                    ${this.getPlaceTypeLabel(result.types)}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
                container.querySelectorAll('.suggestion-item').forEach(item => {
                    item.addEventListener('click', () => {
                        const lat = parseFloat(item.dataset.lat);
                        const lng = parseFloat(item.dataset.lng);
                        const name = item.dataset.name;
                        const address = item.dataset.address;
                        this.setLocationFromCoordinates(lat, lng, name, address);
                        this.clearSearchResults();
                        document.getElementById('address_search').value = '';
                    });
                });
                container.classList.remove('hidden');
                this.showSuggestions = true;
            },
            getPlaceTypeLabel(types) {
                const typeMap = {
                    'school': 'School',
                    'university': 'University',
                    'hospital': 'Hospital',
                    'shopping_mall': 'Mall',
                    'local_government_office': 'Government',
                    'establishment': 'Business',
                    'point_of_interest': 'Landmark'
                };
                for (const type of types) {
                    if (typeMap[type]) return typeMap[type];
                }
                return 'Location';
            },
            async setLocationFromPlace(place) {
                this.centerLat = place.geometry.location.lat().toFixed(6);
                this.centerLng = place.geometry.location.lng().toFixed(6);
                this.selectedAddress = place.formatted_address;
                this.locationDetails = {
                    name: place.name,
                    address: place.formatted_address,
                    placeId: place.place_id,
                    types: place.types
                };
                if (!this.map) {
                    setTimeout(() => this.initializeMap(), 100);
                } else {
                    this.updateMapCenter();
                }
                this.showSearch = false;
                document.getElementById('address_search').value = '';
            },
            async setLocationFromCoordinates(lat, lng, name = '', address = '') {
                this.centerLat = lat.toFixed(6);
                this.centerLng = lng.toFixed(6);
                if (!address) {
                    await this.reverseGeocode(lat, lng);
                } else {
                    this.selectedAddress = address;
                    this.locationDetails = { name, address };
                }
                if (!this.map) {
                    setTimeout(() => this.initializeMap(), 100);
                } else {
                    this.updateMapCenter();
                }
            },
            async reverseGeocode(lat, lng) {
                if (!window.google?.maps) return;
                try {
                    const geocoder = new google.maps.Geocoder();
                    const response = await new Promise((resolve, reject) => {
                        geocoder.geocode({
                            location: { lat, lng },
                            language: 'en'
                        }, (results, status) => {
                            if (status === 'OK') resolve(results);
                            else reject(status);
                        });
                    });
                    if (response && response[0]) {
                        this.selectedAddress = response[0].formatted_address;
                        this.locationDetails = {
                            address: response[0].formatted_address,
                            components: response[0].address_components
                        };
                    }
                } catch (error) {}
            },
            performSearch() {
                const address = document.getElementById('address_search')?.value?.trim();
                if (!address) {
                    this.showLocationError('Please enter an address to search.');
                    return;
                }
                if (!window.google?.maps) {
                    this.showLocationError('Google Maps API is not loaded. Please try again.');
                    return;
                }
                const button = event.target.closest('button');
                const originalContent = button.innerHTML;
                button.innerHTML = '<i class="ri-loader-4-line animate-spin"></i>';
                button.disabled = true;
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    address: address,
                    componentRestrictions: { country: 'PH' },
                    language: 'en'
                }, async (results, status) => {
                    if (status === 'OK' && results?.[0]) {
                        const location = results[0].geometry.location;
                        await this.setLocationFromCoordinates(
                            location.lat(),
                            location.lng(),
                            '',
                            results[0].formatted_address
                        );
                        this.showSearch = false;
                        document.getElementById('address_search').value = '';
                    } else {
                        let errorMessage = 'Address not found. Please try a different search term.';
                        switch(status) {
                            case 'ZERO_RESULTS':
                                errorMessage = 'No results found. Try searching for nearby landmarks or use more specific terms.'; break;
                            case 'OVER_QUERY_LIMIT':
                                errorMessage = 'Search quota exceeded. Please try again later.'; break;
                            case 'REQUEST_DENIED':
                                errorMessage = 'Search request denied. Please check API configuration.'; break;
                        }
                        this.showLocationError(errorMessage);
                    }
                    button.innerHTML = originalContent;
                    button.disabled = false;
                });
            },
            clearSearchResults() {
                this.searchResults = [];
                this.showSuggestions = false;
                const container = document.getElementById('search-suggestions');
                if (container) {
                    container.classList.add('hidden');
                    container.innerHTML = '';
                }
            },
            showLocationError(message) {
                const notification = document.createElement('div');
                notification.className = 'fixed top-4 right-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg shadow-lg z-50 max-w-sm';
                notification.innerHTML = `
                <div class="flex items-start gap-2">
                    <i class="ri-error-warning-line text-red-600 mt-0.5"></i>
                    <div class="text-sm">${message}</div>
                </div>
            `;
                document.body.appendChild(notification);
                setTimeout(() => notification.remove(), 5000);
            },
            debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            },
            setRadius(km) {
                this.radiusKm = km;
                this.updateRadius();
            },
            updateMapCenter() {
                if (!this.map || !this.centerLat || !this.centerLng) return;
                const center = new google.maps.LatLng(parseFloat(this.centerLat), parseFloat(this.centerLng));
                this.map.setCenter(center);
                this.map.setZoom(15);
                if (this.marker) {
                    this.marker.setPosition(center);
                } else {
                    this.createMarker(center);
                }
                if (this.circle) {
                    this.circle.setCenter(center);
                } else {
                    this.createCircle(center);
                }
            },
            updateRadius() {
                if (!this.circle) return;
                this.circle.setRadius(this.radiusKm * 1000);
                if (this.map) {
                    const bounds = this.circle.getBounds();
                    if (bounds) {
                        this.map.fitBounds(bounds);
                    }
                }
            },
            createMarker(center) {
                if (this.marker) {
                    this.marker.setMap(null);
                }
                this.marker = new google.maps.Marker({
                    position: center,
                    map: this.map,
                    draggable: true,
                    title: 'Voting Center - Drag to reposition',
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 12,
                        fillColor: '#3b82f6',
                        fillOpacity: 1,
                        strokeColor: '#ffffff',
                        strokeWeight: 3
                    }
                });
                this.marker.addListener('dragend', async () => {
                    const position = this.marker.getPosition();
                    this.centerLat = position.lat().toFixed(6);
                    this.centerLng = position.lng().toFixed(6);
                    await this.reverseGeocode(position.lat(), position.lng());
                    if (this.circle) {
                        this.circle.setCenter(position);
                    }
                });
            },
            createCircle(center) {
                if (this.circle) {
                    this.circle.setMap(null);
                }
                this.circle = new google.maps.Circle({
                    strokeColor: '#3b82f6',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#3b82f6',
                    fillOpacity: 0.15,
                    map: this.map,
                    center: center,
                    radius: this.radiusKm * 1000,
                    editable: true
                });
                this.circle.addListener('radius_changed', () => {
                    const newRadius = this.circle.getRadius() / 1000;
                    this.radiusKm = Math.round(newRadius * 100) / 100;
                });
                this.circle.addListener('center_changed', async () => {
                    const newCenter = this.circle.getCenter();
                    this.centerLat = newCenter.lat().toFixed(6);
                    this.centerLng = newCenter.lng().toFixed(6);
                    await this.reverseGeocode(newCenter.lat(), newCenter.lng());
                    if (this.marker) {
                        this.marker.setPosition(newCenter);
                    }
                });
            },
            initializeMap() {
                if (!window.google?.maps) return;
                const mapContainer = document.getElementById('google-map');
                if (!mapContainer) return;
                if (this.map) {
                    this.map = null;
                }
                const center = new google.maps.LatLng(
                    parseFloat(this.centerLat) || 14.5995,
                    parseFloat(this.centerLng) || 120.9842
                );
                this.map = new google.maps.Map(mapContainer, {
                    zoom: 15,
                    center: center,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: [
                        {
                            featureType: 'poi.business',
                            elementType: 'labels',
                            stylers: [{ visibility: 'simplified' }]
                        }
                    ],
                    mapTypeControl: true,
                    streetViewControl: true,
                    fullscreenControl: true,
                    zoomControl: true
                });
                this.createMarker(center);
                this.createCircle(center);
                this.map.addListener('click', async (event) => {
                    await this.setLocationFromCoordinates(
                        event.latLng.lat(),
                        event.latLng.lng()
                    );
                });
            }
        };
    }
    function formWizard() {
        return {
            step: 1,
            isLoading: false,
            form: {
                title: '',
                organization: '',
                organizationSelected: '',
                category: '',
                description: '',
                instructions: '',
                start: '',
                end: ''
            },
            positions: [{ name: '', candidates: [''] }],
            settings: {
                allowedDomains: '',
                registrationDeadline: '',
                adminEmails: '',
                enableGeoRestriction: false,
                centerLat: '',
                centerLng: '',
                radius: 1,
                selectedAddress: '',
                locationDetails: null
            },
            shareLink: '',
            nextStep() {
                if (this.step === 1) {
                    if (!this.validateBasicInfo()) return;
                    this.step = 2;
                } else if (this.step === 2) {
                    if (!this.validatePositions()) return;
                    this.step = 3;
                }
            },
            async createForm() {
                if (!this.validateSettings()) return;
                this.isLoading = true;
                try {
                    const response = await fetch('/api/forms', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            form: this.form,
                            positions: this.positions,
                            settings: this.settings
                        })
                    });
                    const result = await response.json();
                    if (response.ok) {
                        this.shareLink = `${window.location.origin}/vote/${result.form_id}`;
                        this.step = 4;
                    } else {
                        this.showNotification(result.message || 'Error creating form', 'error');
                    }
                } catch (error) {
                    this.showNotification('Error creating form. Please try again.', 'error');
                } finally {
                    this.isLoading = false;
                }
            },
            validateBasicInfo() {
                if (!this.form.title || !this.form.organization || !this.form.description || !this.form.start || !this.form.end) {
                    this.showNotification('Please fill all required fields.', 'error');
                    return false;
                }
                if (this.form.description.length > 800) {
                    this.showNotification('Description must be 800 characters or less.', 'error');
                    return false;
                }
                if (this.form.end <= this.form.start) {
                    this.showNotification('Voting end must be after voting start.', 'error');
                    return false;
                }
                return true;
            },
            validatePositions() {
                for (const pos of this.positions) {
                    if (!pos.name || pos.candidates.some(c => !c.trim())) {
                        this.showNotification('Please fill all position and candidate fields.', 'error');
                        return false;
                    }
                }
                return true;
            },
            validateSettings() {
                if (this.settings.registrationDeadline && this.settings.registrationDeadline >= this.form.start) {
                    this.showNotification('Registration deadline must be before voting start time.', 'error');
                    return false;
                }
                if (this.settings.adminEmails.trim()) {
                    const emails = this.settings.adminEmails.split(',').map(email => email.trim());
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    for (const email of emails) {
                        if (email && !emailRegex.test(email)) {
                            this.showNotification(`Invalid email format: ${email}`, 'error');
                            return false;
                        }
                    }
                }
                if (this.settings.enableGeoRestriction) {
                    if (!this.settings.centerLat || !this.settings.centerLng) {
                        this.showNotification('Please select a location for geo-restrictions.', 'error');
                        return false;
                    }
                    if (!this.settings.radius || this.settings.radius <= 0) {
                        this.showNotification('Please set a valid radius for geo-restrictions.', 'error');
                        return false;
                    }
                }
                return true;
            },
            addPosition() {
                this.positions.push({ name: '', candidates: [''] });
            },
            removePosition(i) {
                if (this.positions.length > 1) {
                    this.positions.splice(i, 1);
                }
            },
            addCandidate(i) {
                this.positions[i].candidates.push('');
            },
            removeCandidate(i, j) {
                if (this.positions[i].candidates.length > 1) {
                    this.positions[i].candidates.splice(j, 1);
                }
            },
            copyLink() {
                navigator.clipboard.writeText(this.shareLink).then(() => {
                    this.showNotification('Link copied to clipboard!', 'success');
                });
            },
            showNotification(message, type) {
                alert(message);
            }
        }
    }
</script>
</body>
</script>

</body>
</html>
