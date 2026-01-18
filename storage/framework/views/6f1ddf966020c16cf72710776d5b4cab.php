<div class="p-6 grid grid-cols-1 lg:grid-cols-10 gap-6">

    
    <div class="lg:col-span-2 bg-gradient-to-b from-chinese-red to-red-800 rounded-lg shadow-xl p-1">
        <div class="bg-chinese-black rounded-lg p-4 space-y-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
            'page' => '页面设置',
            'operational' => '运营配置',
            'reservation' => '预订管理',
            'payment' => '支付设置'
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button
                wire:click="$set('activeTab', '<?php echo e($key); ?>')"
                class="w-full text-left px-4 py-3 rounded-lg transition-all duration-300
                        <?php echo e($activeTab === $key 
                            ? 'bg-gradient-to-r from-chinese-gold to-chinese-gold-light text-chinese-black font-bold shadow-lg border-2 border-chinese-gold' 
                            : 'text-chinese-gold-light hover:bg-chinese-red/30 hover:text-white border-2 border-transparent'); ?>">
                <span class="text-sm font-chinese"><?php echo e($label); ?></span>
            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <div class="lg:col-span-8 bg-white rounded-lg shadow-xl border-4 border-chinese-gold overflow-hidden">

        
        <div class="bg-gradient-to-r from-chinese-red via-red-700 to-chinese-red p-6 border-b-4 border-chinese-gold">
            <h2 class="text-2xl font-bold text-chinese-gold-light font-chinese flex items-center gap-3">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                </svg>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'page'): ?> 页面设置
                <?php elseif($activeTab === 'operational'): ?> 运营配置
                <?php elseif($activeTab === 'reservation'): ?> 预订管理
                <?php else: ?> 支付设置
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </h2>
        </div>

        <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100">

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'page'): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="space-y-2">
                    <label class="text-sm font-bold text-chinese-black flex items-center gap-2">
                        <span class="w-1 h-4 bg-chinese-red"></span>
                        Brand Name
                    </label>
                    <input
                        type="text"
                        wire:model.defer="form.brand_name"
                        class="w-full border-2 border-chinese-gold/30 rounded-lg px-4 py-2.5 
                               focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                               transition-all duration-200">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-chinese-black flex items-center gap-2">
                        <span class="w-1 h-4 bg-chinese-red"></span>
                        Brand Logo
                    </label>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($brand_logo): ?>
                    
                    <img src="<?php echo e($brand_logo->temporaryUrl()); ?>"
                        class="h-24 w-24 object-contain rounded-lg border mb-2">
                    <?php elseif($config->brand_logo_url): ?>
                    
                    <img src="<?php echo e($config->brand_logo_url); ?>"
                        class="h-24 w-24 object-contain rounded-lg border mb-2">
                    <?php else: ?>
                    <div class="h-24 w-24 flex items-center justify-center border rounded-lg text-xs text-gray-400 mb-2">
                        No Logo
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <input
                        type="file"
                        wire:model="brand_logo"
                        accept="image/*"
                        class="w-full text-sm border-2 border-chinese-gold/30 rounded-lg px-4 py-2
                               file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                               file:bg-chinese-red file:text-white file:font-semibold
                               hover:file:bg-red-700 file:cursor-pointer">
                </div>



                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-chinese-black flex items-center gap-2">
                        <span class="w-1 h-4 bg-chinese-red"></span>
                        Footer Address
                    </label>
                    <textarea
                        wire:model.defer="form.footer_address"
                        rows="3"
                        class="w-full border-2 border-chinese-gold/30 rounded-lg px-4 py-2.5 
                               focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                               transition-all duration-200"></textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-chinese-black flex items-center gap-2">
                        <span class="w-1 h-4 bg-chinese-red"></span>
                        Footer Phone
                    </label>
                    <div class="flex gap-2">
                        
                        <select
                            wire:model="phoneCode"
                            class="border-2 border-chinese-gold/30 rounded-lg px-3 py-2
                   focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 transition-all duration-200">
                            <option value="+62">+62</option>
                            <option value="+1">+1</option>
                            <option value="+44">+44</option>
                        </select>

                        
                        <input
                            type="text"
                            wire:model="phoneNumber"
                            class="flex-1 border-2 border-chinese-gold/30 rounded-lg px-4 py-2.5
                   focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 transition-all duration-200"
                            placeholder="81234567890">
                    </div>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'operational'): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="space-y-2">
                    <label class="text-sm font-bold text-chinese-black flex items-center gap-2">
                        <span class="w-1 h-4 bg-chinese-red"></span>
                        Active From
                    </label>
                    <input
                        type="time"
                        wire:model.defer="form.active_from"
                        class="w-full border-2 border-chinese-gold/30 rounded-lg px-4 py-2.5 
                               focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                               transition-all duration-200">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-chinese-black flex items-center gap-2">
                        <span class="w-1 h-4 bg-chinese-red"></span>
                        Active Until
                    </label>
                    <input
                        type="time"
                        wire:model.defer="form.active_until"
                        class="w-full border-2 border-chinese-gold/30 rounded-lg px-4 py-2.5 
                               focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                               transition-all duration-200">
                </div>

                <div class="flex items-center gap-3 p-4 bg-white border-2 border-chinese-gold/30 rounded-lg">
                    <input
                        type="checkbox"
                        wire:model.defer="form.site_closed"
                        class="w-5 h-5 text-chinese-red border-chinese-gold/50 rounded 
                               focus:ring-2 focus:ring-chinese-gold/20">
                    <span class="text-sm font-bold text-chinese-black">Close Site</span>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-chinese-black flex items-center gap-2">
                        <span class="w-1 h-4 bg-chinese-red"></span>
                        Tax (%)
                    </label>
                    <input
                        type="number"
                        wire:model.defer="form.tax_percent"
                        class="w-full border-2 border-chinese-gold/30 rounded-lg px-4 py-2.5 
                               focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                               transition-all duration-200">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-chinese-black flex items-center gap-2">
                        <span class="w-1 h-4 bg-chinese-red"></span>
                        Delivery Fee
                    </label>
                    <input
                        type="number"
                        wire:model.defer="form.delivery_fee"
                        class="w-full border-2 border-chinese-gold/30 rounded-lg px-4 py-2.5 
                               focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                               transition-all duration-200">
                </div>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($activeTab, ['reservation','payment'])): ?>
            <div class="text-center py-12">
                <div class="inline-block p-8 bg-gradient-to-br from-chinese-gold/10 to-chinese-red/10 
                                rounded-lg border-2 border-dashed border-chinese-gold">
                    <svg class="w-16 h-16 mx-auto text-chinese-gold mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-chinese-black font-bold text-lg font-chinese">敬请期待</p>
                    <p class="text-gray-600 text-sm mt-2 italic">Upcoming feature</p>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>

        
        <div class="px-6 py-4 bg-gradient-to-r from-gray-100 to-gray-200 border-t-2 border-chinese-gold/30">
            <div class="flex justify-end">
                <button
                    wire:click="save"
                    class="px-8 py-3 bg-gradient-to-r from-chinese-red to-red-700 
                           text-white font-bold rounded-lg shadow-lg 
                           hover:from-red-700 hover:to-chinese-red 
                           transform hover:scale-105 transition-all duration-300
                           border-2 border-chinese-gold
                           flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Save Settings
                </button>
            </div>
        </div>

    </div>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Admin/config-page.blade.php ENDPATH**/ ?>