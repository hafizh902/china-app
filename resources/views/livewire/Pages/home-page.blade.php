<div class="relative min-h-screen bg-slate-50 text-slate-800 font-sans selection:bg-indigo-500 selection:text-white">
    
    {{-- Inline CSS untuk Font (Menggunakan Font Brand UKITA) --}}
    <style>
        @font-face { font-family: 'Coolvetica'; src: url('/fonts/coolvetica.otf') format('opentype'); font-weight: normal; }
        @font-face { font-family: 'CreatoDisplay'; src: url('/fonts/CreatoDisplay-Regular.otf') format('opentype'); font-weight: normal; }
        @font-face { font-family: 'CreatoDisplay'; src: url('/fonts/CreatoDisplay-Bold.otf') format('opentype'); font-weight: bold; }

        .font-brand { font-family: 'Coolvetica', sans-serif; }
        .font-body { font-family: 'CreatoDisplay', sans-serif; }
    </style>

    {{-- Hero Section --}}
    <section class="relative min-h-[450px] md:h-[500px] flex items-center group overflow-hidden">
        {{-- Background Image & Overlay --}}
        <div class="absolute inset-0">
            {{-- Gambar General (Lifestyle/Shopping) --}}
            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2070&auto=format&fit=crop"
                alt="Store Background"
                class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
            
            {{-- Modern Gradient Overlay (Slate/Indigo) --}}
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-slate-900/40 opacity-95"></div>
            
            {{-- Aksen Dekoratif --}}
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-indigo-600/20 rounded-full blur-3xl mix-blend-overlay pointer-events-none"></div>
        </div>
        
        <div class="relative w-full max-w-7xl mx-auto px-6 md:px-12 py-10 md:py-0">
            <div class="max-w-2xl space-y-6">
                
                {{-- Badge: Dinamis Nama Toko --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 backdrop-blur-md border border-white/20 text-indigo-200 rounded-full text-xs font-bold font-body uppercase tracking-wider">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                    </span>
                    {{ $storeName ?? 'Official Store' }}
                </div>

                {{-- Headline General --}}
                <h2 class="text-4xl md:text-6xl font-brand tracking-wide text-white leading-[1.1]">
                    {{ __('language.headline', ['default' => 'Temukan Produk']) }} <br>
                    <span class="text-indigo-400">{{ __('language.headline_suffix', ['default' => 'Favorit Anda Disini.']) }}</span>
                </h2>
                
                {{-- Tagline General --}}
                <p class="text-base md:text-lg text-slate-300 font-body leading-relaxed max-w-xl">
                    {{ __('language.tagline', ['default' => 'Kami menyediakan koleksi terbaik dengan kualitas terjamin. Nikmati pengalaman belanja online yang mudah, aman, dan cepat.']) }}
                </p>
                
                {{-- Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 font-body pt-2">
                    <button
                        wire:navigate href="{{ route('catalogue') }}"
                        class="px-8 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-base shadow-lg shadow-indigo-600/25 transition-all transform hover:scale-105 text-center">
                        <i class="fas fa-shopping-bag mr-2"></i> {{ __('language.shop_now', ['default' => 'Belanja Sekarang']) }}
                    </button>
                    
                    <a href="#features"
                        class="px-8 py-3.5 bg-white/5 border border-white/20 hover:bg-white hover:text-indigo-950 text-white rounded-xl font-bold text-base backdrop-blur-sm transition-all flex items-center justify-center gap-2">
                        {{ __('language.learn_more', ['default' => 'Pelajari Lebih Lanjut']) }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section (Value Proposition General) --}}
    <section id="features" class="py-12 px-6 relative bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $features = [
                        [
                            'icon' => 'shield', // Icon kualitas
                            'title' => __('language.feature_1_title', ['default' => 'Kualitas Terjamin']),
                            'desc' => __('language.feature_1_desc', ['default' => 'Kami mengutamakan kualitas dalam setiap produk yang kami tawarkan, memastikan kepuasan pelanggan.']),
                            'color' => 'indigo'
                        ],
                        [
                            'icon' => 'truck-fast', // Icon kualitas/garansi
                            'title' => __('language.feature_2_title', ['default' => 'Pengiriman Cepat']),
                            'desc' => __('language.feature_2_desc', ['default' => 'Pesanan Anda diproses instan dan dikirim dengan aman ke seluruh lokasi.']),
                            'color' => 'cyan'
                        ],
                        [
                            'icon' => 'tags', // Icon harga/promo
                            'title' => __('language.feature_3_title', ['default' => 'Harga Terbaik']),
                            'desc' => __('language.feature_3_desc', ['default' => 'Dapatkan penawaran kompetitif dan promo menarik setiap harinya.']),
                            'color' => 'emerald'
                        ]
                    ];
                @endphp

                @foreach ($features as $feature)
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 hover:border-indigo-100 hover:shadow-lg hover:shadow-indigo-500/5 transition-all group">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl flex-shrink-0 flex items-center justify-center transition-transform group-hover:scale-110 
                                {{ $feature['color'] == 'indigo' ? 'bg-indigo-100 text-indigo-600' : '' }}
                                {{ $feature['color'] == 'cyan' ? 'bg-cyan-100 text-cyan-600' : '' }}
                                {{ $feature['color'] == 'emerald' ? 'bg-emerald-100 text-emerald-600' : '' }}
                            ">
                                <i class="fas fa-{{ $feature['icon'] }} text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold font-brand text-slate-900 mb-1">
                                    {{ $feature['title'] }}
                                </h3>
                                <p class="text-sm text-slate-500 font-body leading-relaxed">
                                    {{ $feature['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Product Catalog Section --}}
    <section id="catalog" class="py-12 px-4 md:px-6 bg-slate-50 relative">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#4F46E5 1px, transparent 1px); background-size: 20px 20px;"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
                <div>
                    <span class="text-indigo-600 font-bold tracking-wider uppercase text-xs mb-1 block font-body">
                        {{ __('language.catalog_subtitle', ['default' => 'Pilihan Pelanggan']) }}
                    </span>
                    <h2 class="text-3xl md:text-4xl font-brand text-slate-900">
                        {{ __('language.catalog_title', ['default' => 'Produk Unggulan']) }}
                    </h2>
                </div>
                
                {{-- Desktop Button --}}
                <button wire:navigate href="{{ route('catalogue') }}" class="hidden md:inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-700 font-body bg-white px-5 py-2.5 rounded-lg border border-slate-200 shadow-sm hover:shadow-md transition-all">
                    Lihat Semua Produk
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </div>
            
            {{-- Menggunakan komponen Livewire Menu Page yang sudah ada --}}
            {{-- Asumsi: Komponen ini merender grid produk --}}
            <livewire:pages.menu-page :limit="4" />
            
            {{-- Mobile Button --}}
            <div class="md:hidden mt-8 text-center">
                <button wire:navigate href="{{ route('catalogue') }}" class="w-full inline-flex justify-center items-center font-bold text-white bg-indigo-600 py-3 rounded-xl hover:bg-indigo-700 font-body shadow-lg shadow-indigo-500/20 transition-all">
                    Lihat Katalog Lengkap
                </button>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <div class="bg-slate-900 border-t border-slate-800">
        <livewire:pages.footer-page />
    </div>
</div>