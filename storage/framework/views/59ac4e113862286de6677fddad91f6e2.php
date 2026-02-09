<section class="w-full bg-[#fdfcf8] min-h-screen pb-20">
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

    <div class="max-w-3xl mx-auto mt-10 px-4 space-y-8">

        
        <div
            class="group bg-white rounded-[2.5rem] shadow-sm hover:shadow-xl hover:shadow-red-900/5 border border-stone-100 transition-all duration-500 overflow-hidden">

            
            <div class="relative bg-gradient-to-r from-stone-900 to-stone-800 p-8">
                
                <div class="absolute inset-0 opacity-10 pointer-events-none overflow-hidden">
                    <div class="absolute -right-4 -top-4 text-white text-6xl rotate-12 uppercase font-black italic">
                        Profile</div>
                </div>

                <div class="relative z-10 flex items-center gap-5">
                    <div
                        class="w-14 h-14 bg-amber-400 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-400/20 transform -rotate-3 group-hover:rotate-0 transition-transform duration-500">
                        <i class="fas fa-user-edit text-2xl text-red-800"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-serif font-bold text-white tracking-tight uppercase italic">
                            <?php echo e(__('Profile Information')); ?>

                        </h2>
                        <p class="text-[10px] text-amber-200 uppercase tracking-[0.3em] font-black opacity-80">Personal
                            Details</p>
                    </div>
                </div>
            </div>

            <div class="p-8 md:p-10">
                <form wire:submit="updateProfileInformation" class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Full
                                Name</label>
                            <?php if (isset($component)) { $__componentOriginal26c546557cdc09040c8dd00b2090afd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26c546557cdc09040c8dd00b2090afd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::input.index','data' => ['wire:model' => 'name','type' => 'text','required' => true,'style' => '--flux-input-placeholder: #78716c; opacity: 1 !important;','class' => 'w-full !bg-stone-100 !border-stone-200 shadow-inner focus:!bg-white focus:!border-red-600 focus:!ring-red-600 rounded-2xl transition-all duration-300 font-bold text-stone-800 py-3.5','placeholder' => 'Masukkan nama lengkap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'name','type' => 'text','required' => true,'style' => '--flux-input-placeholder: #78716c; opacity: 1 !important;','class' => 'w-full !bg-stone-100 !border-stone-200 shadow-inner focus:!bg-white focus:!border-red-600 focus:!ring-red-600 rounded-2xl transition-all duration-300 font-bold text-stone-800 py-3.5','placeholder' => 'Masukkan nama lengkap']); ?>
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
                        
                        

                        
                        

                        
                        <div class="flex items-center justify-between pt-8 border-t border-stone-100">
                            <?php if (isset($component)) { $__componentOriginala665a74688c74e9ee80d4fedd2b98434 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala665a74688c74e9ee80d4fedd2b98434 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.action-message','data' => ['class' => 'text-[10px] font-black text-green-600 flex items-center gap-2 uppercase tracking-[0.2em]','on' => 'profile-updated']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('action-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-[10px] font-black text-green-600 flex items-center gap-2 uppercase tracking-[0.2em]','on' => 'profile-updated']); ?>
                                <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-[8px]"></i>
                                </div>
                                <?php echo e(__('Saved')); ?>

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
                                class="group relative overflow-hidden bg-red-700 hover:bg-stone-900 text-white font-black py-4 px-10 rounded-2xl transition-all duration-500 shadow-xl shadow-red-700/20 active:scale-95 text-[10px] tracking-[0.2em] uppercase">
                                <span class="relative z-10 flex items-center gap-3">
                                    <i class="fas fa-save opacity-50"></i> <?php echo e(__('Update Profile')); ?>

                                </span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shimmer_2s_infinite]">
                                </div>
                            </button>
                        </div>
                </form>
            </div>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div
                class="bg-white rounded-[2rem] shadow-sm border border-stone-100 p-8 flex flex-col justify-between hover:shadow-lg transition-all duration-500 group">
                <div class="flex items-start gap-4 mb-8">
                    <div
                        class="p-4 bg-red-50 rounded-2xl border border-red-100 group-hover:bg-red-700 group-hover:text-white transition-colors duration-500 text-red-700">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-serif font-bold text-stone-800 tracking-tight leading-none mb-2">
                            <?php echo e(__('Security')); ?>

                        </h2>
                        <p class="text-[10px] text-stone-400 font-medium italic">
                            Update your account password regularly.</p>
                    </div>
                </div>

                <button wire:click="openPasswordModal"
                    class="w-full bg-stone-100 hover:bg-amber-400 text-stone-600 hover:text-red-900 font-black py-4 rounded-2xl text-[10px] uppercase tracking-widest transition-all active:scale-95 shadow-sm">
                    <?php echo e(__('Change Password')); ?>

                </button>
            </div>

            
            <div class="bg-stone-50 rounded-[2rem] border border-stone-200 p-8 flex flex-col justify-between group">
                <div class="flex items-start gap-4 mb-8 text-stone-400">
                    <div
                        class="p-4 bg-stone-200/50 rounded-2xl border border-stone-200 group-hover:bg-red-100 group-hover:text-red-600 transition-colors duration-500">
                        <i class="fas fa-trash-alt text-2xl"></i>
                    </div>
                    <div>
                        <h2
                            class="text-lg font-serif font-bold text-stone-600 group-hover:text-red-800 transition-colors duration-500 tracking-tight leading-none mb-2">
                            <?php echo e(__('Danger Zone')); ?>

                        </h2>
                        <p class="text-[10px] italic font-medium">
                            Account data will be lost forever.</p>
                    </div>
                </div>

                <div class="w-full">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.delete-user-form', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1971328446-0', null);

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
<?php /**PATH D:\laragon\www\china-app\resources\views/livewire/settings/profile.blade.php ENDPATH**/ ?>