<nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-100" x-data="{ mobileMenuOpen: false }">
    <div class="w-full px-4 sm:px-6 lg:px-10">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-4 lg:space-x-8">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600 transition-colors">
                    <i class="fas" :class="mobileMenuOpen ? 'fa-times' : 'fa-bars'"></i>
                </button>

                <a href="/" class="flex items-center space-x-3 group transition-transform active:scale-95">
                    {{-- BOX LOGO --}}
                    <div class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center overflow-hidden transition-all duration-300">
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
                                <div class="w-8 h-8 md:w-10 md:h-10 bg-red-700 rounded-xl flex items-center justify-center shadow-md">
                                    <i class="fas fa-bowl-food text-yellow-400 text-sm md:text-lg"></i>
                                </div>
                            @endif
                        @endif
                    </div>

                    {{-- NAMA BRAND --}}
                    <h1 class="text-lg md:text-2xl font-bold bg-gradient-to-r from-red-600 to-red-700 bg-clip-text text-transparent group-hover:from-red-500 group-hover:to-red-600 transition-all duration-300"
                        style="font-family: 'Noto Sans SC', sans-serif;">
                        {{ \App\Models\SystemConfig::value('brand_name') ?? '金龍閣' }}
                    </h1>
                </a>

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

            <div class="flex items-center space-x-2 md:space-x-4">

                <div class="hidden md:flex items-center gap-1 font-medium">
                    <button type="button" wire:click="setLanguage('en')" wire:loading.disable
                        class="transition-colors {{ app()->getLocale() === 'en' ? 'text-red-600 font-semibold' : 'text-gray-700 hover:text-red-600' }}">
                        EN
                    </button>
                    <span class="text-gray-400">|</span>
                    <button type="button" wire:click="setLanguage('cn')" wire:loading.disable
                        class="transition-colors {{ app()->getLocale() === 'cn' ? 'text-red-600 font-semibold' : 'text-gray-700 hover:text-red-600' }}">
                        CN
                    </button>
                </div>

                <livewire:cart-component />

                @auth
                    @if (auth()->user()->role === 'admin')
                        @livewire('admin-notification-bell')
                    @endif
                @endauth


                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-1 md:space-x-3 p-1 md:px-4 md:py-2 bg-gray-50 hover:bg-gray-100 rounded-xl transition-all duration-200 border border-gray-200">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <i class="fas fa-chevron-down text-gray-400 text-xs md:text-sm transition-transform duration-200"
                                :class="{ 'rotate-180': open }"></i>
                        </button>

                        <div x-show="open" @click.away="open = false" 
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 top-full mt-2 w-56 bg-white rounded-xl shadow-2xl border border-gray-100 py-2 z-[9999]">
                            
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white font-semibold">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="text-sm font-semibold text-gray-800 truncate">{{ auth()->user()->name }}</div>
                                        <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="py-2">
                                <a href="{{ route('sumerize') }}"
                                    class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                    <i class="fas fa-chart-line mr-3 text-gray-400"></i>
                                    <span>Summarize</span>
                                </a>

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
                    <div class="flex items-center space-x-2 md:space-x-3">
                        <button wire:click="openLoginModal"
                            class="px-2 md:px-4 py-2 text-gray-700 hover:text-red-600 font-medium transition-colors rounded-lg hover:bg-red-50 text-sm md:text-base">
                            <i class="fas fa-sign-in-alt md:mr-2"></i><span class="hidden md:inline">{{ __('language.login') }}</span>
                        </button>
                        <button wire:click="openRegisterModal"
                            class="px-3 md:px-6 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg md:rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg text-sm md:text-base">
                            <i class="fas fa-user-plus md:mr-2"></i><span class="hidden md:inline">{{ __('language.register') }}</span>
                        </button>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         @click.away="mobileMenuOpen = false"
         class="lg:hidden bg-white border-t border-gray-100 shadow-xl">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">
                <i class="fas fa-home w-8"></i> {{ __('language.home') }}
            </a>
            <a href="{{ route('menu') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">
                <i class="fas fa-utensils w-8"></i> {{ __('language.menu') }}
            </a>
            
            @auth
                <a href="{{ route('orders') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">
                    <i class="fas fa-shopping-bag w-8"></i> {{ __('language.orders') }}
                </a>
                <a href="{{ route('reservation') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">
                    <i class="fas fa-calendar-check w-8"></i> {{ __('language.reservations') }}
                </a>
            @else
                <button wire:click="openLoginModal" class="flex items-center w-full px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors text-left">
                    <i class="fas fa-shopping-bag w-8"></i> {{ __('language.orders') }}
                </button>
            @endauth

            <div class="flex items-center px-4 py-4 border-t border-gray-50 mt-2">
                <span class="text-sm text-gray-400 mr-4">Language:</span>
                <button wire:click="setLanguage('en')" class="px-3 py-1 rounded-md {{ app()->getLocale() === 'en' ? 'bg-red-600 text-white' : 'text-gray-600' }}">EN</button>
                <button wire:click="setLanguage('cn')" class="px-3 py-1 rounded-md {{ app()->getLocale() === 'cn' ? 'bg-red-600 text-white' : 'text-gray-600' }} ml-2">CN</button>
            </div>
        </div>
    </div>
</nav>
