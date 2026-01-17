<div class="p-8 bg-stone-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <header class="mb-10 flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-serif font-bold text-stone-800 uppercase tracking-tighter">Monitoring Meja</h1>
                <p class="text-stone-500 text-sm italic">Status Restoran Hari Ini: <?php echo e(date('d M Y')); ?></p>
            </div>
            <div class="flex gap-4">
                <div class="bg-white px-4 py-2 rounded-lg shadow-sm border border-stone-200">
                    <span class="text-[10px] block uppercase font-bold text-stone-400">Total Reservasi</span>
                    <span class="text-xl font-bold text-red-700"><?php echo e($currentReservations->count()); ?></span>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-8 bg-white p-10 rounded-[2.5rem] shadow-sm border border-stone-200 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-10 opacity-5 text-9xl font-serif">監</div>
                
                <div class="grid grid-cols-4 sm:grid-cols-6 gap-10 relative z-10">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            $res = $currentReservations[$table->id] ?? null; 
                        ?>
                        
                        <button wire:click="$set('selectedReservation', <?php echo e($res ? $res->id : 'null'); ?>)"
                            class="flex flex-col items-center gap-3 transition-transform hover:scale-105">
                            <div class="w-20 h-20 rounded-full flex items-center justify-center border-4 relative
                                <?php echo e(!$res ? 'border-stone-100 bg-stone-50' : ($res->status == 'pending' ? 'border-amber-400 bg-amber-50 animate-pulse' : 'border-red-700 bg-red-50')); ?>">
                                
                                <span class="font-black text-lg <?php echo e(!$res ? 'text-stone-300' : 'text-stone-800'); ?>">
                                    <?php echo e($table->number); ?>

                                </span>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($res): ?>
                                    <div class="absolute -top-2 -right-2 w-6 h-6 rounded-full flex items-center justify-center shadow-lg
                                        <?php echo e($res->status == 'pending' ? 'bg-amber-500 text-white' : 'bg-green-500 text-white'); ?>">
                                        <i class="fas <?php echo e($res->status == 'pending' ? 'fa-clock' : 'fa-check'); ?> text-[10px]"></i>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-stone-400">
                                <?php echo e($res ? $res->user->name : 'Kosong'); ?>

                            </span>
                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="lg:col-span-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedReservation): ?>
                    <?php $detail = \App\Models\Reservation::find($selectedReservation); ?>
                    <div class="bg-stone-900 rounded-[2rem] p-8 text-white shadow-2xl sticky top-8 border-t-4 border-red-700">
                        <h3 class="font-serif text-xl font-bold text-amber-400 mb-6 uppercase tracking-widest">Detail Reservasi</h3>
                        
                        <div class="space-y-4 text-sm mb-10">
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Pemesan</span>
                                <span class="font-bold"><?php echo e($detail->user->name); ?></span>
                            </div>
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Meja</span>
                                <span class="font-bold text-amber-400">#<?php echo e($detail->table->number); ?> (<?php echo e($detail->table->position); ?>)</span>
                            </div>
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Waktu</span>
                                <span class="font-bold"><?php echo e($detail->reservation_time); ?></span>
                            </div>
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Status</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold <?php echo e($detail->status == 'pending' ? 'bg-amber-500' : 'bg-green-600'); ?>">
                                    <?php echo e(strtoupper($detail->status)); ?>

                                </span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($detail->status == 'pending'): ?>
                                <button wire:click="confirmPayment(<?php echo e($detail->id); ?>)" 
                                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl transition-all uppercase text-xs tracking-widest">
                                    Konfirmasi Pembayaran
                                </button>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <button wire:click="releaseTable(<?php echo e($detail->id); ?>)" 
                                class="w-full bg-red-700/20 hover:bg-red-700 text-red-500 hover:text-white border border-red-700/50 font-bold py-3 rounded-xl transition-all uppercase text-xs tracking-widest">
                                Batalkan & Bebaskan Meja
                            </button>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="h-full border-2 border-dashed border-stone-300 rounded-[2rem] flex flex-col items-center justify-center p-10 text-center opacity-40">
                        <i class="fas fa-mouse-pointer text-4xl mb-4"></i>
                        <p class="text-sm font-medium">Pilih meja yang terisi untuk melihat detail pesanan pelanggan</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/Admin/reservation-monitor.blade.php ENDPATH**/ ?>