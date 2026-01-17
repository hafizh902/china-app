<div id="preview-modal" 
     class="fixed inset-0 z-[9999] flex items-center justify-center p-4 backdrop-blur-sm transition-all duration-300"
     style="display: <?php echo e($showModal ? 'flex' : 'none'); ?>; background-color: rgba(28, 25, 23, 0.85);"
     wire:keydown.escape="closeModal"
     wire:click.self="closeModal">
    
    
    <div class="relative w-full max-w-lg">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedItem): ?>
        <div class="bg-white rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.3)] border border-amber-200/50 transform transition-all relative">
            
            
            <button wire:click="closeModal" class="absolute top-4 right-4 z-20 bg-white/20 hover:bg-white/40 backdrop-blur-md text-white w-10 h-10 rounded-full flex items-center justify-center transition-all border border-white/30">
                <i class="fas fa-times"></i>
            </button>

            
            <div class="relative h-72 bg-gray-200 group">
                <img src="<?php echo e($selectedItem['image_url']); ?>" alt="<?php echo e($selectedItem['name']); ?>"
                    class="w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-black/20"></div>

                <div class="absolute bottom-4 left-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedItem['is_available']): ?>
                        <span class="bg-red-700 text-amber-300 text-[10px] tracking-[0.2em] font-bold px-4 py-1.5 rounded-full border border-amber-500/50 uppercase shadow-lg">
                            Signature Dish
                        </span>
                    <?php else: ?>
                        <span class="bg-gray-800 text-gray-300 text-[10px] tracking-[0.2em] font-bold px-4 py-1.5 rounded-full uppercase">
                            Out of Stock
                        </span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="p-8 pt-4 relative">
                <div class="absolute top-0 right-0 p-4 opacity-10">
                    <i class="fas fa-scroll text-5xl text-red-800"></i>
                </div>

                <div class="mb-6">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-8 h-[1px] bg-amber-500"></span>
                        <p class="text-[10px] text-amber-600 font-bold uppercase tracking-[0.3em]">
                            <?php echo e($selectedItem['category']); ?>

                        </p>
                    </div>
                    <h2 class="text-3xl font-serif font-bold text-slate-900 leading-tight tracking-tight">
                        <?php echo e($selectedItem['name']); ?>

                    </h2>
                </div>

                <div class="relative mb-8">
                    <p class="text-slate-600 text-sm leading-relaxed italic border-l-2 border-red-700 pl-4">
                        <?php echo e($selectedItem['description'] ?? 'Dibuat dengan resep warisan keluarga yang dijaga keasliannya.'); ?>

                    </p>
                </div>

                <div class="flex items-end justify-between mb-8">
                    <div>
                        <p class="text-xs text-slate-400 uppercase tracking-widest mb-1">Price per item</p>
                        <span class="text-3xl font-black text-red-700">
                            <span class="text-lg font-normal mr-1">Rp</span><?php echo e(number_format($selectedItem['price'], 0, ',', '.')); ?>

                        </span>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedItem['prep_time_minutes'] ?? false): ?>
                        <div class="flex flex-col items-end">
                            <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">Cook Time</p>
                            <span class="text-sm font-bold text-slate-700 flex items-center gap-2 bg-slate-100 px-3 py-1 rounded-lg">
                                <i class="far fa-clock text-amber-600"></i> <?php echo e($selectedItem['prep_time_minutes']); ?> Mins
                            </span>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="flex gap-3">
                    <button
                        class="flex-1 relative overflow-hidden group/btn bg-red-700 text-white py-4 rounded-2xl font-bold text-sm uppercase tracking-widest transition-all hover:bg-red-800 active:scale-95 disabled:grayscale disabled:cursor-not-allowed shadow-[0_10px_20px_rgba(185,28,28,0.3)]"
                        wire:click="$dispatch('add-to-cart', [<?php echo e($selectedItem['id']); ?>, '<?php echo e($selectedItem['name']); ?>', <?php echo e($selectedItem['price']); ?>, '<?php echo e($selectedItem['image']); ?>']).to('cart-component')"
                        <?php if(!$selectedItem['is_available']): echo 'disabled'; endif; ?>>
                        
                        <div class="flex items-center justify-center gap-2 relative z-10">
                            <i class="fas fa-utensils text-amber-400"></i>
                            <span><?php echo e($selectedItem['is_available'] ? 'Add to Order' : 'Sold Out'); ?></span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover/btn:animate-[shimmer_2s_infinite]"></div>
                    </button>
                </div>
            </div>
            
            <div class="h-1.5 w-full bg-gradient-to-r from-red-800 via-amber-400 to-red-800"></div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
        <style>
            @keyframes shimmer {
                100% { transform: translateX(100%); }
            }
        </style>
    </div>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Pages/preview-modal.blade.php ENDPATH**/ ?>