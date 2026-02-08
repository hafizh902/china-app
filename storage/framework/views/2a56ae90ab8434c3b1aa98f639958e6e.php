<div class="bg-[#fdfcf8] min-h-screen pb-20">
    
    <div class="relative py-12 mb-10 bg-red-800 overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,<svg width=&quot;60&quot; height=&quot;30&quot; viewBox=&quot;0 0 60 30&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;><path d=&quot;M0 15Q15 0 30 15Q45 30 60 15&quot; stroke=&quot;%23fff&quot; fill=&quot;none&quot;/></svg>');">
        </div>
        <div class="relative z-10 text-center">
            <h1 class="text-4xl font-serif font-black text-amber-400 tracking-[0.2em] uppercase">
                Summarize
            </h1>
            <p class="text-red-100 italic mt-2 text-sm uppercase tracking-widest">
                Ringkasan pengeluaran & order
            </p>
        </div>
    </div>

    
    <div class="max-w-5xl mx-auto px-4 space-y-10 pb-20">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.spending-chart', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1145998864-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
</div><?php /**PATH D:\laragon\www\china-app\resources\views/livewire/Pages/sumerize-page.blade.php ENDPATH**/ ?>