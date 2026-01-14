<div>
    <h1 class="text-3xl font-bold chinese-font text-chinese-red mb-8">Order History</h1>
    <div class="space-y-4">
        @foreach($orders as $order)
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-bold">{{ $order['id'] }}</h3>
                        <p class="text-gray-600">{{ $order['date'] }}</p>
                    </div>
                    <div>
                        <span class="status-badge status-{{ $order['status'] }}">{{ ucfirst($order['status']) }}</span>
                    </div>
                    <div class="font-bold text-red-600">Rp{{ number_format($order['total'], 0, ',', '.') }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>