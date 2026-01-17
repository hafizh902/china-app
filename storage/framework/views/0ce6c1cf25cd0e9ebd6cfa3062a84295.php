<div class="bg-[#fdfcf8] min-h-screen pb-20">
    
    <div class="relative py-12 mb-10 bg-red-800 overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"30\" viewBox=\"0 0 60 30\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M0 15Q15 0 30 15Q45 30 60 15\" stroke=\"%23fff\" fill=\"none\"/></svg>');">
        </div>
        <div class="relative z-10 text-center">
            <h1 class="text-4xl font-serif font-black text-amber-400 tracking-[0.2em] uppercase">HISTORY ORDER</h1>
            <p class="text-red-100 italic mt-2 text-sm uppercase tracking-widest">
                Your Order History</p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 space-y-8">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div
                class="group bg-white rounded-[2rem] border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden">

                
                <div class="flex flex-wrap justify-between items-center bg-stone-50 px-8 py-5 border-b border-amber-50">
                    <div class="flex gap-8">
                        <div>
                            <p class="text-[10px] text-stone-400 uppercase font-bold tracking-widest mb-1">Tanggal Pesan
                            </p>
                            <p class="font-serif font-bold text-stone-800 italic">
                                <?php echo e($order->created_at->format('d M, Y')); ?>

                            </p>
                        </div>
                        <div>
                            <p class="text-[10px] text-stone-400 uppercase font-bold tracking-widest mb-1">Total</p>
                            <p class="font-bold text-red-700">
                                Rp<?php echo e(number_format($order->total, 0, ',', '.')); ?>

                            </p>
                        </div>
                        <div class="hidden sm:block">
                            <p class="text-[10px] text-stone-400 uppercase font-bold tracking-widest mb-1">ID Pesanan
                            </p>
                            <p class="font-mono text-xs font-bold text-stone-600">#<?php echo e($order->order_number); ?></p>
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-0">
                        
                        <div
                            class="relative inline-block px-4 py-2 border-2 rotate-[-2deg] font-serif font-bold uppercase tracking-tighter
                            <?php echo e($order->status === 'completed' ? 'border-green-600 text-green-600' : ''); ?>

                            <?php echo e($order->status === 'pending' || $order->status === 'preparing' ? 'border-amber-500 text-amber-500' : ''); ?>

                            <?php echo e($order->status === 'cancelled' ? 'border-red-600 text-red-600' : ''); ?>

                        ">
                            <span class="text-xs"><?php echo e($order->status); ?></span>
                            <div class="absolute -top-1 -right-1 w-2 h-2 bg-white border border-inherit"></div>
                        </div>
                    </div>
                </div>

                
                <div class="px-8 py-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="flex items-center gap-4 p-3 rounded-2xl hover:bg-amber-50/50 transition-colors border border-transparent hover:border-amber-100">
                                
                                <div
                                    class="w-16 h-16 bg-stone-100 rounded-xl flex-shrink-0 border border-stone-200 overflow-hidden">
                                    <img src="https://via.placeholder.com/100"
                                        class="w-full h-full object-cover opacity-80" alt="menu">
                                </div>

                                <div class="flex-1">
                                    <p class="font-serif font-bold text-stone-800 leading-tight"><?php echo e($item->menu_name); ?>

                                    </p>
                                    <p class="text-xs text-stone-400 mt-1 uppercase tracking-widest">Jumlah:
                                        <?php echo e($item->quantity); ?></p>
                                </div>

                                <div class="text-right">
                                    <p class="text-sm font-bold text-stone-700">
                                        Rp<?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                                    </p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div class="mt-8 pt-6 border-t border-dashed border-stone-200 flex justify-end">
                        <button
                            class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-red-700 hover:text-red-900 transition-colors">
                            <i class="fas fa-file-invoice"></i> Unduh Nota Digital
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="py-20 text-center">
                <div class="w-24 h-24 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-scroll text-3xl text-stone-300"></i>
                </div>
                <p class="font-serif italic text-stone-400 tracking-widest uppercase">
                    There are no traces of Orders recorded.</p>
                <a wire:navigate href="/menu"
                    class="inline-block mt-6 text-red-700 font-bold border-b-2 border-red-700 pb-1 hover:text-red-900">Mulai
                    Pesan Sekarang</a>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/Pages/order-history-page.blade.php ENDPATH**/ ?>