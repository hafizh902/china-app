<div>
    <h1 class="text-3xl font-bold chinese-font text-chinese-red mb-8">Checkout</h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Delivery Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">First Name</label>
                        <input type="text" wire:model="firstName" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Last Name</label>
                        <input type="text" wire:model="lastName" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" wire:model="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium mb-1">Phone</label>
                    <input type="text" wire:model="phone" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>
                @if($orderType === 'delivery')
                    <div class="mt-4">
                        <label class="block text-sm font-medium mb-1">Delivery Address</label>
                        <textarea wire:model="address" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" rows="3"></textarea>
                    </div>
                @endif
                <div class="mt-4">
                    <label class="block text-sm font-medium mb-2">Order Type</label>
                    <div class="flex space-x-6">
                        <label class="flex items-center">
                            <input type="radio" wire:model="orderType" value="delivery" class="mr-2"> <span class="ml-2">Delivery</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" wire:model="orderType" value="pickup" class="mr-2"> <span class="ml-2">Pickup</span>
                        </label>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium mb-1">Special Instructions</label>
                    <textarea wire:model="instructions" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" rows="3"></textarea>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Payment Method</h2>
                <div class="space-y-3">
                    <label class="flex items-center p-3 border rounded-lg cursor-pointer">
                        <input type="radio" wire:model="payment" value="cash" class="mr-3"> <span class="ml-3">Cash on Delivery</span>
                    </label>
                    <label class="flex items-center p-3 border rounded-lg cursor-pointer">
                        <input type="radio" wire:model="payment" value="card" class="mr-3"> <span class="ml-3">Credit/Debit Card</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm sticky top-24">
            <h2 class="text-xl font-bold mb-4">Order Summary</h2>
            @foreach($cart as $item)
                <div class="flex justify-between text-sm">
                    <span>{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                    <span>Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                </div>
            @endforeach
            <div class="mt-4 space-y-2">
                <div class="flex justify-between"><span>Subtotal:</span> <strong>Rp{{ number_format($subtotal, 0, ',', '.') }}</strong></div>
                <div class="flex justify-between"><span>Tax:</span> <strong>Rp{{ number_format($tax, 0, ',', '.') }}</strong></div>
                @if($deliveryFee > 0)
                    <div class="flex justify-between"><span>Delivery Fee:</span> <strong>Rp{{ number_format($deliveryFee, 0, ',', '.') }}</strong></div>
                @endif
                <div class="border-t pt-2 mt-2 flex justify-between text-lg font-bold text-chinese-red">
                    <span>Total:</span> <strong>Rp{{ number_format($total, 0, ',', '.') }}</strong>
                </div>
            </div>
            <button class="w-full mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 font-medium" wire:click="placeOrder">Place Order</button>
        </div>
    </div>
</div>