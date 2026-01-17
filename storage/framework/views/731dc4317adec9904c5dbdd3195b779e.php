<div>
    <h1 class="text-3xl font-bold chinese-font text-chinese-red mb-8">Order History</h1>
    <div class="space-y-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-bold"><?php echo e($order['id']); ?></h3>
                        <p class="text-gray-600"><?php echo e($order['date']); ?></p>
                    </div>
                    <div>
                        <span class="status-badge status-<?php echo e($order['status']); ?>"><?php echo e(ucfirst($order['status'])); ?></span>
                    </div>
                    <div class="font-bold text-red-600">Rp<?php echo e(number_format($order['total'], 0, ',', '.')); ?></div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Pages/order-history-page.blade.php ENDPATH**/ ?>