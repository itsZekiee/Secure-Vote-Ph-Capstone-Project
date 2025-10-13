<aside x-show="!collapsed || !isMobile"
       x-transition:enter="transition ease-out duration-300"
       x-transition:enter-start="-translate-x-full"
       x-transition:enter-end="translate-x-0"
       x-transition:leave="transition ease-in duration-300"
       x-transition:leave-start="translate-x-0"
       x-transition:leave-end="-translate-x-full"
       :class="collapsed && !isMobile ? 'w-20' : 'w-64'"
       style="background: linear-gradient(135deg, #1B1B1B, #003153);"
       class="fixed lg:static inset-y-0 left-0 z-40 border-r border-gray-200 shadow-lg lg:shadow-none transition-all duration-300">

    <!-- Overlay for mobile -->
    <div x-show="!collapsed && isMobile"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="collapsed = true"
         class="fixed inset-0 bg-black bg-opacity-50 lg:hidden"></div>

    <div class="flex flex-col h-full">
        <!-- Logo Section -->
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <div x-show="!collapsed || isMobile"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center"
                     style="background: linear-gradient(135deg, #1B1B1B, #003153);">
                    <i class="ri-shield-check-line text-white text-lg"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white">SecureVote</h1>
                    <p class="text-xs text-gray-300">Admin Panel</p>
                </div>
            </div>

            <!-- Collapsed Logo -->
            <div x-show="collapsed && !isMobile"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="w-10 h-10 rounded-xl flex items-center justify-center mx-auto"
                 style="background: linear-gradient(135deg, #1B1B1B, #003153);">
                <i class="ri-shield-check-line text-white text-lg"></i>
            </div>

            <!-- Close button for mobile -->
            <button x-show="isMobile && !collapsed"
                    @click="collapsed = true"
                    class="p-2 rounded-lg text-white hover:text-gray-300 hover:bg-gray-700 lg:hidden">
                <i class="ri-close-line text-xl"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-blue-50 hover:text-blue-600 transition-all group {{ request()->routeIs('mdashboard') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="ri-dashboard-3-line text-xl"></i>
                <span x-show="!collapsed || isMobile"
                      x-transition:enter="transition ease-out duration-200 delay-75"
                      x-transition:enter-start="opacity-0 translate-x-2"
                      x-transition:enter-end="opacity-100 translate-x-0"
                      class="font-medium">Dashboard</span>
            </a>

            <!-- Elections -->
            <a href="{{ route('ma-createForm') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-green-50 hover:text-green-600 transition-all group {{ request()->routeIs('ma-createForm') ? 'bg-green-50 text-green-600' : '' }}">
                <i class="ri-government-line text-xl"></i>
                <span x-show="!collapsed || isMobile"
                      x-transition:enter="transition ease-out duration-200 delay-75"
                      x-transition:enter-start="opacity-0 translate-x-2"
                      x-transition:enter-end="opacity-100 translate-x-0"
                      class="font-medium">Elections</span>
            </a>

            <!-- Voters -->
            <a href="{{ route('ma-voterRecord') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-purple-50 hover:text-purple-600 transition-all group {{ request()->routeIs('ma-voters') ? 'bg-purple-50 text-purple-600' : '' }}">
                <i class="ri-team-line text-xl"></i>
                <span x-show="!collapsed || isMobile"
                      x-transition:enter="transition ease-out duration-200 delay-75"
                      x-transition:enter-start="opacity-0 translate-x-2"
                      x-transition:enter-end="opacity-100 translate-x-0"
                      class="font-medium">Voters</span>
            </a>

            <!-- Candidates -->
            <a href="{{ route('ma-candidate-page') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-orange-50 hover:text-orange-600 transition-all group {{ request()->routeIs('ma-candidates') ? 'bg-orange-50 text-orange-600' : '' }}">
                <i class="ri-user-star-line text-xl"></i>
                <span x-show="!collapsed || isMobile"
                      x-transition:enter="transition ease-out duration-200 delay-75"
                      x-transition:enter-start="opacity-0 translate-x-2"
                      x-transition:enter-end="opacity-100 translate-x-0"
                      class="font-medium">Candidates</span>
            </a>

            <!-- Partylists -->
            <a href="{{ route('ma-partylist-page') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-indigo-50 hover:text-indigo-600 transition-all group {{ request()->routeIs('ma-partylists') ? 'bg-indigo-50 text-indigo-600' : '' }}">
                <i class="ri-flag-line text-xl"></i>
                <span x-show="!collapsed || isMobile"
                      x-transition:enter="transition ease-out duration-200 delay-75"
                      x-transition:enter-start="opacity-0 translate-x-2"
                      x-transition:enter-end="opacity-100 translate-x-0"
                      class="font-medium">Partylists</span>
            </a>

            <!-- Analytics -->
            <a href="{{ route('ma-analytics-page') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-pink-50 hover:text-pink-600 transition-all group {{ request()->routeIs('ma-analytics') ? 'bg-pink-50 text-pink-600' : '' }}">
                <i class="ri-bar-chart-box-line text-xl"></i>
                <span x-show="!collapsed || isMobile"
                      x-transition:enter="transition ease-out duration-200 delay-75"
                      x-transition:enter-start="opacity-0 translate-x-2"
                      x-transition:enter-end="opacity-100 translate-x-0"
                      class="font-medium">Analytics</span>
            </a>

            <!-- Settings -->
            <a href="{{ route('ma-votingSettings') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-gray-100 hover:text-gray-900 transition-all group {{ request()->routeIs('ma-settings') ? 'bg-gray-100 text-gray-900' : '' }}">
                <i class="ri-settings-3-line text-xl"></i>
                <span x-show="!collapsed || isMobile"
                      x-transition:enter="transition ease-out duration-200 delay-75"
                      x-transition:enter-start="opacity-0 translate-x-2"
                      x-transition:enter-end="opacity-100 translate-x-0"
                      class="font-medium">Settings</span>
            </a>
        </nav>

        <!-- User Profile -->
        <div class="p-4 border-t border-gray-100">
            <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-700 transition-colors cursor-pointer">
                <div x-show="!collapsed || isMobile"
                     x-transition:enter="transition ease-out duration-200 delay-75"
                     x-transition:enter-start="opacity-0 translate-x-2"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     class="flex-1">
                    <div class="font-semibold text-white text-sm">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-white">{{ auth()->user()->email }}</div>
                </div>
                <!-- Logout Icon -->
                <i x-show="!collapsed || isMobile"
                   x-transition:enter="transition ease-out duration-200 delay-100"
                   x-transition:enter-start="opacity-0"
                   x-transition:enter-end="opacity-100"
                   class="ri-logout-box-line text-white hover:text-red-400 transition-colors"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></i>
            </div>
            <!-- Hidden Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</aside>
