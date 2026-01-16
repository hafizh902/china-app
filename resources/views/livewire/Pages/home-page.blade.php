<div>
    {{-- Hero Section - Bagian atas halaman dengan gambar dan call-to-action --}}
    <section class="relative h-96">
        <div class="absolute inset-0 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1759893497863-c90a6dfa7a86?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-chinese-black via-transparent to-transparent opacity-70">
            </div>
            <div class="absolute inset-0 flex items-center px-12">
                <div class="text-white max-w-2xl">
                    <h2 class="text-5xl font-bold tracking-wide chinese-font">Authentic Chinese Street Food</h2>
                    <p class="text-xl mb-8 text-gray-200">Experience the rich flavors and traditions of Chinese street
                        cuisine, delivered fresh to your door</p>
                    <div class="flex space-x-4">
                        <!-- Tombol Order Now - mengarah ke section menu -->
                        <button
                            class="px-8 py-3 bg-chinese-red text-white  rounded-full font-semibold  hover:scale-105 transition"
                            wire:navigate href="{{ route('menu') }}">
                            <i class="fas fa-utensils mr-2"></i> Order Now
                        </button>
                        <!-- Tombol Watch Video - placeholder -->
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=RDdQw4w9WgXcQ&start_radio=1"
                            target="_blank"
                            class="px-6 py-3 bg-transparent border border-white text-white rounded-full hover:bg-white hover:text-gray-800 font-medium inline-flex items-center">
                            <i class="fas fa-play-circle mr-2"></i> Watch Video
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section - Menampilkan keunggulan layanan --}}
    <section class="py-12 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ([['icon' => 'truck', 'title' => 'Fast Delivery', 'desc' => 'Fresh food delivered within 30 minutes'], ['icon' => 'award', 'title' => 'Authentic Recipes', 'desc' => 'Traditional recipes passed down through generations'], ['icon' => 'leaf', 'title' => 'Fresh Ingredients', 'desc' => 'Only the freshest ingredients sourced daily']] as $feature)
                <div class="text-center">
                    <div class="w-16 h-16 bg-chinese-red rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-{{ $feature['icon'] }} text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Menu Section - Menampilkan menu menggunakan komponen Livewire --}}
    <section id="menu" class="py-12 px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold chinese-font text-chinese-red text-center mb-8">Our Menu</h2>
            <livewire:pages.menu-page /> <!-- Komponen menu page -->
        </div>
    </section>
</div>