<div class="grid grid-cols-1 lg:grid-cols-10 gap-5 p-5">
    <div class="lg:col-span-8 space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
            @foreach([
                ['title' => 'Total Orders', 'value' => $stats['orders'], 'icon' => 'receipt', 'color' => 'blue'],
                ['title' => 'Total Revenue', 'value' => 'Rp' . number_format($stats['revenue'], 0, ',', '.'), 'icon' => 'dollar-sign', 'color' => 'green'],
                ['title' => 'Active Orders', 'value' => $stats['active'], 'icon' => 'clock', 'color' => 'yellow'],
                ['title' => 'Reservations', 'value' => $stats['reservations'] ?? 0, 'icon' => 'calendar-check', 'color' => 'orange'],
                ['title' => 'Menu Items', 'value' => $stats['menu'], 'icon' => 'utensils', 'color' => 'purple'],
            ] as $stat)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 stat-card hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-{{ $stat['color'] }}-50 rounded-lg flex items-center justify-center">
                            <i class="fas fa-{{ $stat['icon'] }} text-{{ $stat['color'] }}-600 text-lg"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">{{ $stat['value'] }}</h3>
                    <p class="text-gray-500 text-xs font-medium uppercase tracking-wider mt-1">{{ $stat['title'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Recent Orders</h2>
                <a href="{{ route('admin.orders') }}" class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-200 transition">
                    View All
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b text-gray-400 text-sm">
                            <th class="text-left py-3 px-4 font-medium">Order ID</th>
                            <th class="text-left py-3 px-4 font-medium">Customer</th>
                            <th class="text-left py-3 px-4 font-medium">Items</th>
                            <th class="text-left py-3 px-4 font-medium">Total</th>
                            <th class="text-left py-3 px-4 font-medium">Status</th>
                            <th class="text-left py-3 px-4 font-medium">Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        @foreach($recentOrders as $order)
                            <tr class="border-b last:border-0 hover:bg-gray-50 transition">
                                <td class="py-4 px-4 font-semibold text-blue-600 text-sm">{{ $order[0] }}</td>
                                <td class="py-4 px-4 text-sm">{{ $order[1] }}</td>
                                <td class="py-4 px-4 text-sm">{{ $order[2] }}</td>
                                <td class="py-4 px-4 text-sm font-bold text-gray-800">Rp{{ number_format($order[3], 0, ',', '.') }}</td>
                                <td class="py-4 px-4 text-sm">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase status-{{ $order[4] }}">
                                        {{ $order[4] }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-400">{{ $order[5] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-md p-5 sticky top-4 border border-gray-100">
            <div class="flex items-center space-x-2 mb-6 text-gray-800">
                <i class="fas fa-bolt text-yellow-500"></i>
                <h2 class="text-lg font-bold">Quick Access</h2>
            </div>
            
            <div class="space-y-2.5">
                @foreach([
                    ['route' => 'admin.orders', 'icon' => 'shopping-bag', 'color' => 'blue', 'title' => 'Order Mgmt', 'desc' => 'Manage incoming orders'],
                    ['route' => 'admin.reservations', 'icon' => 'calendar-alt', 'color' => 'orange', 'title' => 'Reservations', 'desc' => 'Manage table bookings'],
                    ['route' => 'admin.menu', 'icon' => 'book-open', 'color' => 'indigo', 'title' => 'Menu Mgmt', 'desc' => 'Update food & drinks'],
                    ['route' => 'home', 'icon' => 'external-link-alt', 'color' => 'gray', 'title' => 'Live Site', 'desc' => 'View landing page'],
                ] as $menu)
                    <a href="{{ route($menu['route']) }}" class="group block p-3 rounded-xl border border-transparent bg-gray-50 hover:bg-white hover:border-{{ $menu['color'] }}-200 hover:shadow-sm transition-all duration-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-{{ $menu['color'] }}-100 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <i class="fas fa-{{ $menu['icon'] }} text-{{ $menu['color'] }}-600"></i>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-bold text-xs text-gray-800 truncate group-hover:text-{{ $menu['color'] }}-600 transition-colors">{{ $menu['title'] }}</h3>
                                <p class="text-gray-500 text-[10px] truncate leading-tight">{{ $menu['desc'] }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8 pt-6 border-t border-gray-100">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4 px-2">System Config</p>
                <a href="#" class="flex items-center justify-between p-3 rounded-lg hover:bg-red-50 text-gray-600 hover:text-red-600 transition group">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-cog text-sm"></i>
                        <span class="text-xs font-semibold">Settings</span>
                    </div>
                    <i class="fas fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i>
                </a>
            </div>
        </div>
    </div>
</div>