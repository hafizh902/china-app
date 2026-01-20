
<div x-data="{ open: false }" @cart-updated.window="open = true" class="relative">

    <button @click="open = true"
        class="relative p-2.5 text-stone-700 hover:text-red-700 transition-all duration-300 group">
        <div
            class="absolute inset-0 bg-red-50 scale-0 group-hover:scale-110 rounded-full transition-transform duration-300">
        </div>
        <i class="fas fa-shopping-basket text-2xl relative z-10"></i>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($count > 0): ?>
            <span
                class="absolute top-0 right-0 bg-red-600 text-white text-[10px] rounded-full h-5 w-5 flex items-center justify-center font-bold shadow-lg shadow-red-200 border-2 border-white ring-1 ring-red-100 animate-bounce-short">
                <?php echo e($count); ?>

            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </button>

    <div x-show="open" style="display: none;" class="fixed inset-0 z-[9999] flex justify-end overflow-hidden"
        @keydown.escape.window="open = false" @click.self="open = false" wire:keydown.escape="closeCart">

        <div x-show="open" x-transition:enter="transition opacity ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition opacity ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-stone-900/40 backdrop-blur-[2px] -z-10"
            @click="open = false">
        </div>

        <div x-show="open" x-transition:enter="transition transform ease-out duration-400"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition transform ease-in duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="bg-[#fdfcf8] w-full max-w-[400px] h-full shadow-[-20px_0_50px_rgba(0,0,0,0.1)] border-l border-amber-100 flex flex-col relative">

            <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
                style="background-image: url('data:image/svg+xml,<svg width=\" 100\" height=\"100\" viewBox=\"0 0 100 100\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M50 0 L100 50 L50 100 L0 50 Z\" fill=\"%238b0000\" /></svg>'); background-size: 40px;">
            </div>

            <div
                class="p-6 border-b border-amber-100 flex justify-between items-center bg-white/80 backdrop-blur-md sticky top-0 z-20">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-700 flex items-center justify-center rounded-lg shadow-inner">
                        <span class="text-amber-400 font-serif text-2xl font-bold">福</span>
                    </div>
                    <div>
                        <h2 class="text-lg font-serif font-black text-stone-800 uppercase tracking-widest leading-none">
                            金龍閣</h2>
                        <span class="text-[10px] text-stone-400 uppercase tracking-[0.3em]">Cart</span>
                    </div>
                </div>
                <button @click="open = false"
                    class="w-10 h-10 flex items-center justify-center rounded-full text-stone-400 hover:bg-red-50 hover:text-red-700 transition-all">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-5 custom-scrollbar relative z-10">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div
                        class="group relative flex gap-4 p-4 bg-white rounded-2xl border border-amber-100/50 shadow-sm hover:shadow-md hover:border-amber-300 transition-all duration-300 overflow-hidden">

                        <div
                            class="w-20 h-20 bg-stone-100 rounded-xl overflow-hidden flex-shrink-0 border border-stone-50">
                            <img src="<?php echo e($item['imageUrl']); ?>" alt="<?php echo e($item['name']); ?>"
                                class="w-full h-full object-cover">
                        </div>

                        <div class="flex-1 flex flex-col justify-between py-0.5">
                            <div class="flex justify-between items-start gap-2">
                                <h4 class="font-bold text-stone-800 text-sm leading-tight line-clamp-2">
                                    <?php echo e($item['name']); ?>

                                </h4>
                                <button wire:click="removeItem('<?php echo e($id); ?>')"
                                    class="text-stone-300 hover:text-red-600 transition-colors p-1">
                                    <i class="fas fa-trash-alt text-xs"></i>
                                </button>
                            </div>

                            <div class="flex justify-between items-end mt-3">
                                <span class="text-red-700 font-black text-sm">
                                    Rp<?php echo e(number_format($item['price'] * $item['quantity'], 0, ',', '.')); ?>

                                </span>

                                <div
                                    class="flex items-center bg-stone-50 border border-stone-100 rounded-full p-0.5 shadow-inner">
                                    <button
                                        wire:click="updateQuantity('<?php echo e($id); ?>', <?php echo e($item['quantity'] - 1); ?>)"
                                        class="w-7 h-7 flex items-center justify-center rounded-full bg-white text-stone-400 hover:text-red-700 hover:shadow-sm transition-all text-[10px]">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span
                                        class="text-xs font-black text-stone-800 w-8 text-center"><?php echo e($item['quantity']); ?></span>
                                    <button
                                        wire:click="updateQuantity('<?php echo e($id); ?>', <?php echo e($item['quantity'] + 1); ?>)"
                                        class="w-7 h-7 flex items-center justify-center rounded-full bg-white text-stone-400 hover:text-red-700 hover:shadow-sm transition-all text-[10px]">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="h-full flex flex-col items-center justify-center py-20 opacity-40">
                        <div class="w-32 h-32 bg-stone-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-shopping-basket text-5xl text-stone-300"></i>
                        </div>
                        <p class="text-xs italic font-serif tracking-[0.3em] uppercase text-stone-500">
                            <?php echo e(__('language.cart_empty')); ?></p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($count > 0): ?>
                <div
                    class="p-8 bg-white border-t-2 border-amber-50 rounded-t-[2.5rem] shadow-[0_-10px_40px_rgba(0,0,0,0.03)] relative z-20">
                    <div class="space-y-3 mb-8">
                        <div class="flex justify-between text-xs text-stone-400 font-medium tracking-wide">
                            <span> <?php echo e(__('language.subtotal_payment')); ?></span>
                            <span>Rp<?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
                        </div>
                        <div class="flex justify-between text-xs text-stone-400 font-medium tracking-wide">
                            <span> <?php echo e(__('language.tax')); ?>

                                (<?php echo e(\App\Models\SystemConfig::value('tax_percent') ?? '-'); ?>%)</span>
                            <span>Rp<?php echo e(number_format($tax, 0, ',', '.')); ?></span>
                        </div>
                        <div class="h-px bg-dashed border-b border-dashed border-stone-200 my-4"></div>
                        <div class="flex justify-between items-end">
                            <div>
                                <span
                                    class="text-[10px] text-red-700 uppercase font-black tracking-[0.2em] block mb-1"><?php echo e(__('language.total_pay')); ?></span>
                                <span class="text-2xl font-black text-stone-800 leading-none tracking-tighter">
                                    Rp<?php echo e(number_format($total, 0, ',', '.')); ?>

                                </span>
                            </div>
                            <div
                                class="text-[10px] text-amber-600 bg-amber-50 px-2 py-1 rounded-md font-bold border border-amber-100">
                                <i class="fas fa-sparkles mr-1"></i><?php echo e(__('language.not_included_delivery')); ?>

                            </div>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                        <button wire:click="closeCart" wire:navigate href="<?php echo e(route('checkout')); ?>"
                            class="group w-full bg-stone-900 hover:bg-red-800 text-white py-5 rounded-2xl flex items-center justify-center gap-4 transition-all duration-500 shadow-xl shadow-stone-200 overflow-hidden relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-red-600 to-red-800 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <span
                                class="relative z-10 font-black uppercase tracking-[0.3em] text-[11px]"><?php echo e(__('language.checkout')); ?></span>
                            <i
                                class="fas fa-arrow-right relative z-10 text-xs group-hover:translate-x-2 transition-transform duration-500"></i>
                        </button>
                    <?php else: ?>
                        <button wire:click="openLoginModal" type="button"
                            class="group w-full bg-stone-900 hover:bg-red-800 text-white py-5 rounded-2xl flex items-center justify-center gap-4 transition-all duration-500 shadow-xl shadow-stone-200 overflow-hidden relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-red-600 to-red-800 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <span
                                class="relative z-10 font-black uppercase tracking-[0.3em] text-[11px]"><?php echo e(__('language.checkout')); ?></span>
                            <i
                                class="fas fa-arrow-right relative z-10 text-xs group-hover:translate-x-2 transition-transform duration-500"></i>
                        </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>


    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
        }

        @keyframes bounce-short {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-3px);
            }
        }

        .animate-bounce-short {
            animation: bounce-short 2s infinite;
        }
    </style>
</div>
<?php /**PATH D:\laragon\www\china-app\resources\views/livewire/cart-component.blade.php ENDPATH**/ ?>