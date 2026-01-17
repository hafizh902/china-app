<div class="w-full bg-[#fdfcf8] min-h-screen pb-20">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step == 1): ?>
        
        <div class="max-w-6xl mx-auto px-4 pt-10">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white rounded-[2.5rem] shadow-xl border border-amber-100 p-8">
                    <h2 class="font-serif font-bold text-2xl text-slate-800 mb-10">Denah Restoran</h2>
                    
                    <div class="grid grid-cols-3 sm:grid-cols-6 gap-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $isOccupied = in_array($table->id, $this->occupiedTables); ?>
                            <button wire:click="selectTable(<?php echo e($table->id); ?>)" 
                                <?php if($isOccupied): echo 'disabled'; endif; ?>
                                class="flex flex-col items-center gap-2 <?php echo e($isOccupied ? 'opacity-30' : ''); ?>">
                                <div class="w-16 h-16 rounded-full flex items-center justify-center border-2 transition-all
                                    <?php echo e($selectedTable == $table->id ? 'bg-red-700 border-amber-400 text-white scale-110 shadow-xl' : 'bg-amber-50 border-amber-100 text-amber-800'); ?>">
                                    <span class="text-xs font-bold"><?php echo e($table->number); ?></span>
                                </div>
                                <span class="text-[9px] uppercase font-bold text-stone-400"><?php echo e($table->capacity); ?> Pax</span>
                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                
                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-[2rem] shadow-lg border border-amber-100">
                        <input type="date" wire:model.live="booking_date" class="w-full mb-4 border-amber-100 rounded-xl">
                        <div class="grid grid-cols-2 gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['12:00', '18:00', '19:00', '20:00']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button wire:click="$set('booking_time', '<?php echo e($time); ?>')" 
                                    class="py-2 text-xs font-bold rounded-lg border <?php echo e($booking_time == $time ? 'bg-red-700 text-white' : 'bg-white'); ?>">
                                    <?php echo e($time); ?>

                                </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <button wire:click="confirmReservation" class="w-full mt-6 bg-red-700 text-white py-4 rounded-xl font-bold uppercase tracking-widest text-xs">
                            Booking Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        
        <div class="max-w-md mx-auto pt-20 px-4" x-data="{ timer: 900 }" x-init="setInterval(() => { if(timer > 0) timer-- }, 1000)">
            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-amber-100 overflow-hidden">
                <div class="bg-red-800 p-8 text-center">
                    <h2 class="text-white font-serif font-bold text-xl tracking-widest uppercase">Konfirmasi DP</h2>
                </div>
                <div class="p-8">
                    <div class="text-center mb-6">
                        <p class="text-xs text-stone-400 uppercase">Selesaikan Pembayaran Dalam</p>
                        <p class="text-3xl font-mono font-bold text-red-700" x-text="Math.floor(timer/60) + ':' + (timer%60).toString().padStart(2, '0')"></p>
                    </div>
                    
                    <div class="bg-amber-50 p-4 rounded-2xl mb-6">
                        <p class="text-xs text-amber-800 font-bold mb-2">Transfer ke Rekening BCA:</p>
                        <p class="text-xl font-mono font-bold text-stone-800">8820 1234 567</p>
                        <p class="text-[10px] text-amber-600 italic">a/n The Dragon Kitchen</p>
                    </div>

                    <div class="flex justify-between font-bold text-lg mb-8">
                        <span>Total Deposit:</span>
                        <span class="text-red-700">Rp200.000</span>
                    </div>

                    <button class="w-full bg-stone-900 text-white py-4 rounded-xl font-bold uppercase text-xs tracking-widest">
                        Kirim Bukti Bayar
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/Pages/reservation-page.blade.php ENDPATH**/ ?>