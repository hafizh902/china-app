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
                    @foreach($orders as $order)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6">{{ $order[0] }}</td>
                            <td class="py-4 px-6">{{ $order[1] }}</td>
                            <td class="py-4 px-6">{{ $order[2] }}</td>
                            <td class="py-4 px-6">Rp{{ number_format($order[3], 0, ',', '.') }}</td>
                            <td class="py-4 px-6">{{ ucfirst($order[4]) }}</td>
                            <td class="py-4 px-6"><span class="status-badge status-{{ $order[5] }}">{{ ucfirst($order[5]) }}</span></td>
                            <td class="py-4 px-6">{{ $order[6] }}</td>
                            <td class="py-4 px-6">
                                <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded text-sm">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>