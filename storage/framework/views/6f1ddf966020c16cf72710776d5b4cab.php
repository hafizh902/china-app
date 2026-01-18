<div class="p-4 grid grid-cols-1 lg:grid-cols-10 gap-4">

    
    <div class="lg:col-span-2 bg-gradient-to-b from-chinese-red to-red-800 rounded-lg shadow-xl p-1">
        <div class="bg-chinese-black rounded-lg p-3 space-y-1.5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
            'page' => 'Page Settings',
            'operational' => 'Operations',
            'reservation' => 'Reservations',
            'payment' => 'Payment'
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button
                wire:click="$set('activeTab', '<?php echo e($key); ?>')"
                class="w-full text-left px-3 py-2 rounded-lg transition-all duration-300 text-sm
                        <?php echo e($activeTab === $key 
                            ? 'bg-gradient-to-r from-chinese-gold to-chinese-gold-light text-chinese-black font-bold shadow-lg border-2 border-chinese-gold' 
                            : 'text-chinese-gold-light hover:bg-chinese-red/30 hover:text-white border-2 border-transparent'); ?>">
                <?php echo e($label); ?>

            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <div class="lg:col-span-8 bg-white rounded-lg shadow-xl border-2 border-chinese-gold overflow-hidden">

        
        <div class="bg-gradient-to-r from-chinese-red via-red-700 to-chinese-red p-4 border-b-2 border-chinese-gold">
            <h2 class="text-lg font-bold text-chinese-gold-light flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                </svg>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'page'): ?> Page Settings
                <?php elseif($activeTab === 'operational'): ?> Operational Config
                <?php elseif($activeTab === 'reservation'): ?> Reservation Management
                <?php else: ?> Payment Settings
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </h2>
        </div>

        <div class="p-4 bg-gradient-to-br from-gray-50 to-gray-100">

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'page'): ?>
            <div class="grid grid-cols-2 gap-4">

                
                <div class="space-y-2">
                    <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                        <span class="w-0.5 h-3 bg-chinese-red"></span>
                        Brand Logo
                    </label>

                    
                    <div 
                        x-data="{ isDragging: false }"
                        @dragover.prevent="isDragging = true"
                        @dragleave.prevent="isDragging = false"
                        @drop.prevent="isDragging = false; $refs.fileInput.files = $event.dataTransfer.files; $refs.fileInput.dispatchEvent(new Event('change'))"
                        :class="isDragging ? 'border-chinese-red bg-chinese-red/5' : 'border-chinese-gold/30'"
                        class="border-2 border-dashed rounded-lg p-4 transition-all duration-200 flex flex-col items-center justify-center min-h-[200px]">
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($brand_logo): ?>
                        <img src="<?php echo e($brand_logo->temporaryUrl()); ?>"
                            class="max-h-32 w-auto object-contain rounded-lg mb-2">
                        <?php elseif($config->brand_logo_url): ?>
                        <img src="<?php echo e($config->brand_logo_url); ?>"
                            class="max-h-32 w-auto object-contain rounded-lg mb-2">
                        <?php else: ?>
                        <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <p class="text-xs text-gray-500 text-center mb-1">
                            Drag & drop image here
                        </p>
                        <p class="text-xs text-gray-400 text-center">
                            or click button below
                        </p>
                    </div>

                    
                    <label class="block">
                        <input
                            x-ref="fileInput"
                            type="file"
                            wire:model="brand_logo"
                            accept="image/*"
                            class="hidden">
                        <span class="w-full cursor-pointer inline-flex items-center justify-center gap-2 px-4 py-2 
                                     bg-chinese-red text-white text-xs font-semibold rounded-lg 
                                     hover:bg-red-700 transition-all duration-200 border-2 border-chinese-gold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            Choose Image
                        </span>
                    </label>
                </div>

                
                <div class="space-y-3">
                    
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                            <span class="w-0.5 h-3 bg-chinese-red"></span>
                            Brand Name
                        </label>
                        <input
                            type="text"
                            wire:model.defer="form.brand_name"
                            class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm
                                   focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                                   transition-all duration-200">
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                            <span class="w-0.5 h-3 bg-chinese-red"></span>
                            Footer Address
                        </label>
                        <textarea
                            wire:model.defer="form.footer_address"
                            rows="3"
                            class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm
                                   focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                                   transition-all duration-200"></textarea>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                            <span class="w-0.5 h-3 bg-chinese-red"></span>
                            Footer Phone
                        </label>
                        <div class="flex gap-2">
                            <select
                                wire:model="phoneCode"
                                class="border-2 border-chinese-gold/30 rounded-lg px-2 py-1.5 text-sm
                                       focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 transition-all duration-200">
                                <option value="+62">+62</option>
                                <option value="+1">+1</option>
                                <option value="+44">+44</option>
                            </select>

                            <input
                                type="text"
                                wire:model="phoneNumber"
                                class="flex-1 border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm
                                       focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 transition-all duration-200"
                                placeholder="81234567890">
                        </div>
                    </div>

                </div>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'operational'): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="space-y-1">
                    <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                        <span class="w-0.5 h-3 bg-chinese-red"></span>
                        Active From
                    </label>
                    <input
                        type="time"
                        wire:model.defer="form.active_from"
                        class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm
                               focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                               transition-all duration-200">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                        <span class="w-0.5 h-3 bg-chinese-red"></span>
                        Active Until
                    </label>
                    <input
                        type="time"
                        wire:model.defer="form.active_until"
                        class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm
                               focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                               transition-all duration-200">
                </div>

                <div class="flex items-center gap-2 p-3 bg-white border-2 border-chinese-gold/30 rounded-lg">
                    <input
                        type="checkbox"
                        wire:model.defer="form.site_closed"
                        class="w-4 h-4 text-chinese-red border-chinese-gold/50 rounded 
                               focus:ring-2 focus:ring-chinese-gold/20">
                    <span class="text-xs font-bold text-chinese-black">Close Site</span>
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                        <span class="w-0.5 h-3 bg-chinese-red"></span>
                        Tax (%)
                    </label>
                    <input
                        type="number"
                        wire:model.defer="form.tax_percent"
                        class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm
                               focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                               transition-all duration-200">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                        <span class="w-0.5 h-3 bg-chinese-red"></span>
                        Delivery Fee
                    </label>
                    <input
                        type="number"
                        wire:model.defer="form.delivery_fee"
                        class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm
                               focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                               transition-all duration-200">
                </div>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($activeTab, ['reservation','payment'])): ?>
            <div class="text-center py-8">
                <div class="inline-block p-6 bg-gradient-to-br from-chinese-gold/10 to-chinese-red/10 
                            rounded-lg border-2 border-dashed border-chinese-gold">
                    <svg class="w-12 h-12 mx-auto text-chinese-gold mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-chinese-black font-bold text-base">Coming Soon</p>
                    <p class="text-gray-600 text-xs mt-1 italic">Upcoming feature</p>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>

        
        <div class="px-4 py-3 bg-gradient-to-r from-gray-100 to-gray-200 border-t-2 border-chinese-gold/30">
            <div class="flex justify-end">
                <button
                    wire:click="save"
                    class="px-6 py-2 bg-gradient-to-r from-chinese-red to-red-700 
                           text-white text-sm font-bold rounded-lg shadow-lg 
                           hover:from-red-700 hover:to-chinese-red 
                           transform hover:scale-105 transition-all duration-300
                           border-2 border-chinese-gold
                           flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Save Settings
                </button>
            </div>
        </div>
    </div>

    
    <div
        x-data="{ show: false, message: '' }"
        @notify-success.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)"
        @page-refresh.window="setTimeout(() => window.location.reload(), 1500)"
        class="fixed top-6 right-6 z-50 w-full max-w-sm"
        style="display: none;"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-10"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-10">
        
        <div class="bg-white/90 backdrop-blur-lg border-l-4 border-green-500 shadow-2xl rounded-2xl p-4 flex items-center gap-4 border border-stone-200">
            <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-check-circle text-green-600 text-lg"></i>
            </div>
            <div class="flex-1">
                <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-400">Success</h4>
                <p class="text-xs font-bold text-stone-800 leading-tight" x-text="message"></p>
            </div>
            <button @click="show = false" class="text-stone-300 hover:text-stone-600 transition-colors px-2">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Admin/config-page.blade.php ENDPATH**/ ?>