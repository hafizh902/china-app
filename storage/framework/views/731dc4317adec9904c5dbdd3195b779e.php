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

    <div class="max-w-5xl mx-auto px-4 space-y-10 pb-20">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div
                class="group bg-white rounded-[2.5rem] border border-stone-100 shadow-sm hover:shadow-2xl hover:shadow-red-900/5 transition-all duration-500 overflow-hidden">

                
                <div
                    class="flex flex-wrap justify-between items-center bg-[#fdfcf8] px-8 py-6 border-b border-stone-100/60">
                    <div class="flex flex-wrap gap-8 items-center">
                        <div>
                            <p class="text-[9px] text-stone-400 uppercase font-black tracking-[0.2em] mb-1.5">Waktu
                                Transaksi</p>
                            <div class="flex items-center gap-2">
                                <i class="far fa-calendar text-red-700 text-xs"></i>
                                <p class="font-serif font-bold text-stone-800 italic leading-none">
                                    <?php echo e($order->created_at->format('d M, Y')); ?></p>
                            </div>
                        </div>

                        <div class="h-8 w-[1px] bg-stone-200 hidden md:block"></div>

                        <div>
                            <p class="text-[9px] text-stone-400 uppercase font-black tracking-[0.2em] mb-1.5">Total
                                Bayar</p>
                            <p class="text-lg font-black text-red-700 tracking-tighter">
                                Rp<?php echo e(number_format($order->total, 0, ',', '.')); ?></p>
                        </div>

                        <div class="hidden sm:block">
                            <p class="text-[9px] text-stone-400 uppercase font-black tracking-[0.2em] mb-1.5">ID
                                Transaksi</p>
                            <p
                                class="font-mono text-[11px] font-bold text-stone-500 bg-stone-200/50 px-2 py-1 rounded-md">
                                #<?php echo e($order->order_number); ?></p>
                        </div>
                    </div>

                    
                    <div class="mt-4 sm:mt-0 relative group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="relative px-5 py-2 border-2 rotate-[-3deg] font-serif font-black uppercase tracking-widest text-[10px]
                        <?php echo e($order->status === 'completed' ? 'border-green-600/40 text-green-700 bg-green-50/30' : ''); ?>

                        <?php echo e($order->status === 'pending' || $order->status === 'preparing' ? 'border-amber-500/40 text-amber-600 bg-amber-50/30' : ''); ?>

                        <?php echo e($order->status === 'cancelled' ? 'border-red-600/40 text-red-700 bg-red-50/30' : ''); ?>">
                            <?php echo e($order->status); ?>

                            
                            <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-white border border-inherit"></div>
                            <div class="absolute -bottom-1 -left-1 w-1.5 h-1.5 bg-white border border-inherit"></div>
                        </div>
                    </div>
                </div>

                
                <div class="px-8 py-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between group/item p-2 rounded-2xl transition-all">
                                <div class="flex items-center gap-4">
                                    
                                    <div
                                        class="w-16 h-16 bg-stone-100 rounded-2xl flex-shrink-0 border border-stone-100 overflow-hidden relative">
                                        <img src="<?php echo e($item['imageUrl']); ?>" 
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover/item:scale-110"
                                            alt="<?php echo e($item->menu_name); ?>">
                                        <div class="absolute inset-0 bg-stone-900/5"></div>
                                    </div>

                                    <div>
                                        <h4 class="font-serif font-bold text-stone-800 text-sm leading-tight">
                                            <?php echo e($item->menu_name); ?></h4>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span
                                                class="text-[10px] font-black text-red-700 bg-red-50 px-2 py-0.5 rounded-full"><?php echo e($item->quantity); ?>x</span>
                                            <span
                                                class="text-[10px] text-stone-400 uppercase tracking-widest">Porsi</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <p class="text-sm font-black text-stone-800 tracking-tight">
                                        Rp<?php echo e(number_format($item->subtotal, 0, ',', '.')); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div
                        class="mt-10 pt-6 border-t border-stone-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <p class="text-[10px] text-stone-400 font-medium italic"></p>

                        <button wire:click="viewInvoice(<?php echo e($order->id); ?>)"
                            class="flex items-center gap-3 px-6 py-3 bg-stone-900 hover:bg-red-700 text-white rounded-xl transition-all duration-300 shadow-lg shadow-stone-900/10 active:scale-95 group/btn">
                            <i class="fas fa-receipt text-amber-400 group-hover/btn:rotate-12 transition-transform"></i>
                            <span class="text-[10px] font-black uppercase tracking-[0.2em]">Nota Digital</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
            <div class="py-32 text-center animate-fade-in">
                <div class="relative inline-block mb-8">
                    <div class="absolute inset-0 bg-red-100 rounded-full blur-2xl opacity-50 scale-150"></div>
                    <div
                        class="relative w-28 h-28 bg-white shadow-xl rounded-full flex items-center justify-center border border-stone-100">
                        <i class="fas fa-scroll text-4xl text-stone-200"></i>
                    </div>
                </div>
                <h3 class="font-serif text-2xl text-stone-800 font-bold mb-2 italic">Belum Ada Jejak Kuliner</h3>
                <p class="text-stone-400 text-sm max-w-xs mx-auto mb-8 font-medium">Sepertinya Anda belum memesan
                    hidangan spesial dari dapur kami.</p>

                <a wire:navigate href="/menu"
                    class="inline-flex items-center gap-3 bg-red-700 hover:bg-red-800 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-xl shadow-red-900/20 transition-all active:scale-95">
                    <i class="fas fa-utensils"></i>
                    Jelajahi Menu
                </a>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showModal && $selectedOrder): ?>
        <div class="fixed inset-0 z-[150] flex items-center justify-center p-4">
            
            <div class="fixed inset-0 bg-stone-900/80 backdrop-blur-md" wire:click="closeModal"></div>

            
            <div
                class="relative w-full max-w-2xl max-h-[90vh] overflow-y-auto bg-white shadow-2xl rounded-sm animate-zoom-in">

                
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
                                <h1 class="text-2xl font-serif font-black tracking-tighter text-stone-800 uppercase">金龍閣
                                </h1>
                            </div>
                            <p class="text-xs text-stone-500 italic">Imperial Dining & Banquet Hall</p>
                            <p class="text-[10px] text-stone-400 mt-1 uppercase tracking-widest">Lt. 88, Golden Dragon
                                Tower, Balikpapan</p>
                        </div>
                        <div class="text-right">
                            <h2 class="text-xl font-serif font-bold text-red-800 uppercase tracking-widest">Nota
                                Pembayaran</h2>
                            <p class="text-xs font-mono text-stone-500 mt-1">#<?php echo e($selectedOrder->order_number); ?></p>
                        </div>
                    </div>

                    
                    <div class="grid grid-cols-2 gap-8 py-8 text-sm relative z-10">
                        <div>
                            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-2">Ditujukan
                                Untuk:</p>
                            <p class="font-bold text-stone-800 text-base"><?php echo e(auth()->user()->name); ?></p>
                            <p class="text-stone-500 text-xs"><?php echo e(auth()->user()->email); ?></p>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-2">Waktu
                                Transaksi:</p>
                            <p class="font-bold text-stone-800"><?php echo e($selectedOrder->created_at->format('d F Y')); ?></p>
                            <p class="text-stone-500 text-xs italic"><?php echo e($selectedOrder->created_at->format('H:i T')); ?>

                            </p>
                        </div>
                    </div>

                    
                    <div class="relative z-10">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="border-y-2 border-stone-800 text-[10px] font-black uppercase tracking-widest text-stone-400">
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
                                            <p class="text-[10px] text-stone-400">@
                                                Rp<?php echo e(number_format($item->menu_price, 0, ',', '.')); ?></p>
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
                    <button onclick="window.print()"
                        class="bg-stone-900 text-white px-8 py-3 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-red-800 transition-all flex items-center gap-3">
                        <i class="fas fa-print"></i> Cetak Nota
                    </button>
                    <button wire:click="closeModal"
                        class="bg-white border border-stone-200 text-stone-600 px-8 py-3 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-stone-100 transition-all">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #invoice,
            #invoice * {
                visibility: visible;
            }

            #invoice {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                box-shadow: none;
            }

            .print\:hidden {
                display: none !important;
            }
        }

        .animate-zoom-in {
            animation: zoomIn 0.2s ease-out;
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</div>
<?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Pages/order-history-page.blade.php ENDPATH**/ ?>