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
                                <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="John">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Last Name</label>
                                <input
                                    type="text"
                                    wire:model.defer="lastName"
                                    class="w-full px-3 py-2 text-sm border rounded-lg
                                <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Doe">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Email</label>
                                <input
                                    type="email"
                                    wire:model.defer="email"
                                    class="w-full px-3 py-2 text-sm border rounded-lg
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="john@example.com">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="812345678">
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orderType === 'delivery'): ?>
                        <div class="mt-4">
                            <label class="block text-sm font-medium mb-1">Delivery Address</label>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orderType === 'delivery'): ?>
                            <textarea
                                wire:model.defer="address"
                                rows="2"
                                class="w-full px-3 py-2 text-sm border rounded-lg
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Jl. Example No. 123"></textarea>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between text-xs">
                            <span class="truncate mr-2"><?php echo e($item['name']); ?> × <?php echo e($item['quantity']); ?></span>
                            <span class="flex-shrink-0">Rp<?php echo e(number_format($item['price'] * $item['quantity'], 0, ',', '.')); ?></span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="border-t pt-3 space-y-1 text-xs">
                        <div class="flex justify-between">
                            <span>Subtotal:</span>
                            <strong>Rp<?php echo e(number_format($subtotal, 0, ',', '.')); ?></strong>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax:</span>
                            <strong>Rp<?php echo e(number_format($tax, 0, ',', '.')); ?></strong>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deliveryFee > 0): ?>
                        <div class="flex justify-between">
                            <span>Delivery:</span>
                            <strong>Rp<?php echo e(number_format($deliveryFee, 0, ',', '.')); ?></strong>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="border-t mt-3 pt-3 flex justify-between text-sm font-bold text-chinese-red">
                        <span>Total:</span>
                        <strong>Rp<?php echo e(number_format($total, 0, ',', '.')); ?></strong>
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
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Pages/checkout-page.blade.php ENDPATH**/ ?>