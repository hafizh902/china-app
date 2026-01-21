<div id="preview-modal"
    class="fixed inset-0 z-[9999] flex items-center justify-center p-4 backdrop-blur-sm transition-all duration-300"
    style="display: {{ $showModal ? 'flex' : 'none' }}; background-color: rgba(28, 25, 23, 0.85);"
    wire:keydown.escape="closeModal" wire:click.self="closeModal">

    @php
    $categoryMap = [
    'main_course' => 'Main Course',
    'snacks' => 'Side Dish',
    'drinks' => 'Drink',
    'desserts' => 'Dessert',
    ];
    @endphp

    <div class="relative w-full max-w-4xl">
        @if ($selectedItem)
        <div
            class="bg-white rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.3)] border border-amber-200/50 transform transition-all relative flex flex-col md:flex-row md:h-[550px]">

            {{-- Tombol Close --}}
            <button wire:click="closeModal"
                class="absolute top-4 right-4 z-30 bg-white/20 hover:bg-white/40 backdrop-blur-md text-white md:text-slate-800 md:bg-slate-100/50 w-10 h-10 rounded-full flex items-center justify-center transition-all border border-white/30">
                <i class="fas fa-times"></i>
            </button>

            {{-- GAMBAR (Kiri) --}}
            <div class="relative w-full md:w-1/2 h-64 md:h-full bg-gray-200">
                <img src="{{ $selectedItem['image_url'] }}" alt="{{ $selectedItem['name'] }}"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            </div>

            {{-- KONTEN (Kanan) --}}
            <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col h-full">

                {{-- Header --}}
                <div class="mb-4">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-8 h-[1px] bg-amber-500"></span>
                        <p class="text-[10px] text-amber-600 font-bold uppercase tracking-[0.3em]">
                            {{ $categoryMap[$selectedItem['category']] ?? ucfirst(str_replace('_', ' ', $selectedItem['category'])) }}
                        </p>
                    </div>
                    <h2 class="text-2xl md:text-4xl font-serif font-bold text-slate-900 leading-tight">
                        {{ $selectedItem['name'] }}
                    </h2>
                </div>

                {{-- Deskripsi dengan Logic Scroll --}}
                <div class="relative flex flex-col min-h-0 mb-4" x-data="{
                        expanded: false,
                        text: `{{ $selectedItem['description'] ?? 'Dibuat dengan resep warisan keluarga yang dijaga keasliannya dan bahan-bahan pilihan berkualitas tinggi untuk menjaga cita rasa yang autentik.' }}`,
                        limit: 150
                    }">

                    <div :class="expanded ? 'max-h-32 overflow-y-auto pr-2 custom-scrollbar' : 'line-clamp-4'"
                        class="text-slate-600 text-sm leading-relaxed italic border-l-2 border-red-700 pl-4 transition-all duration-300">
                        <span x-text="text"></span>
                    </div>

                    <template x-if="text.length > limit">
                        <button @click="expanded = !expanded"
                            class="text-xs font-bold text-red-700 mt-2 ml-4 hover:text-red-800 transition-colors flex items-center gap-1">
                            <span x-text="expanded ? 'Show Less' : 'Read More...'"></span>
                            <i class="fas" :class="expanded ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                    </template>
                </div>

                {{-- PERNAK-PERNIK (Popularity & Category Tag) --}}
                <div class="flex flex-wrap items-center gap-4 mb-6 pt-4 border-t border-slate-50">
                    {{-- Popularitas --}}
                    <div class="flex flex-col gap-1">
                        <p class="text-[9px] text-slate-400 uppercase tracking-widest">{{ __('language.popularity') }}</p>
                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter flex items-center gap-1">
                            <i class="fas fa-fire text-red-500"></i>
                            {{ number_format($selectedItem['total_sold'] ?? 0) }} orders
                        </div>
                    </div>

                    <div class="w-px h-8 bg-slate-200 hidden md:block"></div>

                    {{-- Kategori Tag --}}
                    <div class="flex flex-col gap-1">
                        <p class="text-[9px] text-slate-400 uppercase tracking-widest">{{ __('language.category') }}</p>
                        <div class="flex items-center gap-2">
                            <span
                                class="bg-amber-50 text-amber-700 text-[10px] font-bold px-3 py-1 rounded-md border border-amber-200">
                                <i class="fas fa-tag mr-1 opacity-70"></i> {{ $categoryMap[$selectedItem['category']] ?? ucfirst(str_replace('_', ' ', $selectedItem['category'])) }}
                            </span>
                            @if ($selectedItem['is_available'])
                            <span
                                class="bg-green-50 text-green-700 text-[10px] font-bold px-3 py-1 rounded-md border border-green-200">
                                {{ __('language.freshly_made') }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Footer Price & Action --}}
                <div class="mt-auto pt-4 border-t border-slate-100">
                    <div class="flex items-end justify-between mb-6">
                        <div>
                            <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">{{ __('language.price_per_item') }}</p>
                            <span class="text-3xl font-black text-red-700">
                                <span
                                    class="text-lg font-normal mr-1">Rp</span>{{ number_format($selectedItem['price'], 0, ',', '.') }}
                            </span>
                        </div>

                        @if ($selectedItem['prep_time_minutes'] ?? false)
                        <div class="flex flex-col items-end">
                            <span
                                class="text-xs font-bold text-slate-700 flex items-center gap-2 bg-slate-100 px-3 py-1.5 rounded-lg">
                                <i class="far fa-clock text-amber-600"></i>
                                {{ $selectedItem['prep_time_minutes'] }} {{ __('language.mins') }}
                            </span>
                        </div>
                        @endif
                    </div>

                    <button
                        class="w-full relative overflow-hidden group/btn bg-red-700 text-white py-4 rounded-2xl font-bold text-sm uppercase tracking-widest transition-all hover:bg-red-800 active:scale-95 disabled:grayscale disabled:cursor-not-allowed shadow-lg"
                        wire:click="$dispatch('add-to-cart', [{{ $selectedItem['id'] }}, '{{ $selectedItem['name'] }}', {{ $selectedItem['price'] }}, '{{ $selectedItem['image'] }}']).to('cart-component')"
                        @disabled(!$selectedItem['is_available'])>
                        <div class="flex items-center justify-center gap-2 relative z-10">
                            <i class="fas fa-utensils text-amber-400"></i>
                            <span>
                                {{ $selectedItem['is_available'] ? __('language.add_to_order') : __('language.sold_out') }}
                            </span>

                        </div>
                    </button>
                </div>
            </div>

            <div
                class="absolute bottom-0 left-0 h-1.5 w-full bg-gradient-to-r from-red-800 via-amber-400 to-red-800">
            </div>
        </div>
        @endif
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f8fafc;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #b91c1c;
        }
    </style>
</div>