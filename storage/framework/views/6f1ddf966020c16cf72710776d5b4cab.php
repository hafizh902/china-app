<div class="p-6 grid grid-cols-1 lg:grid-cols-10 gap-6">

    
    <div class="lg:col-span-2 bg-white rounded-lg shadow p-4 space-y-2">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
            'page' => 'Page Settings',
            'operational' => 'Operational',
            'reservation' => 'Reservation',
            'payment' => 'Payment'
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button
                wire:click="$set('activeTab', '<?php echo e($key); ?>')"
                class="w-full text-left px-3 py-2 rounded
                    <?php echo e($activeTab === $key ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-100'); ?>">
                <?php echo e($label); ?>

            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <div class="lg:col-span-8 bg-white rounded-lg shadow p-6">

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'page'): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium">Brand Name</label>
                <input wire:model="config.brand_name" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm font-medium">Brand Logo</label>
                <input type="file" wire:model="brand_logo" class="w-full text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="text-sm font-medium">Footer Address</label>
                <textarea wire:model="config.footer_address" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <div>
                <label class="text-sm font-medium">Footer Phone</label>
                <input wire:model="config.footer_phone" class="w-full border rounded px-3 py-2">
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'operational'): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium">Active From</label>
                <input type="time" wire:model="config.active_from" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm font-medium">Active Until</label>
                <input type="time" wire:model="config.active_until" class="w-full border rounded px-3 py-2">
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" wire:model="config.site_closed">
                <span class="text-sm font-medium">Close Site</span>
            </div>

            <div>
                <label class="text-sm font-medium">Tax (%)</label>
                <input type="number" wire:model="config.tax_percent" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm font-medium">Delivery Fee</label>
                <input type="number" wire:model="config.delivery_fee" class="w-full border rounded px-3 py-2">
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($activeTab, ['reservation','payment'])): ?>
            <div class="text-gray-500 text-sm italic">
                Upcoming feature.
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="mt-6 flex justify-end">
            <button wire:click="save" class="px-5 py-2 bg-blue-600 text-white rounded">
                Save Settings
            </button>
        </div>
    </div>
</div>
<?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Admin/config-page.blade.php ENDPATH**/ ?>