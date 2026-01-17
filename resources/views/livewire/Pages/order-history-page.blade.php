<div>
    <h1 class="text-3xl font-bold my-5 ms-5">Your Orders</h1>

    <div class="space-y-6 space-x-6 mx-10">
        @forelse ($orders as $order)
            <div class="bg-white rounded-lg border shadow-sm">

                {{-- HEADER ORDER --}}
                <div class="flex justify-between bg-gray-50 px-6 py-4 border-b text-sm">
                    <div>
                        <p class="text-gray-500">Order placed</p>
                        <p class="font-medium">
                            {{ $order->created_at->format('F d, Y') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Total</p>
                        <p class="font-medium">
                            Rp{{ number_format($order->total, 0, ',', '.') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Status</p>
                        <span class="px-2 py-1 rounded text-xs font-semibold
                            {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $order->status === 'preparing' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}
                        ">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="text-right">
                        <p class="text-gray-500">Order ID</p>
                        <p class="font-medium">{{ $order->order_number }}</p>
                    </div>
                </div>

                {{-- ITEM LIST --}}
                <div class="px-6 py-4 space-y-4">
                    @foreach ($order->items as $item)
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-semibold">{{ $item->menu_name }}</p>
                                <p class="text-sm text-gray-500">
                                    Qty: {{ $item->quantity }}
                                </p>
                            </div>

                            <div class="font-medium">
                                Rp{{ number_format($item->subtotal, 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center">You have no orders yet.</p>
        @endforelse
    </div>
</div>
