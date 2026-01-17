<div class="p-5">
    
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Order Management</h1>
    </div>

    
    <div class="flex gap-3 mb-4">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Search order / customer"
            class="border rounded px-3 py-2 text-sm w-64" />

        <select wire:model.live="statusFilter" class="border rounded px-3 py-2 text-sm">
            <option value="">All Status</option>
            <option value="pending">Pending</option>
            <option value="preparing">Preparing</option>
            <option value="ready">Ready</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>

        <select wire:model.live="typeFilter" class="border rounded px-3 py-2 text-sm">
            <option value="">All Type</option>
            <option value="dine_in">Dine In</option>
            <option value="takeaway">Takeaway</option>
            <option value="delivery">Delivery</option>
        </select>
    </div>

    
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">#</th>
                    <th class="px-4 py-3 text-left">Order ID</th>
                    <th class="px-4 py-3 text-left">Customer</th>
                    <th class="px-4 py-3 text-left">Items</th>
                    <th class="px-4 py-3 text-left">Total</th>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-t">
                    <td class="px-4 py-3">
                        <?php echo e(($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration); ?>

                    </td>
                    <td class="px-4 py-3"><?php echo e($order->order_number); ?></td>
                    <td class="px-4 py-3"><?php echo e($order->user->name ?? 'Guest'); ?></td>
                    <td class="px-4 py-3"><?php echo e($order->items->count()); ?></td>
                    <td class="px-4 py-3">
                        Rp<?php echo e(number_format($order->total, 0, ',', '.')); ?>

                    </td>
                    <td class="px-4 py-3"><?php echo e(ucfirst($order->order_type)); ?></td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded bg-gray-200 text-xs">
                            <?php echo e(ucfirst($order->status)); ?>

                        </span>
                    </td>
                    <td class="px-4 py-3"><?php echo e($order->created_at->format('Y-m-d')); ?></td>
                    <td class="px-4 py-3">
                        <button
                            wire:click="openDetail(<?php echo e($order->id); ?>)"
                            class="px-3 py-1 bg-blue-600 text-white rounded text-xs">
                            View
                        </button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>

        <div class="p-4">
            <?php echo e($orders->links()); ?>

        </div>
    </div>

    
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showDetailModal && $selectedOrder): ?>
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg w-full max-w-2xl p-6">
            <h2 class="text-lg font-semibold mb-4">
                Order Detail #<?php echo e($selectedOrder->order_number); ?>

            </h2>

            
            <div class="mb-4 text-sm">
                <p><strong>Name:</strong> <?php echo e($selectedOrder->user->name ?? 'Guest'); ?></p>
                <p><strong>Email:</strong> <?php echo e($selectedOrder->user->email ?? '-'); ?></p>
                <p><strong>Order Type:</strong> <?php echo e(ucfirst($selectedOrder->order_type)); ?></p>
            </div>

            
            <div class="mb-4">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">#</th>
                            <th class="text-left py-2">Item</th>
                            <th class="text-left py-2">Qty</th>
                            <th class="text-left py-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $selectedOrder->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="py-2"><?php echo e($index + 1); ?></td>
                            <td class="py-2"><?php echo e($item->menu_name); ?></td>
                            <td class="py-2"><?php echo e($item->quantity); ?></td>
                            <td class="py-2">
                                Rp<?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <div class="border-t pt-4 text-sm space-y-2">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span>
                        Rp<?php echo e(number_format($selectedOrder->subtotal, 0, ',', '.')); ?>

                    </span>
                </div>

                <div class="flex justify-between">
                    <span>Tax</span>
                    <span>
                        Rp<?php echo e(number_format($selectedOrder->tax, 0, ',', '.')); ?>

                    </span>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedOrder->order_type === 'delivery'): ?>
                <div class="flex justify-between">
                    <span>Delivery Fee</span>
                    <span>
                        Rp<?php echo e(number_format($selectedOrder->delivery_fee, 0, ',', '.')); ?>

                    </span>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="flex justify-between font-semibold border-t pt-2">
                    <span>Total</span>
                    <span>
                        Rp<?php echo e(number_format($selectedOrder->total, 0, ',', '.')); ?>

                    </span>
                </div>
            </div>

            
            <div class="mt-4">
                <label class="block text-sm font-medium mb-1">Status</label>
                <select wire:model="editStatus" class="border rounded px-3 py-2 text-sm w-full">
                    <option value="pending">Pending</option>
                    <option value="preparing">Preparing</option>
                    <option value="ready">Ready</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            
            <div class="flex justify-end gap-2 mt-6">
                <button
                    wire:click="$set('showDetailModal', false)"
                    class="px-4 py-2 bg-gray-200 rounded">
                    Cancel
                </button>
                <button
                    wire:click="updateStatus"
                    class="px-4 py-2 bg-green-600 text-white rounded">
                    Save
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/admin/order-management.blade.php ENDPATH**/ ?>