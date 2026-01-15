<div>
    
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-6 space-y-6">

            
            <h2 class="text-xl font-semibold text-gray-800 tracking-tight">
                Browse Categories
            </h2>

            
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



    
    <div class="px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="relative">
                <!-- Card menu item -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer"
                    wire:click="$dispatch('add-to-cart', <?php echo e(json_encode($item)); ?>)">
                    <img src="<?php echo e($item->image_url); ?>" alt="<?php echo e($item->name); ?>"
                        class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg"><?php echo e($item->name); ?></h3>
                        <p class="text-red-600 font-bold mt-2">
                            Rp<?php echo e(number_format($item['price'], 0, ',', '.')); ?>

                        </p>
                    </div>
                </div>

                
                <button
                    wire:click="$dispatch(
                        'add-to-cart',
                        [
                            <?php echo e($item['id']); ?>,
                            '<?php echo e($item['name']); ?>',
                            <?php echo e($item['price']); ?>,
                            '<?php echo e($item['image']); ?>'
                        ]
                    ).to('cart-component')"
                    class="absolute bottom-3 right-3 bg-chinese-red text-white p-3 rounded-full">
                    <i class="fas fa-cart-plus"></i>
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/Pages/menu-page.blade.php ENDPATH**/ ?>