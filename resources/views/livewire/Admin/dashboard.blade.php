<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @foreach([
            ['title' => 'Total Orders', 'value' => $stats['orders'], 'icon' => 'receipt', 'color' => 'blue'],
            ['title' => 'Total Revenue', 'value' => 'Rp' . number_format($stats['revenue'], 0, ',', '.'), 'icon' => 'dollar-sign', 'color' => 'green'],
            ['title' => 'Active Orders', 'value' => $stats['active'], 'icon' => 'clock', 'color' => 'yellow'],
            ['title' => 'Menu Items', 'value' => $stats['menu'], 'icon' => 'utensils', 'color' => 'purple'],
        ] as $stat)
            <div class="bg-white rounded-lg shadow-md p-6 stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-{{ $stat['color'] }}-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-{{ $stat['icon'] }} text-{{ $stat['color'] }}-600 text-xl"></i>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $stat['value'] }}</h3>
                <p class="text-gray-600 text-sm mt-1">{{ $stat['title'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Recent Orders</h2>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition" wire:navigate href="{{ route('admin.orders') }}">View All</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead><tr class="border-b">
                    <th class="text-left py-3 px-4">Order ID</th>
                    <th class="text-left py-3 px-4">Customer</th>
                    <th class="text-left py-3 px-4">Items</th>
                    <th class="text-left py-3 px-4">Total</th>
                    <th class="text-left py-3 px-4">Status</th>
                    <th class="text-left py-3 px-4">Date</th>
                </tr></thead>
                <tbody>
                    @foreach($recentOrders as $order)
                        <tr class="table-row border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $order[0] }}</td>
                            <td class="py-3 px-4">{{ $order[1] }}</td>
                            <td class="py-3 px-4">{{ $order[2] }}</td>
                            <td class="py-3 px-4">Rp{{ number_format($order[3], 0, ',', '.') }}</td>
                            <td class="py-3 px-4"><span class="status-badge status-{{ $order[4] }}">{{ ucfirst($order[4]) }}</span></td>
                            <td class="py-3 px-4">{{ $order[5] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-bold mb-6">Quick Access</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md p-4 cursor-pointer hover:shadow-lg transition-shadow" wire:navigate href="{{ route('home') }}">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-home text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">Home Page</h3>
                        <p class="text-gray-600 text-sm">View main landing page</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-4 cursor-pointer hover:shadow-lg transition-shadow" wire:navigate href="{{ route('menu') }}">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-utensils text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">Menu Page</h3>
                        <p class="text-gray-600 text-sm">Browse and manage menu items</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-4 cursor-pointer hover:shadow-lg transition-shadow" wire:navigate href="{{ route('cart') }}">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-shopping-cart text-yellow-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">Cart Page</h3>
                        <p class="text-gray-600 text-sm">View shopping cart</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-4 cursor-pointer hover:shadow-lg transition-shadow" wire:navigate href="{{ route('checkout') }}">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-credit-card text-purple-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">Checkout Page</h3>
                        <p class="text-gray-600 text-sm">Process orders</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-4 cursor-pointer hover:shadow-lg transition-shadow" wire:navigate href="{{ route('orders') }}">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-history text-red-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">Order History</h3>
                        <p class="text-gray-600 text-sm">View past orders</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-4 cursor-pointer hover:shadow-lg transition-shadow" wire:navigate href="{{ route('admin.menu') }}">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-cog text-indigo-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">Menu Management</h3>
                        <p class="text-gray-600 text-sm">Manage menu items</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-4 cursor-pointer hover:shadow-lg transition-shadow" wire:navigate href="{{ route('admin.orders') }}">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-list text-pink-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">Order Management</h3>
                        <p class="text-gray-600 text-sm">Manage all orders</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>