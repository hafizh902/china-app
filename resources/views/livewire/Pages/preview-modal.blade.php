<div id="preview-modal"
    class="fixed inset-0 z-[9999] flex items-end md:items-center justify-center backdrop-blur-md transition-all duration-300"
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

    <div class="relative w-full max-w-4xl h-[90vh] md:h-auto overflow-hidden">
        @if ($selectedItem)
        <div
            class="bg-white rounded-t-[2.5rem] md:rounded-3xl overflow-hidden shadow-2xl border-t border-amber-200/50 md:border border-amber-200/50 transform transition-all relative flex flex-col md:flex-row md:min-h-[550px] h-full">

            {{-- Handle Bar (Hanya Mobile) - Memberi kesan Bottom Sheet --}}
            <div class="w-12 h-1.5 bg-gray-300 rounded-full absolute top-3 left-1/2 -translate-x-1/2 z-50 md:hidden"></div>

            {{-- Tombol Close --}}
            <button wire:click="closeModal"
                class="absolute top-4 right-4 z-50 bg-black/10 hover:bg-black/20 backdrop-blur-md text-white md:text-slate-800 md:bg-slate-100/50 w-10 h-10 rounded-full flex items-center justify-center transition-all">
                <i class="fas fa-times"></i>
            </button>

            {{-- BAGIAN GAMBAR --}}
            <div class="relative w-full md:w-1/2 h-80 md:h-auto flex-shrink-0">
                <img src="{{ $selectedItem['image_url'] }}" alt="{{ $selectedItem['name'] }}"
                    class="w-full h-full object-cover">
                
                {{-- Badge Kategori di Gambar (Mobile) --}}
                <div class="absolute bottom-6 left-6 md:hidden z-20">
                     <span class="bg-amber-500/90 backdrop-blur-sm text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">
                        {{ $categoryMap[$selectedItem['category']] ?? 'Menu' }}
                    </span>
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent md:hidden"></div>
            </div>

            {{-- BAGIAN KONTEN --}}
            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col bg-white flex-grow overflow-y-auto">

                {{-- Header --}}
                <div class="mb-6">
                    <div class="hidden md:flex items-center gap-2 mb-3">
                        <span class="w-8 h-[1px] bg-amber-500"></span>
                        <p class="text-[10px] text-amber-600 font-bold uppercase tracking-[0.3em]">
                            {{ $categoryMap[$selectedItem['category']] ?? 'Menu' }}
                        </p>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-serif font-bold text-slate-900 leading-tight">
                        {{ $selectedItem['name'] }}
                    </h2>
                </div>

                {{-- Deskripsi --}}
                <div class="relative flex flex-col mb-8 flex-grow">
                    <div class="text-slate-600 text-base leading-relaxed italic border-l-4 border-red-700/20 pl-6">
                        {{ $selectedItem['description'] ?? 'Dibuat dengan resep pilihan dan bahan-bahan berkualitas tinggi untuk menjaga cita rasa yang autentik.' }}
                    </div>
                </div>

                {{-- Price & Sales Info --}}
                <div class="flex items-center justify-between mb-8 py-4 border-y border-slate-50">
                    <div class="flex flex-col">
                        <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">Price</p>
                        <span class="text-3xl font-black text-red-700">
                            <span class="text-lg font-normal mr-1">Rp</span>{{ number_format($selectedItem['price'], 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="flex flex-col items-end">
                        <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">{{ __('language.popularity') }}</p>
                        <div class="flex items-center gap-2 bg-amber-50 px-3 py-1.5 rounded-lg border border-amber-100">
                            <i class="fas fa-fire text-amber-600 text-xs"></i>
                            <span class="text-xs font-bold text-amber-900">{{ number_format($selectedItem['total_sold'] ?? 0) }} Sold</span>
                        </div>
                    </div>
                </div>

                {{-- Footer Action --}}
                <div class="mt-auto">
                    <button
                        class="w-full relative overflow-hidden bg-red-700 text-white py-4 md:py-5 rounded-2xl font-bold text-sm uppercase tracking-widest transition-all hover:bg-red-800 active:scale-95 disabled:grayscale shadow-[0_10px_30px_rgba(185,28,28,0.3)]"
                        wire:click="$dispatch('add-to-cart', [{{ $selectedItem['id'] }}, '{{ $selectedItem['name'] }}', {{ $selectedItem['price'] }}, '{{ $selectedItem['image'] }}']).to('cart-component')"
                        @disabled(!$selectedItem['is_available'])>
                        <div class="flex items-center justify-center gap-3">
                            <i class="fas fa-shopping-basket text-amber-400"></i>
                            <span>
                                {{ $selectedItem['is_available'] ? __('language.add_to_order') : __('language.sold_out') }}
                            </span>
                        </div>
                    </button>
                    
                    {{-- Status Tag (Hanya muncul jika sold out) --}}
                    @if(!$selectedItem['is_available'])
                        <p class="text-center text-red-600 text-[10px] font-bold uppercase mt-3 tracking-widest">
                            {{ __('language.currently_unavailable') }}
                        </p>
                    @endif
                </div>
            </div>

            {{-- Decorative Line (Desktop Only) --}}
            <div class="absolute bottom-0 left-0 h-1.5 w-full bg-gradient-to-r from-red-800 via-amber-400 to-red-800 hidden md:block"></div>
        </div>
        @endif
    </div>
</div>