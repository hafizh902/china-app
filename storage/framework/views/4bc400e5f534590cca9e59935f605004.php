<section class="w-full bg-[#fdfcf8] min-h-screen pb-10">
    <?php echo $__env->make('partials.settings-heading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if (isset($component)) { $__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::heading','data' => ['class' => 'sr-only']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'sr-only']); ?><?php echo e(__('Profile Settings')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9)): ?>
<?php $attributes = $__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9; ?>
<?php unset($__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9)): ?>
<?php $component = $__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9; ?>
<?php unset($__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9); ?>
<?php endif; ?>

    <div class="max-w-3xl mx-auto my-6 px-4">

        
        <div class="bg-white rounded-[1.5rem] shadow-lg border border-amber-100 overflow-hidden mb-6">

            <div class="relative bg-gradient-to-r from-red-800 to-red-700 p-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="p-2.5 bg-white/10 backdrop-blur-md rounded-lg border border-white/20">
                            <i class="fas fa-user-edit text-xl text-amber-400"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-serif font-bold text-white tracking-tight">
                                <?php echo e(__('Profile Information')); ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <form wire:submit="updateProfileInformation" class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        
                        <div class="space-y-1">
                            <?php if (isset($component)) { $__componentOriginal26c546557cdc09040c8dd00b2090afd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26c546557cdc09040c8dd00b2090afd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::input.index','data' => ['wire:model' => 'name','label' => __('Name'),'type' => 'text','required' => true,'class' => 'w-full !bg-amber-50/30 border-amber-200/60 focus:!bg-white focus:border-red-600 focus:ring-1 focus:ring-red-600 rounded-xl transition-all duration-300 shadow-inner','placeholder' => 'Masukkan nama lengkap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'name','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Name')),'type' => 'text','required' => true,'class' => 'w-full !bg-amber-50/30 border-amber-200/60 focus:!bg-white focus:border-red-600 focus:ring-1 focus:ring-red-600 rounded-xl transition-all duration-300 shadow-inner','placeholder' => 'Masukkan nama lengkap']); ?>
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

                        
                        <div class="space-y-1">
                            <?php if (isset($component)) { $__componentOriginal26c546557cdc09040c8dd00b2090afd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26c546557cdc09040c8dd00b2090afd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::input.index','data' => ['wire:model' => 'email','label' => __('Email'),'type' => 'email','required' => true,'class' => 'w-full !bg-amber-50/30 border-amber-200/60 focus:!bg-white focus:border-red-600 focus:ring-1 focus:ring-red-600 rounded-xl transition-all duration-300 shadow-inner','placeholder' => 'alamat@email.com']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'email','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Email')),'type' => 'email','required' => true,'class' => 'w-full !bg-amber-50/30 border-amber-200/60 focus:!bg-white focus:border-red-600 focus:ring-1 focus:ring-red-600 rounded-xl transition-all duration-300 shadow-inner','placeholder' => 'alamat@email.com']); ?>
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

                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail()): ?>
                        <div class="p-3 bg-red-50/50 rounded-xl border border-red-100 flex items-center gap-3">
                            <i class="fas fa-envelope-open-text text-red-600 text-xs"></i>
                            <button wire:click.prevent="resendVerificationNotification"
                                class="text-[11px] text-red-700 font-bold hover:underline italic">
                                <?php echo e(__('Resend Verification Email')); ?>

                            </button>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="flex items-center justify-between pt-5 border-t border-amber-50">
                        <?php if (isset($component)) { $__componentOriginala665a74688c74e9ee80d4fedd2b98434 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala665a74688c74e9ee80d4fedd2b98434 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.action-message','data' => ['class' => 'text-xs font-bold text-green-600 flex items-center gap-1','on' => 'profile-updated']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('action-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs font-bold text-green-600 flex items-center gap-1','on' => 'profile-updated']); ?>
                            <i class="fas fa-check-circle"></i> <?php echo e(__('Saved.')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala665a74688c74e9ee80d4fedd2b98434)): ?>
<?php $attributes = $__attributesOriginala665a74688c74e9ee80d4fedd2b98434; ?>
<?php unset($__attributesOriginala665a74688c74e9ee80d4fedd2b98434); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala665a74688c74e9ee80d4fedd2b98434)): ?>
<?php $component = $__componentOriginala665a74688c74e9ee80d4fedd2b98434; ?>
<?php unset($__componentOriginala665a74688c74e9ee80d4fedd2b98434); ?>
<?php endif; ?>

                        <button type="submit"
                            class="group relative overflow-hidden bg-red-700 hover:bg-red-800 text-white font-bold py-2.5 px-8 rounded-xl transition-all shadow-md active:scale-95 text-xs tracking-[0.2em] uppercase">
                            <span class="relative z-10 flex items-center gap-2">
                                <?php echo e(__('Update Profile')); ?>

                            </span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shimmer_2s_infinite]">
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="bg-white rounded-[1.5rem] shadow-lg border border-amber-100 overflow-hidden mb-6">
            <div class="p-5 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="p-2.5 bg-red-50 rounded-lg border border-red-100">
                        <i class="fas fa-shield-alt text-xl text-red-700"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-serif font-bold text-slate-800 tracking-tight">
                            <?php echo e(__('Security & Password')); ?></h2>
                        <p class="text-[11px] text-gray-400 italic">
                            Make sure your account stays safe.</p>
                    </div>
                </div>

                <button wire:click="openPasswordModal"
                    class="bg-amber-400 hover:bg-amber-500 text-red-900 font-bold py-2 px-5 rounded-xl text-xs uppercase tracking-widest transition-all shadow-sm active:scale-95">
                    <?php echo e(__('Change Password')); ?>

                </button>
            </div>
        </div>

        
        <div
            class="bg-gray-50/50 rounded-[1.2rem] border border-red-100 p-4 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-red-100/50 rounded-full flex items-center justify-center text-red-700">
                    <i class="fas fa-trash-alt text-[10px]"></i>
                </div>
                <div class="text-[11px]">
                    <p class="font-bold text-red-800 uppercase tracking-tighter leading-none mb-1">Delete account</p>
                    <p class="text-gray-400 italic">
                        Data will be permanently deleted.</p>
                </div>
            </div>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.delete-user-form', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-233731265-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>


    </div>

    <style>
        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }
    </style>
</section>
<?php /**PATH D:\projek 12\china-app\resources\views\livewire\settings\profile.blade.php ENDPATH**/ ?>