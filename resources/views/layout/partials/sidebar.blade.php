<!-- Sidebar -->
<aside :class="collapsed ? 'w-20' : 'w-64'" class="bg-gradient-to-b from-[#1B1B1B] to-[#003153] text-white min-h-screen flex flex-col transition-all duration-300">
    <div class="p-6 flex-1 flex flex-col">
        <div class="flex items-center space-x-2 mb-4">
            <i class="ri-shield-keyhole-fill header-icon text-2xl"></i>
            <h2 class="text-lg font-semibold" x-show="!collapsed">Secure Vote Ph</h2>
        </div>
        <nav class="nav flex-1">
            <ul class="nav__list">
                <li class="mb-4 nav__items flex items-center justify-start" :class="request()->routeIs('voting.dashboard') ? 'active' : ''">
                    <a
                        href="{{ route('ma-dashboard') }}"
                        class="hover:text-gray-400 nav__link flex items-center text-left"
                        @click.prevent="loading = true; window.location.href = '{{ route('ma-dashboard') }}';"
                    >
                        <i class="ri-dashboard-fill mr-2"></i>
                        <span x-show="!collapsed">Dashboard</span>
                    </a>
                </li>
                <li class="mb-4 nav__items flex items-center justify-start">
                    <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
                        <i class="ri-group-fill mr-2"></i>
                        <span x-show="!collapsed">Partylist</span>
                    </a>
                </li>
                <li class="mb-4 nav__items flex items-center justify-start">
                    <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
                        <i class="ri-user-star-fill mr-2"></i>
                        <span x-show="!collapsed">Candidates</span>
                    </a>
                </li>
                <li class="mb-4 nav__items flex items-center justify-start" :class="request()->routeIs('voting.voter-record') ? 'active' : ''">
                    <a
                        href="{{ route('ma-voterRecord') }}"
                        class="hover:text-gray-400 nav__link flex items-center text-left"
                        @click.prevent="loading = true; window.location.href = '{{ route('ma-voterRecord') }}';"
                    >
                        <i class="ri-file-list-3-fill mr-2"></i>
                        <span x-show="!collapsed">Voter Record</span>
                    </a>
                </li>
                <li class="mb-4 nav__items flex items-center justify-start">
                    <a
                        href="{{ route('ma-votingSettings') }}"
                        class="hover:text-gray-400 nav__link flex items-center text-left"
                        @click.prevent="loading = true; window.location.href = '{{ route('ma-votingSettings') }}';"
                    >
                        <i class="ri-file-list-3-fill mr-2"></i>
                        <span x-show="!collapsed">Voter Settings</span>
                    </a>
                </li>
                <li class="mb-4 nav__items flex items-center justify-start">
                    <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
                        <i class="ri-bar-chart-2-fill mr-2"></i>
                        <span x-show="!collapsed">Analytics</span>
                    </a>
                </li>
                <li class="mb-4 nav__items flex items-center justify-start">
                    <a
                        href="{{ route('ma-createForm') }}"
                        class="hover:text-gray-400 nav__link flex items-center text-left"
                        @click.prevent="loading = true; window.location.href = '{{ route('ma-createForm') }}';"
                    >
                        <i class="ri-file-list-3-fill mr-2"></i>
                        <span x-show="!collapsed">Create a Form</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Logout button left-aligned, icon only when collapsed -->
    <div class="p-6" x-show="!collapsed">
        <a href="#" class="hover:text-gray-400 nav__link flex items-center text-left">
            <i class="ri-logout-box-fill mr-2"></i> Logout
        </a>
    </div>
    <div class="p-6" x-show="collapsed">
        <a href="#" class="hover:text-gray-400 nav__link flex items-center justify-start">
            <i class="ri-logout-box-fill"></i>
        </a>
    </div>
</aside>
