<!-- Register Modal -->
<div id="register-modal" 
     class="fixed inset-0 z-[9999] overflow-y-auto flex items-center justify-center"
     style="display: <?php echo e($showModal ? 'flex' : 'none'); ?>; background-color: rgba(0, 0, 0, <?php echo e($showModal ? '0.5' : '0'); ?>);"
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
                    class="absolute top-6 right-6 text-white hover:text-yellow-300 transition-colors z-20 bg-red-700 rounded-full w-10 h-10 flex items-center justify-center">
                <i class="fas fa-times text-lg"></i>
            </button>

            <!-- Header Content -->
            <div class="relative z-10">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border-4 border-white">
                    <i class="fas fa-user-plus text-red-600 text-3xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2" style="font-family: 'Noto Sans SC', sans-serif;">
                    加入我们
                </h2>
                <p class="text-yellow-100 text-sm">
                    Daftar & Nikmati Makanan China Terlezat!
                </p>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-8 max-h-[70vh] overflow-y-auto">
            <!-- Validation Errors -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-triangle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <ul class="text-sm text-red-700 space-y-1">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>• <?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <!-- Register Form -->
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Sudah punya akun?
                    <button wire:click="$dispatch('open-login-modal')" type="button"
                            class="font-semibold text-red-600 hover:text-red-700 transition-colors underline">
                        Masuk di sini
                    </button>
                </p>
            </div>

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
<?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/auth/register-modal.blade.php ENDPATH**/ ?>