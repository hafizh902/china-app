<div>
    
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-6 space-y-6">

            
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                <h2 class="text-lg md:text-xl font-semibold text-gray-800 tracking-tight">
                    <?php echo e(__('language.browse_categories')); ?>

                </h2>

                
                <div class="relative w-full md:w-72">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 pointer-events-none">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" wire:model.live.debounce.300ms="search"
                        placeholder="<?php echo e(__('language.search_food')); ?>"
                        class="w-full pl-11 pr-10 py-2.5 md:py-2 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition shadow-sm" />

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search): ?>
                        <button wire:click="$set('search', '')"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="flex overflow-x-auto pb-2 md:pb-0 md:flex-wrap gap-2 no-scrollbar -mx-6 px-6 md:mx-0 md:px-0">
                <?php
                    $categories = [
                        'all' => ['label' => 'language.all', 'icon' => null],
                        'main_course' => ['label' => 'language.main_course', 'icon' => 'fa-utensils'],
                        'snacks' => ['label' => 'language.snacks', 'icon' => 'fa-cookie-bite'],
                        'drinks' => ['label' => 'language.drinks', 'icon' => 'fa-mug-hot'],
                        'desserts' => ['label' => 'language.desserts', 'icon' => 'fa-ice-cream'],
                    ];
                ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button wire:click="$set('category', '<?php echo e($key); ?>')"
                        class="whitespace-nowrap inline-flex items-center gap-2 px-5 py-2.5 md:px-4 md:py-2 rounded-full text-xs md:text-sm font-medium transition-all duration-200
            <?php echo e($category === $key
                ? 'bg-red-500 text-white shadow-md ring-2 ring-red-500/30'
                : 'bg-gray-100 text-gray-700 hover:bg-gray-200'); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cat['icon']): ?>
                            <i class="fas <?php echo e($cat['icon']); ?> text-[10px] md:text-xs"></i>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php echo e(__($cat['label'])); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="flex items-center gap-2 overflow-x-auto no-scrollbar -mx-6 px-6 md:mx-0 md:px-0">
                <span class="text-xs md:text-sm text-gray-500 whitespace-nowrap">
                    <?php echo e(__('language.sort_by')); ?>

                </span>

                <div class="flex gap-1 bg-gray-100 p-1 rounded-full">
                    <?php
                        $options = [
                            'popular' => 'language.sort_popular',
                            'price-low' => 'language.sort_price_low',
                            'price-high' => 'language.sort_price_high',
                            'name' => 'language.sort_name',
                        ];
                    ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" wire:click="setSort('<?php echo e($value); ?>')"
                            class="whitespace-nowrap px-4 py-1.5 text-[10px] md:text-sm rounded-full transition-all duration-200
                <?php echo e($sort === $value ? 'bg-white text-red-500 font-semibold shadow-sm' : 'text-gray-600 hover:text-gray-900'); ?>">
                            <?php echo e(__($label)); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

    </div>


<div class="px-6 py-12 bg-gradient-to-b from-gray-50 to-amber-50/40">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($menuItems->count() > 0): ?>
        
        <div class="flex flex-wrap justify-center gap-x-8 gap-y-12">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div
                    class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-amber-100 flex flex-col h-full w-full sm:w-[calc(50%-2rem)] lg:w-[calc(33.333%-2rem)] xl:w-[calc(25%-2rem)] max-w-[400px] <?php echo e(!$item->is_available ? 'grayscale' : ''); ?>">

                    
                    <div class="relative h-72 md:h-64 overflow-hidden flex-shrink-0"
                        <?php if($item->is_available): ?> wire:click="$dispatch('open-preview-modal', [<?php echo e($item->id); ?>])" <?php endif; ?>>

                        <img src="<?php echo e($item->image_url); ?>" alt="<?php echo e($item->name); ?>"
                            class="w-full h-full object-cover transition-transform duration-700
                            group-hover:scale-110 <?php echo e($item->is_available ? 'cursor-pointer' : 'cursor-not-allowed'); ?>">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-60"></div>

                        
                        <div class="absolute top-4 left-4 z-20">
                            <span
                                class="px-3 py-1 rounded-full text-[10px] uppercase tracking-widest font-bold text-white shadow-lg
                                <?php echo e($item->is_available ? 'bg-red-600 border border-amber-400' : 'bg-gray-500'); ?>">
                                <?php echo e($item->is_available ? __('language.available') : __('language.sold_out')); ?>

                            </span>
                        </div>

                        
                        <div
                            class="absolute top-4 right-4 w-10 h-10 rounded-full bg-red-700 text-amber-300 flex items-center justify-center text-sm font-black shadow-lg rotate-12 z-20">
                            福
                        </div>

                        
                        <div class="absolute bottom-4 left-4 z-20">
                            <p class="text-white font-bold text-2xl drop-shadow-md">
                                <span class="text-amber-400 text-sm mr-1">Rp</span><?php echo e(number_format($item->price, 0, ',', '.')); ?>

                            </p>
                        </div>
                    </div>

                    
                    <div class="p-6 relative flex flex-col flex-grow">
                        
                        <div
                            class="absolute top-0 right-0 w-20 h-20 opacity-[0.05] pointer-events-none group-hover:opacity-[0.10] transition-opacity">
                            <svg viewBox="0 0 100 100" class="fill-red-800">
                                <path d="M10,40 C30,20 70,20 90,40 L90,60 C70,80 30,80 10,60 Z" />
                            </svg>
                        </div>

                        
                        <div class="min-h-[3.5rem] flex items-start">
                            <h3
                                class="font-serif text-xl font-bold text-slate-800 group-hover:text-red-700 transition-colors uppercase tracking-tight leading-tight line-clamp-2">
                                <?php echo e($item->name); ?>

                            </h3>
                        </div>

                        
                        <div class="mt-3 flex items-center gap-2">
                            <div class="h-[2px] w-12 bg-red-600 group-hover:w-20 transition-all"></div>
                            <div class="h-[2px] w-4 bg-amber-400"></div>
                        </div>

                        
                        <div class="mt-4 flex-grow">
                            <p class="text-gray-500 text-sm italic leading-relaxed line-clamp-2">
                                <?php echo e($item->description ?? __('language.no_description')); ?>

                            </p>
                        </div>

                        
                        <div class="mt-6 flex items-center justify-between border-t border-gray-100 pt-5">
                            <div class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                                <i class="fas fa-utensils mr-2 text-amber-500"></i> <?php echo e(__('language.fresh')); ?>

                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->is_available): ?>
                                <button
                                    wire:click="$dispatchTo('cart-component', 'add-to-cart', [<?php echo e($item->id); ?>, <?php echo \Illuminate\Support\Js::from($item->name)->toHtml() ?>, <?php echo e($item->price); ?>, <?php echo \Illuminate\Support\Js::from($item->image)->toHtml() ?>])"
                                    class="relative overflow-hidden group/btn bg-red-700 hover:bg-red-800 text-white flex items-center gap-3 px-6 py-2.5 rounded-xl transition-all shadow-md active:scale-95">
                                    <span class="text-xs font-bold uppercase tracking-widest"><?php echo e(__('language.add')); ?></span>
                                    <i class="fas fa-plus text-[10px] bg-amber-400 text-red-900 p-1 rounded-full"></i>
                                </button>
                            <?php else: ?>
                                <span class="text-gray-400 text-xs font-bold uppercase italic"><?php echo e(__('language.sold_out')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$item->is_available): ?>
                        <div class="absolute inset-0 bg-white/40 backdrop-blur-[1px] flex items-center justify-center z-10 pointer-events-none">
                            <div class="bg-black/80 text-white px-6 py-3 rotate-12 border-2 border-amber-500 font-bold uppercase text-sm tracking-widest shadow-2xl">
                                <?php echo e(__('language.sold_out')); ?>

                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php else: ?>
        
        <div class="text-center py-12">
            <div class="max-w-md mx-auto">
                <i class="fas fa-search text-gray-300 text-6xl mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2"><?php echo e(__('language.item_not_found')); ?></h3>
                <p class="text-gray-500 mb-6">
                    <?php echo e(__('language.no_items_match')); ?> <?php echo e($search); ?>.
                </p>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasMore): ?>
    <div x-data x-intersect="$wire.loadMore()" class="h-10 flex justify-center items-center mt-10">
        <span class="text-gray-400 text-sm"> <?php echo e(__('language.loading_more')); ?></span>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<div x-data="{ show: false, message: '' }"
    x-on:notify-success.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)"
    class="fixed top-6 right-6 z-[9999] w-full max-w-sm"  style="display: none;" x-show="show"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-10"
     x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-10" >
    <div
        class="bg-white/90 backdrop-blur-lg border-l-4 border-green-500 shadow-2xl rounded-2xl p-4 flex items-center gap-4 border border-stone-200">
        
        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
            <i class="fas fa-cart-plus text-green-600 text-lg"></i>
        </div>

        
        <div class="flex-1">
            <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-400"><?php echo e(__('language.cart')); ?>

            </h4>
            <p class="text-xs font-bold text-stone-800 leading-tight" x-text="message"></p>
        </div>

        
        <button @click="show = false" class="text-stone-300 hover:text-stone-600 transition-colors px-2">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
</div>
<?php /**PATH D:\laragon\www\china-app\resources\views/livewire/Pages/menu-page.blade.php ENDPATH**/ ?>