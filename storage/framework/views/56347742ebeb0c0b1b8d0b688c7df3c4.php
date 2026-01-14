<div>
    
    <div class="mb-8 px-6">
        <div class="flex flex-wrap gap-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['all' => 'All Items', 'noodles' => 'Noodles', 'dumplings' => 'Dumplings', 'rice' => 'Rice', 'drinks' => 'Drinks', 'desserts' => 'Desserts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Tombol filter kategori - aktif jika kategori dipilih -->
                <button
                    <?php if($category === $cat): ?> class="bg-red-500 text-white" <?php else: ?> class="bg-gray-200 text-gray-700" <?php endif; ?>
                    wire:click="$set('category', '<?php echo e($cat); ?>')"
                    class="px-6 py-3 rounded-full font-medium hover:bg-red-600 transition"
                >
                    <?php echo e($label); ?>

                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <div class="px-6 mb-6 flex flex-wrap gap-4 items-center">
        <!-- Input pencarian dengan debounce 300ms -->
        <input
            type="text"
            placeholder="Search..."
            wire:model.live.debounce.300ms="search"
            class="flex-1 min-w-[200px] px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
        />
        <!-- Dropdown untuk sorting -->
        <select wire:model="sort" class="w-48 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
            <option value="popular">Popular</option>
            <option value="price-low">Price: Low to High</option>
            <option value="price-high">Price: High to Low</option>
            <option value="name">Name</option>
        </select>
    </div>

    
    <div class="px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Card menu item - klik untuk tambah ke keranjang -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" wire:click="$dispatch('add-to-cart', <?php echo e(json_encode($item)); ?>)">
                <img src="<?php echo e($item->image_url); ?>" alt="<?php echo e($item->name); ?>" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="font-semibold text-lg"><?php echo e($item->name); ?></h3>
                    <p class="text-red-600 font-bold mt-2">Rp<?php echo e(number_format($item['price'], 0, ',', '.')); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div><?php /**PATH D:\projek 12\china-app\resources\views/livewire/pages/menu-page.blade.php ENDPATH**/ ?>