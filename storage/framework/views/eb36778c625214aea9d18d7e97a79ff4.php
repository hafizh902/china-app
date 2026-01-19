<div
    id="resetPasswordModal"
    class="fixed inset-0 z-[9999] flex items-center justify-center overflow-y-auto
           px-4 py-6 sm:px-6 sm:py-10"
    style="display: <?php echo e($showModal ? 'flex' : 'none'); ?>;
           background-color: rgba(0, 0, 0, <?php echo e($showModal ? '0.5' : '0'); ?>);"
    @click.self="$wire.closeModal()"
    @keydown.escape.window="$wire.closeModal()"
>
    <div
        class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden
               my-8 transition-all duration-200 ease-out"
    >
        <!-- Modal Header -->
        <div class="relative bg-gradient-to-r from-red-600 via-red-700 to-red-800
                    px-8 pt-10 pb-8 text-center">
            <button
                wire:click="$dispatch('close-reset-password-modal')"
                class="absolute top-5 right-5 text-white hover:text-yellow-300 transition-colors
                       z-20 bg-red-700 rounded-full w-10 h-10 flex items-center justify-center"
            >
                <i class="fas fa-times text-lg"></i>
            </button>

            <h2 class="text-3xl font-bold text-white mb-2 tracking-tight">
                重置密码
            </h2>
            <p class="text-yellow-100 text-sm">
                Masukkan password baru Anda
            </p>
        </div>

        <!-- Divider -->
        <div class="h-px bg-gray-100"></div>

        <!-- Form Content -->
        <div class="px-8 py-10 space-y-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 1): ?>
            <div
                class="space-y-5 text-center"
                wire:poll.1s="tick"
            >
            
                <h3 class="text-lg font-bold text-gray-800">
                    Verifikasi Email
                </h3>
            
                <input
                    type="text"
                    wire:model="otp"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:ring-2 focus:ring-red-500 focus:border-transparent"
                    placeholder="Masukkan kode 6 digit"
                >
            
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
                <button
                    wire:click="verifyOtp"
                    class="w-full bg-red-600 hover:bg-red-700 text-white
                           py-3 rounded-lg font-semibold transition-all
                           active:scale-95"
                >
                    Verifikasi
                </button>
            
                
                <div class="text-sm text-gray-500 pt-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canResend): ?>
                        Tidak menerima kode?
                        <button
                            wire:click="resendOtp"
                            class="text-red-600 font-semibold hover:underline"
                        >
                            Kirim ulang
                        </button>
                    <?php else: ?>
                        Kirim ulang dalam
                        <span class="font-semibold text-red-600">
                            <?php echo e($this->resendRemaining); ?> detik
                        </span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 2): ?>
                <div class="space-y-5">
                    <input
                        type="password"
                        wire:model="password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:ring-2 focus:ring-red-500 focus:border-transparent"
                        placeholder="Password baru"
                    >

                    <input
                        type="password"
                        wire:model="password_confirmation"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:ring-2 focus:ring-red-500 focus:border-transparent"
                        placeholder="Konfirmasi password"
                    >

                    <button
                        wire:click="updatePassword"
                        class="w-full bg-red-600 hover:bg-red-700 text-white
                               py-3 rounded-lg font-semibold transition-all
                               active:scale-95"
                    >
                        Simpan Password
                    </button>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/auth/reset-password-modal.blade.php ENDPATH**/ ?>