<div class="relative" x-data="{ openNotifications: false }">
    
    <button @click="openNotifications = !openNotifications"
        class="relative w-11 h-11 flex items-center justify-center text-stone-400 hover:text-red-700 transition-all bg-stone-50 rounded-2xl border border-stone-100 hover:shadow-sm active:scale-95">
        <i class="fas fa-bell text-xl <?php echo e($notifCount > 0 ? 'animate-swing' : ''); ?>"></i>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($notifCount > 0): ?>
            <span class="absolute top-2 right-2 flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-red-600 border border-white"></span>
            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </button>

    
    <div x-show="openNotifications" @click.away="openNotifications = false" x-cloak
        x-transition:enter="transition ease-out duration-200"
        class="absolute right-0 mt-3 w-80 bg-white rounded-[2rem] shadow-2xl border border-stone-100 overflow-hidden z-[9999]">

        <div class="px-6 py-4 bg-gradient-to-r from-stone-800 to-stone-900 flex justify-between items-center">
            <h3 class="text-xs font-black text-white uppercase tracking-widest">Riwayat Notifikasi</h3>
            <span class="bg-white/20 text-white text-[10px] font-black px-2 py-0.5 rounded-full">
                <?php echo e($notifCount); ?> Baru
            </span>
        </div>

        <div class="max-h-[400px] overflow-y-auto" wire:key="notifications-<?php echo e($refreshKey); ?>">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $allNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    // Jika tidak aktif, buat jadi abu-abu
                    $isMuted = !$item->is_active;
                ?>

                <div class="relative group">
                    <a href="<?php echo e($item->notif_type === 'order' ? route('admin.orders') : route('admin.reservations')); ?>"
                        class="flex items-start p-4 transition-colors border-b border-stone-50 group/item
                        <?php echo e($isMuted ? 'bg-stone-50/50 opacity-60 grayscale' : 'bg-white hover:bg-red-50/30'); ?>">

                        
                        <div class="w-10 h-10 rounded-xl flex-shrink-0 flex items-center justify-center mr-3
                            <?php echo e($item->notif_type === 'order' ? 'bg-red-50 text-red-600' : 'bg-amber-50 text-amber-600'); ?>">
                            <i class="fas <?php echo e($item->notif_type === 'order' ? 'fa-shopping-cart' : 'fa-calendar-alt'); ?> text-sm <?php echo e(!$isMuted ? 'animate-pulse' : ''); ?>"></i>
                        </div>

                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <p class="text-[9px] font-black uppercase tracking-tight <?php echo e($item->notif_type === 'order' ? 'text-red-600' : 'text-amber-600'); ?>">
                                    <?php echo e($item->notif_type); ?> <?php echo e($isMuted ? '(Selesai)' : ''); ?>

                                </p>
                                <span class="text-[9px] font-bold text-stone-400"><?php echo e($item->created_at->diffForHumans()); ?></span>
                            </div>
                            <div class="mt-1">
                                <p class="text-xs font-black text-stone-800">
                                    <?php echo e($item->notif_type === 'order' ? 'Order #'.$item->order_number : 'Meja '.$item->table_id); ?>

                                </p>
                                <p class="text-[10px] text-stone-500 leading-tight">
                                    <?php echo e($item->notif_type === 'order' ? 'Pelanggan: '.$item->customer_name : 'Tgl: '.$item->reservation_date); ?>

                                </p>
                            </div>
                        </div>
                    </a>

                    
                    <button @click.stop.prevent="$wire.deleteNotification('<?php echo e($item->notif_type); ?>', <?php echo e($item->id); ?>)"
                        class="absolute top-2 right-2 w-6 h-6 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-200 z-10 cursor-pointer">
                        <i class="fas fa-times text-[8px]"></i>
                    </button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="p-12 text-center text-stone-400">
                    <i class="fas fa-history text-2xl mb-2"></i>
                    <p class="text-[10px] font-black uppercase">Kosong</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <a href="<?php echo e(route('admin.notifications.all')); ?>" 
            class="block py-4 text-center bg-stone-100 hover:bg-stone-200 text-[10px] font-black text-stone-600 uppercase tracking-widest transition-all">
            Selengkapnya & Riwayat
        </a>
    </div>
</div><?php /**PATH D:\laragon\www\china-app\resources\views/livewire/admin-notification-bell.blade.php ENDPATH**/ ?>