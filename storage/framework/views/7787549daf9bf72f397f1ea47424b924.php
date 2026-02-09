<div class="p-8 bg-stone-50 min-h-screen">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-serif font-black text-stone-800 tracking-tight">Order Management</h1>
            <p class="text-sm text-stone-500 mt-1 uppercase tracking-widest font-medium">Manage all incoming orders in
                one control</p>
        </div>
        <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-2xl shadow-sm border border-stone-200">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-red-600"></span>
            </span>
            <span class="text-xs font-bold text-stone-700 uppercase tracking-tighter"><?php echo e($orders->total()); ?> Orders
                Total</span>
        </div>
    </div>

    
    <div class="bg-white p-4 rounded-[1.5rem] shadow-sm border border-stone-200 mb-6 flex flex-wrap gap-4 items-center">
        <div class="relative flex-1 min-w-[300px]">
            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-stone-400">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" wire:model.live.debounce.300ms="search"
                placeholder="Search for Order ID or Customer Name..."
                class="w-full pl-11 pr-4 py-3 bg-stone-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-red-700 transition-all font-medium" />
        </div>

        <div class="flex gap-3">
            <select wire:model.live="statusFilter"
                class="bg-stone-50 border-none rounded-xl text-sm font-bold py-3 px-4 focus:ring-2 focus:ring-red-700">
                <option value="">All Status</option>
                <option value="pending">⏳ Pending</option>
                <option value="preparing">👨‍🍳 Preparing</option>
                <option value="ready">🥡 Ready to Deliver</option>
                <option value="completed">✅ Completed</option>
                <option value="cancelled">❌ Cancelled</option>
            </select>

            <select wire:model.live="typeFilter"
                class="bg-stone-50 border-none rounded-xl text-sm font-bold py-3 px-4 focus:ring-2 focus:ring-red-700">
                <option value="">All Types</option>
                <option value="dine_in">Dine In</option>
                <option value="takeaway">Takeaway</option>
                <option value="delivery">Delivery</option>
            </select>
        </div>
    </div>

    
    <div class="bg-white rounded-[2rem] shadow-sm border border-stone-200 overflow-hidden">
        <table class="w-full text-left border-separate border-spacing-0">
            <thead>
                <tr class="bg-stone-900 text-white">
                    <th class="px-6 py-5 text-[10px] font-black uppercase tracking-[0.2em]">No.</th>
                    <th class="px-6 py-5 text-[10px] font-black uppercase tracking-[0.2em]">Order ID</th>
                    <th class="px-6 py-5 text-[10px] font-black uppercase tracking-[0.2em]">Customer</th>
                    <th class="px-6 py-5 text-[10px] font-black uppercase tracking-[0.2em]">Total</th>
                    <th class="px-6 py-5 text-[10px] font-black uppercase tracking-[0.2em]">Type</th>
                    <th class="px-6 py-5 text-[10px] font-black uppercase tracking-[0.2em]">Status</th>
                    <th class="px-6 py-5 text-[10px] font-black uppercase tracking-[0.2em]">Date</th>
                    <th class="px-6 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-red-50/30 transition-colors group">
                        <td class="px-6 py-4 text-xs font-bold text-stone-400">
                            <?php echo e(($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration); ?>

                        </td>
                        <td class="px-6 py-4 font-mono text-xs font-black text-red-700">#<?php echo e($order->order_number); ?></td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span
                                    class="text-sm font-bold text-stone-800"><?php echo e($order->user->name ?? 'Guest'); ?></span>
                                <span class="text-[10px] text-stone-400 font-medium"><?php echo e($order->items->count()); ?> Menu
                                    Dipesan</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-bold text-stone-800 text-sm">
                            Rp<?php echo e(number_format($order->total, 0, ',', '.')); ?>

                        </td>
                        <td class="px-6 py-4">
                            <span class="text-[10px] font-black uppercase tracking-widest text-stone-500">
                                <?php echo e(str_replace('_', ' ', $order->order_type)); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <?php
                                $statusClasses = [
                                    'pending' => 'bg-amber-100 text-amber-700',
                                    'preparing' => 'bg-blue-100 text-blue-700',
                                    'ready' => 'bg-purple-100 text-purple-700',
                                    'completed' => 'bg-green-100 text-green-700',
                                    'cancelled' => 'bg-red-100 text-red-700',
                                ];
                            ?>
                            <span
                                class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter <?php echo e($statusClasses[$order->status] ?? 'bg-gray-100'); ?>">
                                <?php echo e($order->status); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-stone-500 font-medium">
                            <?php echo e($order->created_at->format('d M Y')); ?></td>
                        <td class="px-6 py-4 text-center">
                            <button wire:click="openDetail(<?php echo e($order->id); ?>)"
                                class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-stone-100 text-stone-600 hover:bg-red-700 hover:text-white transition-all">
                                <i class="fas fa-eye text-xs"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>

        <div class="p-6 bg-stone-50 border-t border-stone-200">
            <?php echo e($orders->links()); ?>

        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showDetailModal && $selectedOrder): ?>
        <div x-data class="fixed inset-0 z-[100] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-md" wire:click="$set('showDetailModal', false)">
            </div>

            <div class="relative bg-white rounded-[2.5rem] w-full max-w-2xl shadow-2xl overflow-hidden animate-zoom-in">
                
                <div class="bg-red-800 p-8 text-white flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-serif font-bold">
                            Order Details</h2>
                        <p class="text-[10px] uppercase tracking-[0.3em] opacity-70">
                            Order ID:
                            #<?php echo e($selectedOrder->order_number); ?></p>
                    </div>
                    <button wire:click="$set('showDetailModal', false)"
                        class="text-white/50 hover:text-white transition-colors">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <div class="p-8 max-h-[70vh] overflow-y-auto custom-scrollbar">
                    
                    <div class="grid grid-cols-2 gap-6 mb-8 pb-6 border-b border-stone-100">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-stone-400 mb-1">Information
                                Customer</p>
                            <p class="text-sm font-bold text-stone-800"><?php echo e($selectedOrder->user->name ?? 'Guest'); ?></p>
                            <p class="text-xs text-stone-500"><?php echo e($selectedOrder->user->email ?? '-'); ?></p>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] font-black uppercase tracking-widest text-stone-400 mb-1">Order Type
                            </p>
                            <p class="text-sm font-bold text-red-700 uppercase tracking-tighter">
                                <?php echo e(ucfirst($selectedOrder->order_type)); ?></p>
                        </div>
                    </div>

                    
                    <div class="mb-8">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-[10px] font-black text-stone-400 uppercase tracking-widest">
                                    <th class="pb-4">Item</th>
                                    <th class="pb-4 text-center">Qty</th>
                                    <th class="pb-4 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-stone-50">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $selectedOrder->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="py-4 text-sm font-serif font-bold text-stone-800">
                                            <?php echo e($item->menu_name); ?></td>
                                        <td class="py-4 text-center font-mono text-xs"><?php echo e($item->quantity); ?></td>
                                        <td class="py-4 text-right font-bold text-stone-800 text-sm">
                                            Rp<?php echo e(number_format($item->subtotal, 0, ',', '.')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    
                    <div class="bg-stone-50 rounded-2xl p-6 space-y-3">
                        <div class="flex justify-between text-xs text-stone-500 font-medium">
                            <span>Subtotal</span>
                            <span>Rp<?php echo e(number_format($selectedOrder->subtotal, 0, ',', '.')); ?></span>
                        </div>
                        <div class="flex justify-between text-xs text-stone-500 font-medium">
                            <span>Tax (10%)</span>
                            <span>Rp<?php echo e(number_format($selectedOrder->tax, 0, ',', '.')); ?></span>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedOrder->order_type === 'delivery'): ?>
                            <div class="flex justify-between text-xs text-red-600 font-medium">
                                <span>Delivery Fee</span>
                                <span>Rp<?php echo e(number_format($selectedOrder->delivery_fee, 0, ',', '.')); ?></span>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div
                            class="flex justify-between font-black text-lg text-stone-900 border-t border-stone-200 pt-3 mt-3 tracking-tighter italic">
                            <span>TOTAL</span>
                            <span
                                class="text-red-700 italic">Rp<?php echo e(number_format($selectedOrder->total, 0, ',', '.')); ?></span>
                        </div>
                    </div>

                    
                    <div class="mt-8">
                        <label
                            class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1 mb-2 block">Update
                            Order Status</label>
                        <div class="flex gap-2">
                            <select wire:model="editStatus"
                                class="flex-1 bg-stone-100 border-none rounded-xl font-bold text-sm focus:ring-2 focus:ring-red-700 py-4 px-5 transition-all">
                                <option value="pending">⏳ Pending</option>
                                <option value="preparing">👨‍🍳 Preparing</option>
                                <option value="ready">🥡 Ready</option>
                                <option value="completed">✅ Completed</option>
                                <option value="cancelled">❌ Cancelled</option>
                            </select>
                            <button wire:click="updateStatus"
                                class="px-8 bg-red-800 hover:bg-red-700 text-white font-black uppercase tracking-widest text-[10px] rounded-xl transition-all shadow-lg shadow-red-900/20 active:scale-95">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e7e5e4;
            border-radius: 10px;
        }

        .animate-zoom-in {
            animation: zoom-in 0.2s ease-out;
        }

        @keyframes zoom-in {
            0% {
                opacity: 0;
                transform: scale(0.95);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</div>
<?php /**PATH D:\laragon\www\china-app\resources\views/livewire/Admin/order-management.blade.php ENDPATH**/ ?>