<div class="grid grid-cols-1 lg:grid-cols-10 gap-5 p-5">
    <!-- Kolom Kiri: Overview & Recent Orders (70%) -->
    <div class="lg:col-span-8 space-y-4">
        <!-- Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
                ['title' => 'Total Orders', 'value' => $stats['orders'], 'icon' => 'receipt', 'color' => 'blue'],
                ['title' => 'Total Revenue', 'value' => 'Rp' . number_format($stats['revenue'], 0, ',', '.'), 'icon' => 'dollar-sign', 'color' => 'green'],
                ['title' => 'Active Orders', 'value' => $stats['active'], 'icon' => 'clock', 'color' => 'yellow'],
                ['title' => 'Menu Items', 'value' => $stats['menu'], 'icon' => 'utensils', 'color' => 'purple'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-lg shadow-md p-6 stat-card">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-<?php echo e($stat['color']); ?>-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-<?php echo e($stat['icon']); ?> text-<?php echo e($stat['color']); ?>-600 text-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800"><?php echo e($stat['value']); ?></h3>
                    <p class="text-gray-600 text-sm mt-1"><?php echo e($stat['title']); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Recent Orders</h2>
                <a href="<?php echo e(route('admin.orders')); ?>" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    View All
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4">Order ID</th>
                            <th class="text-left py-3 px-4">Customer</th>
                            <th class="text-left py-3 px-4">Items</th>
                            <th class="text-left py-3 px-4">Total</th>
                            <th class="text-left py-3 px-4">Status</th>
                            <th class="text-left py-3 px-4">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-row border-b hover:bg-gray-50">
                                <td class="py-3 px-4"><?php echo e($order[0]); ?></td>
                                <td class="py-3 px-4"><?php echo e($order[1]); ?></td>
                                <td class="py-3 px-4"><?php echo e($order[2]); ?></td>
                                <td class="py-3 px-4">Rp<?php echo e(number_format($order[3], 0, ',', '.')); ?></td>
                                <td class="py-3 px-4">
                                    <span class="status-badge status-<?php echo e($order[4]); ?>"><?php echo e(ucfirst($order[4])); ?></span>
                                </td>
                                <td class="py-3 px-4"><?php echo e($order[5]); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Quick Access Menu (30%) -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
            <h2 class="text-xl font-bold mb-6">Quick Access</h2>
            <div class="space-y-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
                    ['route' => 'home', 'icon' => 'home', 'color' => 'blue', 'title' => 'Home Page', 'desc' => 'View landing page'],
                    ['route' => 'menu', 'icon' => 'utensils', 'color' => 'green', 'title' => 'Menu', 'desc' => 'Browse menu'],
                    ['route' => 'cart', 'icon' => 'shopping-cart', 'color' => 'yellow', 'title' => 'Cart', 'desc' => 'View cart'],
                    ['route' => 'checkout', 'icon' => 'credit-card', 'color' => 'purple', 'title' => 'Checkout', 'desc' => 'Process orders'],
                    ['route' => 'orders', 'icon' => 'history', 'color' => 'red', 'title' => 'Order History', 'desc' => 'View orders'],
                    ['route' => 'admin.menu', 'icon' => 'cog', 'color' => 'indigo', 'title' => 'Menu Mgmt', 'desc' => 'Manage menu'],
                    ['route' => 'admin.orders', 'icon' => 'list', 'color' => 'pink', 'title' => 'Order Mgmt', 'desc' => 'Manage orders'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route($menu['route'])); ?>" class="block bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-<?php echo e($menu['color']); ?>-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-<?php echo e($menu['icon']); ?> text-<?php echo e($menu['color']); ?>-600"></i>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-semibold text-sm text-gray-800 truncate"><?php echo e($menu['title']); ?></h3>
                                <p class="text-gray-600 text-xs truncate"><?php echo e($menu['desc']); ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/Admin/dashboard.blade.php ENDPATH**/ ?>