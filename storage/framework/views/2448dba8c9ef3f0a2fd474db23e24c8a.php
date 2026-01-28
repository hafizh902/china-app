<div class="p-8 bg-stone-50 min-h-screen">
    
    <div class="flex justify-between items-end mb-8 sticky top-0 z-40 bg-stone-50 pb-4">
        <div>
            <h1 class="text-3xl font-serif font-black text-stone-800 tracking-tight">Menu Catalog</h1>
            <p class="text-sm text-stone-500 mt-1 uppercase tracking-widest font-medium">Set availability and price
                your restaurant dishes</p>
        </div>
        <div class="flex gap-3">
            <button wire:click="toggleDeleteMode"
                class="px-5 py-2.5 rounded-xl border-2 <?php echo e($deleteMode ? 'bg-red-50 border-red-600 text-red-600' : 'border-stone-200 text-stone-600 hover:bg-stone-100'); ?> transition-all text-sm font-bold flex items-center gap-2">
                <i class="fas <?php echo e($deleteMode ? 'fa-times' : 'fa-trash-alt'); ?>"></i>
                <?php echo e($deleteMode ? 'Cancel Delete' : 'Delete Mode'); ?>

            </button>
            <button wire:click="openCreateModal"
                class="px-6 py-2.5 bg-red-800 hover:bg-red-700 text-white rounded-xl shadow-lg shadow-red-900/20 transition-all text-sm font-bold flex items-center gap-2">
                <i class="fas fa-plus"></i>
                Add New Menu
            </button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-9">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div wire:key="menu-<?php echo e($item->id); ?>"
                        class="group bg-white rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-300 border border-stone-200 overflow-hidden flex flex-col relative <?php echo e(!$item->is_available ? 'opacity-75' : ''); ?>">

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deleteMode): ?>
                            <div class="absolute inset-0 bg-red-900/10 z-30 cursor-pointer flex items-start p-4"
                                wire:click="toggleSelection(<?php echo e($item->id); ?>)">
                                <input type="checkbox" <?php echo e(in_array($item->id, $selectedItems) ? 'checked' : ''); ?>

                                    class="w-6 h-6 text-red-600 bg-white border-2 border-stone-300 rounded-lg focus:ring-red-500 transition-transform group-hover:scale-110">
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        
                        <div class="relative h-48 overflow-hidden bg-stone-100">
                            <span
                                class="absolute top-4 right-4 z-20 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm <?php echo e($item->is_available ? 'bg-green-100 text-green-700' : 'bg-stone-200 text-stone-500'); ?>">
                                <?php echo e($item->is_available ? 'Tersedia' : 'Habis'); ?>

                            </span>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->image): ?>
                                <img src="<?php echo e($item->image_url); ?>"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="fas fa-utensils text-4xl text-stone-200"></i>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-stone-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$deleteMode): ?>
                                    <button wire:click="edit(<?php echo e($item->id); ?>)"
                                        class="w-full py-2 bg-white/95 backdrop-blur text-stone-900 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-red-700 hover:text-white transition-colors">
                                        Edit Menu
                                    </button>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="p-5 flex-1 flex flex-col">
                            <div class="flex justify-between items-start mb-2">
                                <span
                                    class="text-[10px] font-black text-red-700 uppercase tracking-[0.2em]"><?php echo e(str_replace('_', ' ', $item->category_label)); ?></span>
                            </div>
                            <h3 class="font-serif font-bold text-stone-800 text-lg leading-tight mb-1 truncate">
                                <?php echo e($item->name); ?></h3>
                            <p class="text-xs text-stone-500 line-clamp-2 mb-4 leading-relaxed italic">
                                <?php echo e($item->description); ?></p>

                            <div class="mt-auto pt-4 border-t border-stone-100 flex justify-between items-center">
                                <span class="text-lg font-black text-stone-900 tracking-tighter">
                                    <span
                                        class="text-xs font-medium text-stone-400 mr-1">Rp</span><?php echo e(number_format($item->price, 0, ',', '.')); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-3 space-y-6">
            
            <div class="bg-white rounded-[2rem] shadow-sm border border-stone-200 p-6 sticky top-8">
                <h4 class="text-xs font-black uppercase tracking-[0.2em] text-stone-400 mb-4">
                    Search & Filters</h4>

                <div class="space-y-4">
                    <div class="relative">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
                        <input type="text" wire:model.live.debounce.500ms="search"
                            placeholder="Look for the menu name..."
                            class="w-full pl-10 pr-4 py-3 bg-stone-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-red-700 font-medium">
                    </div>

                    <select wire:model.live="filterCategory"
                        class="w-full bg-stone-50 border-none rounded-xl text-sm font-bold py-3 px-4 focus:ring-2 focus:ring-red-700">
                        <option value="">All Categories</option>
                        <option value="main_course">🍛 Main Course</option>
                        <option value="snacks">🍟 Side Dish</option>
                        <option value="drinks">🥤 Drinks</option>
                        <option value="desserts">🍰 Desserts</option>
                    </select>

                    <div class="grid grid-cols-2 gap-2">
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-[8px] font-bold text-stone-400 uppercase">Min</span>
                            <input type="number" wire:model.live="minPrice"
                                class="w-full pt-5 pb-2 px-3 bg-stone-50 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-red-700">
                        </div>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-[8px] font-bold text-stone-400 uppercase">Max</span>
                            <input type="number" wire:model.live="maxPrice"
                                class="w-full pt-5 pb-2 px-3 bg-stone-50 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-red-700">
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button wire:click="resetFilter"
                            class="flex-1 py-3 bg-stone-100 text-stone-600 rounded-xl text-xs font-bold hover:bg-stone-200 transition-colors">Reset</button>
                        <button wire:click="applyFilter"
                            class="flex-[2] py-3 bg-stone-900 text-white rounded-xl text-xs font-bold hover:bg-stone-800 transition-colors shadow-lg shadow-stone-900/20">Apply</button>
                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deleteMode && count($selectedItems) > 0): ?>
                    <div class="mt-6 pt-6 border-t border-stone-100">
                        <button wire:click="deleteSelected"
                            class="w-full py-4 bg-red-600 text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-red-700 transition-all shadow-lg shadow-red-900/20 animate-bounce">
                            Delete <?php echo e(count($selectedItems)); ?> Selected Menu
                        </button>
                        <p class="text-xs text-stone-500 mt-2">Selected: <?php echo e(implode(', ', $selectedItems)); ?></p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->hasPages()): ?>
                    <div class="mt-8 flex justify-between items-center bg-stone-50 p-2 rounded-2xl">
                        <button wire:click="previousPage" <?php if($items->onFirstPage()): echo 'disabled'; endif; ?>
                            class="w-10 h-10 flex items-center justify-center rounded-xl <?php echo e($items->onFirstPage() ? 'text-stone-300' : 'text-stone-600 hover:bg-white'); ?>">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                        <span class="text-xs font-black text-stone-800 uppercase tracking-widest">Hal
                            <?php echo e($items->currentPage()); ?></span>
                        <button wire:click="nextPage" <?php if(!$items->hasMorePages()): echo 'disabled'; endif; ?>
                            class="w-10 h-10 flex items-center justify-center rounded-xl <?php echo e(!$items->hasMorePages() ? 'text-stone-300' : 'text-stone-600 hover:bg-white'); ?>">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>

    
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e7e5e4;
            border-radius: 10px;
        }
    </style>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showCreateModal): ?>
        <div class="fixed inset-0 z-[150] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-md" wire:click="$set('showCreateModal', false)">
            </div>

            <div class="relative bg-white rounded-[2.5rem] w-full max-w-3xl shadow-2xl overflow-hidden animate-zoom-in">
                
                <div class="bg-red-800 p-8 text-white flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-serif font-bold">Add New Dish</h2>
                        <p class="text-[10px] uppercase tracking-[0.3em] opacity-70">Complete recipe details and menu
                            information.</p>
                    </div>
                    <button wire:click="$set('showCreateModal', false)"
                        class="text-white/50 hover:text-white transition-colors">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-2 gap-8">
                        
                        <div x-data="{ dragging: false }" @dragover.prevent="dragging = true"
                            @dragleave.prevent="dragging = false"
                            @drop.prevent="dragging = false; $refs.fileInput.files = $event.dataTransfer.files; $refs.fileInput.dispatchEvent(new Event('change'))"
                            class="space-y-4">

                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400">Photo
                                Dish</label>
                            <div :class="dragging ? 'border-red-500 bg-red-50' : 'border-stone-200 bg-stone-50'"
                                class="w-full h-72 border-2 border-dashed rounded-[2rem] flex flex-col items-center justify-center overflow-hidden transition-all relative group">

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($image): ?>
                                    <img src="<?php echo e($image->temporaryUrl()); ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <i
                                        class="fas fa-cloud-upload-alt text-4xl text-stone-300 mb-3 group-hover:text-red-700 transition-colors"></i>
                                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">Drag the
                                        photo here</p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <input type="file" wire:model="image" x-ref="fileInput" class="hidden">
                            <button type="button" @click="$refs.fileInput.click()"
                                class="w-full py-3 bg-stone-100 text-stone-600 rounded-xl text-xs font-bold hover:bg-stone-200 transition-all">Select
                                Image File
                            </button>
                        </div>

                        
                        <div class="space-y-4">
                            <div>
                                <label
                                    class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Name
                                    Menu</label>
                                <input type="text" wire:model.defer="name"
                                    placeholder="Contoh: Bebek Goreng Keraton"
                                    class="w-full bg-stone-50 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-red-700 font-bold">
                            </div>

                            <div>
                                <label
                                    class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Description
                                    Short</label>
                                <textarea wire:model.defer="description" rows="2"
                                    class="w-full bg-stone-50 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-red-700 font-medium text-sm"></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Category</label>
                                    <select wire:model.defer="category"
                                        class="w-full bg-stone-50 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-red-700 font-bold text-sm">
                                        <option value="">
                                            Choose...</option>
                                        <option value="main_course">Main Course</option>
                                        <option value="snacks">Side Dish</option>
                                        <option value="drinks">Drinks</option>
                                        <option value="desserts">Dessert</option>
                                    </select>
                                </div>
                                <div x-data="{ display: '', format(v) { return v.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); } }">
                                    <label
                                        class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Price
                                        (Rp)</label>
                                    <input type="text" x-model="display"
                                        x-on:input="let raw = display.replace(/\D/g,''); $wire.price = raw; display = format(raw);"
                                        class="w-full bg-stone-50 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-red-700 font-black text-red-700">
                                </div>
                            </div>

                            <div class="flex items-center gap-3 pt-4">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model.defer="is_available" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-stone-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                    </div>
                                </label>
                                <span class="text-xs font-bold text-stone-600 uppercase">
                                    Available to order</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-10">
                        <button type="button" wire:click="$set('showCreateModal', false)"
                            class="px-8 py-3 bg-stone-100 text-stone-600 rounded-xl font-bold text-xs uppercase tracking-widest">Cancel</button>
                        <button type="button" wire:click="store"
                            class="px-10 py-3 bg-red-800 text-white rounded-xl font-black text-xs uppercase tracking-widest shadow-lg shadow-red-900/20 hover:bg-red-700 transition-all">Save
                            Menu</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showEditModal): ?>
        <div class="fixed inset-0 z-[150] flex items-center justify-center p-4">
            
            <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-md" wire:click="$set('showEditModal', false)">
            </div>

            
            <div
                class="relative bg-white rounded-[2.5rem] w-full max-w-3xl shadow-2xl overflow-hidden animate-zoom-in">
                
                <div class="bg-stone-900 p-8 text-white flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-serif font-bold">
                            Update Dishes</h2>
                        <p class="text-[10px] uppercase tracking-[0.3em] opacity-70">Adjust menu details, prices, or availability</p>
                    </div>
                    <button wire:click="$set('showEditModal', false)"
                        class="text-white/50 hover:text-white transition-colors">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-2 gap-8">
                        
                        <div class="space-y-4">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400">Photo Dish</label>
                            <div
                                class="w-full h-72 border-2 border-stone-200 bg-stone-50 rounded-[2rem] flex flex-col items-center justify-center overflow-hidden relative group">

                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($image): ?>
                                    <img src="<?php echo e($image->temporaryUrl()); ?>" class="w-full h-full object-cover">
                                <?php elseif(isset($menu) && $menu->image_url): ?>
                                    <img src="<?php echo e($menu->image_url); ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <i class="fas fa-image text-4xl text-stone-200"></i>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                
                                <div
                                    class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button type="button"
                                        onclick="document.getElementById('edit-image-input').click()"
                                        class="bg-white text-stone-900 px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest">Change Photo
                                    </button>
                                </div>
                            </div>

                            <input type="file" id="edit-image-input" wire:model="image" class="hidden"
                                accept="image/*">
                            <p class="text-center text-[9px] text-stone-400 uppercase tracking-tighter italic">*Click on the image to change the photo.</p>
                        </div>

                        
                        <div class="space-y-4">
                            <div>
                                <label
                                    class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Name
                                    Menu</label>
                                <input type="text" wire:model.defer="name"
                                    class="w-full bg-stone-50 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-stone-900 font-bold text-stone-800">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-red-600 text-[10px] font-bold mt-1 ml-1"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <div>
                                <label
                                    class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Description
                                    Short</label>
                                <textarea wire:model.defer="description" rows="2"
                                    class="w-full bg-stone-50 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-stone-900 font-medium text-sm text-stone-600 resize-none"></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Category</label>
                                    <select wire:model.defer="category"
                                        class="w-full bg-stone-50 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-stone-900 font-bold text-sm">
                                        <option value="main_course">Main Course</option>
                                        <option value="snacks">Side Dish</option>
                                        <option value="drinks">Drinks</option>
                                        <option value="desserts">Dessert</option>
                                    </select>
                                </div>
                                <div x-data="{
                                    display: '',
                                    format(v) { return v.toString().replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.'); },
                                    init() { this.display = this.format($wire.price || '0'); }
                                }">
                                    <label
                                        class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Price
                                        (Rp)</label>
                                    <input type="text" x-model="display"
                                        x-on:input="let raw = display.replace(/\D/g,''); $wire.price = raw; display = format(raw);"
                                        class="w-full bg-stone-50 border-none rounded-xl py-3 px-4 focus:ring-2 focus:ring-stone-900 font-black text-stone-900">
                                </div>
                            </div>

                            
                            <div class="flex items-center justify-between bg-stone-50 p-4 rounded-2xl pt-4">
                                <span class="text-xs font-bold text-stone-600 uppercase tracking-widest">Status Availability</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model.defer="is_available" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-stone-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex justify-end gap-3 mt-10">
                        <button type="button" wire:click="$set('showEditModal', false)"
                            class="px-8 py-3 bg-stone-100 text-stone-600 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-stone-200 transition-all">
                            Cancel
                        </button>
                        <button type="button" wire:click="update" wire:loading.attr="disabled"
                            class="px-10 py-3 bg-stone-900 text-white rounded-xl font-black text-xs uppercase tracking-widest shadow-lg shadow-stone-900/20 hover:bg-stone-800 transition-all flex items-center gap-2">
                            <span wire:loading.remove>Update Menu</span>
                            <span wire:loading><i class="fas fa-spinner fa-spin mr-2"></i> Save...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\projek 12\china-app\resources\views/livewire/Admin/menu-management.blade.php ENDPATH**/ ?>