<div class="min-h-screen bg-slate-50 font-sans text-slate-800 selection:bg-indigo-500 selection:text-white">

    {{-- Inline CSS --}}
    <style>
        @font-face {
            font-family: 'Coolvetica';
            src: url('/fonts/coolvetica.otf') format('opentype');
            font-weight: normal;
        }

        @font-face {
            font-family: 'CreatoDisplay';
            src: url('/fonts/CreatoDisplay-Regular.otf') format('opentype');
            font-weight: normal;
        }

        @font-face {
            font-family: 'CreatoDisplay';
            src: url('/fonts/CreatoDisplay-Bold.otf') format('opentype');
            font-weight: bold;
        }

        .font-brand {
            font-family: 'Coolvetica', sans-serif;
        }

        .font-body {
            font-family: 'CreatoDisplay', sans-serif;
        }

        .hide-scroll::-webkit-scrollbar {
            display: none;
        }

        .hide-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    {{-- Main Container --}}
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-6 md:py-10">

        {{-- Mobile Title --}}
        <div class="lg:hidden mb-4">
            <h2 class="text-3xl font-brand text-slate-900 tracking-wide">
                {{ __('language.browse_categories') }}
            </h2>
        </div>

        {{-- Layout Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">

            {{-- COLUMN 1: PRODUCTS LIST (LEFT) --}}
            <div class="order-2 lg:order-1 lg:col-span-3">

                {{-- Header Desktop --}}
                <div class="hidden lg:flex items-end justify-between mb-6 pb-4 border-b border-slate-200">
                    <div>
                        <h2 class="text-4xl font-brand text-slate-900 tracking-wide">
                            {{ __('language.product_list') }}
                        </h2>
                        <p class="text-slate-500 font-body mt-1 text-sm">
                            Check out our products and find your favorite items!
                        </p>
                    </div>
                </div>

                {{-- Product Grid --}}
                <div class="relative min-h-[400px]">
                    {{-- Background Pattern --}}
                    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#4F46E5 1px, transparent 1px); background-size: 20px 20px;"></div>

                    @if ($menuItems->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 relative z-10">
                            @foreach ($menuItems as $item)
                                <div class="group relative bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-indigo-500/10 transition-all duration-300 hover:-translate-y-1 flex flex-col {{ !$item->is_available ? 'opacity-75 grayscale-[0.8]' : '' }}">

                                    {{-- Image --}}
                                    <div class="relative aspect-[4/3] overflow-hidden"
                                        @if ($item->is_available) wire:click="$dispatch('open-preview-modal', [{{ $item->id }}])" @endif>

                                        <img src="{{ $item->image_url }}" alt="{{ $item->name }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 {{ $item->is_available ? 'cursor-pointer' : 'cursor-not-allowed' }}">

                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

                                        {{-- Badge --}}
                                        <div class="absolute top-3 left-3 z-10">
                                            <span class="px-2 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider text-white backdrop-blur-md border border-white/10
                                            {{ $item->is_available ? 'bg-indigo-600/90' : 'bg-slate-500/90' }}">
                                                {{ $item->is_available ? __('language.available') : __('language.sold_out') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Content --}}
                                    <div class="p-5 flex flex-col flex-grow">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="font-brand text-lg text-slate-800 group-hover:text-indigo-600 transition-colors leading-tight cursor-pointer line-clamp-2 pr-2"
                                                @if ($item->is_available) wire:click="$dispatch('open-preview-modal', [{{ $item->id }}])" @endif>
                                                {{ $item->name }}
                                            </h3>
                                            <span class="font-bold text-indigo-600 whitespace-nowrap text-sm bg-indigo-50 px-2 py-1 rounded-lg border border-indigo-100">
                                                <span class="text-[10px] mr-0.5">Rp</span>{{ number_format($item->price, 0, ',', '.') }}
                                            </span>
                                        </div>

                                        <p class="text-slate-500 text-xs font-body leading-relaxed line-clamp-2 mb-4 flex-grow">
                                            {{ $item->description ?? __('language.no_description') }}
                                        </p>

                                        {{-- Action --}}
                                        <div class="pt-4 border-t border-slate-50">
                                            @if ($item->is_available)
                                                <button
                                                    wire:click="$dispatch('add-to-cart', [{{ $item->id }}, '{{ $item->name }}', {{ $item->price }}, '{{ $item->image }}']).to('cart-component')"
                                                    class="w-full py-2.5 rounded-xl bg-slate-900 text-white hover:bg-indigo-600 transition-colors flex items-center justify-center gap-2 group/btn shadow-md shadow-slate-200">
                                                    <span class="text-xs font-bold uppercase tracking-wider">{{ __('language.add') }}</span>
                                                    <i class="fas fa-plus text-[10px] group-hover/btn:rotate-90 transition-transform"></i>
                                                </button>
                                            @else
                                                <div class="w-full py-2.5 text-center bg-slate-100 rounded-xl border border-slate-200 cursor-not-allowed">
                                                    <span class="text-slate-400 text-xs font-bold uppercase tracking-wider">{{ __('language.sold_out') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        {{-- Empty State --}}
                        <div class="flex flex-col items-center justify-center py-20 text-center bg-white rounded-2xl border border-slate-100 border-dashed">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4 text-slate-300">
                                <i class="fas fa-search text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-brand text-slate-800 mb-1">{{ __('language.item_not_found') }}</h3>
                            <p class="text-slate-400 font-body text-sm">
                                Tidak ada hasil untuk pencarian <span class="text-slate-800 font-bold">"{{ $search }}"</span>
                            </p>
                            <button wire:click="$set('search', '')" class="mt-4 text-indigo-600 text-xs font-bold hover:underline font-body uppercase tracking-wider">
                                Clear Search
                            </button>
                        </div>
                    @endif
                </div>

                {{-- Infinite Scroll --}}
                @if ($hasMore)
                    <div x-data x-intersect="$wire.loadMore()" class="py-8 flex justify-center">
                        <div class="flex items-center gap-2 text-indigo-600">
                            <i class="fas fa-circle-notch fa-spin text-lg"></i>
                            <span class="text-sm font-bold font-body">{{ __('language.loading_more') }}</span>
                        </div>
                    </div>
                @endif
            </div>

            {{-- COLUMN 2: SIDEBAR (RIGHT) --}}
            <div class="order-1 space-y-6 lg:sticky lg:top-24 py-1">

                {{-- Container Sticky --}}
                <div class="space-y-6 lg:sticky lg:top-24 py-1">

                    {{-- UNIFIED FILTER CARD --}}
                    <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xl shadow-slate-200/50">
                        <h3 class="font-brand text-lg text-slate-800 mb-4 flex items-center gap-2 border-b border-slate-100 pb-3">
                            <i class="fas fa-sliders-h text-indigo-500"></i>
                            Filter Options
                        </h3>

                        {{-- 1. SEARCH INPUT --}}
                        <div class="mb-5">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-wider font-body mb-2 block">
                                {{ __('language.search') }}
                            </label>
                            <div class="relative group">
                                <input type="text" wire:model.live.debounce.300ms="search"
                                    placeholder="{{ __('language.search_item') }}"
                                    class="w-full pl-10 pr-4 py-2.5 text-sm font-body bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all placeholder:text-slate-400" />
                                <span class="absolute left-3 top-3 text-slate-400 group-focus-within:text-indigo-500 transition-colors">
                                    <i class="fas fa-search"></i>
                                </span>
                                @if ($search)
                                    <button wire:click="$set('search', '')" class="absolute right-3 top-3 text-slate-400 hover:text-red-500">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @endif
                            </div>
                        </div>

                        {{-- 2. CATEGORY DROPDOWN (DYNAMIC FROM DB) --}}
                        <div class="mb-5">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-wider font-body mb-2 block">
                                {{ __('language.categories') }}
                            </label>
                            <div class="relative">
                                <select wire:model.live="category"
                                    class="w-full appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-sm font-bold font-body rounded-xl py-2.5 pl-4 pr-8 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 cursor-pointer hover:bg-slate-100 transition-colors capitalize">

                                    {{-- Opsi Default (All) --}}
                                    <option value="all">{{ __('language.all_categories', ['default' => 'Semua Kategori']) }}</option>

                                    {{-- Loop Data dari Database (Array of Strings) --}}
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat }}">
                                            {{-- Ubah 'main_course' jadi 'Main Course' untuk tampilan --}}
                                            {{ ucwords(str_replace('_', ' ', $cat)) }}
                                        </option>
                                    @endforeach

                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-500">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>

                        {{-- 3. SORT DROPDOWN --}}
                        <div>
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-wider font-body mb-2 block">
                                {{ __('language.sort_by') }}
                            </label>
                            <div class="relative">
                                <select wire:model.live="sort"
                                    class="w-full appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-sm font-bold font-body rounded-xl py-2.5 pl-4 pr-8 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 cursor-pointer hover:bg-slate-100 transition-colors">
                                    <option value="popular">{{ __('language.sort_popular') }}</option>
                                    <option value="price-low">{{ __('language.sort_price_low') }}</option>
                                    <option value="price-high">{{ __('language.sort_price_high') }}</option>
                                    <option value="name">{{ __('language.sort_name') }}</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-500">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>

                            @if ($item->is_available)
                                <button
                                    wire:click="$dispatch('add-to-cart', [{{ $item->id }}, '{{ $item->name }}', {{ $item->price }}, '{{ $item->image }}']).to('cart-component')"
                                    class="relative overflow-hidden group/btn bg-red-700 hover:bg-red-800 text-white flex items-center gap-3 px-6 py-2.5 rounded-xl transition-all shadow-md active:scale-95">
                                    <span class="text-xs font-bold uppercase tracking-widest">{{ __('language.add') }}</span>
                                    <i class="fas fa-plus text-[10px] bg-amber-400 text-red-900 p-1 rounded-full"></i>
                                </button>
                            @else
                                <span class="text-gray-400 text-xs font-bold uppercase italic">{{ __('language.sold_out') }}</span>
                            @endif
                        </div>

                    </div>

                    {{-- Promo Banner --}}
                    <div class="hidden lg:block bg-gradient-to-br from-indigo-600 to-violet-700 rounded-2xl p-6 text-white text-center shadow-xl shadow-indigo-500/20 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10"></div>
                        <div class="relative z-10">
                            <h4 class="font-brand text-lg mb-1">{{ $storeName ?? 'Official Store' }}</h4>
                            <p class="text-xs text-indigo-100 font-body">Temukan rasa terbaik hanya di sini.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Toast Notification --}}
        <div x-data="{ show: false, message: '' }"
            x-on:notify-success.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)"
            class="fixed top-6 right-6 z-[100] w-full max-w-sm" style="display: none;" x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-[-10px] scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-[-10px] scale-95">

            <div class="bg-white/95 backdrop-blur-xl border border-indigo-100 shadow-2xl shadow-indigo-500/10 rounded-2xl p-4 flex items-center gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="flex-1">
                    <h4 class="text-[10px] font-black font-body uppercase tracking-wider text-indigo-400">{{ __('language.cart') }}</h4>
                    <p class="text-sm font-bold font-body text-slate-800" x-text="message"></p>
                </div>
                <button @click="show = false" class="text-slate-300 hover:text-slate-500 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

    </div>
</div>