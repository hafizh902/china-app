<!-- Register Modal -->
<div id="register-modal" class="fixed inset-0 z-[9999] overflow-y-auto flex items-center justify-center"
    style="display: <?php echo e($showModal ? 'flex' : 'none'); ?>; background-color: rgba(0, 0, 0, <?php echo e($showModal ? '0.5' : '0'); ?>);"
    @click.self="$wire.closeModal()" @keydown.escape="$wire.closeModal()">

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
                <div
                    class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border-4 border-white">
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
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 1): ?>
                <form wire:submit.prevent="sendVerificationCode" class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-2 text-red-500"></i>Email Address
                        </label>

                        <input wire:model="email" type="email"
                            class="w-full pl-12 py-3 border-2 rounded-xl focus:border-red-500" placeholder="your@email.com">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <button type="submit"
                            class="mt-4 w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-xl">
                            Kirim Kode Verifikasi
                        </button>
                    </div>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 2): ?>
                <form wire:submit.prevent="verifyCode" class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-shield-alt mr-2 text-red-500"></i>Kode Verifikasi
                        </label>

                        <input wire:model="verification_code" type="text"
                            class="w-full text-center tracking-widest text-xl py-3 border-2 rounded-xl">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['verification_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <button type="submit"
                            class="mt-4 w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-xl">
                            Verifikasi Kode
                        </button>

                        <button type="button" wire:click="sendVerificationCode"
                            class="mt-2 text-sm text-gray-500 underline w-full">
                            Kirim ulang kode
                        </button>
                    </div>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 3): ?>
                <form wire:submit.prevent="register" class="space-y-6">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
                        <input wire:model="name" type="text" class="w-full py-3 border-2 rounded-xl">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <input wire:model="password" type="password" class="w-full py-3 border-2 rounded-xl">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi</label>
                        <input wire:model="password_confirmation" type="password" class="w-full py-3 border-2 rounded-xl">
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white font-bold py-4 rounded-xl">
                        Buat Akun
                    </button>

                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>




            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Sudah punya akun?
                    <button type="button" wire:click=" 
                        $dispatch('close-register-modal');
                        $dispatch('open-login-modal');"
                        class="font-semibold text-red-600 hover:text-red-700 transition-colors underline">
                        Masuk di sini
                    </button>
                </p>
            </div>

            <!-- Chinese Food Benefits -->
            <div class="mt-6 bg-gradient-to-r from-yellow-50 to-red-50 p-4 rounded-xl border border-yellow-200">
                <div class="text-center">
                    <h4 class="text-sm font-semibold text-gray-800 mb-2"
                        style="font-family: 'Noto Sans SC', sans-serif;">
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
</div><?php /**PATH D:\projek 12\china-app\resources\views\livewire\auth\register-modal.blade.php ENDPATH**/ ?>