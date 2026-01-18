<div>
    {{-- Category & Sort Filter --}}
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-6 space-y-6">

            {{-- Title --}}
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800 tracking-tight">
                    {{ __('language.browse_categories') }}
                </h2>

                {{-- Search Input --}}
                <div class="relative w-72">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 pointer-events-none">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" wire:model.live.debounce.300ms="search"
                        placeholder="{{ __('language.search_food') }}"
                        class="w-full pl-11 pr-10 py-2 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition" />

                    @if ($search)
                        <button wire:click="$set('search', '')"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    @endif
                </div>
            </div>

            {{-- Category Filter --}}
            <div class="flex flex-wrap gap-2">
                @php
                    $categories = [
                        'all' => ['label' => 'language.all', 'icon' => null],
                        'main_course' => ['label' => 'language.main_course', 'icon' => 'fa-utensils'],
                        'snacks' => ['label' => 'language.snacks', 'icon' => 'fa-cookie-bite'],
                        'drinks' => ['label' => 'language.drinks', 'icon' => 'fa-mug-hot'],
                        'desserts' => ['label' => 'language.desserts', 'icon' => 'fa-ice-cream'],
                    ];

                @endphp

                @foreach ($categories as $key => $cat)
                    <button wire:click="$set('category', '{{ $key }}')"
                        class="
            inline-flex items-center gap-2
            px-4 py-2 rounded-full text-sm font-medium
            transition-all duration-200
            {{ $category === $key
                ? 'bg-red-500 text-white ring-2 ring-red-500/30'
                : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}
        ">
                        @if ($cat['icon'])
                            <i class="fas {{ $cat['icon'] }} text-xs"></i>
                        @endif

                        {{ __($cat['label']) }}
                    </button>
                @endforeach

            </div>
            {{-- Sort Filter --}}
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">
                    {{ __('language.sort_by') }}
                </span>

                <div class="flex gap-1 bg-gray-100 p-1 rounded-full">
                    @php
                        $options = [
                            'popular' => 'language.sort_popular',
                            'price-low' => 'language.sort_price_low',
                            'price-high' => 'language.sort_price_high',
                            'name' => 'language.sort_name',
                        ];
                    @endphp

                    @foreach ($options as $value => $label)
                        <button type="button" wire:click="setSort('{{ $value }}')"
                            class="
                    px-4 py-1.5 text-sm rounded-full
                    transition-all duration-200
                    {{ $sort === $value ? 'bg-white text-red-500 font-semibold shadow-sm' : 'text-gray-600 hover:text-gray-900' }}
                ">
                            {{ __($label) }}
                        </button>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    {{-- Menu Grid --}}
    <div class="px-6 py-12 bg-gradient-to-b from-gray-50 to-amber-50/40">
        @if ($menuItems->count() > 0)
            {{-- Grid Utama: Kita set grid-rows agar bisa di-subgrid oleh anak-anaknya --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-12">
                @foreach ($menuItems as $item)
                    {{-- Card Container: Diberi display grid dan span baris agar konsisten --}}
                    <div
                        class="group relative bg-white rounded-2xl overflow-hidden
                    shadow-sm hover:shadow-2xl transition-all duration-500
                    transform hover:-translate-y-2 border border-amber-100
                    flex flex-col h-full {{ !$item->is_available ? 'grayscale' : '' }}">

                        {{-- 1. Image Container (Fixed Height) --}}
                        <div class="relative h-64 overflow-hidden flex-shrink-0"
                            @if ($item->is_available) wire:click="$dispatch('open-preview-modal', [{{ $item->id }}])" @endif>

                            <img src="{{ $item->image_url }}" alt="{{ $item->name }}"
                                class="w-full h-full object-cover transition-transform duration-700
                           group-hover:scale-110 {{ $item->is_available ? 'cursor-pointer' : 'cursor-not-allowed' }}">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-60">
                            </div>

                            {{-- Status Tag --}}
                            <div class="absolute top-4 left-4 z-20">
                                <span
                                    class="px-3 py-1 rounded-full text-[10px] uppercase tracking-widest font-bold text-white shadow-lg
                        {{ $item->is_available ? 'bg-red-600 border border-amber-400' : 'bg-gray-500' }}">
                                  {{ $item->is_available ? __('language.available') : __('language.sold_out') }}
                                </span>
                            </div>

                            {{-- Chinese Seal --}}
                            <div
                                class="absolute top-4 right-4 w-10 h-10 rounded-full bg-red-700 text-amber-300 flex items-center justify-center text-sm font-black shadow-lg rotate-12 z-20">
                                福
                            </div>

                            {{-- Price Tag on Image --}}
                            <div class="absolute bottom-4 left-4 z-20">
                                <p class="text-white font-bold text-xl drop-shadow-md">
                                    <span
                                        class="text-amber-400 text-sm mr-1">Rp</span>{{ number_format($item->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        {{-- 2. Content Area: Menggunakan Flex Grow agar footer selalu di bawah --}}
                        <div class="p-5 relative flex flex-col flex-grow">
                            {{-- Ornament --}}
                            <div
                                class="absolute top-0 right-0 w-16 h-16 opacity-[0.05] pointer-events-none group-hover:opacity-[0.10] transition-opacity">
                                <svg viewBox="0 0 100 100" class="fill-red-800">
                                    <path d="M10,40 C30,20 70,20 90,40 L90,60 C70,80 30,80 10,60 Z" />
                                </svg>
                            </div>

                            {{-- Judul: Diberi min-height atau flex-basis agar sejajar --}}
                            <div class="min-h-[3.5rem] flex items-start">
                                <h3
                                    class="font-serif text-lg font-bold text-slate-800 group-hover:text-red-700 transition-colors uppercase tracking-tight leading-tight line-clamp-2">
                                    {{ $item->name }}
                                </h3>
                            </div>

                            {{-- Divider --}}
                            <div class="mt-2 flex items-center gap-2">
                                <div class="h-[2px] w-10 bg-red-600 group-hover:w-16 transition-all"></div>
                                <div class="h-[2px] w-3 bg-amber-400"></div>
                            </div>

                            {{-- Deskripsi: Menggunakan flex-grow agar mendorong tombol ke bawah --}}
                            <div class="mt-3 flex-grow">
                                <p class="text-gray-500 text-sm italic line-clamp-2">
                                  {{ $item->description ?? __('language.no_description') }}

                                </p>
                            </div>

                            {{-- 3. Action Area (Footer Card) --}}
                            <div class="mt-6 flex items-center justify-between border-t border-gray-50 pt-4">
                                <div class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">
                                    <i class="fas fa-utensils mr-1 text-amber-500"></i> {{ __('language.fresh') }}
                                </div>

                                @if ($item->is_available)
                                    <button
                                        wire:click="$dispatch('add-to-cart', [{{ $item->id }}, '{{ $item->name }}', {{ $item->price }}, '{{ $item->image }}']).to('cart-component')"
                                        class="relative overflow-hidden group/btn bg-red-700 hover:bg-red-800 text-white flex items-center gap-2 px-4 py-2 rounded-xl transition-all shadow-md active:scale-95">
                                        <span class="text-[11px] font-bold uppercase tracking-widest">{{ __('language.add') }}</span>
                                        <i
                                            class="fas fa-plus text-[9px] bg-amber-400 text-red-900 p-1 rounded-full"></i>
                                    </button>
                                @else
                                    <span class="text-gray-400 text-[10px] font-bold uppercase italic">{{ __('language.sold_out') }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- Sold Out Overlay --}}
                        @if (!$item->is_available)
                            <div
                                class="absolute inset-0 bg-white/40 backdrop-blur-[1px] flex items-center justify-center z-10 pointer-events-none">
                                <div
                                    class="bg-black/80 text-white px-4 py-2 rotate-12 border-2 border-amber-500 font-bold uppercase text-xs tracking-widest shadow-2xl">
                                    {{ __('language.sold_out') }}
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            {{-- No items found --}}
            <div class="text-center py-12">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-search text-gray-300 text-6xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">{{ __('language.item_not_found') }}</h3>
                    <p class="text-gray-500 mb-6">
                        {{ __('language.no_items_match') }} {{ $search }}.
                    </p>
                </div>
            </div>
        @endif
    </div>
    {{-- Infinite Scroll Trigger --}}
    @if ($hasMore)
        <div x-data x-intersect="$wire.loadMore()" class="h-10 flex justify-center items-center mt-10">
            <span class="text-gray-400 text-sm"> {{ __('language.loading_more') }}</span>
        </div>
    @endif
    {{-- TOAST ALERT KANAN ATAS --}}
    <div x-data="{ show: false, message: '' }"
        x-on:notify-success.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)"
        class="fixed top-6 right-6 z-[9999] w-full max-w-sm" {{-- Posisi diubah ke top dan right --}} style="display: none;"
        x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-10" {{-- Animasi masuk dari kanan --}}
        x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 translate-x-10"
        {{-- Animasi keluar ke arah kanan --}}>
        <div
            class="bg-white/90 backdrop-blur-lg border-l-4 border-green-500 shadow-2xl rounded-2xl p-4 flex items-center gap-4 border border-stone-200">
            {{-- Ikon --}}
            <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-cart-plus text-green-600 text-lg"></i>
            </div>

            {{-- Teks --}}
            <div class="flex-1">
                <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-400">{{ __('language.cart') }}</h4>
                <p class="text-xs font-bold text-stone-800 leading-tight" x-text="message"></p>
            </div>

            {{-- Close --}}
            <button @click="show = false" class="text-stone-300 hover:text-stone-600 transition-colors px-2">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>
