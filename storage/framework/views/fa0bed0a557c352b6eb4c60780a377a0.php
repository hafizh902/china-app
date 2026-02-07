<div 
    x-data="{ loading: true, scrollAtTop: true }" 
    x-init="
        setTimeout(() => loading = false, 1500);
        window.addEventListener('scroll', () => { scrollAtTop = window.scrollY < 50 });
    "
    class="relative min-h-screen bg-white text-slate-800 font-sans selection:bg-indigo-500 selection:text-white"
>
    
    <style>
        /* Font Definitions */
        @font-face {
            font-family: 'Coolvetica';
            src: url('/fonts/coolvetica.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
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

        .font-brand { font-family: 'Coolvetica', sans-serif; }
        .font-body { font-family: 'CreatoDisplay', sans-serif; }
        
        /* Animasi Custom */
        .fade-enter-active, .fade-leave-active { transition: opacity 0.5s; }
        .fade-enter, .fade-leave-to { opacity: 0; }
        
        /* Animasi Slide Up Word - DIPERBAIKI */
        @keyframes slideUpWord {
            0% { 
                opacity: 0; 
                transform: translateY(60px) rotate(8deg); 
            }
            100% { 
                opacity: 1; 
                transform: translateY(0) rotate(0); 
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Kelas helper untuk animasi word */
        .word-animate {
            display: inline-block;
            opacity: 0;
            animation: slideUpWord 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        /* Gradient Text Helper */
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(to right, #4F46E5, #06B6D4);
        }

        /* Prevent flash of unstyled content */
        [x-cloak] { display: none !important; }
    </style>

    
    <div 
        x-show="loading" 
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex flex-col items-center justify-center bg-white"
    >
        <div class="w-16 h-16 border-4 border-indigo-100 border-t-indigo-600 rounded-full animate-spin"></div>
        <h2 class="mt-4 text-2xl font-brand tracking-widest text-indigo-900 animate-pulse">UKITA</h2>
        <p class="text-sm text-slate-400 font-body">Memuat Ekosistem UMKM...</p>
    </div>


    
    <header class="relative pt-5 pb-10 lg:pt-3 lg:pb-10 overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-indigo-50/50 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[400px] h-[400px] bg-cyan-50/50 rounded-full blur-3xl -z-10"></div>

        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8" style="animation: fadeInUp 1s ease-out;">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 text-indigo-700 rounded-full text-sm font-bold font-body border border-indigo-100">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                    </span>
                    Platform Pemberdayaan UMKM #1
                </div>
                
                
                <h1 class="text-5xl lg:text-7xl font-brand leading-[1.1] text-slate-900 mb-6">
                    
                    <div class="flex flex-wrap gap-x-4 mb-2 overflow-hidden">
                        <span class="word-animate" style="animation-delay: 1600ms;">Bangun</span>
                        <span class="word-animate" style="animation-delay: 1750ms;">Brand</span>
                    </div>

                    
                    <div class="flex flex-wrap gap-x-4 overflow-hidden">
                        <span class="word-animate text-gradient" style="animation-delay: 1900ms;">Bukan</span>
                        <span class="word-animate text-gradient" style="animation-delay: 2050ms;">Sekadar</span>
                        <span class="word-animate text-gradient" style="animation-delay: 2200ms;">Jualan.</span>
                    </div>
                </h1>
                
                <p class="text-lg text-slate-600 font-body leading-relaxed max-w-lg">
                    Kelola toko online Anda dengan teknologi Enterprise. Integrasi AI Lokal, Pembayaran Xendit, dan Manajemen Pengiriman dalam satu dashboard multi-role yang powerful.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 font-body">
                    <a href="<?php echo e(route('register')); ?>" wire:navigate class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-lg shadow-xl shadow-indigo-600/20 transition-all transform hover:scale-105 text-center">
                        Coba Gratis 14 Hari
                    </a>
                    <button class="px-8 py-4 bg-white border border-slate-200 hover:border-indigo-200 text-slate-700 hover:text-indigo-600 rounded-xl font-bold text-lg transition-all flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                        </svg>
                        Lihat Demo
                    </button>
                </div>

                <p class="text-sm text-slate-400 font-body">
                    *Mendukung multi-tenant architecture & Custom Domain
                </p>
            </div>

            <div class="relative lg:h-[600px] w-full flex items-center justify-center">
                <div class="relative w-full aspect-[4/3] bg-slate-900 rounded-2xl shadow-2xl border border-slate-800 p-2 overflow-hidden transform rotate-2 hover:rotate-0 transition-all duration-500 group">
                    <div class="h-8 bg-slate-800 rounded-t-lg flex items-center px-4 gap-2 mb-4">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <div class="ml-auto text-xs text-slate-500 font-mono">dashboard.ukita.com</div>
                    </div>
                    <div class="grid grid-cols-4 gap-4 h-full p-4">
                        <div class="col-span-1 bg-slate-800/50 rounded-lg h-3/4 animate-pulse"></div>
                        <div class="col-span-3 space-y-4">
                            <div class="flex gap-4">
                                <div class="h-24 w-1/3 bg-indigo-600/20 border border-indigo-500/30 rounded-xl flex flex-col justify-center items-center">
                                    <span class="text-indigo-400 text-xs uppercase font-bold">Total Pendapatan</span>
                                    <span class="text-white font-brand text-2xl">Rp 45.2jt</span>
                                </div>
                                <div class="h-24 w-1/3 bg-slate-800 rounded-xl"></div>
                                <div class="h-24 w-1/3 bg-slate-800 rounded-xl"></div>
                            </div>
                            <div class="h-40 bg-slate-800/80 rounded-xl w-full"></div>
                        </div>
                    </div>
                    
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-xl border border-slate-100 flex items-center gap-3 animate-bounce" style="animation-duration: 3s;">
                        <div class="bg-green-100 p-2 rounded-full text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-bold uppercase">Pesanan Baru</p>
                            <p class="font-brand text-lg text-slate-800">+12 Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    
    <section id="features" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-brand text-slate-900 mb-4">Fitur Enterprise untuk Skala UMKM</h2>
                <p class="text-slate-600 font-body text-lg">
                    Kami memadukan teknologi canggih Livewire v3 dan AI untuk memberikan pengalaman manajemen toko yang mulus.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-indigo-500/10 transition-all group">
                    <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold font-brand text-slate-900 mb-3">Local AI Integration</h3>
                    <p class="text-slate-500 font-body leading-relaxed">
                        Analisis popularitas produk berdasarkan algoritma pesanan cerdas. Dapatkan insight otomatis untuk strategi penjualan.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-indigo-500/10 transition-all group">
                    <div class="w-14 h-14 bg-cyan-50 rounded-2xl flex items-center justify-center text-cyan-600 mb-6 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold font-brand text-slate-900 mb-3">Leaflet.js Geo-Delivery</h3>
                    <p class="text-slate-500 font-body leading-relaxed">
                        Hitung ongkos kirim otomatis berdasarkan koordinat lokasi pelanggan. Presisi tinggi untuk pengiriman lokal.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-indigo-500/10 transition-all group">
                    <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold font-brand text-slate-900 mb-3">Integrasi Xendit</h3>
                    <p class="text-slate-500 font-body leading-relaxed">
                        Terima pembayaran via QRIS, Virtual Account, dan E-Wallet secara otomatis dengan status real-time.
                    </p>
                </div>
            </div>
        </div>
    </section>

    
    <section id="solutions" class="py-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2 relative">
                    <div class="absolute inset-0 bg-gradient-to-tr from-indigo-600 to-cyan-500 rounded-3xl rotate-3 opacity-20 blur-lg"></div>
                    <div class="relative bg-slate-900 rounded-3xl p-8 border border-slate-700 text-white shadow-2xl">
                        <div class="flex items-center gap-4 mb-8 border-b border-slate-700 pb-4">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="text-sm font-mono text-slate-400">Manage Roles</div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center gap-4 p-3 bg-slate-800 rounded-lg border border-indigo-500/50">
                                <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center font-bold">O</div>
                                <div>
                                    <h4 class="font-bold">Owner (Seller)</h4>
                                    <p class="text-xs text-slate-400">Full Access: Katalog, Keuangan, AI</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 p-3 bg-slate-800/50 rounded-lg border border-slate-700">
                                <div class="w-10 h-10 rounded-full bg-cyan-600 flex items-center justify-center font-bold">S</div>
                                <div>
                                    <h4 class="font-bold">Staff / CS</h4>
                                    <p class="text-xs text-slate-400">Limited Access: Chat, Order Status</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 p-3 bg-slate-800/50 rounded-lg border border-slate-700">
                                <div class="w-10 h-10 rounded-full bg-emerald-600 flex items-center justify-center font-bold">U</div>
                                <div>
                                    <h4 class="font-bold">User (Customer)</h4>
                                    <p class="text-xs text-slate-400">Storefront, Cart, History</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2 space-y-6">
                    <h2 class="text-4xl font-brand text-slate-900">
                        Organisasi Tim yang <br> <span class="text-indigo-600">Terstruktur & Aman.</span>
                    </h2>
                    <p class="text-lg text-slate-600 font-body">
                        UKITA bukan sekadar website jualan. Ini adalah sistem operasi bisnis Anda. Bagi peran antara Owner dan Staff dengan mudah.
                    </p>
                    <ul class="space-y-4 font-body text-slate-700">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span><strong>Seller Dashboard:</strong> Kustomisasi katalog, banner promo, dan analisis income lengkap.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span><strong>Staff Access:</strong> Delegasikan layanan pelanggan tanpa memberikan akses ke data sensitif keuangan.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span><strong>Security:</strong> Login aman dengan OTP Verification.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    
    <section class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#4F46E5 1px, transparent 1px); background-size: 32px 32px;"></div>
        
        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <h2 class="text-3xl md:text-5xl font-brand mb-6">"Seperti Punya Aplikasi Sendiri"</h2>
            <p class="text-xl text-slate-300 font-body max-w-2xl mx-auto mb-12">
                User Anda tidak akan merasa sedang di marketplace. Dengan kustomisasi profil, banner, dan katalog, UKITA menonjolkan identitas brand Anda.
            </p>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <div class="text-3xl font-brand text-indigo-400 mb-2">SEO</div>
                    <div class="text-sm text-slate-400">Optimized Store</div>
                </div>
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <div class="text-3xl font-brand text-indigo-400 mb-2">Supabase</div>
                    <div class="text-sm text-slate-400">Fast Storage</div>
                </div>
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <div class="text-3xl font-brand text-indigo-400 mb-2">Chat</div>
                    <div class="text-sm text-slate-400">Real-time Support</div>
                </div>
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <div class="text-3xl font-brand text-indigo-400 mb-2">Review</div>
                    <div class="text-sm text-slate-400">Rating System</div>
                </div>
            </div>
        </div>
    </section>

    
    <footer class="bg-white pt-24 pb-12 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-indigo-600 rounded-3xl p-12 text-center text-white relative overflow-hidden mb-20">
                <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                
                <h2 class="text-3xl md:text-4xl font-brand mb-6 relative z-10">Siap Mengembangkan Usaha Anda?</h2>
                <p class="text-indigo-100 font-body text-lg mb-8 max-w-xl mx-auto relative z-10">
                    Bergabunglah dengan UKITA hari ini. Satu platform, satu database per tenant (coming soon), solusi tak terbatas.
                </p>
                <div class="relative z-10">
                    <a href="<?php echo e(route('register')); ?>" wire:navigate class="inline-block px-8 py-4 bg-white text-indigo-700 rounded-xl font-bold text-lg shadow-xl hover:bg-indigo-50 transition-colors">
                        Mulai Gratis Sekarang
                    </a>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center pt-8 border-t border-slate-100 text-slate-500 font-body text-sm">
                <p>&copy; <?php echo e(date('Y')); ?> UKITA Technology. All rights reserved.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-indigo-600">Privacy Policy</a>
                    <a href="#" class="hover:text-indigo-600">Terms of Service</a>
                    <a href="#" class="hover:text-indigo-600">Help Center</a>
                </div>
            </div>
        </div>
    </footer>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Pages/landing-page.blade.php ENDPATH**/ ?>