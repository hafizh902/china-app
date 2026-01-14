<!-- Auth Modal -->
<div id="auth-modal" 
     class="fixed inset-0 z-[9999] overflow-y-auto flex items-center justify-center"
     style="display: {{ $showModal ? 'flex' : 'none' }}; background-color: rgba(0, 0, 0, {{ $showModal ? '0.5' : '0' }});"
     @click.self="$wire.closeModal()"
     @keydown.escape="$wire.closeModal()">

    <!-- Modal Content -->
    <div class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl overflow-hidden mx-4">
        
        <!-- Chinese Pattern Header -->
        <div class="relative bg-gradient-to-r from-red-600 via-red-700 to-red-800 p-8 text-center">
            <!-- Decorative Chinese Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-4 left-4 text-yellow-400 text-6xl">🍜</div>
                <div class="absolute top-2 right-8 text-yellow-400 text-4xl">🥢</div>
                <div class="absolute bottom-4 left-8 text-yellow-400 text-5xl">🍲</div>
                <div class="absolute bottom-2 right-4 text-yellow-400 text-3xl">🥟</div>
            </div>

            <!-- Close Button -->
            <button wire:click="closeModal"
                    class="absolute top-4 right-4 text-white hover:text-yellow-300 transition-colors z-10">
                <i class="fas fa-times text-xl"></i>
            </button>

            <!-- Header Content -->
            <div class="relative z-10">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border-4 border-white">
                    @if($isLogin)
                        <i class="fas fa-user-circle text-red-600 text-3xl"></i>
                    @else
                        <i class="fas fa-user-plus text-red-600 text-3xl"></i>
                    @endif
                </div>
                <h2 class="text-3xl font-bold text-white mb-2" style="font-family: 'Noto Sans SC', sans-serif;">
                    @if($isLogin)
                        欢迎回来
                    @else
                        加入我们
                    @endif
                </h2>
                <p class="text-yellow-100 text-sm">
                    @if($isLogin)
                        Masuk & Nikmati Makanan China Terlezat!
                    @else
                        Daftar & Nikmati Makanan China Terlezat!
                    @endif
                </p>
            </div>
        </div>

        <!-- Tab Navigation -->
        <div class="flex border-b border-gray-200">
            <button
                wire:click="switchToLogin"
                class="flex-1 py-4 px-1 text-center border-b-2 font-medium text-sm transition-colors {{ $isLogin ? 'border-red-500 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                Masuk
            </button>
            <button
                wire:click="switchToRegister"
                class="flex-1 py-4 px-1 text-center border-b-2 font-medium text-sm transition-colors {{ !$isLogin ? 'border-red-500 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                Daftar
            </button>
        </div>

        <!-- Form Content -->
        <div class="p-8">
            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-triangle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <ul class="text-sm text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            @if($isLogin)
            <form wire:submit.prevent="login" class="space-y-6">
                <!-- Email Field -->
                <div class="relative">
                    <label for="login-email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-red-500"></i>Email Address
                    </label>
                    <div class="relative">
                        <input
                            wire:model="loginEmail"
                            id="login-email"
                            name="loginEmail"
                            type="email"
                            autocomplete="email"
                            required
                            autofocus
                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-500"
                            placeholder="your@email.com"
                        >
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    @error('loginEmail')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="relative">
                    <label for="login-password" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-red-500"></i>Password
                    </label>
                    <div class="relative">
                        <input
                            wire:model="loginPassword"
                            id="login-password"
                            name="loginPassword"
                            type="password"
                            autocomplete="current-password"
                            required
                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-500"
                            placeholder="Masukkan password Anda"
                        >
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    @error('loginPassword')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            wire:model="remember"
                            id="remember_me"
                            name="remember"
                            type="checkbox"
                            class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded"
                        >
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                            Ingat saya
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-red-600 hover:text-red-500 transition-colors">
                                Lupa password?
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl"
                >
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk Sekarang
                </button>
            </form>
            @endif

            <!-- Register Form -->
            @if(!$isLogin)
            <form wire:submit.prevent="register" class="space-y-6">
                <!-- Name Field -->
                <div class="relative">
                    <label for="register-name" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-red-500"></i>Nama Lengkap
                    </label>
                    <div class="relative">
                        <input
                            wire:model="name"
                            type="text"
                            id="register-name"
                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-500"
                            placeholder="Masukkan nama lengkap Anda"
                            required
                        >
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="relative">
                    <label for="register-email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-red-500"></i>Email Address
                    </label>
                    <div class="relative">
                        <input
                            wire:model="email"
                            type="email"
                            id="register-email"
                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-500"
                            placeholder="your@email.com"
                            required
                        >
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="relative">
                    <label for="register-password" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-red-500"></i>Password
                    </label>
                    <div class="relative">
                        <input
                            wire:model="password"
                            type="password"
                            id="register-password"
                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-500"
                            placeholder="Minimal 8 karakter"
                            required
                        >
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="relative">
                    <label for="register-password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-red-500"></i>Konfirmasi Password
                    </label>
                    <div class="relative">
                        <input
                            wire:model="password_confirmation"
                            type="password"
                            id="register-password_confirmation"
                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-500"
                            placeholder="Ulangi password Anda"
                            required
                        >
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <span wire:loading.remove>
                        <i class="fas fa-user-plus mr-2"></i>Buat Akun Sekarang
                    </span>
                    <span wire:loading>
                        <i class="fas fa-spinner fa-spin mr-2"></i>Mendaftarkan...
                    </span>
                </button>
            </form>
            @endif

            <!-- Chinese Food Benefits -->
            <div class="mt-6 bg-gradient-to-r from-yellow-50 to-red-50 p-4 rounded-xl border border-yellow-200">
                <div class="text-center">
                    <h4 class="text-sm font-semibold text-gray-800 mb-2" style="font-family: 'Noto Sans SC', sans-serif;">
                        🎉 Bergabunglah & Dapatkan:
                    </h4>
                    <div class="flex justify-center space-x-4 text-xs text-gray-600">
                        <span class="flex items-center">
                            <i class="fas fa-utensils text-red-500 mr-1"></i>Menu Spesial
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-star text-yellow-500 mr-1"></i>Diskon Member
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-truck text-green-500 mr-1"></i>Gratis Ongkir
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>