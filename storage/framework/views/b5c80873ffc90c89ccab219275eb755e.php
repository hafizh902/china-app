<div x-data="{ open: false }" @cart-updated.window="open = true">
    <!-- Icon Keranjang di Navbar -->
    <button @click="open = true" class="relative p-2 text-gray-700 hover:text-chinese-red">
        <i class="fas fa-shopping-cart text-xl"></i>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($count > 0): ?>
            <!-- Badge jumlah item di keranjang -->
            <span class="absolute -top-1 -right-1 bg-chinese-gold text-chinese-black text-xs rounded-full h-6 w-6 flex items-center justify-center font-bold">
                <?php echo e($count); ?>

            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </button>

    <!-- Sidebar Keranjang -->
    <div x-show="open" @click.away="open = false" class="fixed inset-0 z-50 flex justify-end">
        <div class="bg-white w-96 h-full shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold">Your Cart</h2>
                <button @click="open = false" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            <!-- Daftar item di keranjang -->
            <div class="space-y-4 max-h-96 overflow-y-auto">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between p-3 border-b">
                        <div>
                            <h4 class="font-medium"><?php echo e($item['name']); ?></h4>
                            <p class="text-chinese-red">Rp<?php echo e(number_format($item['price'], 0, ',', '.')); ?></p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <!-- Tombol kurangi quantity -->
                            <button class="px-2 py-1 bg-gray-200 rounded" wire:click="updateQuantity(<?php echo e($item['id']); ?>, <?php echo e($item['quantity'] - 1); ?>)">-</button>
                            <span><?php echo e($item['quantity']); ?></span>
                            <!-- Tombol tambah quantity -->
                            <button class="px-2 py-1 bg-gray-200 rounded" wire:click="updateQuantity(<?php echo e($item['id']); ?>, <?php echo e($item['quantity'] + 1); ?>)">+</button>
                            <!-- Tombol hapus item -->
                            <button class="px-2 py-1 bg-red-500 text-white rounded" wire:click="removeItem(<?php echo e($item['id']); ?>)"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <!-- Ringkasan harga dan tombol checkout -->
            <div class="mt-6 pt-4 border-t">
                <div class="flex justify-between"><span>Subtotal:</span> <strong>Rp<?php echo e(number_format($subtotal, 0, ',', '.')); ?></strong></div>
                <div class="flex justify-between"><span>Tax:</span> <strong>Rp<?php echo e(number_format($tax, 0, ',', '.')); ?></strong></div>
                <div class="flex justify-between text-lg font-bold text-chinese-red mt-2"><span>Total:</span> <strong>Rp<?php echo e(number_format($total, 0, ',', '.')); ?></strong></div>
                <!-- Tombol lanjut ke checkout -->
                <button class="w-full mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600" wire:navigate href="<?php echo e(route('checkout')); ?>">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/cart-component.blade.php ENDPATH**/ ?>