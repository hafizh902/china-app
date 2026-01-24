<div class="w-full bg-[#fdfcf8] min-h-screen pb-20 font-sans overflow-x-hidden">
    
    <div class="max-w-6xl mx-auto px-4 pt-10 mb-6 md:mb-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-200 pb-8">
            <div>
                <h1 class="font-serif font-black text-3xl md:text-5xl text-stone-800 tracking-tight">
                    <?php echo e(__('language.reservation')); ?>

                </h1>
                <p class="text-stone-500 uppercase tracking-[0.2em] md:tracking-[0.3em] text-[9px] md:text-[10px] font-bold mt-3">
                    <?php echo e(__('language.dragon_kitchen_experience')); ?>

                </p>
            </div>

            
            <div class="flex items-center gap-2 md:gap-4 bg-white p-3 rounded-2xl shadow-sm border border-stone-100">
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-full <?php echo e($step == 1 ? 'bg-red-700 text-white shadow-lg shadow-red-200' : 'bg-green-500 text-white'); ?> flex items-center justify-center text-xs font-bold transition-all">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step > 1): ?> <i class="fas fa-check text-[10px]"></i> <?php else: ?> 1 <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </span>
                    <span class="text-[10px] font-black uppercase tracking-widest <?php echo e($step == 1 ? 'text-red-700' : 'text-stone-400'); ?>">
                        <?php echo e(__('language.select_table')); ?>

                    </span>
                </div>
                <div class="w-6 md:w-10 h-[1px] bg-stone-200"></div>
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-full <?php echo e($step == 2 ? 'bg-red-700 text-white shadow-lg shadow-red-200' : 'bg-stone-100 text-stone-400'); ?> flex items-center justify-center text-xs font-bold transition-all">
                        2
                    </span>
                    <span class="text-[10px] font-black uppercase tracking-widest <?php echo e($step == 2 ? 'text-red-700' : 'text-stone-400'); ?>">
                        <?php echo e(__('language.payment')); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step == 1): ?>
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:grid lg:grid-cols-12 gap-8 md:gap-12">

                
                <div class="lg:col-span-4 order-1 lg:order-2">
                    <div class="lg:sticky lg:top-10 space-y-6">
                        <div class="bg-stone-900 text-white p-8 rounded-[2.5rem] shadow-2xl relative overflow-hidden">
                            
                            <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>

                            <h3 class="relative z-10 text-[10px] font-black uppercase tracking-[0.3em] text-amber-400 mb-8 flex items-center gap-2">
                                <span class="w-4 h-[1px] bg-amber-400"></span>
                                <?php echo e(__('language.reservation_info')); ?>

                            </h3>

                            <div class="relative z-10 space-y-6">
                                <div class="space-y-3">
                                    <label class="text-[10px] text-stone-400 font-bold uppercase tracking-widest ml-1"><?php echo e(__('language.select_date')); ?></label>
                                    <div class="relative group">
                                        <i class="far fa-calendar absolute left-5 top-1/2 -translate-y-1/2 text-amber-500 group-focus-within:text-red-500 transition-colors"></i>
                                        <input type="date" wire:model.live="booking_date"
                                            class="w-full bg-stone-800 border-none rounded-2xl text-sm py-4 pl-12 pr-5 focus:ring-2 focus:ring-red-700 text-white font-bold cursor-pointer transition-all">
                                    </div>
                                </div>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedTable && $selectedTime): ?>
                                    <div class="p-6 bg-stone-800/80 border border-white/10 rounded-2xl animate-fade-in ring-1 ring-amber-500/30">
                                        <div class="flex justify-between items-center mb-4 pb-4 border-b border-white/5">
                                            <span class="text-xs text-stone-400 uppercase tracking-tighter"><?php echo e(__('language.selected_table')); ?></span>
                                            <span class="text-sm font-black text-amber-400">MEJA #<?php echo e($tables->where('id', $selectedTable)->first()->number ?? ''); ?></span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs text-stone-400 uppercase tracking-tighter"><?php echo e(__('language.arrival_time')); ?></span>
                                            <span class="text-sm font-black text-amber-400"><?php echo e($selectedTime); ?></span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="p-6 border-2 border-dashed border-stone-700 rounded-2xl text-center">
                                        <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest leading-loose">
                                            <?php echo e(__('language.select_table_time')); ?>

                                        </p>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <button wire:click="confirmReservation" <?php if(!$selectedTable || !$selectedTime): echo 'disabled'; endif; ?>
                                    class="w-full py-5 rounded-2xl font-black uppercase tracking-[0.2em] text-[11px] transition-all
                                    <?php echo e(!$selectedTable || !$selectedTime ? 'bg-stone-800 text-stone-600 cursor-not-allowed' : 'bg-red-700 hover:bg-red-600 text-white shadow-xl shadow-red-900/40 active:scale-95'); ?>">
                                    <?php echo e(__('language.confirm_booking')); ?>

                                </button>
                            </div>
                        </div>

                        
                        <div class="bg-amber-50/50 p-6 rounded-[2rem] border border-amber-100 flex items-center justify-between group">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center group-hover:bg-amber-700 group-hover:text-white transition-all">
                                    <i class="fab fa-whatsapp text-lg"></i>
                                </div>
                                <div>
                                    <p class="text-[9px] font-black text-stone-800 uppercase tracking-widest">Butuh Bantuan?</p>
                                    <p class="text-[10px] text-stone-500 font-bold">Hubungi Admin Kami</p>
                                </div>
                            </div>
                            <a href="https://wa.me/<?php echo e(\App\Models\SystemConfig::get('footer_phone')[0]['footer_phone'] ?? ''); ?>" target="_blank" class="w-8 h-8 rounded-full bg-stone-900 text-white flex items-center justify-center hover:scale-110 transition-transform">
                                <i class="fas fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>

                
                <div class="lg:col-span-8 order-2 lg:order-1 bg-white rounded-[2.5rem] md:rounded-[3.5rem] shadow-sm border border-stone-200 p-6 md:p-12 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-12 opacity-[0.04] pointer-events-none">
                        <i class="fas fa-dragon text-[15rem]"></i>
                    </div>

                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
                        <h2 class="font-serif font-bold text-2xl text-stone-800 italic flex items-center gap-3">
                            <?php echo e(__('language.restaurant_layout')); ?>

                            <span class="h-[1px] w-12 bg-stone-200"></span>
                        </h2>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 bg-red-700 rounded-full"></span>
                                <span class="text-[9px] font-bold uppercase text-stone-400">Selected</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 bg-stone-200 rounded-full"></span>
                                <span class="text-[9px] font-bold uppercase text-stone-400">Sold Out</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 md:gap-8">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="group relative bg-stone-50 rounded-[2rem] p-6 border-2 transition-all duration-500 <?php echo e($selectedTable == $table->id ? 'border-red-700 shadow-xl ring-4 ring-red-50 bg-white' : 'border-transparent hover:border-amber-200 hover:bg-white'); ?>">
                                
                                <div class="flex justify-between items-start mb-6">
                                    <div class="w-14 h-14 rounded-2xl <?php echo e($selectedTable == $table->id ? 'bg-red-700 text-white' : 'bg-white text-stone-800 shadow-sm'); ?> flex items-center justify-center transition-all duration-500">
                                        <div class="text-center">
                                            <span class="block text-[10px] uppercase font-black opacity-60"><?php echo e(__('language.table')); ?></span>
                                            <span class="text-xl font-black leading-none"><?php echo e($table->number); ?></span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-end gap-1">
                                        <span class="px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-[10px] font-black uppercase tracking-tighter shadow-sm">
                                            <?php echo e($table->capacity); ?> <?php echo e(__('language.pax')); ?>

                                        </span>
                                        <p class="text-[8px] font-bold text-stone-400 uppercase tracking-widest mt-1">Ready to serve</p>
                                    </div>
                                </div>

                                
                                <div class="grid grid-cols-3 md:grid-cols-2 gap-2">
                                    <?php $availableTimes = $this->availableTimes->get($table->id, []); ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['10:00', '12:00', '14:00', '16:00', '18:00', '20:00']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $isAvailable = in_array($time, $availableTimes);
                                            $isSelected = $selectedTable == $table->id && $selectedTime == $time;
                                        ?>
                                        <button
                                            wire:click="selectTableAndTime(<?php echo e($table->id); ?>, '<?php echo e($time); ?>')"
                                            <?php if(!$isAvailable): echo 'disabled'; endif; ?>
                                            class="py-3 px-1 text-[11px] font-black rounded-xl border-2 transition-all uppercase tracking-tighter
                                                <?php echo e($isSelected
                                                    ? 'bg-red-700 text-white border-red-700 shadow-lg scale-105 z-10'
                                                    : ($isAvailable
                                                        ? 'bg-white text-stone-600 border-stone-100 hover:border-red-700 hover:text-red-700 shadow-sm'
                                                        : 'bg-stone-200 text-stone-400 border-transparent cursor-not-allowed opacity-40')); ?>">
                                            <?php echo e($time); ?>

                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        
        <div class="max-w-2xl mx-auto pt-6 px-4" x-data="{ timer: 900 }" x-init="setInterval(() => { if (timer > 0) timer-- }, 1000)">
            <div class="bg-white rounded-[3rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.1)] border border-stone-200 overflow-hidden">
                
                
                <div class="bg-red-800 p-10 text-center relative">
                    <div class="absolute inset-0 opacity-10 pointer-events-none flex items-center justify-center overflow-hidden">
                        <i class="fas fa-dragon text-9xl -rotate-12 translate-x-20"></i>
                    </div>
                    <h2 class="text-white font-serif font-bold text-3xl tracking-widest uppercase italic relative z-10">
                        <?php echo e(__('language.deposit_validation')); ?>

                    </h2>
                    <p class="text-red-200 text-[10px] font-bold uppercase tracking-[0.4em] mt-3 opacity-80 relative z-10">
                        The Dragon Kitchen • Authentic Experience
                    </p>
                </div>

                <div class="p-8 md:p-12">
                    
                    <div class="flex items-center justify-between mb-10 bg-stone-50 p-6 rounded-[2rem] border border-stone-100 shadow-inner">
                        <div>
                            <p class="text-[10px] text-stone-400 uppercase font-black tracking-[0.2em] mb-1">
                                <?php echo e(__('language.remaining_payment_time')); ?>

                            </p>
                            <p class="text-4xl font-mono font-black text-red-700 tracking-tighter"
                                x-text="Math.floor(timer/60) + ':' + (timer%60).toString().padStart(2, '0')">
                            </p>
                        </div>
                        <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center shadow-sm">
                            <i class="fas fa-hourglass-half text-2xl text-amber-500 animate-pulse"></i>
                        </div>
                    </div>

                    
                    <div class="space-y-4 mb-10">
                        <label class="text-[10px] text-stone-400 font-black uppercase tracking-widest ml-1">
                            <?php echo e(__('language.transfer_instructions')); ?>

                        </label>
                        <div class="bg-stone-900 rounded-[2.5rem] p-8 text-white relative group overflow-hidden shadow-2xl">
                            <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:rotate-12 transition-transform duration-700">
                                <i class="fas fa-university text-7xl text-white"></i>
                            </div>
                            <div class="relative z-10">
                                <div class="flex items-center gap-3 mb-6">
                                    <span class="px-3 py-1 bg-amber-500 text-stone-900 text-[10px] font-black rounded-lg">BCA</span>
                                    <p class="text-[10px] text-amber-400 font-black uppercase tracking-widest">Bank Central Asia</p>
                                </div>
                                <div class="flex items-center gap-4 mb-3">
                                    <p class="text-3xl md:text-4xl font-mono font-black tracking-[0.1em] text-white" id="account-number">121 333 4444</p>
                                    <button onclick="navigator.clipboard.writeText('1213334444'); alert('Copied!')"
                                        class="w-10 h-10 rounded-full bg-white/10 hover:bg-amber-500 hover:text-stone-900 flex items-center justify-center transition-all">
                                        <i class="fas fa-copy text-sm"></i>
                                    </button>
                                </div>
                                <p class="text-sm text-stone-400 font-serif italic tracking-wide">a/n The Dragon Kitchen Indonesia</p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex justify-between items-center bg-red-50 p-8 rounded-[2rem] mb-10 border border-red-100 group">
                        <div>
                            <span class="text-[10px] font-black text-stone-500 uppercase tracking-widest block mb-1">
                                <?php echo e(__('language.total_deposit')); ?>

                            </span>
                            <span class="text-3xl font-black text-red-700 tracking-tighter">Rp200.000</span>
                        </div>
                        <div class="text-right">
                            <span class="text-[10px] font-bold text-red-400 italic block">Secure Transaction</span>
                            <div class="flex gap-1 mt-1 justify-end">
                                <i class="fas fa-shield-alt text-red-700 text-xs"></i>
                                <i class="fas fa-lock text-red-700 text-xs"></i>
                            </div>
                        </div>
                    </div>

                    
                    <div class="grid grid-cols-1 gap-4">
                        <a href="https://wa.me/<?php echo e(\App\Models\SystemConfig::get('footer_phone')[0]['footer_phone'] ?? ''); ?>?text=Halo%20Admin,%20Saya%20ingin%20mengirimkan%20bukti%20pembayaran%20reservasi."
                           target="_blank"
                           class="w-full bg-stone-900 hover:bg-black text-white py-6 rounded-[1.5rem] font-black uppercase text-[11px] tracking-[0.2em] transition-all shadow-xl shadow-stone-900/20 active:scale-95 flex items-center justify-center gap-4 group">
                            <i class="fas fa-cloud-upload-alt text-xl text-amber-500 group-hover:animate-bounce"></i>
                            <?php echo e(__('language.upload_payment_proof')); ?>

                        </a>
                        
                        <div class="mt-6 flex flex-col items-center gap-3">
                            <p class="text-center text-[10px] text-stone-400 font-bold uppercase tracking-tight max-w-[80%] leading-relaxed">
                                <?php echo e(__('language.deposit_notice')); ?>

                            </p>
                            <div class="h-1 w-12 bg-stone-100 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        
        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }
    </style>
</div><?php /**PATH D:\laragon\www\china-app\resources\views/livewire/Pages/reservation-page.blade.php ENDPATH**/ ?>