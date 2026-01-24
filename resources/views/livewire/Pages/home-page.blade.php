<div>
    {{-- Hero Section - Dibuat responsif dengan min-height dan padding dinamis --}}
    <section class="relative min-h-[500px] md:h-96">
        <div class="absolute inset-0 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1759893497863-c90a6dfa7a86?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-full object-cover">
            {{-- Gradient disesuaikan agar teks terbaca di mobile (dari bawah ke atas di mobile) --}}
            <div class="absolute inset-0 bg-gradient-to-t from-chinese-black via-chinese-black/40 to-transparent md:bg-gradient-to-r md:from-chinese-black md:via-transparent md:to-transparent opacity-80 md:opacity-70">
            </div>
            
            <div class="absolute inset-0 flex items-center px-6 md:px-12">
                <div class="text-white max-w-2xl">
                    {{-- Ukuran font dinamis: text-3xl di mobile, text-5xl di desktop --}}
                    <h2 class="text-3xl md:text-5xl font-bold tracking-wide chinese-font mb-4">
                        {{ __('language.headline') }}
                    </h2>
                    <p class="text-lg md:text-xl mb-8 text-gray-200">
                        {{ __('language.tagline') }}
                    </p>
                    
                    {{-- Button Stack di mobile, Row di desktop --}}
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <button
                            class="w-full sm:w-auto px-8 py-3 bg-chinese-red text-white rounded-full font-semibold hover:scale-105 transition text-center"
                            wire:navigate href="{{ route('menu') }}">
                            <i class="fas fa-utensils mr-2"></i> {{ __('language.order_now') }}
                        </button>
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=RDdQw4w9WgXcQ&start_radio=1"
                            target="_blank"
                            class="w-full sm:w-auto px-6 py-3 bg-transparent border border-white text-white rounded-full hover:bg-white hover:text-gray-800 font-medium inline-flex items-center justify-center">
                            <i class="fas fa-play-circle mr-2"></i> {{ __('language.watch_video') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section - Grid disesuaikan --}}
    <section class="py-12 px-6">
        {{-- Grid: 1 kolom di mobile, 3 kolom di tablet ke atas --}}
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-8">

            @php
                $features = [
                    [
                        'icon' => 'truck',
                        'title' => __('language.delivery_title'),
                        'desc' => __('language.delivery_desc'),
                    ],
                    [
                        'icon' => 'award',
                        'title' => __('language.authentic_title'),
                        'desc' => __('language.authentic_desc'),
                    ],
                    [
                        'icon' => 'leaf',
                        'title' => __('language.fresh_title'),
                        'desc' => __('language.fresh_desc'),
                    ],
                ];
            @endphp

            @foreach ($features as $feature)
                <div class="text-center group">
                    <div class="w-16 h-16 bg-chinese-red rounded-full flex items-center justify-center mx-auto mb-4 transition-transform group-hover:rotate-12">
                        <i class="fas fa-{{ $feature['icon'] }} text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">
                        {{ $feature['title'] }}
                    </h3>
                    <p class="text-gray-600 leading-relaxed px-4 md:px-0">
                        {{ $feature['desc'] }}
                    </p>
                </div>
            @endforeach

        </div>
    </section>

    {{-- Menu Section --}}
    <section id="menu" class="py-12 px-4 md:px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold chinese-font text-chinese-red text-center mb-8">
                {{ __('language.our_menu') }}
            </h2>
            <livewire:pages.menu-page :limit="4" />
        </div>
    </section>

    <livewire:pages.footer-page />
</div>