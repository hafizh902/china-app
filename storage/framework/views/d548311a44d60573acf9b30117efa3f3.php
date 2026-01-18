<div class="w-full bg-[#fdfcf8] min-h-screen pb-20 font-sans">
    
    <div class="max-w-6xl mx-auto px-4 pt-10 mb-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-stone-200 pb-6">
            <div>
                <h1 class="font-serif font-black text-4xl text-stone-800 tracking-tight"><?php echo e(__('language.reservation')); ?>

                </h1>
                <p class="text-stone-500 uppercase tracking-[0.3em] text-[10px] font-bold mt-2">
                    <?php echo e(__('language.dragon_kitchen_experience')); ?></p>
            </div>

            
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2">
                    <span
                        class="w-8 h-8 rounded-full <?php echo e($step == 1 ? 'bg-red-700 text-white' : 'bg-green-100 text-green-700'); ?> flex items-center justify-center text-xs font-bold shadow-sm">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step > 1): ?>
                            <i class="fas fa-check"></i>
                        <?php else: ?>
                            1
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </span>
                    <span
                        class="text-[10px] font-black uppercase tracking-widest <?php echo e($step == 1 ? 'text-red-700' : 'text-stone-400'); ?>"><?php echo e(__('language.select_table')); ?></span>
                </div>
                <div class="w-8 h-[2px] bg-stone-200"></div>
                <div class="flex items-center gap-2">
                    <span
                        class="w-8 h-8 rounded-full <?php echo e($step == 2 ? 'bg-red-700 text-white' : 'bg-stone-100 text-stone-400'); ?> flex items-center justify-center text-xs font-bold shadow-sm">2</span>
                    <span
                        class="text-[10px] font-black uppercase tracking-widest <?php echo e($step == 2 ? 'text-red-700' : 'text-stone-400'); ?>"><?php echo e(__('language.payment')); ?></span>
                </div>
            </div>
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step == 1): ?>
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid lg:grid-cols-12 gap-10">

                
                <div
                    class="lg:col-span-8 bg-white rounded-[3rem] shadow-sm border border-stone-200 p-10 relative overflow-hidden">
                    
                    <div class="absolute top-0 right-0 p-10 opacity-[0.03] pointer-events-none">
                        <i class="fas fa-dragon text-[15rem]"></i>
                    </div>

                    <div class="flex items-center justify-between mb-10">
                        <h2 class="font-serif font-bold text-2xl text-stone-800 italic">
                            <?php echo e(__('language.restaurant_layout')); ?></h2>
                        <div class="flex gap-4 text-[10px] font-bold uppercase tracking-widest">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="group relative bg-stone-50 rounded-[2rem] p-6 border-2 transition-all duration-300 <?php echo e($selectedTable == $table->id ? 'border-red-700 shadow-lg ring-4 ring-red-50' : 'border-transparent hover:border-amber-200 hover:bg-white'); ?>">

                                
                                <div class="flex justify-between items-start mb-6">
                                    <div
                                        class="w-14 h-14 rounded-2xl <?php echo e($selectedTable == $table->id ? 'bg-red-700 text-white' : 'bg-white text-stone-800 shadow-sm'); ?> flex items-center justify-center transition-colors">
                                        <div class="text-center">
                                            <span
                                                class="block text-[10px] uppercase font-black opacity-60"><?php echo e(__('language.table')); ?></span>
                                            <span class="text-lg font-black leading-none"><?php echo e($table->number); ?></span>
                                        </div>
                                    </div>
                                    <span
                                        class="px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-[10px] font-black uppercase tracking-tighter">
                                        <?php echo e($table->capacity); ?> <?php echo e(__('language.pax')); ?>

                                    </span>
                                </div>

                                
                                <div class="grid grid-cols-2 gap-2">
                                    <?php $availableTimes = $this->availableTimes->get($table->id, []); ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['10:00', '12:00', '14:00', '16:00', '18:00', '20:00']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $isAvailable = in_array($time, $availableTimes);
                                            $isSelected = $selectedTable == $table->id && $selectedTime == $time;
                                        ?>
                                        <button
                                            wire:click="selectTableAndTime(<?php echo e($table->id); ?>, '<?php echo e($time); ?>')"
                                            <?php if(!$isAvailable): echo 'disabled'; endif; ?>
                                            class="py-2.5 px-2 text-[11px] font-black rounded-xl border-2 transition-all uppercase tracking-tighter
                                                <?php echo e($isSelected
                                                    ? 'bg-red-700 text-white border-red-700 shadow-md'
                                                    : ($isAvailable
                                                        ? 'bg-white text-stone-600 border-stone-100 hover:border-red-700 hover:text-red-700 shadow-sm'
                                                        : 'bg-stone-200 text-stone-400 border-transparent cursor-not-allowed opacity-50')); ?>">
                                            <?php echo e($time); ?>

                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                
                <div class="lg:col-span-4">
                    <div class="sticky top-10 space-y-6">
                        <div class="bg-stone-900 text-white p-8 rounded-[2.5rem] shadow-2xl relative overflow-hidden">
                            
                            <div class="absolute inset-0 opacity-10 pointer-events-none"
                                style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');">
                            </div>

                            <h3
                                class="relative z-10 text-[10px] font-black uppercase tracking-[0.3em] text-amber-400 mb-6">
                                <?php echo e(__('language.reservation_info')); ?></h3>

                            <div class="relative z-10 space-y-6">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] text-stone-400 font-bold uppercase tracking-widest"><?php echo e(__('language.select_date')); ?></label>
                                    <input type="date" wire:model.live="booking_date"
                                        class="w-full bg-stone-800 border-none rounded-2xl text-sm py-4 px-5 focus:ring-2 focus:ring-red-700 text-white font-bold cursor-pointer">
                                </div>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedTable && $selectedTime): ?>
                                    <div class="p-6 bg-stone-800/50 border border-white/10 rounded-2xl animate-fade-in">
                                        <div
                                            class="flex justify-between items-center mb-4 pb-4 border-b border-white/5">
                                            <span
                                                class="text-xs text-stone-400"><?php echo e(__('language.selected_table')); ?></span>
                                            <span class="text-sm font-black text-amber-400">No.
                                                <?php echo e($tables->where('id', $selectedTable)->first()->number ?? ''); ?></span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span
                                                class="text-xs text-stone-400"><?php echo e(__('language.arrival_time')); ?></span>
                                            <span class="text-sm font-black text-amber-400"><?php echo e($selectedTime); ?></span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="p-8 border-2 border-dashed border-stone-700 rounded-2xl text-center">
                                        <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">
                                            <?php echo e(__('language.select_table_time')); ?></p>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <button wire:click="confirmReservation" <?php if(!$selectedTable || !$selectedTime): echo 'disabled'; endif; ?>
                                    class="w-full py-5 rounded-2xl font-black uppercase tracking-widest text-[11px] transition-all
                                    <?php echo e(!$selectedTable || !$selectedTime ? 'bg-stone-800 text-stone-600 cursor-not-allowed' : 'bg-red-700 hover:bg-red-600 text-white shadow-lg shadow-red-900/40 active:scale-95'); ?>">
                                    <?php echo e(__('language.confirm_booking')); ?>

                                </button>
                            </div>
                        </div>

                        
                        <div
                            class="group bg-gradient-to-br from-amber-50 to-white p-6 rounded-[2rem] border border-amber-100 shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex items-start gap-4">
                                
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-2xl bg-amber-100 flex items-center justify-center text-amber-700">
                                    <i class="fas fa-comment-dots text-lg"></i>
                                </div>

                                
                                <div class="flex-1">
                                    <h4 class="text-[10px] font-black text-amber-900 uppercase tracking-[0.2em] mb-1">
                                        <?php echo e(__('language.need_help')); ?>

                                    </h4>
                                    <p class="text-xs text-amber-800/70 leading-relaxed font-bold italic mb-4">
                                        <?php echo e(__('language.contact_whatsapp')); ?>

                                    </p>

                                    
                                    <a href="https://wa.me/<?php echo e(\App\Models\SystemConfig::get('footer_phone')[0]['footer_phone'] ?? ''); ?>"
                                        target="_blank"
                                        class="inline-flex items-center gap-3 px-4 py-2 bg-stone-900 hover:bg-[#25D366] text-white rounded-xl transition-all duration-300 shadow-lg shadow-stone-900/10 group/wa active:scale-95">
                                        <i
                                            class="fab fa-whatsapp text-base group-hover/wa:rotate-12 transition-transform"></i>
                                        <span class="text-[10px] font-black uppercase tracking-widest">Our Whatsapp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        
        <div class="max-w-xl mx-auto pt-10 px-4" x-data="{ timer: 900 }" x-init="setInterval(() => { if (timer > 0) timer-- }, 1000)">
            <div class="bg-white rounded-[3rem] shadow-2xl border border-stone-200 overflow-hidden">
                <div class="bg-red-800 p-10 text-center relative">
                    <div class="absolute inset-0 opacity-10 pointer-events-none">
                        <i class="fas fa-dragon text-6xl"></i>
                    </div>
                    <h2 class="text-white font-serif font-bold text-2xl tracking-widest uppercase italic relative z-10">
                        <?php echo e(__('language.deposit_validation')); ?></h2>
                    <p class="text-red-100 text-[10px] font-bold uppercase tracking-[0.3em] mt-2 opacity-70">
                        <?php echo e(__('language.brand_name')); ?></p>
                </div>

                <div class="p-10">
                    <div
                        class="flex items-center justify-between mb-10 bg-stone-50 p-6 rounded-3xl border border-stone-100">
                        <div>
                            <p class="text-[10px] text-stone-400 uppercase font-black tracking-[0.2em] mb-1">
                                <?php echo e(__('language.remaining_payment_time')); ?></p>
                            <p class="text-3xl font-mono font-black text-red-700 tracking-tighter"
                                x-text="Math.floor(timer/60) + ':' + (timer%60).toString().padStart(2, '0')"></p>
                        </div>
                        <i class="fas fa-history text-3xl text-stone-200"></i>
                    </div>

                    <div class="space-y-4 mb-10">
                        <label
                            class="text-[10px] text-stone-400 font-black uppercase tracking-widest ml-1"><?php echo e(__('language.transfer_instructions')); ?></label>
                        <div class="bg-stone-900 rounded-[2rem] p-8 text-white relative group overflow-hidden">
                            <div
                                class="absolute top-0 right-0 p-4 opacity-10 group-hover:rotate-12 transition-transform">
                                <i class="fas fa-university text-5xl text-white"></i>
                            </div>
                            <div class="relative z-10">
                                <p class="text-[10px] text-amber-400 font-black uppercase tracking-widest mb-4">Bank
                                    Central Asia (BCA)</p>
                                <div class="flex items-center gap-4 mb-2">
                                    <p class="text-2xl font-mono font-black tracking-widest text-white">121 333 4444</p>
                                    <button onclick="navigator.clipboard.writeText('1213334444')"
                                        class="text-xs text-stone-400 hover:text-white transition-colors">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <p class="text-xs text-stone-400 font-bold italic tracking-wide">a/n The Dragon Kitchen
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex justify-between items-center bg-red-50 p-6 rounded-2xl mb-10 border border-red-100">
                        <span
                            class="text-xs font-black text-stone-600 uppercase tracking-widest"><?php echo e(__('language.total_deposit')); ?></span>
                        <span class="text-2xl font-black text-red-700 tracking-tighter">Rp200.000</span>
                    </div>

                    <div class="grid grid-cols-1 gap-3">
                        <button
                            class="w-full bg-stone-900 hover:bg-black text-white py-5 rounded-2xl font-black uppercase text-[11px] tracking-[0.2em] transition-all shadow-xl shadow-stone-900/20 active:scale-95 flex items-center justify-center gap-3">
                            <a href="https://wa.me/<?php echo e(\App\Models\SystemConfig::get('footer_phone')[0]['footer_phone'] ?? ''); ?>"
                                target="_blank" class="flex items-center gap-3">
                                <i class="fas fa-cloud-upload-alt text-lg"></i>
                                <?php echo e(__('language.upload_payment_proof')); ?>

                            </a>
                        </button>
                        <p class="text-center text-[10px] text-stone-400 font-bold uppercase tracking-tight mt-4">
                            <?php echo e(__('language.deposit_notice')); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }
    </style>
</div>
<?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/Pages/reservation-page.blade.php ENDPATH**/ ?>