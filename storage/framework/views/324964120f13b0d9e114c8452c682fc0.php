<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $alerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-<?php echo e($alert['type']); ?>" id="alert-<?php echo e($alert['id']); ?>">
            <strong><?php echo e($alert['title']); ?></strong>: <?php echo e($alert['message']); ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

<script>
    // Mendengarkan event hide-alert dari Livewire
    window.addEventListener('hide-alert', event => {
        const alertId = event.detail.id;
        
        // Menunda penghapusan alert setelah 5 detik
        setTimeout(() => {
            Livewire.emit('hideAlert', alertId);  // Mengirimkan event ke Livewire untuk menghapus alert
            const alertElement = document.getElementById('alert-' + alertId);
            if (alertElement) {
                alertElement.remove();  // Menghapus elemen alert dari DOM
            }
        }, 5000);  // Delay 5 detik
    });
</script>
<?php /**PATH D:\projek 12\china-app\resources\views/livewire/alert-manager.blade.php ENDPATH**/ ?>