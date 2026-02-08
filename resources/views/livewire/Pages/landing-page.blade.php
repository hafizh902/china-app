<div
    x-data="{ loading: true, scrollAtTop: true }"
    x-init="
        setTimeout(() => { 
            loading = false;
            setTimeout(() => {
                document.querySelectorAll('.hero-animate').forEach(el => {
                    el.classList.add('animate-active');
                });
            }, 100); 
        }, 1500);

        window.addEventListener('scroll', () => { scrollAtTop = window.scrollY < 50 });
    "
    class="relative min-h-screen bg-white text-slate-800 font-sans selection:bg-indigo-500 selection:text-white overflow-x-hidden">
    {{-- INLINE CSS & FONTS --}}
    <style>
        @font-face {
            font-family: 'Coolvetica';
            src: url('/fonts/coolvetica.otf') format('opentype');
        }

        @font-face {
            font-family: 'CreatoDisplay';
            src: url('/fonts/CreatoDisplay-Regular.otf') format('opentype');
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

        [x-cloak] {
            display: none !important;
        }

        /* --- SISTEM ANIMASI TEXT REVEAL --- */
        .word-mask {
            display: inline-block;
            overflow: hidden;
            vertical-align: bottom;
            margin-right: 0.25em;
            padding-bottom: 0.1em;
        }

        .word-inner {
            display: inline-block;
            transform: translateY(110%);
            opacity: 0;
            transition: transform 1s cubic-bezier(0.16, 1, 0.3, 1), opacity 1s ease;
            will-change: transform, opacity;
        }

        .animate-active .word-inner {
            transform: translateY(0);
            opacity: 1;
        }

        /* --- ANIMASI ELEMENT LAIN (FADE UP) --- */
        .fade-up-element {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s ease-out;
        }

        .animate-active.fade-up-element {
            opacity: 1;
            transform: translateY(0);
        }

        /* Helper Gradient Text */
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(to right, #4F46E5, #06B6D4);
        }

        .text-gradient .word-inner {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(to right, #4F46E5, #06B6D4);
        }

        /* --- TAMBAHAN BACKGROUND & HOVER --- */
        .bg-mesh {
            background-color: #ffffff;
            background-image:
                radial-gradient(at 0% 0%, hsla(231, 80%, 90%, 0.5) 0, transparent 50%),
                radial-gradient(at 100% 0%, hsla(189, 80%, 90%, 0.5) 0, transparent 50%),
                radial-gradient(at 100% 100%, hsla(231, 80%, 90%, 0.5) 0, transparent 50%),
                radial-gradient(at 0% 100%, hsla(189, 80%, 90%, 0.5) 0, transparent 50%);
        }

        .floating {
            animation: floating 6s ease-in-out infinite;
        }

        @keyframes floating {
            0% {
                transform: translate(0, 0px);
            }

            50% {
                transform: translate(0, 20px);
            }

            100% {
                transform: translate(0, -0px);
            }
        }

        .card-interaction {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card-interaction:hover {
            transform: translateY(-12px) scale(1.02);
        }

        .btn-glow:hover {
            box-shadow: 0 0 25px rgba(79, 70, 229, 0.4);
        }

        /* Animasi Grid Dot Background */
        .bg-dots {
            background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>

    {{-- 1. Loading Overlay --}}
    <div
        x-show="loading"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex flex-col items-center justify-center bg-white">
        <div class="w-16 h-16 border-4 border-indigo-100 border-t-indigo-600 rounded-full animate-spin"></div>
        <h2 class="mt-4 text-2xl font-brand tracking-widest text-indigo-900 animate-pulse">UKITA</h2>
    </div>

    {{-- 3. Hero Section --}}
    <header class="relative pt-3 pb-10 lg:pt-3 lg:pb-10 overflow-hidden bg-mesh">
        {{-- Background Decorations --}}
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-indigo-100/40 rounded-full blur-3xl -z-10 animate-pulse"></div>
        <div class="absolute top-1/2 left-1/4 w-96 h-96 bg-cyan-100/30 rounded-full blur-3xl -z-10 floating"></div>
        <div class="absolute inset-0 bg-dots opacity-40 -z-20"></div>

        <div class="max-w-7xl h-auto mx-auto px-6 py-8 grid lg:grid-cols-2 gap-12 items-center">

            {{-- Left Content --}}
            <div class="space-y-8">

                <div class="hero-animate fade-up-element inline-flex items-center gap-2 px-4 py-1 bg-indigo-50 text-indigo-700 rounded-full text-sm font-bold font-body border border-indigo-100 hover:bg-indigo-100 transition-colors cursor-default" style="transition-delay: 100ms;">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                    </span>
                    Platform Pemberdayaan UMKM
                </div>

                <h1 class="text-3xl lg:text-5xl font-brand leading-[1.1] text-slate-900 mb-1">
                    <div class="js-split-text hero-animate block" style="--delay-start: 200ms">
                        Bangun Brand
                    </div>
                    <div class="js-split-text text-gradient hero-animate block" style="--delay-start: 400ms">
                        Bukan Sekadar Jualan.
                    </div>
                </h1>

                <p class="hero-animate fade-up-element text-lg text-slate-600 font-body leading-relaxed max-w-lg" style="transition-delay: 600ms;">
                    Kelola toko online Anda dengan teknologi Enterprise. Integrasi AI Lokal, Pembayaran Xendit, dan Manajemen Pengiriman dalam satu dashboard.
                </p>

                <div class="hero-animate fade-up-element flex flex-col sm:flex-row gap-4 font-body" style="transition-delay: 800ms;">
                    <a href="{{ route('register') }}" wire:navigate class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-lg shadow-xl shadow-indigo-600/20 transition-all transform hover:scale-105 btn-glow text-center">
                        Gabung Sekarang!
                    </a>
                    <button class="px-8 py-1 bg-white border border-slate-200 hover:border-indigo-400 text-slate-700 hover:text-indigo-600 rounded-xl font-bold text-lg transition-all flex items-center justify-center gap-2 group">
                        Lihat Demo
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Right Content (Image) --}}
            <div class="relative lg:h-[300px] w-full flex items-center justify-center mt-3">
                {{-- Decorative circles behind image --}}
                <div class="absolute inset-0 bg-indigo-500/5 rounded-full blur-3xl scale-75 animate-pulse"></div>

                <div class="hero-animate fade-up-element relative w-full aspect-[4/3] bg-slate-900 rounded-2xl shadow-2xl border border-slate-800 p-2 overflow-hidden transform rotate-2 hover:rotate-0 transition-all duration-700 group cursor-pointer" style="transition-delay: 1000ms;">
                    <div class="h-8 bg-slate-800 rounded-t-lg flex items-center px-4 gap-2 mb-4 group-hover:bg-slate-700 transition-colors">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    </div>
                    <div class="grid grid-cols-4 gap-4 h-full p-4">
                        <div class="col-span-1 bg-slate-800/50 rounded-lg h-3/4 animate-pulse group-hover:bg-slate-800 transition-colors"></div>
                        <div class="col-span-3 space-y-4">
                            <div class="flex gap-4">
                                <div class="h-24 w-1/3 bg-indigo-600/20 border border-indigo-500/30 rounded-xl flex flex-col justify-center items-center group-hover:border-indigo-400 transition-all transform group-hover:scale-105">
                                    <span class="text-indigo-400 text-xs uppercase font-bold">Total Pendapatan</span>
                                    <span class="text-white font-brand text-2xl">Rp 45.2jt</span>
                                </div>
                                <div class="h-24 w-1/3 bg-slate-800 rounded-xl group-hover:bg-slate-700 transition-colors"></div>
                                <div class="h-24 w-1/3 bg-slate-800 rounded-xl group-hover:bg-slate-700 transition-colors"></div>
                            </div>
                            <div class="h-40 bg-slate-800/80 rounded-xl w-full group-hover:bg-slate-800 transition-colors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- 4. Features Grid --}}
    <section id="features" class="py-16 bg-slate-50 relative overflow-hidden">
        {{-- Background shapes for section --}}
        <div class="absolute top-0 left-0 w-64 h-64 bg-indigo-100/50 blur-3xl -ml-32 -mt-32"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-cyan-100/50 blur-3xl -mr-32 -mb-32"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16 observe-viewport">
                <h2 class="text-4xl font-brand text-slate-900 mb-4 js-split-text scroll-trigger">
                    Fitur Enterprise untuk Skala UMKM
                </h2>
                <p class="text-slate-600 font-body text-lg fade-up-element scroll-trigger" style="transition-delay: 300ms;">
                    Kami memadukan teknologi canggih Livewire v3 dan AI untuk memberikan pengalaman manajemen toko yang mulus.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 card-interaction group observe-viewport">
                    <div class="scroll-trigger fade-up-element" style="transition-delay: 0ms;">
                        <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold font-brand text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">Local AI Integration</h3>
                        <p class="text-slate-500 font-body leading-relaxed">
                            Analisis popularitas produk berdasarkan algoritma pesanan cerdas. Dapatkan insight otomatis.
                        </p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 card-interaction group observe-viewport">
                    <div class="scroll-trigger fade-up-element" style="transition-delay: 200ms;">
                        <div class="w-14 h-14 bg-cyan-50 rounded-2xl flex items-center justify-center text-cyan-600 mb-6 group-hover:bg-cyan-600 group-hover:text-white transition-all duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold font-brand text-slate-900 mb-3 group-hover:text-cyan-600 transition-colors">Geo-Delivery</h3>
                        <p class="text-slate-500 font-body leading-relaxed">
                            Hitung ongkos kirim otomatis berdasarkan koordinat lokasi pelanggan dengan presisi tinggi.
                        </p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 card-interaction group observe-viewport">
                    <div class="scroll-trigger fade-up-element" style="transition-delay: 400ms;">
                        <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold font-brand text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">Integrasi Xendit</h3>
                        <p class="text-slate-500 font-body leading-relaxed">
                            Terima pembayaran via QRIS, Virtual Account, dan E-Wallet otomatis dengan status real-time.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Role Management --}}
    <section id="solutions" class="py-24 overflow-hidden bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-16">

                {{-- Left: Visual --}}
                <div class="lg:w-1/2 relative observe-viewport">
                    <div class="absolute inset-0 bg-gradient-to-tr from-indigo-600 to-cyan-500 rounded-3xl rotate-3 opacity-20 blur-lg group-hover:rotate-6 transition-transform"></div>
                    <div class="relative bg-slate-900 rounded-3xl p-8 border border-slate-700 text-white shadow-2xl scroll-trigger fade-up-element hover:shadow-indigo-500/20 transition-all duration-500">
                        <div class="flex items-center gap-4 mb-8 border-b border-slate-700 pb-4">
                            <div class="w-3 h-3 rounded-full bg-red-500 hover:scale-125 transition-transform"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500 hover:scale-125 transition-transform"></div>
                            <div class="text-sm font-mono text-slate-400">Manage Roles</div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4 p-3 bg-slate-800 rounded-lg border border-indigo-500/50 hover:bg-slate-700 transition-colors cursor-pointer group">
                                <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center font-bold group-hover:rotate-12 transition-transform">O</div>
                                <div>
                                    <h4 class="font-bold">Owner</h4>
                                    <p class="text-xs text-slate-400">Full Access</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 p-3 bg-slate-800/50 rounded-lg border border-slate-700 hover:bg-slate-700 transition-colors cursor-pointer group">
                                <div class="w-10 h-10 rounded-full bg-cyan-600 flex items-center justify-center font-bold group-hover:-rotate-12 transition-transform">S</div>
                                <div>
                                    <h4 class="font-bold">Staff</h4>
                                    <p class="text-xs text-slate-400">Chat & Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Content --}}
                <div class="lg:w-1/2 space-y-6 observe-viewport">
                    <h2 class="text-4xl font-brand text-slate-900 js-split-text scroll-trigger">
                        Organisasi Tim yang Terstruktur & Aman.
                    </h2>
                    <p class="text-lg text-slate-600 font-body scroll-trigger fade-up-element" style="transition-delay: 200ms;">
                        UKITA bukan sekadar website jualan. Ini adalah sistem operasi bisnis Anda. Bagi peran antara Owner dan Staff dengan mudah.
                    </p>
                    <ul class="space-y-4 font-body text-slate-700 scroll-trigger fade-up-element" style="transition-delay: 400ms;">
                        <li class="flex items-start gap-3 group">
                            <svg class="w-6 h-6 text-indigo-500 flex-shrink-0 group-hover:scale-125 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span><strong class="text-indigo-600">Seller Dashboard:</strong> Kustomisasi katalog & analisis income.</span>
                        </li>
                        <li class="flex items-start gap-3 group">
                            <svg class="w-6 h-6 text-indigo-500 flex-shrink-0 group-hover:scale-125 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span><strong class="text-indigo-600">Staff Access:</strong> Delegasi aman tanpa akses keuangan.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- 7. CTA / Footer --}}
    <footer class="bg-slate-50 pt-24 pb-12 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-indigo-600 rounded-3xl p-12 text-center text-white relative overflow-hidden mb-20 observe-viewport group">
                {{-- Animated Background Pattern --}}
                <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 group-hover:scale-110 transition-transform duration-1000"></div>
                <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-white/10 rounded-full blur-3xl group-hover:bg-white/20 transition-all duration-700"></div>

                <h2 class="text-3xl md:text-4xl font-brand mb-6 relative z-10 js-split-text scroll-trigger">Siap Mengembangkan Usaha Anda?</h2>

                <div class="relative z-10 mt-8 scroll-trigger fade-up-element" style="transition-delay: 300ms;">
                    <a href="{{ route('register') }}" wire:navigate class="inline-block px-8 py-4 bg-white text-indigo-700 rounded-xl font-bold text-lg shadow-xl hover:bg-indigo-50 hover:scale-105 transition-all active:scale-95">
                        Mulai Gratis Sekarang
                    </a>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center pt-8 border-t border-slate-200 text-slate-500 font-body text-sm">
                <p>&copy; {{ date('Y') }} UKITA Technology. <span class="text-indigo-400 font-bold mx-2">●</span> Buatan Indonesia untuk Dunia.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-indigo-600 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-indigo-600 transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- JAVASCRIPT ANIMATION LOGIC --}}
    <script>
        function splitText(element) {
            const text = element.innerText.trim();
            const words = text.split(/\s+/);
            const baseDelay = parseInt(element.style.getPropertyValue('--delay-start')) || 0;

            let html = '';
            words.forEach((word, index) => {
                const delay = baseDelay + (index * 50);
                html += `
                    <span class="word-mask">
                        <span class="word-inner" style="transition-delay: ${delay}ms">
                            ${word}
                        </span>
                    </span>`;
            });
            element.innerHTML = html;
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.js-split-text').forEach(el => splitText(el));

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const targets = entry.target.querySelectorAll('.scroll-trigger');
                        targets.forEach(t => t.classList.add('animate-active'));
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.2
            });

            document.querySelectorAll('.observe-viewport').forEach(el => observer.observe(el));
        });
    </script>
</div>