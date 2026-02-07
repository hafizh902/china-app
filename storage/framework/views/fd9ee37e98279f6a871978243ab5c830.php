<div id="preview-modal"
    class="fixed inset-0 z-[9999] flex items-center justify-center p-4 backdrop-blur-sm transition-all duration-300"
    style="display: <?php echo e($showModal ? 'flex' : 'none'); ?>; background-color: rgba(28, 25, 23, 0.85);"
    wire:keydown.escape="closeModal" wire:click.self="closeModal">

    <?php
    $categoryMap = [
    'main_course' => 'Main Course',
    'snacks' => 'Side Dish',
    'drinks' => 'Drink',
    'desserts' => 'Dessert',
    ];
    ?>

    <div class="relative w-full max-w-4xl max-h-[90vh] md:max-h-none overflow-y-auto md:overflow-visible rounded-3xl">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedItem): ?>
        <div class="bg-white rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.3)] border border-amber-200/50 transform transition-all relative flex flex-col md:flex-row md:h-[550px]">

            
            <button wire:click="closeModal"
                class="absolute top-4 right-4 z-50 bg-white/80 hover:bg-white backdrop-blur-md text-slate-800 w-10 h-10 rounded-full flex items-center justify-center transition-all border border-slate-200 shadow-lg">
                <i class="fas fa-times"></i>
            </button>

            
            <div class="relative w-full md:w-1/2 h-56 sm:h-64 md:h-full flex-shrink-0 bg-gray-200">
                <img src="<?php echo e($selectedItem['image_url']); ?>" alt="<?php echo e($selectedItem['name']); ?>"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent md:hidden"></div>
                
                
                <div class="absolute bottom-4 left-4 md:hidden bg-red-700 text-white px-3 py-1 rounded-lg font-bold text-sm">
                    Rp<?php echo e(number_format($selectedItem['price'], 0, ',', '.')); ?>

                </div>
            </div>

            
            <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col h-full bg-white overflow-y-auto md:overflow-hidden custom-scrollbar">

                
                <div class="mb-5">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-6 md:w-8 h-[1px] bg-amber-500"></span>
                        <p class="text-[9px] md:text-[10px] text-amber-600 font-black uppercase tracking-[0.2em]">
                            <?php echo e($categoryMap[$selectedItem['category']] ?? ucfirst(str_replace('_', ' ', $selectedItem['category']))); ?>

                        </p>
                    </div>
                    <h2 class="text-2xl md:text-4xl font-serif font-bold text-slate-900 leading-tight">
                        <?php echo e($selectedItem['name']); ?>

                    </h2>
                </div>

                   
                <div class="relative flex flex-col min-h-0 mb-4" x-data="{
                        expanded: false,
                        text: `<?php echo e($selectedItem['description'] ?? 'Dibuat dengan resep warisan keluarga yang dijaga keasliannya dan bahan-bahan pilihan berkualitas tinggi untuk menjaga cita rasa yang autentik.'); ?>`,
                        limit: 150
                    }">


               <div :class="expanded ? 'max-h-32 overflow-y-auto pr-2 custom-scrollbar' : 'line-clamp-4'"
                        class="text-slate-600 text-sm leading-relaxed italic border-l-2 border-red-700 pl-4 transition-all duration-300">
                        <span x-text="text"></span>
                    </div>

                    <template x-if="text.length > limit">
                        <button @click="expanded = !expanded"
                            class="text-xs font-bold text-red-700 mt-2 ml-4 hover:text-red-800 transition-colors flex items-center gap-1">
                            <span x-text="expanded ? 'Show Less' : 'Read More...'"></span>
                            <i class="fas" :class="expanded ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                    </template>
                </div>

                
                <div class="grid grid-cols-2 md:flex md:flex-wrap items-center gap-4 mb-8 pt-5 border-t border-slate-100">
                    
                    <div class="flex flex-col gap-1">
                        <p class="text-[8px] md:text-[9px] text-slate-400 uppercase tracking-widest"><?php echo e(__('language.popularity')); ?></p>
                        <div class="text-[11px] text-slate-700 font-bold uppercase flex items-center gap-1.5">
                            <i class="fas fa-fire text-orange-500"></i>
                            <?php echo e(number_format($selectedItem['total_sold'] ?? 0)); ?> <span class="text-[9px] text-slate-400">orders</span>
                        </div>
                    </div>

                    <div class="w-px h-8 bg-slate-200 hidden md:block"></div>

                    
                    <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                        <p class="text-[8px] md:text-[9px] text-slate-400 uppercase tracking-widest mb-1"><?php echo e(__('language.category')); ?></p>
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="bg-amber-50 text-amber-700 text-[9px] md:text-[10px] font-bold px-2.5 py-1 rounded-md border border-amber-200 whitespace-nowrap">
                                <i class="fas fa-tag mr-1 opacity-70"></i> <?php echo e($categoryMap[$selectedItem['category']] ?? ucfirst(str_replace('_', ' ', $selectedItem['category']))); ?>

                            </span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedItem['is_available']): ?>
                            <span class="bg-green-50 text-green-700 text-[9px] md:text-[10px] font-bold px-2.5 py-1 rounded-md border border-green-200 whitespace-nowrap">
                                <i class="fas fa-leaf mr-1"></i> <?php echo e(__('language.freshly_made')); ?>

                            </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>

                
                <div class="mt-auto pt-5 border-t border-slate-100">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <p class="text-[9px] md:text-[10px] text-slate-400 uppercase tracking-widest mb-1"><?php echo e(__('language.price_per_item')); ?></p>
                            <span class="text-2xl md:text-3xl font-black text-red-700">
                                <span class="text-sm md:text-lg font-normal mr-0.5">Rp</span><?php echo e(number_format($selectedItem['price'], 0, ',', '.')); ?>

                            </span>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedItem['prep_time_minutes'] ?? false): ?>
                        <div class="flex flex-col items-end">
                            <span class="text-[10px] md:text-xs font-bold text-slate-600 flex items-center gap-2 bg-slate-50 border border-slate-100 px-3 py-2 rounded-xl shadow-sm">
                                <i class="far fa-clock text-amber-600"></i>
                                <?php echo e($selectedItem['prep_time_minutes']); ?> <?php echo e(__('language.mins')); ?>

                            </span>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <button
                        class="w-full relative overflow-hidden group/btn bg-red-700 text-white py-4 md:py-5 rounded-2xl font-bold text-xs md:text-sm uppercase tracking-[0.2em] transition-all hover:bg-red-800 active:scale-[0.98] shadow-xl shadow-red-900/20 disabled:grayscale disabled:opacity-50"
                        wire:click="$dispatch('add-to-cart', [<?php echo e($selectedItem['id']); ?>, '<?php echo e($selectedItem['name']); ?>', <?php echo e($selectedItem['price']); ?>, '<?php echo e($selectedItem['image']); ?>']).to('cart-component')"
                        <?php if(!$selectedItem['is_available']): echo 'disabled'; endif; ?>>
                        <div class="flex items-center justify-center gap-3 relative z-10">
                            <i class="fas fa-shopping-basket text-amber-400"></i>
                            <span>
                                <?php echo e($selectedItem['is_available'] ? __('language.add_to_order') : __('language.sold_out')); ?>

                            </span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover/btn:animate-shimmer"></div>
                    </button>
                </div>
            </div>

            
            <div class="absolute bottom-0 left-0 h-1.5 w-full bg-gradient-to-r from-red-800 via-amber-400 to-red-800 hidden md:block"></div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f8fafc; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #b91c1c; }
        
        @keyframes shimmer {
            100% { transform: translateX(100%); }
        }
        .group-hover\/btn\:animate-shimmer {
            animation: shimmer 1.5s infinite;
        }
    </style>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Pages/preview-modal.blade.php ENDPATH**/ ?>