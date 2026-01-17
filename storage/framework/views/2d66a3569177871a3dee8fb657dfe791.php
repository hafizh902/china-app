<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold chinese-font">Order Management</h1>
        <div class="flex space-x-3">
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300"><i class="fas fa-download mr-2"></i> Export</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300"><i class="fas fa-filter mr-2"></i> Filter</button>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left py-4 px-6">Order ID</th>
                        <th class="text-left py-4 px-6">Customer</th>
                        <th class="text-left py-4 px-6">Items</th>
                        <th class="text-left py-4 px-6">Total</th>
                        <th class="text-left py-4 px-6">Type</th>
                        <th class="text-left py-4 px-6">Status</th>
                        <th class="text-left py-4 px-6">Date</th>
                        <th class="text-left py-4 px-6">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6"><?php echo e($order[0]); ?></td>
                            <td class="py-4 px-6"><?php echo e($order[1]); ?></td>
                            <td class="py-4 px-6"><?php echo e($order[2]); ?></td>
                            <td class="py-4 px-6">Rp<?php echo e(number_format($order[3], 0, ',', '.')); ?></td>
                            <td class="py-4 px-6"><?php echo e(ucfirst($order[4])); ?></td>
                            <td class="py-4 px-6"><span class="status-badge status-<?php echo e($order[5]); ?>"><?php echo e(ucfirst($order[5])); ?></span></td>
                            <td class="py-4 px-6"><?php echo e($order[6]); ?></td>
                            <td class="py-4 px-6">
                                <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded text-sm">View</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Admin/order-management.blade.php ENDPATH**/ ?>