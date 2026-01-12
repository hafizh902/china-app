<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China Street Food</title>
    <!-- Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts untuk font Chinese dan Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        // Konfigurasi Tailwind CSS custom
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'chinese-red': '#C41E3A', // Warna merah khas China
                        'chinese-black': '#1A1A1A', // Warna hitam khas China
                        'chinese-gold': '#D4AF37', // Warna emas khas China
                        'chinese-gold-light': '#F0D878', // Warna emas terang
                    },
                    fontFamily: {
                        'chinese': ['Noto Sans SC', 'sans-serif'], // Font untuk teks Chinese
                        'sans': ['Inter', 'sans-serif'], // Font untuk teks umum
                    }
                }
            }
        }
    </script>
    @fluxStyles
</head>
<body class="bg-gray-50">
    <!-- Navbar Desktop -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo dan Brand -->
                <div class="flex items-center space-x-8">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-bowl-food text-yellow-400"></i> <!-- Icon mangkok makanan -->
                        </div>
                        <h1 class="text-2xl font-bold" style="font-family: 'Noto Sans SC', sans-serif;">China Street Food</h1>
                    </div>
                    <!-- Menu navigasi utama -->
                    <div class="hidden lg:flex space-x-6">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 font-medium transition-colors">Home</a>
                        <a href="{{ route('menu') }}" class="text-gray-700 hover:text-red-600 font-medium transition-colors">Menu</a>
                        <a href="{{ route('orders') }}" class="text-gray-700 hover:text-red-600 font-medium transition-colors">Orders</a>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-red-600 font-medium transition-colors">Admin</a>
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- Bagian kanan navbar: Cart dan Authentication -->
                <div class="flex items-center space-x-4">
                    <livewire:cart-component /> <!-- Komponen keranjang belanja -->
                    @auth
                        <!-- Jika user sudah login -->
                        <div class="flex items-center space-x-3">
                            <span class="text-gray-700">{{ auth()->user()->name }}</span> <!-- Nama user -->
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-red-600 font-medium transition-colors">Logout</button>
                            </form>
                        </div>
                    @else
                        <!-- Jika user belum login -->
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-red-600 font-medium transition-colors">Login</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{ $slot }} <!-- Tempat konten halaman akan dimuat -->
    @livewireScripts <!-- Script untuk Livewire -->
    @fluxScripts
</body>
</html>