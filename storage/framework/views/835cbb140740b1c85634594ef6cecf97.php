<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title><?php echo e($title ?? config('app.name')); ?></title>



<link rel="preconnect" href="https://fonts.bunny.net">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->getLocale() == 'cn'): ?>
<link href="https://fonts.bunny.net/css?family=noto-sans-sc:400,500,600" rel="stylesheet" />
<?php else: ?>
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php echo app('flux')->fluxAppearance(); ?>


<style>
:root {
    --font-sans: '<?php echo e(app()->getLocale() == 'cn' ? 'Noto Sans SC' : 'Instrument Sans'); ?>', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
}
</style>
<?php /**PATH D:\projek 12\china-app\resources\views\partials\head.blade.php ENDPATH**/ ?>