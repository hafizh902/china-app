<div class="bg-[#fdfcf8] min-h-screen pb-20">
    
    <div class="relative py-12 mb-10 bg-red-800 overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"30\" viewBox=\"0 0 60 30\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M0 15Q15 0 30 15Q45 30 60 15\" stroke=\"%23fff\" fill=\"none\"/></svg>');">
        </div>
        <div class="relative z-10 text-center">
            <h1 class="text-4xl font-serif font-black text-amber-400 tracking-[0.2em] uppercase">
                <?php echo e(__('language.order_history')); ?></h1>
            <p class="text-red-100 italic mt-2 text-sm uppercase tracking-widest"><?php echo e(__('language.your_order_history')); ?>

            </p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 space-y-10 pb-20">
        
        <div class="flex flex-col md:flex-row items-center justify-center gap-6 mb-12">

            
            <div class="flex justify-center mb-10" x-data="{
                open: false,
                selectedDate: '<?php echo e(request('date', date('Y-m-d'))); ?>',
                // Fungsi untuk memformat tampilan tanggal di tombol trigger
                formatDate(dateString) {
                    const options = { year: 'numeric', month: 'short', day: 'numeric' };
                    return new Date(dateString).toLocaleDateString('en-US', options);
                }
            }">
                <div class="relative">

                    
                    <div @click="open = !open"
                        class="flex items-center gap-3 bg-white border border-stone-200 p-2 rounded-xl shadow-sm cursor-pointer hover:border-red-700 transition-all">
                        <div class="bg-stone-900 text-white p-2 rounded-lg">
                            <i class="fas fa-calendar-alt text-[10px]"></i>
                        </div>
                        <div class="pr-6">
                            <p class="text-[8px] font-black uppercase text-stone-400 leading-none mb-1">Selected Date
                            </p>
                            <p class="text-[11px] font-bold text-stone-800" x-text="formatDate(selectedDate)"></p>
                        </div>
                        <i class="fas fa-chevron-down text-[9px] text-stone-300 ml-auto transition-transform"
                            :class="open ? 'rotate-180' : ''"></i>
                    </div>

                    
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        class="absolute top-14 left-1/2 -translate-x-1/2 z-[100] bg-white shadow-2xl rounded-2xl border border-stone-100 flex overflow-hidden min-w-[550px]"
                        style="display: none;">

                        
                        <div class="w-44 border-r border-stone-100 bg-[#fdfcfb] p-2 space-y-1">
                            <div class="px-4 py-2 text-[9px] font-black uppercase text-stone-300 tracking-widest mb-1">
                                Preset</div>

                            <button type="button"
                                @click="selectedDate = '<?php echo e(date('Y-m-d')); ?>'; $nextTick(() => $el.closest('div').nextElementSibling.submit())"
                                class="w-full text-left px-4 py-2.5 rounded-xl text-[11px] font-bold text-stone-500 hover:bg-stone-100 transition-all flex items-center justify-between">
                                Today
                                <span class="text-[9px] opacity-40">今天</span>
                            </button>

                            <button type="button"
                                @click="selectedDate = '<?php echo e(date('Y-m-d', strtotime('-1 day'))); ?>'; $nextTick(() => $el.closest('div').nextElementSibling.submit())"
                                class="w-full text-left px-4 py-2.5 rounded-xl text-[11px] font-bold text-stone-500 hover:bg-stone-100 transition-all">
                                Yesterday
                            </button>

                            <button type="button"
                                class="w-full text-left px-4 py-2.5 rounded-xl text-[11px] font-bold bg-stone-900 text-white shadow-lg flex justify-between items-center">
                                Custom Date
                                <i class="fas fa-check text-[9px]"></i>
                            </button>
                        </div>

                        
                        <form action="" method="GET" class="flex-grow p-6">
                            <div class="mb-6">
                                <p class="text-[9px] font-black text-stone-400 uppercase mb-3 tracking-widest">Time
                                    Frame</p>

                                
                                <div class="relative group/input">
                                    <div class="absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                        <i
                                            class="far fa-calendar-alt text-red-700 text-xs transition-transform group-hover/input:scale-110"></i>
                                    </div>
                                    <input type="date" name="date" x-model="selectedDate"
                                        class="w-full pl-11 pr-4 py-3 bg-stone-50 border-2 border-stone-100 rounded-xl text-xs font-bold text-stone-800 focus:bg-white focus:border-red-700 focus:ring-0 outline-none cursor-pointer transition-all">
                                </div>
                                <p class="mt-2 text-[9px] text-stone-400 italic font-medium">*Silakan klik area di atas
                                    untuk memilih tanggal dari kalender browser</p>
                            </div>
                            
                            <div class="pt-4 border-t border-stone-100 select-none">
                                <div class="flex justify-between items-center mb-4 px-1">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-stone-800">
                                        <?php echo e(date('F Y')); ?>

                                    </span>
                                    <div class="flex gap-3 text-stone-300">
                                        <button type="button" class="hover:text-red-700 transition-colors"><i
                                                class="fas fa-chevron-left text-[8px]"></i></button>
                                        <button type="button" class="hover:text-red-700 transition-colors"><i
                                                class="fas fa-chevron-right text-[8px]"></i></button>
                                    </div>
                                </div>

                                
                                <div class="grid grid-cols-7 text-center mb-2">
                                    <template x-for="day in ['M','T','W','T','F','S','S']">
                                        <span class="text-[8px] font-bold text-stone-300" x-text="day"></span>
                                    </template>
                                </div>

                                
                                <div class="grid grid-cols-7 gap-1">
                                    <?php
                                        $currentMonth = date('Y-m');
                                        $today = date('d');
                                    ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 1; $i <= 31; $i++): ?>
                                        <?php
                                            // Format tanggal untuk dikirim ke x-model (YYYY-MM-DD)
                                            $dateValue = $currentMonth . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
                                        ?>

                                        <button type="button" @click="selectedDate = '<?php echo e($dateValue); ?>'"
                                            class="text-[9px] font-bold w-7 h-7 flex items-center justify-center rounded-lg transition-all duration-200"
                                            :class="selectedDate === '<?php echo e($dateValue); ?>'
                                                ?
                                                'bg-stone-900 text-white shadow-md scale-110' :
                                                'text-stone-500 hover:bg-red-50 hover:text-red-700'">
                                            <?php echo e($i); ?>

                                        </button>
                                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>

                            
                            <p class="mt-4 text-[8px] text-stone-400 text-center italic tracking-wide">
                                *Klik pada angka untuk memilih tanggal cepat
                            </p>

                            
                            <div class="mt-8 pt-4 border-t border-stone-100 flex justify-end items-center gap-4">
                                <button type="button" @click="open = false"
                                    class="text-[10px] font-bold text-stone-400 hover:text-stone-600 transition-colors uppercase tracking-widest">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-10 py-3 bg-stone-900 text-white rounded-xl text-[10px] font-black uppercase tracking-[0.1em] hover:bg-red-800 hover:shadow-xl hover:shadow-red-900/20 active:scale-95 transition-all">
                                    Apply <i class="fas fa-check ml-2 text-amber-400"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="hidden md:flex items-center gap-2">
                <span class="h-[1px] w-8 bg-stone-200"></span>
                <span class="text-stone-300 font-chinese text-[10px]">或</span>
                <span class="h-[1px] w-8 bg-stone-200"></span>
            </div>

            
            <a href="<?php echo e(route('orders')); ?>"
                class="group relative flex items-center gap-3 px-6 py-3 bg-chinese-black hover:bg-chinese-red text-white rounded-lg transition-all duration-500 shadow-xl shadow-stone-900/20 overflow-hidden">

                
                <div
                    class="absolute inset-0 w-1/2 h-full bg-white/5 skew-x-[-25deg] -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]">
                </div>

                <div class="flex flex-col items-start leading-none">
                    <span
                        class="text-[8px] font-bold text-chinese-gold opacity-80 uppercase tracking-[0.2em] mb-1">Database</span>
                    <span class="text-[11px] font-black uppercase tracking-widest flex items-center gap-2">
                        <i class="fas fa-layer-group text-chinese-gold group-hover:rotate-12 transition-transform"></i>
                        Lihat Semua
                    </span>
                </div>

                <i
                    class="fas fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
            </a>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div
                class="group bg-white rounded-[2.5rem] border border-stone-100 shadow-sm hover:shadow-2xl hover:shadow-red-900/5 transition-all duration-500 overflow-hidden">

                
                <div
                    class="flex flex-wrap justify-between items-center bg-[#fdfcf8] px-8 py-6 border-b border-stone-100/60">
                    <div class="flex flex-wrap gap-8 items-center">
                        <div>
                            <p class="text-[9px] text-stone-400 uppercase font-black tracking-[0.2em] mb-1.5">
                                <?php echo e(__('language.transaction_time')); ?></p>
                            <div class="flex items-center gap-2">
                                <i class="far fa-calendar text-red-700 text-xs"></i>
                                <p class="font-serif font-bold text-stone-800 italic leading-none">
                                    <?php echo e($order->created_at->format('d M, Y')); ?></p>
                            </div>
                        </div>

                        <div class="h-8 w-[1px] bg-stone-200 hidden md:block"></div>

                        <div>
                            <p class="text-[9px] text-stone-400 uppercase font-black tracking-[0.2em] mb-1.5">
                                <?php echo e(__('language.total_payment')); ?></p>
                            <p class="text-lg font-black text-red-700 tracking-tighter">
                                Rp<?php echo e(number_format($order->total, 0, ',', '.')); ?></p>
                        </div>

                        <div class="hidden sm:block">
                            <p class="text-[9px] text-stone-400 uppercase font-black tracking-[0.2em] mb-1.5">
                                <?php echo e(__('language.transaction_id')); ?></p>
                            <p
                                class="font-mono text-[11px] font-bold text-stone-500 bg-stone-200/50 px-2 py-1 rounded-md">
                                #<?php echo e($order->order_number); ?></p>
                        </div>
                    </div>

                    
                    <div class="mt-4 sm:mt-0 relative group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="relative px-5 py-2 border-2 rotate-[-3deg] font-serif font-black uppercase tracking-widest text-[10px]
                         <?php echo e($order->status === 'completed' ? 'border-green-600/40 text-green-700 bg-green-50/30' : ''); ?>

                         <?php echo e(in_array($order->status, ['pending', 'preparing']) ? 'border-amber-500/40 text-amber-600 bg-amber-50/30' : ''); ?>

                         <?php echo e($order->status === 'cancelled' ? 'border-red-600/40 text-red-700 bg-red-50/30' : ''); ?>">
                            <?php echo e(__('language.status.' . $order->status)); ?>

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
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->menu && $item->menu->image_url): ?>
                                            <img src="<?php echo e($item->menu->image_url); ?>"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover/item:scale-110"
                                                alt="<?php echo e($item->menu_name); ?>">
                                        <?php else: ?>
                                            <div class="w-full h-full bg-stone-200 flex items-center justify-center">
                                                <i class="fas fa-utensils text-stone-400 text-lg"></i>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <div class="absolute inset-0 bg-stone-900/5"></div>
                                    </div>

                                    <div>
                                        <h4 class="font-serif font-bold text-stone-800 text-sm leading-tight">
                                            <?php echo e($item->menu_name); ?></h4>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span
                                                class="text-[10px] font-black text-red-700 bg-red-50 px-2 py-0.5 rounded-full"><?php echo e($item->quantity); ?>x</span>
                                            <span
                                                class="text-[10px] text-stone-400 uppercase tracking-widest"><?php echo e(__('language.portion')); ?></span>
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
                            <i
                                class="fas fa-receipt text-amber-400 group-hover/btn:rotate-12 transition-transform"></i>
                            <span
                                class="text-[10px] font-black uppercase tracking-[0.2em]"><?php echo e(__('language.digital_receipt')); ?></span>
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
                <h3 class="font-serif text-2xl text-stone-800 font-bold mb-2 italic">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request('date')): ?>
                        <?php echo e(__('language.no_orders_on_date', ['date' => \Carbon\Carbon::parse(request('date'))->format('d M Y')])); ?>

                    <?php else: ?>
                        <?php echo e(__('language.no_order_history')); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </h3>
                <p class="text-stone-400 text-sm max-w-xs mx-auto mb-8 font-medium">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request('date')): ?>
                        <?php echo e(__('language.no_orders_on_date_desc')); ?>

                    <?php else: ?>
                        <?php echo e(__('language.no_order_desc')); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
                <a wire:navigate href="/menu"
                    class="inline-flex items-center gap-3 bg-red-700 hover:bg-red-800 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-xl shadow-red-900/20 transition-all active:scale-95">
                    <i class="fas fa-utensils"></i>
                    <?php echo e(__('language.explore_menu')); ?>

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
                                <h1 class="text-2xl font-serif font-black tracking-tighter text-stone-800 uppercase">
                                    金龍閣
                                </h1>
                            </div>
                            <p class="text-xs text-stone-500 italic">Golden Dragon Pavilion</p>
                            <p class="text-[10px] text-stone-400 mt-1 uppercase tracking-widest">
                                <span><?php echo e(\App\Models\SystemConfig::get('footer_address')[0]['footer_address'] ?? ''); ?></span>
                            </p>
                        </div>
                        <div class="text-right">
                            <h2 class="text-xl font-serif font-bold text-red-800 uppercase tracking-widest">
                                <?php echo e(__('language.payment_receipt')); ?></h2>
                            <p class="text-xs font-mono text-stone-500 mt-1">#<?php echo e($selectedOrder->order_number); ?></p>
                        </div>
                    </div>

                    
                    <div class="grid grid-cols-2 gap-8 py-8 text-sm relative z-10">
                        <div>
                            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-2">
                                <?php echo e(__('language.bill_to')); ?></p>
                            <p class="font-bold text-stone-800 text-base"><?php echo e(auth()->user()->name); ?></p>
                            <p class="text-stone-500 text-xs"><?php echo e(auth()->user()->email); ?></p>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-2">
                                <?php echo e(__('language.transaction_time:')); ?></p>
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
                                    <th class="py-4 px-2"> <?php echo e(__('language.dish_description')); ?></th>
                                    <th class="py-4 px-2 text-center"> <?php echo e(__('language.quantity')); ?></th>
                                    <th class="py-4 px-2 text-right"> <?php echo e(__('language.subtotal')); ?></th>
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
                                <span><?php echo e(__('language.subtotal')); ?></span>
                                <span>Rp<?php echo e(number_format($selectedOrder->subtotal, 0, ',', '.')); ?></span>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedOrder->delivery_fee > 0): ?>
                            <div class="flex justify-between text-xs text-amber-500 font-medium tracking-wide">
                                <span><?php echo e(__('language.delivery_fee')); ?></span>
                                <span>Rp<?php echo e(number_format($selectedOrder->delivery_fee, 0, ',', '.')); ?></span>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="flex justify-between text-xs text-stone-500">
                                <span><?php echo e(__('language.restaurant_tax')); ?>(<?php echo e(\App\Models\SystemConfig::value('tax_percent') ?? '-'); ?>%)</span>
                                <span>Rp<?php echo e(number_format($selectedOrder->tax, 0, ',', '.')); ?></span>
                            </div>
                            <div class="pt-4 border-t-2 border-stone-800 flex justify-between items-end">
                                <span
                                    class="text-[10px] font-black uppercase text-red-800"><?php echo e(__('language.final_total')); ?></span>
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
                        <i class="fas fa-print"></i> <?php echo e(__('language.print_receipt')); ?>

                    </button>
                    <button wire:click="closeModal"
                        class="bg-white border border-stone-200 text-stone-600 px-8 py-3 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-stone-100 transition-all">
                        <?php echo e(__('language.close')); ?>

                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <style>
        @media print {
            body {
                margin: 0;
            }

            .modal,
            .modal * {
                all: unset;
            }

            #invoice {
                display: block;
                position: static;
                width: 100%;
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

        @keyframes shimmer {
            100% {
                transform: translateX(300%);
            }
        }
    </style>
</div>
<?php /**PATH D:\laragon\www\china-app\resources\views/livewire/Pages/order-history-page.blade.php ENDPATH**/ ?>