<div class="p-8 bg-stone-50 min-h-screen">
    
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-3xl font-serif font-black text-stone-800 tracking-tight">Katalog Menu</h1>
            <p class="text-sm text-stone-500 mt-1 uppercase tracking-widest font-medium">Atur ketersediaan dan harga hidangan restoran Anda</p>
        </div>
        <div class="flex gap-3">
            <button wire:click="toggleDeleteMode" 
                class="px-5 py-2.5 rounded-xl border-2 <?php echo e($deleteMode ? 'bg-red-50 border-red-600 text-red-600' : 'border-stone-200 text-stone-600 hover:bg-stone-100'); ?> transition-all text-sm font-bold flex items-center gap-2">
                <i class="fas <?php echo e($deleteMode ? 'fa-times' : 'fa-trash-alt'); ?>"></i>
                <?php echo e($deleteMode ? 'Batal Hapus' : 'Mode Hapus'); ?>

            </button>
            <button wire:click="openCreateModal" 
                class="px-6 py-2.5 bg-red-800 hover:bg-red-700 text-white rounded-xl shadow-lg shadow-red-900/20 transition-all text-sm font-bold flex items-center gap-2">
                <i class="fas fa-plus"></i>
                Tambah Menu Baru
            </button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-9">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div wire:key="menu-<?php echo e($item->id); ?>"
                    class="group bg-white rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-300 border border-stone-200 overflow-hidden flex flex-col relative <?php echo e(!$item->is_available ? 'opacity-75' : ''); ?>">
                    
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deleteMode): ?>
                    <div class="absolute inset-0 bg-red-900/10 z-30 cursor-pointer flex items-start p-4" wire:click="$toggle('selectedItems.<?php echo e($item->id); ?>')">
                        <input type="checkbox" wire:model="selectedItems" value="<?php echo e($item->id); ?>"
                            class="w-6 h-6 text-red-600 bg-white border-2 border-stone-300 rounded-lg focus:ring-red-500 transition-transform group-hover:scale-110">
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <div class="relative h-48 overflow-hidden bg-stone-100">
                        <span class="absolute top-4 right-4 z-20 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm <?php echo e($item->is_available ? 'bg-green-100 text-green-700' : 'bg-stone-200 text-stone-500'); ?>">
                            <?php echo e($item->is_available ? 'Tersedia' : 'Habis'); ?>

                        </span>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->image): ?>
                            <img src="<?php echo e($item->image_url); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="fas fa-utensils text-4xl text-stone-200"></i>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="absolute inset-0 bg-gradient-to-t from-stone-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$deleteMode): ?>
                            <button wire:click="edit(<?php echo e($item->id); ?>)" class="w-full py-2 bg-white/95 backdrop-blur text-stone-900 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-red-700 hover:text-white transition-colors">
                                Edit Menu
                            </button>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-[10px] font-black text-red-700 uppercase tracking-[0.2em]"><?php echo e(str_replace('_', ' ', $item->category_label)); ?></span>
                        </div>
                        <h3 class="font-serif font-bold text-stone-800 text-lg leading-tight mb-1 truncate"><?php echo e($item->name); ?></h3>
                        <p class="text-xs text-stone-500 line-clamp-2 mb-4 leading-relaxed italic"><?php echo e($item->description); ?></p>

                        <div class="mt-auto pt-4 border-t border-stone-100 flex justify-between items-center">
                            <span class="text-lg font-black text-stone-900 tracking-tighter">
                                <span class="text-xs font-medium text-stone-400 mr-1">Rp</span><?php echo e(number_format($item->price, 0, ',', '.')); ?>

                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-3 space-y-6">
            
            <div class="bg-white rounded-[2rem] shadow-sm border border-stone-200 p-6 sticky top-8">
                <h4 class="text-xs font-black uppercase tracking-[0.2em] text-stone-400 mb-4">Pencarian & Filter</h4>
                
                <div class="space-y-4">
                    <div class="relative">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
                        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Cari nama menu..."
                            class="w-full pl-10 pr-4 py-3 bg-stone-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-red-700 font-medium">
                    </div>

                    <select wire:model.live="filterCategory" class="w-full bg-stone-50 border-none rounded-xl text-sm font-bold py-3 px-4 focus:ring-2 focus:ring-red-700">
                        <option value="">Semua Kategori</option>
                        <option value="main_course">🍛 Main Course</option>
                        <option value="snacks">🍟 Side Dish</option>
                        <option value="drinks">🥤 Drinks</option>
                        <option value="desserts">🍰 Desserts</option>
                    </select>

                    <div class="grid grid-cols-2 gap-2">
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-[8px] font-bold text-stone-400 uppercase">Min</span>
                            <input type="number" wire:model.live="minPrice" class="w-full pt-5 pb-2 px-3 bg-stone-50 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-red-700">
                        </div>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-[8px] font-bold text-stone-400 uppercase">Max</span>
                            <input type="number" wire:model.live="maxPrice" class="w-full pt-5 pb-2 px-3 bg-stone-50 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-red-700">
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button wire:click="resetFilter" class="flex-1 py-3 bg-stone-100 text-stone-600 rounded-xl text-xs font-bold hover:bg-stone-200 transition-colors">Reset</button>
                        <button wire:click="applyFilter" class="flex-[2] py-3 bg-stone-900 text-white rounded-xl text-xs font-bold hover:bg-stone-800 transition-colors shadow-lg shadow-stone-900/20">Terapkan</button>
                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deleteMode && count($selectedItems) > 0): ?>
                <div class="mt-6 pt-6 border-t border-stone-100">
                    <button wire:click="deleteSelected" class="w-full py-4 bg-red-600 text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-red-700 transition-all shadow-lg shadow-red-900/20 animate-bounce">
                        Hapus <?php echo e(count($selectedItems)); ?> Menu Terpilih
                    </button>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->hasPages()): ?>
                <div class="mt-8 flex justify-between items-center bg-stone-50 p-2 rounded-2xl">
                    <button wire:click="previousPage" <?php if($items->onFirstPage()): echo 'disabled'; endif; ?> class="w-10 h-10 flex items-center justify-center rounded-xl <?php echo e($items->onFirstPage() ? 'text-stone-300' : 'text-stone-600 hover:bg-white'); ?>">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </button>
                    <span class="text-xs font-black text-stone-800 uppercase tracking-widest">Hal <?php echo e($items->currentPage()); ?></span>
                    <button wire:click="nextPage" <?php if(!$items->hasMorePages()): echo 'disabled'; endif; ?> class="w-10 h-10 flex items-center justify-center rounded-xl <?php echo e(!$items->hasMorePages() ? 'text-stone-300' : 'text-stone-600 hover:bg-white'); ?>">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>

    
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e7e5e4; border-radius: 10px; }
    </style>
</div><?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/Admin/menu-management.blade.php ENDPATH**/ ?>