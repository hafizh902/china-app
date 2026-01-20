<nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-100">
    <div class="w-full px-4 sm:px-6 lg:px-10">
        <div class="flex justify-between items-center h-16">
            <!-- Logo dan Brand -->
            <div class="flex items-center space-x-8">
                <a href="/" class="flex items-center space-x-3 group transition-transform active:scale-95">
                    
                    <div class="w-12 h-12 flex items-center justify-center overflow-hidden transition-all duration-300">

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($brand_logo) && $brand_logo): ?>
                            <img src="<?php echo e($brand_logo->temporaryUrl()); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            
                            <?php
                                $dbLogo = \App\Models\SystemConfig::value('brand_logo');
                            ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dbLogo): ?>
                                <img src="https://bbbvjqzpktarmsblmblv.supabase.co/storage/v1/object/public/chinaon/<?php echo e($dbLogo); ?>?v=<?php echo e(time()); ?>"
                                    class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-10 h-10 bg-red-700 rounded-xl flex items-center justify-center shadow-md">
                                    <i class="fas fa-bowl-food text-yellow-400 text-lg"></i>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-red-600 to-red-700 bg-clip-text text-transparent group-hover:from-red-500 group-hover:to-red-600 transition-all duration-300"
                        style="font-family: 'Noto Sans SC', sans-serif;">
                        <?php echo e(\App\Models\SystemConfig::value('brand_name') ?? '金龍閣'); ?>

                    </h1>
                </a>

                <!-- Menu navigasi utama -->
                <div class="hidden lg:flex space-x-1">
                    <a href="<?php echo e(route('home')); ?>"
                        class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg <?php echo e(request()->routeIs('home') ? 'text-red-600 bg-red-50' : ''); ?>">
                        <i class="fas fa-home mr-2"></i><?php echo e(__('language.home')); ?>

                    </a>
                    <a href="<?php echo e(route('menu')); ?>"
                        class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg <?php echo e(request()->routeIs('menu') ? 'text-red-600 bg-red-50' : ''); ?>">
                        <i class="fas fa-utensils mr-2"></i><?php echo e(__('language.menu')); ?>

                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('orders')); ?>"
                            class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg <?php echo e(request()->routeIs('orders') ? 'text-red-600 bg-red-50' : ''); ?>">
                            <i class="fas fa-shopping-bag mr-2"></i><?php echo e(__('language.orders')); ?>

                        </a>
                        <a href="<?php echo e(route('reservation')); ?>"
                            class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg <?php echo e(request()->routeIs('reservation') ? 'text-red-600 bg-red-50' : ''); ?>">
                            <i class="fas fa-calendar-check mr-2"></i><?php echo e(__('language.reservations')); ?>

                        </a>
                    <?php else: ?>
                        <button wire:click="openLoginModal" type="button"
                            class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg">
                            <i class="fas fa-shopping-bag mr-2"></i><?php echo e(__('language.orders')); ?>

                        </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->role === 'admin'): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>"
                                class="px-4 py-2 text-gray-700 hover:text-red-600 hover:bg-red-50 font-medium transition-all duration-200 rounded-lg <?php echo e(request()->routeIs('admin.*') ? 'text-red-600 bg-red-50' : ''); ?>">
                                <i class="fas fa-cog mr-2"></i><?php echo e(__('language.admin')); ?>

                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <!-- Bagian kanan navbar: Cart dan Authentication -->
            <div class="flex items-center space-x-4">

                <!-- Language Switcher -->
                <div class="flex items-center gap-1 font-medium">
                    <button type="button" wire:click="setLanguage('en')" wire:loading.disable
                        class="transition-colors
        <?php echo e(app()->getLocale() === 'en' ? 'text-red-600 font-semibold' : 'text-gray-700 hover:text-red-600'); ?>">
                        EN
                    </button>

                    <span class="text-gray-400">|</span>

                    <button type="button" wire:click="setLanguage('cn')" wire:loading.disable
                        class="transition-colors
        <?php echo e(app()->getLocale() === 'cn' ? 'text-red-600 font-semibold' : 'text-gray-700 hover:text-red-600'); ?>">
                        CN
                    </button>

                </div>
                <!-- Cart Component -->
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cart-component', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1005744803-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->role === 'admin'): ?>
                        <?php
                            // Hanya ambil pesanan yang benar-benar baru (status pending)
                            $newOrders = \App\Models\Order::where('status', 'preparing')->latest()->take(8)->get();
                            $notifCount = $newOrders->count();
                        ?>

                        <div class="relative" x-data="{ openNotifications: false }">
                            
                            <button @click="openNotifications = !openNotifications"
                                class="relative w-11 h-11 flex items-center justify-center text-stone-400 hover:text-red-700 transition-all bg-stone-50 rounded-2xl border border-stone-100 hover:shadow-sm active:scale-95">
                                <i class="fas fa-bell text-xl <?php echo e($notifCount > 0 ? 'animate-swing' : ''); ?>"></i>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($notifCount > 0): ?>
                                    
                                    <span class="absolute top-2 right-2 flex h-3 w-3">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span
                                            class="relative inline-flex rounded-full h-3 w-3 bg-red-600 border border-white"></span>
                                    </span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>

                            
                            <div x-show="openNotifications" @click.away="openNotifications = false" x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                class="absolute right-0 mt-3 w-80 bg-white rounded-[2rem] shadow-2xl border border-stone-100 overflow-hidden z-[9999]">

                                <div
                                    class="px-6 py-4 bg-gradient-to-r from-red-700 to-red-800 flex justify-between items-center border-b">
                                    <h3 class="text-xs font-black text-white uppercase tracking-widest">Orderan Masuk</h3>
                                    <span class="bg-white/20 text-white text-[10px] font-black px-2 py-0.5 rounded-full">
                                        <?php echo e($notifCount); ?> BARU
                                    </span>
                                </div>

                                <div class="max-h-[400px] overflow-y-auto">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <a href="<?php echo e(route('admin.orders')); ?>"
                                            class="flex items-start p-4 hover:bg-red-50/30 transition-colors border-b border-stone-50 group">
                                            
                                            <div
                                                class="w-10 h-10 rounded-xl flex-shrink-0 flex items-center justify-center mr-3 bg-red-50 text-red-600">
                                                <i class="fas fa-shopping-cart text-sm animate-pulse"></i>
                                            </div>

                                            <div class="flex-1">
                                                <div class="flex justify-between items-start">
                                                    <p class="text-[10px] font-black text-red-600 uppercase tracking-tight">
                                                        Order <?php echo e($order->order_number); ?></p>
                                                    <span class="text-[9px] font-bold text-stone-400">
                                                        <?php echo e($order->created_at->diffForHumans()); ?>

                                                    </span>
                                                </div>

                                                <div class="mt-1">
                                                    <p class="text-xs font-black text-stone-800">Ada orderan baru nih!</p>
                                                    <p class="text-[11px] text-stone-500 leading-tight">
                                                        Pelanggan <strong><?php echo e($order->customer_name); ?></strong> memesan
                                                        senilai <strong>Rp
                                                            <?php echo e(number_format($order->total, 0, ',', '.')); ?></strong>.
                                                    </p>
                                                </div>

                                                <div class="mt-2 text-right">
                                                    <span
                                                        class="text-[9px] font-black text-red-700 uppercase tracking-widest group-hover:underline">Proses
                                                        Sekarang →</span>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="p-12 text-center">
                                            <div
                                                class="w-16 h-16 bg-stone-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                                <i class="fas fa-mug-hot text-stone-200 text-2xl"></i>
                                            </div>
                                            <p
                                                class="text-[11px] font-black text-stone-400 uppercase tracking-widest leading-relaxed">
                                                Belum ada orderan baru<br>yang masuk</p>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <a href="<?php echo e(route('admin.orders')); ?>"
                                    class="block py-4 text-center bg-stone-50 hover:bg-stone-100 text-[10px] font-black text-stone-600 uppercase tracking-[0.2em] transition-all border-t border-stone-100">
                                    Buka Semua Orderan
                                </a>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <style>
                    @keyframes swing {
                        0% {
                            transform: rotate(0deg);
                        }

                        20% {
                            transform: rotate(15deg);
                        }

                        40% {
                            transform: rotate(-10deg);
                        }

                        60% {
                            transform: rotate(5deg);
                        }

                        80% {
                            transform: rotate(-5deg);
                        }

                        100% {
                            transform: rotate(0deg);
                        }
                    }

                    .animate-swing {
                        animation: swing 1s ease-in-out infinite;
                    }
                </style>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-3 px-4 py-2 bg-gray-50 hover:bg-gray-100 rounded-xl transition-all duration-200 border border-gray-200">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                            </div>
                            <i class="fas fa-chevron-down text-gray-400 text-sm transition-transform duration-200"
                                :class="{ 'rotate-180': open }"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="fixed right-4 top-16 w-56 bg-white rounded-xl shadow-2xl border border-gray-100 py-2 z-[9999]">
                            <!-- User Info Header -->
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white font-semibold">
                                        <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-800"><?php echo e(auth()->user()->name); ?></div>
                                        <div class="text-xs text-gray-500"><?php echo e(auth()->user()->email); ?></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="py-2">
                                <a href="<?php echo e(route('user.settings')); ?>"
                                    class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                    <i class="fas fa-user-cog mr-3 text-gray-400"></i>
                                    <span><?php echo e(__('language.settings')); ?></span>
                                </a>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->role === 'admin'): ?>
                                    <a href="<?php echo e(route('admin.dashboard')); ?>"
                                        class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                        <i class="fas fa-cog mr-3 text-gray-400"></i>
                                        <span><?php echo e(__('language.admin_panel')); ?></span>
                                    </a>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <hr class="my-2 border-gray-100">

                                <button type="button" wire:click="openLogoutModal"
                                    class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3"></i>
                                    <span><?php echo e(__('language.logout')); ?></span>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Login/Register Buttons -->
                    <div class="flex items-center space-x-3">
                        <button wire:click="openLoginModal"
                            class="px-4 py-2 text-gray-700 hover:text-red-600 font-medium transition-colors rounded-lg hover:bg-red-50">
                            <i class="fas fa-sign-in-alt mr-2"></i><?php echo e(__('language.login')); ?>

                        </button>
                        <button wire:click="openRegisterModal"
                            class="px-6 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-user-plus mr-2"></i><?php echo e(__('language.register')); ?>

                        </button>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>
        </div>
</nav>
<?php /**PATH D:\laragon\www\china-app\resources\views/livewire/navbar.blade.php ENDPATH**/ ?>