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
                    <i class="fas fa-envelope-open-text text-red-600 text-3xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2" style="font-family: 'Noto Sans SC', sans-serif;">
                    验证邮箱
                </h2>
                <p class="text-yellow-100 text-sm">
                    Verifikasi email Anda untuk melanjutkan
                </p>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-8">

        <!-- Status Message -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status') == 'verification-link-sent'): ?>
            <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">
                            Link verifikasi baru telah dikirim ke alamat email yang Anda berikan saat registrasi.
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- Resend Verification Email -->
        <div class="space-y-4">
            <form method="POST" action="<?php echo e(route('verification.send')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>
                <button
                    type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 transform hover:scale-105"
                >
                    <i class="fas fa-envelope mr-2"></i>
                    Kirim Ulang Email Verifikasi
                </button>
            </form>

            <!-- Logout -->
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="text-center">
                <?php echo csrf_field(); ?>
                <button
                    type="submit"
                    class="text-sm text-gray-600 hover:text-gray-800 transition-colors underline"
                    data-test="logout-button"
                >
                    <i class="fas fa-sign-out-alt mr-1"></i>Logout
                </button>
            </form>
        </div>

        <!-- Additional Info -->
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        Belum menerima email? Periksa folder spam atau klik tombol di atas untuk mengirim ulang.
                    </p>
                </div>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center">
            <a href="<?php echo e(route('home')); ?>" class="text-sm text-gray-500 hover:text-gray-700 transition-colors">
                <i class="fas fa-arrow-left mr-1"></i>Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
<?php /**PATH D:\projek 12\china-app\resources\views/livewire/auth/verify-email.blade.php ENDPATH**/ ?>