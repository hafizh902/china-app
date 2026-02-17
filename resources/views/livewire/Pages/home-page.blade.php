<div class="relative min-h-screen bg-slate-50 text-slate-800 font-sans selection:bg-indigo-500 selection:text-white">
    
    @php
        // Safe retrieval with fallback
        $customization = null;
        try {
            // Try to get customization for current seller
            $sellerId = auth()->check() && auth()->user()->seller_id ? auth()->user()->seller_id : 1;
            $customization = \App\Models\SellerCustomization::where('seller_id', $sellerId)->first();
            
            // If no customization exists, create default one
            if (!$customization) {
                $customization = \App\Models\SellerCustomization::create([
                    'seller_id' => $sellerId,
                    'hero_title' => 'Temukan Produk',
                    'hero_subtitle' => 'Favorit Anda Disini.',
                    'hero_description' => 'Kami menyediakan koleksi terbaik dengan kualitas terjamin. Nikmati pengalaman belanja online yang mudah, aman, dan cepat.',
                    'primary_color' => '#4F46E5',
                    'secondary_color' => '#06B6D4',
                    'accent_color' => '#10B981',
                ]);
            }
        } catch (\Exception $e) {
            // If anything fails, use defaults
            report($e);
        }

        // Helper function for safe data retrieval
        $getHeroData = function() use ($customization) {
            if (!$customization) {
                return [
                    'background_url' => null,
                    'title' => 'Temukan Produk',
                    'subtitle' => 'Favorit Anda Disini.',
                    'description' => 'Kami menyediakan koleksi terbaik dengan kualitas terjamin.',
                    'cta_text' => 'Belanja Sekarang',
                    'secondary_cta_text' => 'Pelajari Lebih Lanjut',
                    'overlay_opacity' => 95,
                    'show_badge' => true,
                    'badge_text' => $GLOBALS['storeName'] ?? 'Official Store',
                ];
            }
            return $customization->getHeroData();
        };

        $getFeaturesData = function() use ($customization) {
            if (!$customization) {
                return [
                    'show' => true,
                    'items' => [
                        [
                            'icon' => 'shield',
                            'title' => 'Kualitas Terjamin',
                            'description' => 'Kami mengutamakan kualitas dalam setiap produk yang kami tawarkan.',
                            'color' => 'indigo'
                        ],
                        [
                            'icon' => 'truck-fast',
                            'title' => 'Pengiriman Cepat',
                            'description' => 'Pesanan Anda diproses instan dan dikirim dengan aman.',
                            'color' => 'cyan'
                        ],
                        [
                            'icon' => 'tags',
                            'title' => 'Harga Terbaik',
                            'description' => 'Dapatkan penawaran kompetitif dan promo menarik.',
                            'color' => 'emerald'
                        ]
                    ],
                ];
            }
            return $customization->getFeaturesData();
        };

        $getCatalogData = function() use ($customization) {
            if (!$customization) {
                return [
                    'show' => true,
                    'title' => 'Produk Unggulan',
                    'subtitle' => 'Pilihan Pelanggan',
                    'limit' => 4,
                ];
            }
            return $customization->getCatalogData();
        };

        $getThemeColors = function() use ($customization) {
            if (!$customization) {
                return [
                    'primary' => '#4F46E5',
                    'secondary' => '#06B6D4',
                    'accent' => '#10B981',
                ];
            }
            return $customization->getThemeColors();
        };

        $heroData = $getHeroData();
        $featuresData = $getFeaturesData();
        $catalogData = $getCatalogData();
        $colors = $getThemeColors();
    @endphp

    {{-- Dynamic CSS Variables --}}
    <style>
        @font-face { font-family: 'Coolvetica'; src: url('/fonts/coolvetica.otf') format('opentype'); font-weight: normal; }
        @font-face { font-family: 'CreatoDisplay'; src: url('/fonts/CreatoDisplay-Regular.otf') format('opentype'); font-weight: normal; }
        @font-face { font-family: 'CreatoDisplay'; src: url('/fonts/CreatoDisplay-Bold.otf') format('opentype'); font-weight: bold; }

        .font-brand { font-family: 'Coolvetica', sans-serif; }
        .font-body { font-family: 'CreatoDisplay', sans-serif; }

        :root {
            --color-primary: {{ $colors['primary'] }};
            --color-secondary: {{ $colors['secondary'] }};
            --color-accent: {{ $colors['accent'] }};
        }

        .btn-primary {
            background-color: var(--color-primary);
        }
        .btn-primary:hover {
            filter: brightness(0.9);
        }
        .text-primary {
            color: var(--color-primary);
        }
        .bg-primary {
            background-color: var(--color-primary);
        }
        .border-primary {
            border-color: var(--color-primary);
        }

        @if($customization && $customization->custom_css)
            {!! $customization->custom_css !!}
        @endif
    </style>

    {{-- Hero Section (Customizable) --}}
    <section class="relative min-h-[450px] md:h-[500px] flex items-center group overflow-hidden">
        {{-- Background Image & Overlay --}}
        <div class="absolute inset-0">
            <img src="{{ $heroData['background_url'] ?? 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2070&auto=format&fit=crop' }}"
                alt="Store Background"
                class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
            
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-slate-900/40" 
                style="opacity: {{ $heroData['overlay_opacity'] / 100 }}"></div>
            
            <div class="absolute top-0 right-0 w-[600px] h-[600px] rounded-full blur-3xl mix-blend-overlay pointer-events-none"
                style="background-color: {{ $colors['primary'] }}20;"></div>
        </div>
        
        <div class="relative w-full max-w-7xl mx-auto px-6 md:px-12 py-10 md:py-0">
            <div class="max-w-2xl space-y-6">
                
                @if($heroData['show_badge'])
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 backdrop-blur-md border border-white/20 rounded-full text-xs font-bold font-body uppercase tracking-wider"
                        style="color: {{ $colors['primary'] }}bb;">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75"
                                style="background-color: {{ $colors['primary'] }};"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2"
                                style="background-color: {{ $colors['primary'] }};"></span>
                        </span>
                        {{ $heroData['badge_text'] }}
                    </div>
                @endif

                <h2 class="text-4xl md:text-6xl font-brand tracking-wide text-white leading-[1.1]">
                    {{ $heroData['title'] }} <br>
                    <span style="color: {{ $colors['primary'] }};">{{ $heroData['subtitle'] }}</span>
                </h2>
                
                @if($heroData['description'])
                    <p class="text-base md:text-lg text-slate-300 font-body leading-relaxed max-w-xl">
                        {{ $heroData['description'] }}
                    </p>
                @endif
                
                <div class="flex flex-col sm:flex-row gap-3 font-body pt-2">
                    <a wire:navigate href="{{ route('catalogue') }}"
                        class="px-8 py-3.5 text-white rounded-xl font-bold text-base shadow-lg transition-all transform hover:scale-105 text-center btn-primary">
                        <i class="fas fa-shopping-bag mr-2"></i> {{ $heroData['cta_text'] }}
                    </a>
                    
                    @if($heroData['secondary_cta_text'])
                        <a href="#features"
                            class="px-8 py-3.5 bg-white/5 border border-white/20 hover:bg-white hover:text-indigo-950 text-white rounded-xl font-bold text-base backdrop-blur-sm transition-all flex items-center justify-center gap-2">
                            {{ $heroData['secondary_cta_text'] }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section (Conditional & Customizable) --}}
    @if($featuresData['show'] && !empty($featuresData['items']))
        <section id="features" class="py-12 px-6 relative bg-white border-b border-slate-100">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-{{ min(count($featuresData['items']), 3) }} gap-6">
                    @foreach($featuresData['items'] as $feature)
                        @php
                            $featureColors = [
                                'indigo' => '#4F46E5',
                                'cyan' => '#06B6D4',
                                'emerald' => '#10B981',
                                'amber' => '#F59E0B',
                                'rose' => '#F43F5E',
                            ];
                            $featureColor = $featureColors[$feature['color'] ?? 'indigo'] ?? '#4F46E5';
                        @endphp
                        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 hover:shadow-lg transition-all group"
                            style="border-color: {{ $colors['primary'] }}10;">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl flex-shrink-0 flex items-center justify-center transition-transform group-hover:scale-110"
                                    style="background-color: {{ $featureColor }}20; color: {{ $featureColor }};">
                                    <i class="fas fa-{{ $feature['icon'] ?? 'star' }} text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold font-brand text-slate-900 mb-1">
                                        {{ $feature['title'] ?? '' }}
                                    </h3>
                                    <p class="text-sm text-slate-500 font-body leading-relaxed">
                                        {{ $feature['description'] ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Custom Sections --}}
    @if($customization && $customization->custom_sections)
        @foreach($customization->custom_sections as $section)
            <section class="py-12 px-6 bg-{{ $loop->even ? 'white' : 'slate-50' }}">
                <div class="max-w-7xl mx-auto">
                    @if($section['type'] === 'text')
                        <div class="max-w-3xl mx-auto text-center">
                            <h2 class="text-3xl font-brand text-slate-900 mb-4">{{ $section['title'] ?? '' }}</h2>
                            <p class="text-slate-600 font-body leading-relaxed">{{ $section['content'] ?? '' }}</p>
                        </div>
                    @elseif($section['type'] === 'text-image')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                            <div>
                                <h2 class="text-3xl font-brand text-slate-900 mb-4">{{ $section['title'] ?? '' }}</h2>
                                <p class="text-slate-600 font-body leading-relaxed">{{ $section['content'] ?? '' }}</p>
                            </div>
                            @if(isset($section['image']) && $section['image'])
                                <img src="{{ $section['image'] }}" alt="{{ $section['title'] ?? '' }}" class="rounded-2xl shadow-lg">
                            @endif
                        </div>
                    @elseif($section['type'] === 'banner')
                        <div class="relative rounded-2xl overflow-hidden p-12 text-center text-white" 
                            style="background: linear-gradient(135deg, {{ $colors['primary'] }}, {{ $colors['secondary'] }});">
                            <h2 class="text-4xl font-brand mb-4">{{ $section['title'] ?? '' }}</h2>
                            <p class="text-lg font-body max-w-2xl mx-auto">{{ $section['content'] ?? '' }}</p>
                        </div>
                    @elseif($section['type'] === 'cta')
                        <div class="text-center py-8">
                            <h2 class="text-3xl font-brand text-slate-900 mb-4">{{ $section['title'] ?? '' }}</h2>
                            <p class="text-slate-600 font-body mb-6 max-w-2xl mx-auto">{{ $section['content'] ?? '' }}</p>
                            <a href="{{ route('catalogue') }}" class="inline-block px-8 py-4 btn-primary text-white rounded-xl font-bold shadow-lg">
                                Get Started
                            </a>
                        </div>
                    @endif
                </div>
            </section>
        @endforeach
    @endif

    {{-- Product Catalog Section (Conditional) --}}
    @if($catalogData['show'])
        <section id="catalog" class="py-12 px-4 md:px-6 bg-slate-50 relative">
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient({{ $colors['primary'] }} 1px, transparent 1px); background-size: 20px 20px;"></div>
            
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
                    <div>
                        <span class="font-bold tracking-wider uppercase text-xs mb-1 block font-body text-primary">
                            {{ $catalogData['subtitle'] }}
                        </span>
                        <h2 class="text-3xl md:text-4xl font-brand text-slate-900">
                            {{ $catalogData['title'] }}
                        </h2>
                    </div>
                    
                    <a wire:navigate href="{{ route('catalogue') }}" 
                        class="hidden md:inline-flex items-center text-sm font-bold font-body bg-white px-5 py-2.5 rounded-lg border border-slate-200 shadow-sm hover:shadow-md transition-all text-primary">
                        Lihat Semua Produk
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
                
                <livewire:pages.menu-page :limit="$catalogData['limit']" />
                
                <div class="md:hidden mt-8 text-center">
                    <a wire:navigate href="{{ route('catalogue') }}" 
                        class="w-full inline-flex justify-center items-center font-bold text-white py-3 rounded-xl font-body shadow-lg transition-all btn-primary">
                        Lihat Katalog Lengkap
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- Footer --}}
    <div class="bg-slate-900 border-t border-slate-800">
        <livewire:pages.footer-page />
    </div>

    @if($customization && $customization->custom_js)
        <script>{!! $customization->custom_js !!}</script>
    @endif
</div>