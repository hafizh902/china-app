<div>
    <h1 class="text-3xl font-bold my-5 ms-5">Your Orders</h1>

    <div class="space-y-6 space-x-6 mx-10">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-lg border shadow-sm">

                
                <div class="flex justify-between bg-gray-50 px-6 py-4 border-b text-sm">
                    <div>
                        <p class="text-gray-500">Order placed</p>
                        <p class="font-medium">
                            <?php echo e($order->created_at->format('F d, Y')); ?>

                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Total</p>
                        <p class="font-medium">
                            Rp<?php echo e(number_format($order->total, 0, ',', '.')); ?>

                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Status</p>
                        <span class="px-2 py-1 rounded text-xs font-semibold
                            <?php echo e($order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : ''); ?>

                            <?php echo e($order->status === 'preparing' ? 'bg-yellow-100 text-yellow-700' : ''); ?>

                            <?php echo e($order->status === 'completed' ? 'bg-green-100 text-green-700' : ''); ?>

                            <?php echo e($order->status === 'cancelled' ? 'bg-red-100 text-red-700' : ''); ?>

                        ">
                            <?php echo e(ucfirst($order->status)); ?>

                        </span>
                    </div>

                    <div class="text-right">
                        <p class="text-gray-500">Order ID</p>
                        <p class="font-medium"><?php echo e($order->order_number); ?></p>
                    </div>
                </div>

                
                <div class="px-6 py-4 space-y-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-semibold"><?php echo e($item->menu_name); ?></p>
                                <p class="text-sm text-gray-500">
                                    Qty: <?php echo e($item->quantity); ?>

                                </p>
                            </div>

                            <div class="font-medium">
                                Rp<?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-500 text-center">You have no orders yet.</p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Pages/order-history-page.blade.php ENDPATH**/ ?>