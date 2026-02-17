<nav 
    x-data="{ mobileMenuOpen: false }" 
    class="sticky top-0 z-50 bg-white border-b border-indigo-50 shadow-sm font-body"
>
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">
            
            {{-- LEFT: Logo & Brand --}}
            <div class="flex items-center gap-8">
                <a href="/" class="flex items-center gap-3 group">
                    {{-- Logo Container --}}
                    <div class="w-10 h-10 rounded-xl overflow-hidden shadow-indigo-200 shadow-md bg-indigo-50 flex items-center justify-center transition-transform group-hover:scale-105">
                        @php $dbLogo = \App\Models\SystemConfig::value('brand_logo'); @endphp
                        @if($dbLogo)
                            <img src="https://bbbvjqzpktarmsblmblv.supabase.co/storage/v1/object/public/chinaon/{{ $dbLogo }}" class="w-full h-full object-cover">
                        @else
                            {{-- Default Icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        @endif
                    </div>

                    {{-- Brand Name --}}
                    <span class="text-2xl font-brand tracking-wide bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-cyan-500">
                        {{ \App\Models\SystemConfig::value('brand_name') ?? 'UKITA' }}
                    </span>
                </a>

                {{-- DESKTOP MENU --}}
                @auth
                <div class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('home') }}" 
                       class="px-4 py-2 rounded-full text-sm font-bold transition-all {{ request()->routeIs('home') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                        {{ __('language.home') }}
                    </a>
                    <a href="{{ route('catalogue') }}" 
                       class="px-4 py-2 rounded-full text-sm font-bold transition-all {{ request()->routeIs('catalogue') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                        {{ __('language.catalogue') }}
                    </a>
                    <a href="{{ route('orders') }}" 
                       class="px-4 py-2 rounded-full text-sm font-bold transition-all {{ request()->routeIs('orders') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                        {{ __('language.orders') }}
                    </a>
                    <a href="{{ route('reservation') }}" 
                       class="px-4 py-2 rounded-full text-sm font-bold transition-all {{ request()->routeIs('reservation') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                        {{ __('language.reservations') }}
                    </a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" 
                           class="px-4 py-2 rounded-full text-sm font-bold text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition-all">
                            Admin
                        </a>
                    @endif
                </div>
                @endauth
            </div>

            {{-- RIGHT: Actions --}}
            <div class="flex items-center gap-4">
                
                {{-- Language Switcher --}}
                <div class="hidden md:flex items-center bg-slate-100/50 border border-slate-200 rounded-full p-1">
                    <button wire:click="setLanguage('en')" class="px-3 py-1 rounded-full text-xs font-bold transition-all {{ app()->getLocale() === 'en' ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500 hover:text-indigo-600' }}">EN</button>
                    <button wire:click="setLanguage('cn')" class="px-3 py-1 rounded-full text-xs font-bold transition-all {{ app()->getLocale() === 'cn' ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500 hover:text-indigo-600' }}">CN</button>
                </div>

                {{-- Cart --}}
                @auth
                    <livewire:cart-component />
                @endauth

                {{-- Auth Buttons --}}
                @guest
                    <div class="hidden md:flex items-center gap-3">
                        <button wire:click="openLoginModal" class="px-5 py-2.5 text-slate-600 font-bold hover:text-indigo-600 transition-colors">
                            {{ __('language.login') }}
                        </button>
                        <button wire:click="openRegisterModal" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-600/20 transition-all transform hover:scale-105">
                            {{ __('language.register') }}
                        </button>
                    </div>
                @else
                    {{-- User Dropdown --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 pl-2 pr-1 py-1 bg-white border border-slate-200 rounded-full hover:border-indigo-300 transition-all">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-cyan-500 flex items-center justify-center text-white text-xs font-bold shadow-md">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <svg class="w-4 h-4 text-slate-400 mr-2 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div x-show="open" @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 top-full mt-2 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2">
                            
                            <div class="px-4 py-3 border-b border-slate-50 mb-1">
                                <p class="text-sm font-bold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ auth()->user()->email }}</p>
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
                @endguest

                {{-- Mobile Menu Toggle --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-lg">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- MOBILE MENU DROPDOWN --}}
    <div x-show="mobileMenuOpen" x-cloak 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         @click.away="mobileMenuOpen = false"
         class="lg:hidden bg-white border-t border-slate-100 shadow-xl absolute w-full top-20 left-0">
        
        <div class="px-6 py-6 space-y-2">
            @auth
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('home') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50' }}">
                    {{ __('language.home') }}
                </a>
                <a href="{{ route('catalogue') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('catalogue') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50' }}">
                    {{ __('language.catalogue') }}
                </a>
                <a href="{{ route('orders') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('orders') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50' }}">
                    {{ __('language.orders') }}
                </a>
                <a href="{{ route('reservation') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('reservation') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50' }}">
                    {{ __('language.reservations') }}
                </a>
            @endauth

            <div class="h-px bg-slate-100 my-4"></div>

            <div class="flex items-center justify-between px-4">
                <span class="text-sm font-bold text-slate-400">Language</span>
                <div class="flex gap-2">
                    <button wire:click="setLanguage('en')" class="px-3 py-1 rounded-lg text-xs font-bold {{ app()->getLocale() === 'en' ? 'bg-indigo-600 text-white' : 'bg-slate-100 text-slate-500' }}">EN</button>
                    <button wire:click="setLanguage('cn')" class="px-3 py-1 rounded-lg text-xs font-bold {{ app()->getLocale() === 'cn' ? 'bg-indigo-600 text-white' : 'bg-slate-100 text-slate-500' }}">CN</button>
                </div>
            </div>

            @guest
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <button wire:click="openLoginModal" class="py-3 text-slate-600 font-bold border border-slate-200 rounded-xl hover:bg-slate-50">
                        {{ __('language.login') }}
                    </button>
                    <button wire:click="openRegisterModal" class="py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg hover:bg-indigo-700">
                        {{ __('language.register') }}
                    </button>
                </div>
            @endguest
        </div>
    </div>
</nav>
