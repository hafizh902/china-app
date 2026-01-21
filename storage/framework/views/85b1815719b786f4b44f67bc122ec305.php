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
            <a href="<?php echo e(route('home')); ?>" class="group flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-chinese-black hover:text-chinese-red transition-colors">
                <div class="w-8 h-8 rounded-full border border-stone-200 flex items-center justify-center group-hover:border-chinese-red transition-all">
                    <i class="fas fa-arrow-left"></i>
                </div>
                Kembali
            </a>
            
            <div class="flex items-center gap-4">
                
                <form action="" method="GET" class="flex items-center bg-white border border-stone-200 px-3 py-1 shadow-sm">
                    <label for="date" class="text-[9px] font-black uppercase text-stone-400 mr-3">Cari Riwayat:</label>
                    <input type="date" name="date" id="date"
                        value="<?php echo e(request('date', date('Y-m-d'))); ?>"
                        onchange="this.form.submit()"
                        class="text-[11px] font-bold text-chinese-black outline-none border-none bg-transparent cursor-pointer">
                    <button type="submit" class="ml-2 text-chinese-red hover:scale-110 transition-transform">
                        <i class="fas fa-search-calendar text-xs"></i>
                    </button>
                </form>

            </div>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-chinese-black p-6 flex flex-col justify-center relative overflow-hidden">
                <span class="absolute -right-2 -bottom-2 text-white opacity-10 text-4xl font-chinese">记录</span>
                <h1 class="text-xl font-black text-white uppercase tracking-tighter relative z-10">
                    Daily <span class="text-chinese-red">Logs</span>
                </h1>
                <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest mt-1 relative z-10">
                    <?php echo e(\Carbon\Carbon::parse(request('date', today()))->format('l, d F Y')); ?>

                </p>
            </div>
            
            <div class="bg-white border-b-4 border-chinese-red p-5 shadow-sm">
                <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest block">Total Order</span>
                <div class="mt-2 flex items-baseline gap-2">
                    <span class="text-3xl font-black text-chinese-black"><?php echo e($orders->count()); ?></span>
                    <span class="text-[9px] font-bold text-chinese-red uppercase tracking-tighter italic">Pada Tanggal Ini</span>
                </div>
            </div>

            <div class="bg-white border-b-4 border-chinese-gold p-5 shadow-sm">
                <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest block">Total Booking</span>
                <div class="mt-2 flex items-baseline gap-2">
                    <span class="text-3xl font-black text-chinese-black"><?php echo e($reservations->count()); ?></span>
                    <span class="text-[9px] font-bold text-chinese-gold uppercase tracking-tighter italic">Pada Tanggal Ini</span>
                </div>
            </div>
        </div>

        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-5 w-1 bg-chinese-red"></span>
                    <h2 class="text-sm font-black text-chinese-black uppercase tracking-widest">Orders Log</h2>
                </div>
                <div class="space-y-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="bg-white border border-stone-200 p-4 hover:border-chinese-red transition-all">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-4">
                                    <div class="text-center border-r border-stone-100 pr-4">
                                        <p class="text-[10px] font-black text-chinese-black"><?php echo e($order->created_at->format('H:i')); ?></p>
                                        <p class="text-[8px] font-bold text-stone-400 uppercase">Waktu</p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-black text-chinese-black uppercase tracking-tight">#<?php echo e($order->order_number); ?> — <?php echo e($order->customer_name); ?></p>
                                        <p class="text-[10px] font-bold text-chinese-red">Rp <?php echo e(number_format($order->total, 0, ',', '.')); ?></p>
                                    </div>
                                </div>
                                <span class="text-[8px] font-black px-2 py-1 bg-stone-100 uppercase italic"><?php echo e($order->status); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="border-2 border-dashed border-stone-200 p-10 text-center text-[10px] font-bold text-stone-300 uppercase italic">Tidak ada order pada tanggal ini</div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-5 w-1 bg-chinese-gold"></span>
                    <h2 class="text-sm font-black text-chinese-black uppercase tracking-widest">Table Log</h2>
                </div>
                <div class="space-y-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="bg-white border border-stone-200 p-4 hover:border-chinese-gold transition-all">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-4">
                                    <div class="w-8 h-8 rounded-full bg-stone-50 flex items-center justify-center border border-stone-100 font-black text-[10px]">
                                        <?php echo e($res->table_id); ?>

                                    </div>
                                    <div>
                                        <p class="text-[11px] font-black text-chinese-black uppercase tracking-tight"><?php echo e($res->user->name ?? 'Guest'); ?></p>
                                        <p class="text-[9px] font-bold text-stone-500 uppercase">Jam: <span class="text-chinese-gold"><?php echo e($res->reservation_time); ?></span></p>
                                    </div>
                                </div>
                                <span class="text-[8px] font-black px-2 py-1 bg-stone-100 uppercase italic"><?php echo e($res->status); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="border-2 border-dashed border-stone-200 p-10 text-center text-[10px] font-bold text-stone-300 uppercase italic">Tidak ada reservasi pada tanggal ini</div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\laragon\www\china-app\resources\views/livewire/Admin/notifications.blade.php ENDPATH**/ ?>