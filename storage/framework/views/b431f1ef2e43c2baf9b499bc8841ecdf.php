<div>

<div class="px-6 py-6 bg-white">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-red-600" style="font-family: 'Noto Sans SC', sans-serif;">
            Browse Categories
        </h2>

        <div class="flex flex-wrap gap-3">
            <?php
                $categories = [
                    'all' => ['All Items', null],
                    'noodles' => ['Noodles', 'fa-utensils'],
                    'dumplings' => ['Dumplings', 'fa-cookie-bite'],
                    'rice' => ['Rice Dishes', 'fa-bowl-rice'],
                    'drinks' => ['Drinks', 'fa-mug-hot'],
                    'desserts' => ['Desserts', 'fa-ice-cream'],
                ];
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => [$label, $icon]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button
                    wire:click="$set('category', '<?php echo e($key); ?>')"
                    class="
                        flex items-center gap-2
                        px-6 py-3
                        rounded-full
                        font-medium
                        transition-all
                        duration-200
                        <?php echo e($category === $key
                            ? 'bg-red-600 text-white shadow-md'
                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200'); ?>

                    "
                >
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($icon): ?>
                        <i class="fas <?php echo e($icon); ?>"></i>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php echo e($label); ?>

                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>


    
    <div class="px-6 mb-6 flex flex-wrap gap-4 items-center">

<div class="flex items-center gap-2 bg-gray-100 p-1 rounded-full shadow-inner">
    <?php
        $options = [
            'popular' => 'Popular',
            'price-low' => 'Low Price',
            'price-high' => 'High Price',
            'name' => 'A–Z',
        ];
    ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button
            wire:click="setSort('<?php echo e($value); ?>')"
            class="
                relative px-5 py-2 rounded-full text-sm font-semibold
                transition-all duration-300
                <?php echo e($sort === $value
                    ? 'bg-red-500 text-white shadow'
                    : 'text-gray-600 hover:text-red-500'); ?>

            "
        >
            <?php echo e($label); ?>

        </button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

    </div>

    
    <div class="px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Card menu item - klik untuk tambah ke keranjang -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" wire:click="$dispatch('add-to-cart', <?php echo e(json_encode($item)); ?>)">
                <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="font-semibold text-lg"><?php echo e($item['name']); ?></h3>
                    <p class="text-red-600 font-bold mt-2">Rp<?php echo e(number_format($item['price'], 0, ',', '.')); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/pages/menu-page.blade.php ENDPATH**/ ?>