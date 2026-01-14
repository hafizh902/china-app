@extends('components.layouts.app')

@section('title', 'User Settings')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-red-600 via-red-700 to-red-800 p-8 text-center">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border-4 border-white">
                    <i class="fas fa-user-cog text-red-600 text-3xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2" style="font-family: 'Noto Sans SC', sans-serif;">
                    用户设置
                </h1>
                <p class="text-yellow-100 text-sm">
                    Kelola pengaturan akun Anda
                </p>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Sidebar Menu -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Pengaturan</h3>
                    <nav class="space-y-2">
                        <a href="#profile" class="block px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">
                            <i class="fas fa-user mr-3"></i>Profil
                        </a>
                        <a href="#security" class="block px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">
                            <i class="fas fa-shield-alt mr-3"></i>Keamanan
                        </a>
                        <a href="#preferences" class="block px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">
                            <i class="fas fa-cog mr-3"></i>Preferensi
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Profile Settings -->
                <div id="profile" class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-user text-red-500 mr-3"></i>Informasi Profil
                    </h3>

                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-signature mr-2 text-red-500"></i>Nama Lengkap
                                </label>
                                <input
                                    type="text"
                                    value="{{ auth()->user()->name }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200"
                                    placeholder="Masukkan nama lengkap"
                                >
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-envelope mr-2 text-red-500"></i>Email
                                </label>
                                <input
                                    type="email"
                                    value="{{ auth()->user()->email }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200"
                                    placeholder="your@email.com"
                                >
                            </div>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-phone mr-2 text-red-500"></i>Nomor Telepon
                            </label>
                            <input
                                type="tel"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200"
                                placeholder="+62 xxx xxxx xxxx"
                            >
                        </div>

                        <!-- Address -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>Alamat
                            </label>
                            <textarea
                                rows="3"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200"
                                placeholder="Masukkan alamat lengkap"
                            ></textarea>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                    </form>
                </div>

                <!-- Security Settings -->
                <div id="security" class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-shield-alt text-red-500 mr-3"></i>Keamanan Akun
                    </h3>

                    <div class="space-y-6">
                        <!-- Change Password -->
                        <div class="border-2 border-gray-100 rounded-xl p-6">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Ubah Password</h4>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password Lama</label>
                                    <input
                                        type="password"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200"
                                        placeholder="Masukkan password lama"
                                    >
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                                        <input
                                            type="password"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200"
                                            placeholder="Minimal 8 karakter"
                                        >
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                                        <input
                                            type="password"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200"
                                            placeholder="Ulangi password baru"
                                        >
                                    </div>
                                </div>
                                <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300">
                                    <i class="fas fa-key mr-2"></i>Ubah Password
                                </button>
                            </form>
                        </div>

                        <!-- Two Factor Authentication -->
                        <div class="border-2 border-gray-100 rounded-xl p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Two-Factor Authentication</h4>
                                    <p class="text-sm text-gray-600 mt-1">Tambahkan lapisan keamanan ekstra untuk akun Anda</p>
                                </div>
                                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                                    <i class="fas fa-toggle-off mr-2"></i>Nonaktif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Preferences -->
                <div id="preferences" class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-cog text-red-500 mr-3"></i>Preferensi
                    </h3>

                    <div class="space-y-6">
                        <!-- Language -->
                        <div class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Bahasa</h4>
                                <p class="text-sm text-gray-600">Pilih bahasa yang Anda inginkan</p>
                            </div>
                            <select class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200">
                                <option value="id">Bahasa Indonesia</option>
                                <option value="en">English</option>
                                <option value="zh">中文</option>
                            </select>
                        </div>

                        <!-- Notifications -->
                        <div class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Notifikasi Email</h4>
                                <p class="text-sm text-gray-600">Terima notifikasi tentang pesanan dan promosi</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                            </label>
                        </div>

                        <!-- Theme -->
                        <div class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Tema</h4>
                                <p class="text-sm text-gray-600">Pilih tampilan aplikasi</p>
                            </div>
                            <select class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200">
                                <option value="light">Terang</option>
                                <option value="dark">Gelap</option>
                                <option value="auto">Otomatis</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection