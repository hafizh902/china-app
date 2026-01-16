<div>
    
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-6 space-y-6">

            
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800 tracking-tight">
                    Browse Categories
                </h2>

                
                <div class="relative w-72">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 pointer-events-none">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search food..."
                        class="w-full pl-11 pr-10 py-2 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition" />

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search): ?>
                        <button wire:click="$set('search', '')"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="flex flex-wrap gap-2">
                <?php
                    $categories = [
                        'all' => ['All', null],
                        'noodles' => ['Noodles', 'fa-utensils'],
                        'dumplings' => ['Dumplings', 'fa-cookie-bite'],
                        'rice' => ['Rice', 'fa-bowl-rice'],
                        'drinks' => ['Drinks', 'fa-mug-hot'],
                        'desserts' => ['Desserts', 'fa-ice-cream'],
                    ];
                ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => [$label, $icon]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button wire:click="$set('category', '<?php echo e($key); ?>')"
                        class="
                        inline-flex items-center gap-2
                        px-4 py-2 rounded-full text-sm font-medium
                        transition-all duration-200
                        <?php echo e($category === $key
                            ? 'bg-red-500 text-white ring-2 ring-red-500/30'
                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200'); ?>

                    ">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($icon): ?>
                            <i class="fas <?php echo e($icon); ?> text-xs"></i>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php echo e($label); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">Sort by:</span>

                <div class="flex gap-1 bg-gray-100 p-1 rounded-full">
                    <?php
                        $options = [
                            'popular' => 'Popular',
                            'price-low' => 'Low Price',
                            'price-high' => 'High Price',
                            'name' => 'A–Z',
                        ];
                    ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button wire:click="setSort('<?php echo e($value); ?>')"
                            class="
                            px-4 py-1.5 text-sm rounded-full
                            transition-all duration-200
                            <?php echo e($sort === $value ? 'bg-white text-red-500 font-semibold shadow-sm' : 'text-gray-600 hover:text-gray-900'); ?>

                        ">
                            <?php echo e($label); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    
    <div class="px-6 py-12 bg-gradient-to-b from-gray-50 to-amber-50/40">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($menuItems->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div
                        class="group relative bg-white rounded-2xl overflow-hidden
                           shadow-sm hover:shadow-2xl transition-all duration-500
                           transform hover:-translate-y-2
                           border border-amber-100
                           before:absolute before:inset-0 before:rounded-2xl
                           before:border before:border-red-700/0
                           group-hover:before:border-red-700/40
                           before:transition-all">

                        
                        <div class="relative h-64 overflow-hidden <?php echo e(!$item->is_available ? 'grayscale' : ''); ?>"
                            <?php if($item->is_available): ?> wire:click="$dispatch('open-preview-modal', [<?php echo e($item->id); ?>])" <?php endif; ?>>

                            <img src="<?php echo e($item->image_url); ?>" alt="<?php echo e($item->name); ?>"
                                class="w-full h-full object-cover transition-transform duration-700
                                   group-hover:scale-110
                                   <?php echo e($item->is_available ? 'cursor-pointer' : 'cursor-not-allowed'); ?>">

                            
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-60">
                            </div>

                            
                            <div class="absolute top-4 left-4">
                                <span
                                    class="px-3 py-1 rounded-full text-[10px] uppercase tracking-widest font-bold text-white shadow-lg
                                <?php echo e($item->is_available ? 'bg-red-600 border border-amber-400' : 'bg-gray-500'); ?>">
                                    <?php echo e($item->is_available ? 'Available' : 'Sold Out'); ?>

                                </span>
                            </div>

                            
                            <div
                                class="absolute top-4 right-4 w-10 h-10 rounded-full
                                    bg-red-700 text-amber-300 flex items-center justify-center
                                    text-sm font-black shadow-lg rotate-12">
                                福
                            </div>

                            
                            <div class="absolute bottom-4 left-4">
                                <p class="text-white font-bold text-xl drop-shadow-md">
                                    <span class="text-amber-400 text-sm mr-1">Rp</span>
                                    <?php echo e(number_format($item->price, 0, ',', '.')); ?>

                                </p>
                            </div>
                        </div>

                        
                        <div class="p-5 relative">
                            
                            <div
                                class="absolute top-0 right-0 w-20 h-20 opacity-[0.07]
                                   pointer-events-none group-hover:opacity-[0.12]
                                   transition-opacity">
                                <svg viewBox="0 0 100 100" class="fill-red-800">
                                    <path d="M10,40 C30,20 70,20 90,40 L90,60 C70,80 30,80 10,60 Z" />
                                </svg>
                            </div>

                            <h3
                                class="font-serif text-xl font-bold text-slate-800
                                   group-hover:text-red-700 transition-colors
                                   uppercase tracking-tight">
                                <?php echo e($item->name); ?>

                            </h3>

                            
                            <div class="mt-2 flex items-center gap-2">
                                <div class="h-[2px] w-10 bg-red-600 group-hover:w-16 transition-all"></div>
                                <div class="h-[2px] w-3 bg-amber-400"></div>
                            </div>

                            <p class="text-gray-500 text-sm mt-3 line-clamp-2 italic">
                                <?php echo e($item->description ?? 'No description available.'); ?>

                            </p>

                            <div class="mt-6 flex justify-end">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->is_available): ?>
                                    <button
                                        wire:click="$dispatch(
                                        'add-to-cart',
                                        [<?php echo e($item->id); ?>, '<?php echo e($item->name); ?>', <?php echo e($item->price); ?>, '<?php echo e($item->image); ?>']
                                    ).to('cart-component')"
                                        class="relative overflow-hidden group/btn
                                           bg-red-700 hover:bg-red-800 text-white
                                           flex items-center gap-2 px-5 py-2.5
                                           rounded-xl transition-all shadow-lg
                                           active:scale-95">
                                        <span class="text-sm font-bold uppercase tracking-tighter">
                                            Add to Cart
                                        </span>
                                        <i class="fas fa-plus text-xs bg-amber-400 text-red-900 p-1 rounded-full"></i>
                                    </button>
                                <?php else: ?>
                                    <span class="text-gray-400 text-xs font-bold uppercase italic">
                                        Out of Stock
                                    </span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$item->is_available): ?>
                            <div
                                class="absolute inset-0 bg-white/40 backdrop-blur-[2px] flex items-center justify-center z-10">
                                <div
                                    class="bg-black/80 text-white px-4 py-2 rotate-12 border-2 border-amber-500 font-bold uppercase tracking-widest">
                                    Sold Out
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php else: ?>
            
            <div class="text-center py-12">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-search text-gray-300 text-6xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Item not found</h3>
                    <p class="text-gray-500 mb-6">
                        We couldn't find any items matching "<?php echo e($search); ?>".
                    </p>
                    <button wire:click="$set('search', '')"
                        class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>
                        Clear search
                    </button>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/Pages/menu-page.blade.php ENDPATH**/ ?>