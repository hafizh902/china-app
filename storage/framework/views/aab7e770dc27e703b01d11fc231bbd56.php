
<div id="password-modal" 
     class="fixed inset-0 z-[9999] flex items-center justify-center p-4 backdrop-blur-sm transition-all duration-300"
     style="display: <?php echo e($showPasswordModal ? 'flex' : 'none'); ?>; background-color: rgba(28, 25, 23, 0.85);"
     wire:keydown.escape="closePasswordModal"
     wire:click.self="closePasswordModal">

    <div class="relative w-full max-w-md transform transition-all">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step == 'verification'): ?>
        
        <div class="bg-white rounded-[2rem] overflow-hidden shadow-2xl border border-amber-200">
            <div class="p-8 text-center">
                <div class="w-16 h-16 bg-red-100 text-red-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-envelope-open-text text-2xl"></i>
                </div>
                <h3 class="text-2xl font-serif font-bold text-slate-900 mb-2">Verifikasi Kode</h3>
                <p class="text-sm text-slate-500 mb-8">Kami telah mengirimkan 6 digit kode keamanan ke email Anda.</p>

                
                <div class="flex justify-center gap-2 mb-8" x-data="{ otp: '' }">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 6; $i++): ?>
                        <input type="text" maxlength="1" 
                            class="w-11 h-14 text-center text-xl font-bold bg-amber-50/50 border-2 border-amber-100 rounded-xl focus:border-red-600 focus:ring-0 transition-all shadow-inner"
                            wire:model="otp_code.<?php echo e($i); ?>"
                            oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value && this.nextElementSibling) this.nextElementSibling.focus()"
                        >
                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <button wire:click="verifyOtp" class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-3 rounded-xl transition-all shadow-lg uppercase tracking-[0.2em] text-sm">
                    Verifikasi Kode
                </button>
            </div>
            <div class="h-1.5 w-full bg-gradient-to-r from-red-800 via-amber-400 to-red-800"></div>
        </div>

        <?php elseif($step == 'new_password'): ?>
        
        <div class="bg-white rounded-[2rem] overflow-hidden shadow-2xl border border-amber-200">
            
            <div class="bg-red-800 p-6 text-center relative">
                <h3 class="text-xl font-serif font-bold text-white tracking-widest">PASSWORD BARU</h3>
                <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-amber-400 text-red-900 w-8 h-8 rounded-full flex items-center justify-center border-4 border-white">
                    <i class="fas fa-key text-[10px]"></i>
                </div>
            </div>

            <div class="p-8 pt-10">
                <form wire:submit="updatePassword" class="space-y-5">
                    <div class="space-y-4">
                        
                        <?php if (isset($component)) { $__componentOriginal26c546557cdc09040c8dd00b2090afd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26c546557cdc09040c8dd00b2090afd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::input.index','data' => ['wire:model' => 'new_password','label' => 'Password Baru','type' => 'password','placeholder' => '••••••••','class' => '!bg-amber-50/30 border-amber-100 focus:!bg-white focus:border-red-600 rounded-xl shadow-inner']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'new_password','label' => 'Password Baru','type' => 'password','placeholder' => '••••••••','class' => '!bg-amber-50/30 border-amber-100 focus:!bg-white focus:border-red-600 rounded-xl shadow-inner']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26c546557cdc09040c8dd00b2090afd0)): ?>
<?php $attributes = $__attributesOriginal26c546557cdc09040c8dd00b2090afd0; ?>
<?php unset($__attributesOriginal26c546557cdc09040c8dd00b2090afd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26c546557cdc09040c8dd00b2090afd0)): ?>
<?php $component = $__componentOriginal26c546557cdc09040c8dd00b2090afd0; ?>
<?php unset($__componentOriginal26c546557cdc09040c8dd00b2090afd0); ?>
<?php endif; ?>

                        
                        <?php if (isset($component)) { $__componentOriginal26c546557cdc09040c8dd00b2090afd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26c546557cdc09040c8dd00b2090afd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::input.index','data' => ['wire:model' => 'new_password_confirmation','label' => 'Konfirmasi Password','type' => 'password','placeholder' => '••••••••','class' => '!bg-amber-50/30 border-amber-100 focus:!bg-white focus:border-red-600 rounded-xl shadow-inner']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'new_password_confirmation','label' => 'Konfirmasi Password','type' => 'password','placeholder' => '••••••••','class' => '!bg-amber-50/30 border-amber-100 focus:!bg-white focus:border-red-600 rounded-xl shadow-inner']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26c546557cdc09040c8dd00b2090afd0)): ?>
<?php $attributes = $__attributesOriginal26c546557cdc09040c8dd00b2090afd0; ?>
<?php unset($__attributesOriginal26c546557cdc09040c8dd00b2090afd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26c546557cdc09040c8dd00b2090afd0)): ?>
<?php $component = $__componentOriginal26c546557cdc09040c8dd00b2090afd0; ?>
<?php unset($__componentOriginal26c546557cdc09040c8dd00b2090afd0); ?>
<?php endif; ?>
                    </div>

                    <button type="submit" class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg uppercase tracking-widest text-sm mt-4">
                        Simpan Password Baru
                    </button>
                </form>
            </div>
            <div class="h-1.5 w-full bg-gradient-to-r from-red-800 via-amber-400 to-red-800"></div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</div><?php /**PATH D:\projek 12\china-app\resources\views\livewire\settings\ChangePassword-modal.blade.php ENDPATH**/ ?>