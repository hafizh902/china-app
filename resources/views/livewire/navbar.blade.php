<nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-100">
    <div class="w-full px-4 sm:px-6 lg:px-10">
        <div class="flex justify-between items-center h-16">
            <!-- Logo dan Brand -->
            <div class="flex items-center space-x-8">
                <a href="/" class="flex items-center space-x-3 group transition-transform active:scale-95">
                    {{-- BOX LOGO --}}
                    <div class="w-12 h-12 flex items-center justify-center overflow-hidden transition-all duration-300">

                        {{-- 1. Cek apakah variabel $brand_logo ada (Sedang Upload) --}}
                        @if (isset($brand_logo) && $brand_logo)
                            <img src="{{ $brand_logo->temporaryUrl() }}" class="w-full h-full object-cover">
                        @else
                            {{-- 2. Jika tidak ada variabel upload, ambil langsung dari DB --}}
                            @php
                                $dbLogo = \App\Models\SystemConfig::value('brand_logo');
                            @endphp

                            @if ($dbLogo)
                                <img src="https://bbbvjqzpktarmsblmblv.supabase.co/storage/v1/object/public/chinaon/{{ $dbLogo }}?v={{ time() }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-10 h-10 bg-red-700 rounded-xl flex items-center justify-center shadow-md">
                                    <i class="fas fa-bowl-food text-yellow-400 text-lg"></i>
                                </div>
                            @endif
                        @endif
                    </div>

                    {{-- NAMA BRAND --}}
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-red-600 to-red-700 bg-clip-text text-transparent group-hover:from-red-500 group-hover:to-red-600 transition-all duration-300"
                        style="font-family: 'Noto Sans SC', sans-serif;">
                        {{ \App\Models\SystemConfig::value('brand_name') ?? '金龍閣' }}
                    </h1>
                </a>

                <!-- Menu navigasi utama -->
                <div class="hidden lg:flex space-x-1">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('home') ? 'text-red-600 bg-red-50' : '' }}">
                        <i class="fas fa-home mr-2"></i>{{ __('language.home') }}
                    </a>
                    <a href="{{ route('menu') }}"
                        class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('menu') ? 'text-red-600 bg-red-50' : '' }}">
                        <i class="fas fa-utensils mr-2"></i>{{ __('language.menu') }}
                    </a>
                    @auth
                        <a href="{{ route('orders') }}"
                            class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('orders') ? 'text-red-600 bg-red-50' : '' }}">
                            <i class="fas fa-shopping-bag mr-2"></i>{{ __('language.orders') }}
                        </a>
                        <a href="{{ route('reservation') }}"
                            class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('reservation') ? 'text-red-600 bg-red-50' : '' }}">
                            <i class="fas fa-calendar-check mr-2"></i>{{ __('language.reservations') }}
                        </a>
                    @else
                        <button wire:click="openLoginModal" type="button"
                            class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg">
                            <i class="fas fa-shopping-bag mr-2"></i>{{ __('language.orders') }}
                        </button>
                    @endauth

                    @auth
                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                                class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('admin.*') ? 'text-red-600 bg-red-50' : '' }}">
                                <i class="fas fa-cog mr-2"></i>{{ __('language.admin') }}
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Bagian kanan navbar: Cart dan Authentication -->
            <div class="flex items-center space-x-4">

                <!-- Language Switcher -->
                <div class="flex items-center gap-1 font-medium">
                    <button type="button" wire:click="setLanguage('en')" wire:loading.disable
                        class="transition-colors
        {{ app()->getLocale() === 'en' ? 'text-red-600 font-semibold' : 'text-gray-700 hover:text-red-600' }}">
                        EN
                    </button>

                    <span class="text-gray-400">|</span>

                    <button type="button" wire:click="setLanguage('cn')" wire:loading.disable
                        class="transition-colors
        {{ app()->getLocale() === 'cn' ? 'text-red-600 font-semibold' : 'text-gray-700 hover:text-red-600' }}">
                        CN
                    </button>

                </div>
                <!-- Cart Component -->
                <livewire:cart-component />

                @auth
                    @if (auth()->user()->role === 'admin')
                        @livewire('admin-notification-bell')
                    @endif
                @endauth


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
                                    <span>{{ __('language.settings') }}</span>
                                </a>

                                @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                        <i class="fas fa-cog mr-3 text-gray-400"></i>
                                        <span>{{ __('language.admin_panel') }}</span>
                                    </a>
                                @endif

                                <hr class="my-2 border-gray-100">

                                <button type="button" wire:click="openLogoutModal"
                                    class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3"></i>
                                    <span>{{ __('language.logout') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login/Register Buttons -->
                    <div class="flex items-center space-x-3">
                        <button wire:click="openLoginModal"
                            class="px-4 py-2 text-gray-700 hover:text-red-600 font-medium transition-colors rounded-lg hover:bg-red-50">
                            <i class="fas fa-sign-in-alt mr-2"></i>{{ __('language.login') }}
                        </button>
                        <button wire:click="openRegisterModal"
                            class="px-6 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-user-plus mr-2"></i>{{ __('language.register') }}
                        </button>
                    </div>
                @endauth

            </div>
        </div>
</nav>
