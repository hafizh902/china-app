    <div class="min-h-screen bg-gradient-to-br from-red-50 to-yellow-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white rounded-3xl shadow-2xl overflow-hidden">
        <!-- Chinese Pattern Header -->
        <div class="relative bg-gradient-to-r from-red-600 via-red-700 to-red-800 p-8 text-center">
            <!-- Decorative Chinese Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-4 left-4 text-yellow-400 text-6xl">🍜</div>
                <div class="absolute top-2 right-8 text-yellow-400 text-4xl">🥢</div>
                <div class="absolute bottom-4 left-8 text-yellow-400 text-5xl">🍲</div>
                <div class="absolute bottom-2 right-4 text-yellow-400 text-3xl">🥟</div>
            </div>

            <!-- Header Content -->
            <div class="relative z-10">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border-4 border-white">
                    <i class="fas fa-shield-alt text-red-600 text-3xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2" style="font-family: 'Noto Sans SC', sans-serif;">
                    双因素认证
                </h2>
                <p class="text-yellow-100 text-sm">
                    Masukkan kode autentikasi untuk melanjutkan
                </p>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-8">

        <!-- Alpine.js Data -->
        <div
            x-data="{
                showRecoveryInput: @js($errors->has('recovery_code')),
                code: '',
                recovery_code: '',
                toggleInput() {
                    this.showRecoveryInput = !this.showRecoveryInput;
                    this.code = '';
                    this.recovery_code = '';
                    this.$dispatch('clear-2fa-auth-code');
                    this.$nextTick(() => {
                        this.showRecoveryInput
                            ? this.$refs.recovery_code?.focus()
                            : this.$dispatch('focus-2fa-auth-code');
                    });
                },
            }"
        >
            <!-- Authentication Code Form -->
            <div x-show="!showRecoveryInput" class="space-y-6">
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Authentication Code</h3>
                    <p class="text-sm text-gray-600">Masukkan kode autentikasi dari aplikasi authenticator Anda.</p>
                </div>

                <form method="POST" action="{{ route('two-factor.login.store') }}" class="space-y-6">
                    @csrf

                    <!-- OTP Input -->
                    <div class="space-y-2">
                        <label for="code" class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-key mr-1"></i>Kode Autentikasi (6 digit)
                        </label>
                        <input
                            id="code"
                            type="text"
                            name="code"
                            x-model="code"
                            maxlength="6"
                            autocomplete="one-time-code"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-center text-2xl font-mono tracking-widest bg-gray-50"
                            placeholder="000000"
                            required
                        />
                        @error('code')
                            <p class="text-sm text-red-600 mt-1">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 transform hover:scale-105"
                    >
                        <i class="fas fa-arrow-right mr-2"></i>
                        Lanjutkan
                    </button>
                </form>
            </div>

            <!-- Recovery Code Form -->
            <div x-show="showRecoveryInput" class="space-y-6">
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Recovery Code</h3>
                    <p class="text-sm text-gray-600">Masukkan salah satu kode pemulihan darurat Anda.</p>
                </div>

                <form method="POST" action="{{ route('two-factor.login.store') }}" class="space-y-6">
                    @csrf

                    <!-- Recovery Code Input -->
                    <div class="space-y-2">
                        <label for="recovery_code" class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-keyboard mr-1"></i>Kode Pemulihan
                        </label>
                        <input
                            id="recovery_code"
                            type="text"
                            name="recovery_code"
                            x-ref="recovery_code"
                            x-model="recovery_code"
                            autocomplete="one-time-code"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 font-mono"
                            placeholder="Masukkan kode pemulihan"
                            required
                        />
                        @error('recovery_code')
                            <p class="text-sm text-red-600 mt-1">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 transform hover:scale-105"
                    >
                        <i class="fas fa-arrow-right mr-2"></i>
                        Lanjutkan
                    </button>
                </form>
            </div>

            <!-- Toggle Button -->
            <div class="text-center">
                <button
                    @click="toggleInput()"
                    class="text-sm text-gray-600 hover:text-gray-800 transition-colors underline"
                >
                    <span x-show="!showRecoveryInput">
                        <i class="fas fa-exchange-alt mr-1"></i>Masuk menggunakan kode pemulihan
                    </span>
                    <span x-show="showRecoveryInput">
                        <i class="fas fa-exchange-alt mr-1"></i>Masuk menggunakan kode autentikasi
                    </span>
                </button>
            </div>
        </div>

        <!-- Info Box -->
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        Gunakan aplikasi authenticator seperti Google Authenticator atau Authy untuk mendapatkan kode 6 digit.
                    </p>
                </div>
            </div>
        </div>

        <!-- Back to Login -->
        <div class="text-center">
            <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">
                <i class="fas fa-arrow-left mr-1"></i>Kembali ke Login
            </a>
        </div>
    </div>
</div>
