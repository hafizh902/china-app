<div>
    <h1 class="text-2xl font-bold chinese-font text-chinese-red mb-6">Checkout</h1>
    <div class="d-flex justify-center">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 mx-10">
            <!-- Kolom Kiri: Form (80%) -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <!-- Delivery Information -->
                    <div class="mb-6">
                        <h2 class="text-lg font-bold mb-4 pb-2 border-b">Delivery Information</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">First Name</label>
                                <input
                                    type="text"
                                    wire:model.defer="firstName"
                                    class="w-full px-3 py-2 text-sm border rounded-lg
                                @error('firstName') border-red-500 @else border-gray-300 @enderror"
                                    placeholder="John">
                                @error('firstName')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Last Name</label>
                                <input
                                    type="text"
                                    wire:model.defer="lastName"
                                    class="w-full px-3 py-2 text-sm border rounded-lg
                                @error('lastName') border-red-500 @else border-gray-300 @enderror"
                                    placeholder="Doe">
                                @error('lastName')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Email</label>
                                <input
                                    type="email"
                                    wire:model.defer="email"
                                    class="w-full px-3 py-2 text-sm border rounded-lg
                                @error('email') border-red-500 @else border-gray-300 @enderror"
                                    placeholder="john@example.com">
                                @error('email')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Phone</label>
                                <div class="flex gap-2">
                                    <select wire:model="phoneCode" class="w-24 px-2 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                        <option value="+62">+62</option>
                                        <option value="+1">+1</option>
                                        <option value="+44">+44</option>
                                        <option value="+61">+61</option>
                                        <option value="+65">+65</option>
                                        <option value="+60">+60</option>
                                        <option value="+86">+86</option>
                                        <option value="+81">+81</option>
                                        <option value="+82">+82</option>
                                        <option value="+91">+91</option>
                                    </select>
                                    <input
                                        type="text"
                                        wire:model.defer="phone"
                                        class="flex-1 px-3 py-2 text-sm border rounded-lg
                                    @error('phone') border-red-500 @else border-gray-300 @enderror"
                                        placeholder="812345678">
                                </div>
                                @error('phone')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-medium mb-2">Order Type</label>
                            <div class="flex gap-4">
                                <label class="flex items-center">
                                    <input type="radio" wire:model="orderType" value="delivery" class="mr-2">
                                    <span class="text-sm">Delivery</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" wire:model="orderType" value="pickup" class="mr-2">
                                    <span class="text-sm">Pickup</span>
                                </label>
                            </div>
                        </div>

                        @if($orderType === 'delivery')
                        <div class="mt-4">
                            <label class="block text-sm font-medium mb-1">Delivery Address</label>
                            @if($orderType === 'delivery')
                            <textarea
                                wire:model.defer="address"
                                rows="2"
                                class="w-full px-3 py-2 text-sm border rounded-lg
                            @error('address') border-red-500 @else border-gray-300 @enderror"
                                placeholder="Jl. Example No. 123"></textarea>

                            @error('address')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                        @endif

                        <div class="mt-4">
                            <label class="block text-sm font-medium mb-1">Special Instructions (Optional)</label>
                            <textarea wire:model="instructions" placeholder="Extra spicy, no MSG, etc." class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" rows="2"></textarea>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div>
                        <h2 class="text-lg font-bold mb-4 pb-2 border-b">Payment Method</h2>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="radio" wire:model="payment" value="cash" class="mr-3">
                                <div class="flex items-center">
                                    <i class="fas fa-money-bill-wave text-green-600 mr-2"></i>
                                    <span class="text-sm font-medium">Cash on Delivery</span>
                                </div>
                            </label>
                            <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="radio" wire:model="payment" value="card" class="mr-3">
                                <div class="flex items-center">
                                    <i class="fas fa-credit-card text-blue-600 mr-2"></i>
                                    <span class="text-sm font-medium">Credit/Debit Card</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Order Summary (20%) -->
            <div class="lg:col-span-2">
                <div class="bg-white p-4 rounded-lg shadow-md sticky top-4">
                    <h2 class="text-base font-bold mb-3">Order Summary</h2>

                    <div class="space-y-2 mb-3 max-h-48 overflow-y-auto">
                        @foreach($cart as $item)
                        <div class="flex justify-between text-xs">
                            <span class="truncate mr-2">{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                            <span class="flex-shrink-0">Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-t pt-3 space-y-1 text-xs">
                        <div class="flex justify-between">
                            <span>Subtotal:</span>
                            <strong>Rp{{ number_format($subtotal, 0, ',', '.') }}</strong>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax:</span>
                            <strong>Rp{{ number_format($tax, 0, ',', '.') }}</strong>
                        </div>
                        @if($deliveryFee > 0)
                        <div class="flex justify-between">
                            <span>Delivery:</span>
                            <strong>Rp{{ number_format($deliveryFee, 0, ',', '.') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="border-t mt-3 pt-3 flex justify-between text-sm font-bold text-chinese-red">
                        <span>Total:</span>
                        <strong>Rp{{ number_format($total, 0, ',', '.') }}</strong>
                    </div>

                    <button
                        wire:click="placeOrder"
                        wire:loading.attr="disabled"
                        wire:target="placeOrder"
                        class="w-full mt-3 px-4 py-2 text-sm bg-red-500 text-white rounded-lg
                         hover:bg-red-600 font-medium transition
                        disabled:opacity-50 disabled:cursor-not-allowed">
                        <span wire:loading.remove wire:target="placeOrder">
                            Place Order
                        </span>
                        <span wire:loading wire:target="placeOrder">
                            Processing...
                        </span>
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>