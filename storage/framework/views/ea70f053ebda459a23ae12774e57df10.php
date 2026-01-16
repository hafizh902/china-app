<div id="preview-modal" class="fixed inset-0 z-[9999] overflow-y-auto flex items-center justify-center"
    style="display: <?php echo e($showModal ? 'flex' : 'none'); ?>; background-color: rgba(0, 0, 0, <?php echo e($showModal ? '0.5' : '0'); ?>);"
    @click.self="$wire.closeModal()" @keydown.escape="$wire.closeModal()">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedItem): ?>
            
            <div class="relative h-64 bg-gray-100">
                <img
                    src="<?php echo e($selectedItem['image_url']); ?>"
                    alt="<?php echo e($selectedItem['name']); ?>"
                    class="w-full h-full object-cover"
                >

                
                <div class="absolute top-4 right-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedItem['is_available']): ?>
                        <span class="bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                            Available
                        </span>
                    <?php else: ?>
                        <span class="bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                            Unavailable
                        </span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="p-6">
                
                <div class="mb-2">
                    <h2 class="text-2xl font-bold text-gray-900">
                        <?php echo e($selectedItem['name']); ?>

                    </h2>

                    <p class="text-sm text-gray-500 capitalize">
                        <?php echo e($selectedItem['category']); ?>

                    </p>
                </div>

                
                <p class="text-gray-700 text-sm leading-relaxed mb-4">
                    <?php echo e($selectedItem['description'] ?? 'No description available.'); ?>

                </p>

                
                <div class="flex items-center justify-between mb-6">
                    <span class="text-2xl font-extrabold text-chinese-red">
                        Rp<?php echo e(number_format($selectedItem['price'], 0, ',', '.')); ?>

                    </span>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedItem['prep_time_minutes'] ?? false): ?>
                        <span class="text-sm text-gray-500 flex items-center gap-1">
                            ⏱ <?php echo e($selectedItem['prep_time_minutes']); ?> min
                        </span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <button
                    class="w-full bg-chinese-red text-white py-3 rounded-xl font-semibold text-lg
                           hover:opacity-90 transition disabled:opacity-50 disabled:cursor-not-allowed"
                    wire:click="$dispatch(
                        'add-to-cart',
                        [
                            <?php echo e($selectedItem['id']); ?>,
                            '<?php echo e($selectedItem['name']); ?>',
                            <?php echo e($selectedItem['price']); ?>,
                            '<?php echo e($selectedItem['image']); ?>'
                        ]
                    ).to('cart-component')"
                    <?php if(!($selectedItem['is_available'])): echo 'disabled'; endif; ?>
                >
                    <?php echo e($selectedItem['is_available'] ? 'Add to Cart' : 'Currently Unavailable'); ?>

                </button>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH E:\12 RPL\china-app\resources\views/livewire/pages/preview-modal.blade.php ENDPATH**/ ?>