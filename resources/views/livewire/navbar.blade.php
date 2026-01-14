<nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-100">
    <div class="w-full px-4 sm:px-6 lg:px-10">
        <div class="flex justify-between items-center h-16">
            <!-- Logo dan Brand -->
            <div class="flex items-center space-x-8">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-red-600 to-red-700 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-bowl-food text-yellow-400 text-lg"></i>
                    </div>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-red-600 to-red-700 bg-clip-text text-transparent"
                        style="font-family: 'Noto Sans SC', sans-serif;">
                        金龍閣
                    </h1>
                </div>

                <!-- Menu navigasi utama -->
                <div class="hidden lg:flex space-x-1">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('home') ? 'text-red-600 bg-red-50' : '' }}">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="{{ route('menu') }}"
                        class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('menu') ? 'text-red-600 bg-red-50' : '' }}">
                        <i class="fas fa-utensils mr-2"></i>Menu
                    </a>
                    <a href="{{ route('orders') }}"
                        class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('orders') ? 'text-red-600 bg-red-50' : '' }}">
                        <i class="fas fa-shopping-bag mr-2"></i>Orders
                    </a>
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                                class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('admin.*') ? 'text-red-600 bg-red-50' : '' }}">
                                <i class="fas fa-cog mr-2"></i>Admin
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Bagian kanan navbar: Cart dan Authentication -->
            <div class="flex items-center space-x-4">
                <div class="hidden md:block w-72">
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 pointer-events-none">
                            <i class="fas fa-search"></i>
                        </span>

                        <input type="text" placeholder="Search food..." wire:model.live.debounce.300ms="search"
                            class="w-full pl-11 pr-4 py-2 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition" />
                    </div>
                </div>

                <!-- Cart Component -->
                <livewire:cart-component />

                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-3 px-4 py-2 bg-gray-50 hover:bg-gray-100 rounded-xl transition-all duration-200 border border-gray-200">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <i class="fas fa-chevron-down text-gray-400 text-sm transition-transform duration-200"
                                :class="{ 'rotate-180': open }"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="fixed right-4 top-16 w-56 bg-white rounded-xl shadow-2xl border border-gray-100 py-2 z-[9999]">
                            <!-- User Info Header -->
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white font-semibold">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</div>
                                        <div class="text-xs text-gray-500">{{ auth()->user()->email }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="py-2">
                                <a href="{{ route('user.settings') }}"
                                    class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                    <i class="fas fa-user-cog mr-3 text-gray-400"></i>
                                    <span>Pengaturan</span>
                                </a>

                                @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                        <i class="fas fa-cog mr-3 text-gray-400"></i>
                                        <span>Admin Panel</span>
                                    </a>
                                @endif

                                <hr class="my-2 border-gray-100">

                                <button type="button" wire:click="openLogoutModal"
                                    class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3"></i>
                                    <span>Logout</span>
                                </button>


                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login/Register Buttons -->
                    <div class="flex items-center space-x-3">
                        <button wire:click="openLoginModal"
                            class="px-4 py-2 text-gray-700 hover:text-red-600 font-medium transition-colors rounded-lg hover:bg-red-50">
                            <i class="fas fa-sign-in-alt mr-2"></i>Login
                        </button>
                        <button wire:click="openRegisterModal"
                            class="px-6 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-user-plus mr-2"></i>Register
                        </button>
                    </div>
                @endauth
            </div>
        </div>
</nav>
