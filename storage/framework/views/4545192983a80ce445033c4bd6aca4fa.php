<div class="min-h-screen bg-[#fcfaf7] p-4 md:p-8 font-sans">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'chinese-red': '#C41E3A',
                        'chinese-black': '#1A1A1A',
                        'chinese-gold': '#D4AF37',
                        'chinese-gold-light': '#F0D878',
                    },
                    fontFamily: {
                        'chinese': ['Noto Sans SC', 'sans-serif'],
                        'sans': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <div class="max-w-6xl mx-auto">
        
        
        <div class="flex justify-between items-center mb-6">
            <a href="javascript:history.back()" class="group flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-chinese-black hover:text-chinese-red transition-colors">
                <div class="w-8 h-8 rounded-full border border-stone-200 flex items-center justify-center group-hover:border-chinese-red transition-all">
                    <i class="fas fa-arrow-left"></i>
                </div>
                Kembali
            </a>
            <div class="h-[1px] flex-grow mx-6 bg-stone-200 hidden md:block"></div>
            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-[0.3em]">Administrator Portal</span>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-chinese-black p-6 flex flex-col justify-center relative overflow-hidden">
                
                <span class="absolute -right-2 -bottom-2 text-white opacity-10 text-4xl font-chinese">记录</span>
                <h1 class="text-xl font-black text-white uppercase tracking-tighter relative z-10">
                    Daily <span class="text-chinese-red">Logs</span>
                </h1>
                <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest mt-1 relative z-10">
                    <?php echo e(now()->format('l, d F Y')); ?>

                </p>
            </div>
            
            
            <div class="bg-white border-b-4 border-chinese-red p-5 shadow-sm">
                <div class="flex justify-between items-start">
                    <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Orders Today</span>
                    <i class="fas fa-utensils text-chinese-red opacity-20"></i>
                </div>
                <div class="mt-2 flex items-baseline gap-2">
                    <span class="text-3xl font-black text-chinese-black"><?php echo e($orders->where('created_at', '>=', today())->count()); ?></span>
                    <span class="text-[9px] font-bold text-chinese-red uppercase">Aktivitas</span>
                </div>
            </div>

            
            <div class="bg-white border-b-4 border-chinese-gold p-5 shadow-sm">
                <div class="flex justify-between items-start">
                    <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Bookings Today</span>
                    <i class="fas fa-calendar-day text-chinese-gold opacity-30"></i>
                </div>
                <div class="mt-2 flex items-baseline gap-2">
                    <span class="text-3xl font-black text-chinese-black"><?php echo e($reservations->where('created_at', '>=', today())->count()); ?></span>
                    <span class="text-[9px] font-bold text-chinese-gold uppercase">Meja</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-5 w-1 bg-chinese-red"></span>
                    <h2 class="text-sm font-black text-chinese-black uppercase tracking-widest">Order Notifications</h2>
                </div>
                
                <div class="space-y-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders->where('created_at', '>=', today()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php $isNew = $order->status === 'preparing'; ?>
                        <div class="bg-white group border border-stone-200 p-4 transition-all hover:border-chinese-red relative overflow-hidden <?php echo e(!$isNew ? 'opacity-50' : ''); ?>">
                            <div class="flex justify-between items-center relative z-10">
                                <div class="flex items-center gap-4">
                                    <div class="text-center border-r border-stone-100 pr-4">
                                        <p class="text-[10px] font-black text-chinese-black"><?php echo e($order->created_at->format('H:i')); ?></p>
                                        <p class="text-[8px] font-bold text-stone-400 uppercase">TIME</p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-black text-chinese-black uppercase tracking-tight">#<?php echo e($order->order_number); ?> — <?php echo e($order->customer_name); ?></p>
                                        <p class="text-[10px] font-bold text-chinese-red">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></p>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('admin.orders')); ?>" class="text-[9px] font-black bg-stone-100 px-3 py-2 group-hover:bg-chinese-red group-hover:text-white transition-colors uppercase">
                                    Detail
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="border-2 border-dashed border-stone-200 p-10 text-center">
                            <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest italic">Belum ada pesanan masuk hari ini</p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-5 w-1 bg-chinese-gold"></span>
                    <h2 class="text-sm font-black text-chinese-black uppercase tracking-widest">Reservation Logs</h2>
                </div>

                <div class="space-y-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $reservations->where('created_at', '>=', today()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php $isNew = $res->status === 'pending'; ?>
                        <div class="bg-white border border-stone-200 p-4 transition-all hover:border-chinese-gold flex justify-between items-center <?php echo e(!$isNew ? 'opacity-50' : ''); ?>">
                            <div class="flex items-center gap-4">
                                <div class="w-8 h-8 rounded-full bg-stone-50 flex items-center justify-center border border-stone-100">
                                    <i class="fas fa-chair text-[10px] <?php echo e($isNew ? 'text-chinese-gold' : 'text-stone-300'); ?>"></i>
                                </div>
                                <div>
                                    <p class="text-[11px] font-black text-chinese-black uppercase tracking-tight">Meja <?php echo e($res->table_id); ?> <span class="text-stone-400 font-medium">— <?php echo e($res->user->name ?? 'Guest'); ?></span></p>
                                    <p class="text-[9px] font-bold text-stone-500 uppercase">Sch: <span class="text-chinese-gold"><?php echo e($res->reservation_time); ?></span></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="text-[8px] font-black px-2 py-1 <?php echo e($isNew ? 'text-chinese-gold border border-chinese-gold' : 'text-stone-400 border border-stone-200'); ?> uppercase">
                                    <?php echo e($res->status); ?>

                                </span>
                                <a href="<?php echo e(route('admin.reservations')); ?>" class="text-stone-400 hover:text-chinese-black transition-colors">
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="border-2 border-dashed border-stone-200 p-10 text-center">
                            <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest italic">Tidak ada reservasi untuk hari ini</p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\laragon\www\china-app\resources\views/livewire/admin/notifications.blade.php ENDPATH**/ ?>