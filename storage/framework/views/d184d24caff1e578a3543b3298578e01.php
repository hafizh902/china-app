<div id="resetPasswordModal"  
    class="fixed inset-0 z-[9999] overflow-y-auto flex items-center justify-center"
    style="display: <?php echo e($showModal ? 'flex' : 'none'); ?>; background-color: rgba(0, 0, 0, <?php echo e($showModal ? '0.5' : '0'); ?>);"
    @click.self="$wire.closeModal()" @keydown.escape="$wire.closeModal()">
    
    <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden">
        <!-- Modal Header -->
        <div class="relative bg-gradient-to-r from-red-600 via-red-700 to-red-800 p-8 text-center">
            <button wire:click="$dispatch('close-reset-password-modal')" 
                    class="absolute top-6 right-6 text-white hover:text-yellow-300 transition-colors z-20 bg-red-700 rounded-full w-10 h-10 flex items-center justify-center">
                <i class="fas fa-times text-lg"></i>
            </button>
            <h2 class="text-3xl font-bold text-white mb-2">重置密码</h2>
            <p class="text-yellow-100 text-sm">Masukkan password baru Anda</p>
        </div>

        <!-- Form Content -->
        <div class="p-8">
            <form method="POST" action="<?php echo e(route('password.update')); ?>" class="space-y-6">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="token" value="<?php echo e(request()->route('token')); ?>">

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-red-500"></i>Email Address
                    </label>
                    <input id="email" name="email" type="email" value="<?php echo e(request('email')); ?>" readonly class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-red-500"></i>Password Baru
                    </label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-red-500"></i>Konfirmasi Password Baru
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white">
                </div>

                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                    <i class="fas fa-save mr-2"></i>Reset Password
                </button>
            </form>

            <div class="text-center">
                <a href="javascript:void(0);"
                                wire:click="
            $dispatch('open-login-modal'); 
            $dispatch('close-reset-password-modal');"
                                class="font-medium text-red-600 hover:text-red-500 transition-colors">
                                 <i class="fas fa-arrow-left mr-1"></i>Kembali ke Login
                            </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\projek 12\china-app\resources\views/livewire/auth/reset-password-modal.blade.php ENDPATH**/ ?>