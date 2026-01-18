<div class="bg-[#fdfcf8] min-h-screen pb-20">
    
    <div class="relative py-12 mb-10 bg-red-800 overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"30\" viewBox=\"0 0 60 30\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M0 15Q15 0 30 15Q45 30 60 15\" stroke=\"%23fff\" fill=\"none\"/></svg>');">
        </div>
        <div class="relative z-10 text-center">
            <h1 class="text-4xl font-serif font-black text-amber-400 tracking-[0.2em] uppercase">HISTORY ORDER</h1>
            <p class="text-red-100 italic mt-2 text-sm uppercase tracking-widest">Your Order History</p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 space-y-8">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="group bg-white rounded-[2rem] border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden">

                
                <div class="flex flex-wrap justify-between items-center bg-stone-50 px-8 py-5 border-b border-amber-50">
                    <div class="flex gap-8">
                        <div>
                            <p class="text-[10px] text-stone-400 uppercase font-bold tracking-widest mb-1">Tanggal Pesan</p>
                            <p class="font-serif font-bold text-stone-800 italic"><?php echo e($order->created_at->format('d M, Y')); ?></p>
                        </div>
                        <div>
                            <p class="text-[10px] text-stone-400 uppercase font-bold tracking-widest mb-1">Total</p>
                            <p class="font-bold text-red-700">Rp<?php echo e(number_format($order->total, 0, ',', '.')); ?></p>
                        </div>
                        <div class="hidden sm:block">
                            <p class="text-[10px] text-stone-400 uppercase font-bold tracking-widest mb-1">ID Pesanan</p>
                            <p class="font-mono text-xs font-bold text-stone-600">#<?php echo e($order->order_number); ?></p>
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-0">
                        <div class="relative inline-block px-4 py-2 border-2 rotate-[-2deg] font-serif font-bold uppercase tracking-tighter
                            <?php echo e($order->status === 'completed' ? 'border-green-600 text-green-600' : ''); ?>

                            <?php echo e($order->status === 'pending' || $order->status === 'preparing' ? 'border-amber-500 text-amber-500' : ''); ?>

                            <?php echo e($order->status === 'cancelled' ? 'border-red-600 text-red-600' : ''); ?>">
                            <span class="text-xs"><?php echo e($order->status); ?></span>
                            <div class="absolute -top-1 -right-1 w-2 h-2 bg-white border border-inherit"></div>
                        </div>
                    </div>
                </div>

                
                <div class="px-8 py-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center gap-4 p-3 rounded-2xl hover:bg-amber-50/50 transition-colors border border-transparent hover:border-amber-100">
                                <div class="w-16 h-16 bg-stone-100 rounded-xl flex-shrink-0 border border-stone-200 overflow-hidden">
                                    <img src="<?php echo e($item->menu_image_url ?? asset('images/default-dish.jpg')); ?>" 
                                         class="w-full h-full object-cover opacity-80" alt="<?php echo e($item->menu_name); ?>">
                                </div>
                                <div class="flex-1">
                                    <p class="font-serif font-bold text-stone-800 leading-tight"><?php echo e($item->menu_name); ?></p>
                                    <p class="text-xs text-stone-400 mt-1 uppercase tracking-widest">Jumlah: <?php echo e($item->quantity); ?></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-bold text-stone-700">Rp<?php echo e(number_format($item->subtotal, 0, ',', '.')); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="mt-8 pt-6 border-t border-dashed border-stone-200 flex justify-end">
                        <button wire:click="viewInvoice(<?php echo e($order->id); ?>)"
                            class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-red-700 hover:text-red-900 transition-colors cursor-pointer">
                            <i class="fas fa-file-invoice"></i> Lihat Nota Digital
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="py-20 text-center">
                <div class="w-24 h-24 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-scroll text-3xl text-stone-300"></i>
                </div>
                <p class="font-serif italic text-stone-400 tracking-widest uppercase">There are no traces of Orders recorded.</p>
                <a wire:navigate href="/menu" class="inline-block mt-6 text-red-700 font-bold border-b-2 border-red-700 pb-1 hover:text-red-900">Mulai Pesan Sekarang</a>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showModal && $selectedOrder): ?>
    <div class="fixed inset-0 z-[150] flex items-center justify-center p-4">
        
        <div class="fixed inset-0 bg-stone-900/80 backdrop-blur-md" wire:click="closeModal"></div>

        
        <div class="relative w-full max-w-2xl max-h-[90vh] overflow-y-auto bg-white shadow-2xl rounded-sm animate-zoom-in">
            
            
            <div class="p-8 bg-white border-t-8 border-red-800 relative" id="invoice">
                
                <div class="absolute inset-0 opacity-[0.03] pointer-events-none flex items-center justify-center">
                    <span class="text-[15rem] font-serif">福</span>
                </div>

                
                <div class="flex justify-between items-start border-b-2 border-stone-100 pb-8 relative z-10">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-8 h-8 bg-red-800 rounded flex items-center justify-center">
                                <span class="text-amber-400 font-serif font-bold text-xl">龍</span>
                            </div>
                            <h1 class="text-2xl font-serif font-black tracking-tighter text-stone-800 uppercase">金龍閣</h1>
                        </div>
                        <p class="text-xs text-stone-500 italic">Imperial Dining & Banquet Hall</p>
                        <p class="text-[10px] text-stone-400 mt-1 uppercase tracking-widest">Lt. 88, Golden Dragon Tower, Balikpapan</p>
                    </div>
                    <div class="text-right">
                        <h2 class="text-xl font-serif font-bold text-red-800 uppercase tracking-widest">Nota Pembayaran</h2>
                        <p class="text-xs font-mono text-stone-500 mt-1">#<?php echo e($selectedOrder->order_number); ?></p>
                    </div>
                </div>

                
                <div class="grid grid-cols-2 gap-8 py-8 text-sm relative z-10">
                    <div>
                        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-2">Ditujukan Untuk:</p>
                        <p class="font-bold text-stone-800 text-base"><?php echo e(auth()->user()->name); ?></p>
                        <p class="text-stone-500 text-xs"><?php echo e(auth()->user()->email); ?></p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-2">Waktu Transaksi:</p>
                        <p class="font-bold text-stone-800"><?php echo e($selectedOrder->created_at->format('d F Y')); ?></p>
                        <p class="text-stone-500 text-xs italic"><?php echo e($selectedOrder->created_at->format('H:i T')); ?></p>
                    </div>
                </div>

                
                <div class="relative z-10">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-y-2 border-stone-800 text-[10px] font-black uppercase tracking-widest text-stone-400">
                                <th class="py-4 px-2">Deskripsi Hidangan</th>
                                <th class="py-4 px-2 text-center">Jumlah</th>
                                <th class="py-4 px-2 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-stone-700">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $selectedOrder->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b border-stone-100">
                                    <td class="py-4 px-2">
                                        <p class="font-serif font-bold"><?php echo e($item->menu_name); ?></p>
                                        <p class="text-[10px] text-stone-400">@ Rp<?php echo e(number_format($item->price, 0, ',', '.')); ?></p>
                                    </td>
                                    <td class="py-4 px-2 text-center font-mono"><?php echo e($item->quantity); ?></td>
                                    <td class="py-4 px-2 text-right font-bold text-stone-900">
                                        Rp<?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="mt-8 flex justify-end relative z-10">
                    <div class="w-full max-w-[250px] space-y-3">
                        <div class="flex justify-between text-xs text-stone-500">
                            <span>Subtotal</span>
                            <span>Rp<?php echo e(number_format($selectedOrder->subtotal, 0, ',', '.')); ?></span>
                        </div>
                        <div class="flex justify-between text-xs text-stone-500">
                            <span>Pajak Restoran (10%)</span>
                            <span>Rp<?php echo e(number_format($selectedOrder->tax, 0, ',', '.')); ?></span>
                        </div>
                        <div class="pt-4 border-t-2 border-stone-800 flex justify-between items-end">
                            <span class="text-[10px] font-black uppercase text-red-800">Total Akhir</span>
                            <span class="text-2xl font-black text-stone-900 tracking-tighter">
                                Rp<?php echo e(number_format($selectedOrder->total, 0, ',', '.')); ?>

                            </span>
                        </div>
                    </div>
                </div>

                
                <div class="mt-12 h-2 w-full bg-stone-100 flex gap-1 overflow-hidden">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 30; $i++): ?>
                        <div class="h-full w-4 bg-red-800 rotate-45 transform -translate-y-1"></div>
                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="p-6 bg-stone-50 flex justify-center gap-4 print:hidden">
                <button onclick="window.print()" class="bg-stone-900 text-white px-8 py-3 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-red-800 transition-all flex items-center gap-3">
                    <i class="fas fa-print"></i> Cetak Nota
                </button>
                <button wire:click="closeModal" class="bg-white border border-stone-200 text-stone-600 px-8 py-3 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-stone-100 transition-all">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <style>
        @media print {
            body * { visibility: hidden; }
            #invoice, #invoice * { visibility: visible; }
            #invoice { position: absolute; left: 0; top: 0; width: 100%; box-shadow: none; }
            .print\:hidden { display: none !important; }
        }
        .animate-zoom-in {
            animation: zoomIn 0.2s ease-out;
        }
        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</div>
<?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/Pages/order-history-page.blade.php ENDPATH**/ ?>