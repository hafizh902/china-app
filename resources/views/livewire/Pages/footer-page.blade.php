<footer class="relative bg-slate-900 text-slate-300 font-sans border-t border-slate-800 overflow-hidden">
    {{-- Background Pattern Subtle --}}
    <div class="absolute inset-0 opacity-[0.05]" style="background-image: radial-gradient(#6366f1 1px, transparent 1px); background-size: 24px 24px;"></div>

    <div class="max-w-7xl mx-auto px-6 py-12 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12">
            
            {{-- Bagian 1: Identitas Toko (Brand Seller) --}}
            <div class="md:col-span-4 space-y-6">
                <div class="flex items-center gap-3">
                    {{-- Placeholder Logo Toko --}}
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/20 text-white">
                        <i class="fas fa-store text-lg"></i>
                    </div>
                    <div>
                        {{-- Nama Toko Dinamis --}}
                        <h3 class="text-white font-brand text-2xl tracking-wide leading-none">
                            {{ $storeName ?? 'Nama Toko' }}
                        </h3>
                        <span class="text-indigo-400 text-xs font-bold tracking-[0.1em] uppercase font-body">
                            Official Store
                        </span>
                    </div>
                </div>

                <p class="text-sm leading-relaxed text-slate-400 font-body">
                     {{ $storeTagline ?? 'Menyediakan produk terbaik dengan kualitas terjamin dan pelayanan prima untuk kepuasan pelanggan setia kami.' }}
                </p>

                {{-- Social Media Seller --}}
                <div class="flex gap-3">
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center hover:bg-indigo-600 hover:text-white transition-all text-slate-400 border border-slate-700">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all text-slate-400 border border-slate-700">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center hover:bg-green-600 hover:text-white transition-all text-slate-400 border border-slate-700">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            {{-- Bagian 2: Tautan Cepat (Quick Links) --}}
            {{-- Menggantikan bagian Developer, lebih berguna untuk Customer --}}
            <div class="md:col-span-5">
                <h4 class="text-white font-brand text-lg mb-6 flex items-center gap-2">
                    Jelajahi
                </h4>
                
                <div class="grid grid-cols-2 gap-4 text-sm font-body">
                    <ul class="space-y-3">
                        <li>
                            <a wire:navigate href="{{ route('home') }}" class="text-slate-400 hover:text-indigo-400 transition-colors flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-slate-600"></i> Beranda
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('catalogue') }}" class="text-slate-400 hover:text-indigo-400 transition-colors flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-slate-600"></i> Katalog Menu
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-400 hover:text-indigo-400 transition-colors flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-slate-600"></i> Promo Spesial
                            </a>
                        </li>
                    </ul>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-slate-400 hover:text-indigo-400 transition-colors flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-slate-600"></i> Cek Pesanan
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-400 hover:text-indigo-400 transition-colors flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-slate-600"></i> Bantuan
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bagian 3: Kontak & Jam Operasional --}}
            <div class="md:col-span-3 space-y-6">
                {{-- Contact --}}
                <div>
                    <h4 class="text-white font-brand text-lg mb-4">
                        Hubungi Kami
                    </h4>
                    <ul class="space-y-3 text-sm text-slate-400 font-body">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-indigo-500 mt-1"></i>
                            <span class="leading-tight">
                                {{ $storeAddress ?? 'Jl. Contoh No. 123, Kota Bisnis, Indonesia' }}
                            </span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone-alt text-indigo-500"></i>
                            <span>{{ $storePhone ?? '+62 812-3456-7890' }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-indigo-500"></i>
                            <span>{{ $storeEmail ?? 'hello@tokoumkm.id' }}</span>
                        </li>
                    </ul>
                </div>

                {{-- Hours --}}
                <div class="pt-6 border-t border-slate-800">
                    <h4 class="text-white font-brand text-lg mb-4">
                        Jam Operasional
                    </h4>
                    <div class="space-y-2 text-sm text-slate-400 font-body">
                        <div class="flex justify-between border-b border-slate-800 pb-1 border-dashed">
                            <span>Senin - Jumat</span> 
                            <span class="text-indigo-300 font-bold">09:00 - 21:00</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-800 pb-1 border-dashed">
                            <span>Sabtu - Minggu</span> 
                            <span class="text-indigo-300 font-bold">10:00 - 22:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="bg-slate-950 py-6 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-body text-slate-500">
            <p>&copy; {{ date('Y') }} {{ $storeName ?? 'Nama Toko' }}. All rights reserved.</p>
            
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-indigo-400 transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-indigo-400 transition-colors">Syarat & Ketentuan</a>
                
                {{-- Branding SaaS Kecil (Optional) --}}
                <span class="flex items-center gap-1 opacity-50">
                    Powered by <span class="font-bold text-slate-400">UKITA</span>
                </span>
            </div>
        </div>
    </div>
</footer>