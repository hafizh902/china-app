<div>
    <h1 class="text-3xl font-bold chinese-font text-chinese-red mb-8">Shopping Cart</h1>
    @if(empty($cart))
        <div class="text-center py-12">
            <i class="fas fa-shopping-cart text-5xl text-gray-300 mb-4"></i>
            <p class="text-gray-600">Your cart is empty</p>
            <button class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 mt-4" wire:navigate href="{{ route('menu') }}">Browse Menu</button>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-4">
                @foreach($cart as $item)
                    <div class="bg-white p-4 rounded-lg shadow-sm flex justify-between items-center">
                        <div>
                            <h3 class="font-semibold">{{ $item['name'] }}</h3>
                            <p class="text-chinese-red">Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-2 py-1 bg-gray-200 rounded" wire:click="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] - 1 }})">-</button>
                            <span>{{ $item['quantity'] }}</span>
                            <button class="px-2 py-1 bg-gray-200 rounded" wire:click="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] + 1 }})">+</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm sticky top-24">
                <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                <div class="space-y-2">
                    <div class="flex justify-between"><span>Subtotal:</span> <strong>Rp{{ number_format($subtotal, 0, ',', '.') }}</strong></div>
                    <div class="flex justify-between"><span>Tax:</span> <strong>Rp{{ number_format($tax, 0, ',', '.') }}</strong></div>
                    <div class="border-t pt-2 mt-2 flex justify-between text-lg font-bold text-chinese-red">
                        <span>Total:</span> <strong>Rp{{ number_format($total, 0, ',', '.') }}</strong>
                    </div>
                </div>
                <button class="w-full mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600" wire:navigate href="{{ route('checkout') }}">Proceed to Checkout</button>
                <button class="w-full mt-2 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300" wire:navigate href="{{ route('menu') }}">Continue Shopping</button>
            </div>
        </div>
    @endif
</div>