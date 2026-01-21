<div id="register-modal" class="fixed inset-0 z-[9999] overflow-y-auto flex items-center justify-center p-4"
    style="display: <?php echo e($showModal ? 'flex' : 'none'); ?>; background-color: rgba(0, 0, 0, <?php echo e($showModal ? '0.6' : '0'); ?>); backdrop-filter: blur(4px);"
    @click.self="$wire.closeModal()" @keydown.escape="$wire.closeModal()">

    <div class="relative w-full max-w-md bg-white rounded-[2.5rem] shadow-2xl overflow-hidden shadow-red-900/20">

        <div class="relative bg-gradient-to-r from-red-700 to-red-800 p-6 text-center border-b-4 border-yellow-400">
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <div class="absolute top-2 left-4 text-yellow-400 text-4xl">🍜</div>
                <div class="absolute bottom-2 right-4 text-yellow-400 text-2xl">🥟</div>
            </div>

            <button wire:click="closeModal"
                class="absolute top-4 right-4 text-white hover:rotate-90 hover:text-yellow-300 transition-all z-20 bg-black/20 hover:bg-black/40 rounded-full w-8 h-8 flex items-center justify-center">
                <i class="fas fa-times text-sm"></i>
            </button>

            <div class="relative z-10">
                <div class="w-14 h-14 bg-yellow-400 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg border-2 border-white rotate-3">
                    <i class="fas fa-user-plus text-red-700 text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-white uppercase tracking-tight" style="font-family: 'Noto Sans SC', sans-serif;">
                    <?php echo e(__('language.join_us')); ?>

                </h2>
                <p class="text-yellow-100/80 text-[10px] uppercase tracking-widest font-medium">
                    <?php echo e(__('language.register_title')); ?>

                </p>
            </div>
        </div>

        <div class="p-6 max-h-[60vh] overflow-y-auto custom-scrollbar">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                <div class="mb-4 bg-red-50 border border-red-100 p-3 rounded-xl">
                    <ul class="text-[11px] text-red-700 space-y-0.5 font-medium italic">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>• <?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 1): ?>
                <form wire:submit.prevent="sendVerificationCode" class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">
                            <?php echo e(__('language.email_address')); ?>

                        </label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-red-500 text-sm"></i>
                            <input wire:model="email" type="email"
                                class="w-full pl-11 py-3 bg-stone-50 border-stone-100 focus:border-red-500 focus:bg-white border-2 rounded-xl transition-all text-sm font-bold shadow-inner" 
                                placeholder="your@email.com">
                        </div>
                        <button type="submit"
                            class="mt-4 w-full bg-red-700 hover:bg-stone-900 text-white font-black py-3.5 rounded-xl transition-all shadow-lg shadow-red-700/20 uppercase text-xs tracking-widest active:scale-95">
                             <?php echo e(__('language.send_verification_code')); ?>

                        </button>
                    </div>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 2): ?>
                <form wire:submit.prevent="verifyCode" class="space-y-4 text-center">
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2"><?php echo e(__('language.verification_code')); ?></label>
                    <input wire:model="verification_code" type="text"
                        class="w-full text-center tracking-[0.5em] text-xl py-3 bg-stone-50 border-2 border-stone-100 rounded-xl focus:border-red-500 focus:bg-white font-black">
                    <button type="submit" class="w-full bg-red-700 text-white font-black py-3.5 rounded-xl uppercase text-xs tracking-widest shadow-lg shadow-red-700/20 mt-2">
                        <?php echo e(__('language.verify_code')); ?>

                    </button>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 3): ?>
                <form wire:submit.prevent="register" class="space-y-4">
                    <div class="grid gap-4">
                        <input wire:model="name" type="text" placeholder="Full Name" class="w-full py-3 px-4 bg-stone-50 border-2 border-stone-100 rounded-xl focus:border-red-500 text-sm font-bold">
                        <input wire:model="password" type="password" placeholder="Password" class="w-full py-3 px-4 bg-stone-50 border-2 border-stone-100 rounded-xl focus:border-red-500 text-sm font-bold">
                        <input wire:model="password_confirmation" type="password" placeholder="Confirm" class="w-full py-3 px-4 bg-stone-50 border-2 border-stone-100 rounded-xl focus:border-red-500 text-sm font-bold">
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-red-700 to-red-800 text-white font-black py-4 rounded-xl uppercase text-xs tracking-[0.2em] shadow-lg shadow-red-700/20 mt-2">
                       <?php echo e(__('language.create_account')); ?>

                    </button>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="mt-6 text-center border-t border-stone-100 pt-4">
                <p class="text-[11px] text-gray-500 font-medium">
                    <?php echo e(__('language.already_have_account')); ?>

                    <button type="button" wire:click="$dispatch('close-register-modal'); $dispatch('open-login-modal');"
                        class="font-black text-red-700 hover:text-stone-900 transition-colors underline ml-1 uppercase">
                       <?php echo e(__('language.login_here')); ?>

                    </button>
                </p>
            </div>

            <div class="mt-5 bg-stone-50 p-3 rounded-2xl border border-stone-100">
                <div class="text-center">
                    <h4 class="text-[10px] font-black text-stone-800 mb-2 uppercase tracking-tighter italic">
                        ✨ <?php echo e(__('language.join_benefits_title')); ?>

                    </h4>
                    <div class="flex justify-around text-[9px] text-stone-500 font-bold uppercase tracking-tighter">
                        <span class="flex flex-col items-center gap-1"><i class="fas fa-utensils text-red-600"></i>Menu</span>
                        <span class="flex flex-col items-center gap-1"><i class="fas fa-star text-yellow-500"></i>Diskon</span>
                        <span class="flex flex-col items-center gap-1"><i class="fas fa-truck text-green-600"></i>Gratis</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/auth/register-modal.blade.php ENDPATH**/ ?>