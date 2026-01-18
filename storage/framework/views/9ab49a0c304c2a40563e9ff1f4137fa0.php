<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type' => 'info', 'title' => '', 'message' => '', 'show' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['type' => 'info', 'title' => '', 'message' => '', 'show' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($show): ?>
<div
    x-data="{
        show: true,
        progress: 100,
        init() {
            const interval = setInterval(() => {
                this.progress -= 2;
                if (this.progress <= 0) {
                    clearInterval(interval);
                    this.show = false;
                }
            }, 50);
        }
    }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    class="fixed top-4 right-4 z-[10001] max-w-sm w-full"
>
    <div class="bg-white rounded-xl shadow-xl border-l-4 p-4 <?php echo e($type === 'success' ? 'border-l-green-500' :
        ($type === 'error' ? 'border-l-red-500' :
        ($type === 'warning' ? 'border-l-yellow-500' : 'border-l-blue-500'))); ?>">

        <div class="flex items-start">
            <!-- Icon -->
            <div class="flex-shrink-0">
                <i class="text-lg <?php echo e($type === 'success' ? 'fas fa-check-circle text-green-500' :
                    ($type === 'error' ? 'fas fa-exclamation-circle text-red-500' :
                    ($type === 'warning' ? 'fas fa-exclamation-triangle text-yellow-500' : 'fas fa-info-circle text-blue-500'))); ?>"></i>
            </div>

            <!-- Content -->
            <div class="ml-3 flex-1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($title): ?>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1"><?php echo e($title); ?></h3>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <p class="text-sm text-gray-600"><?php echo e($message); ?></p>
            </div>

            <!-- Close Button -->
            <button
                @click="show = false"
                class="ml-4 text-gray-400 hover:text-gray-600 transition-colors"
            >
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Progress Bar -->
        <div class="mt-3 bg-gray-200 rounded-full h-1">
            <div
                :style="`width: ${progress}%`"
                class="h-1 rounded-full transition-all duration-50 <?php echo e($type === 'success' ? 'bg-green-500' :
                    ($type === 'error' ? 'bg-red-500' :
                    ($type === 'warning' ? 'bg-yellow-500' : 'bg-blue-500'))); ?>"
            ></div>
        </div>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><?php /**PATH D:\projek 12\china-app\resources\views\components\alert.blade.php ENDPATH**/ ?>