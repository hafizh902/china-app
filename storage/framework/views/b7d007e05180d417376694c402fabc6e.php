<div class="fixed bottom-6 right-6 z-[9999]" 
     x-data="{ isOpen: $wire.entangle('isOpen') }"
     @click.away="isOpen = false"
     @keydown.escape.window="isOpen = false">
    
    
    <button @click="isOpen = !isOpen" 
        class="group relative flex items-center justify-center w-14 h-16 bg-chinese-red text-white rounded-t-2xl rounded-b-lg shadow-2xl transition-all duration-300 hover:-translate-y-1 border-b-4 border-chinese-gold">
        
        <template x-if="!isOpen">
            <div class="flex flex-col items-center">
                <i class="fas fa-comment-dots text-xl text-chinese-gold"></i>
                <span class="text-[7px] font-black text-chinese-gold uppercase mt-1">Chat</span>
            </div>
        </template>
        
        <template x-if="isOpen">
            <i class="fas fa-times text-xl"></i>
        </template>

        
        <div class="absolute -bottom-3 flex gap-0.5">
            <div class="w-0.5 h-3 bg-chinese-gold opacity-50"></div>
            <div class="w-0.5 h-4 bg-chinese-gold"></div>
            <div class="w-0.5 h-3 bg-chinese-gold opacity-50"></div>
        </div>
    </button>

    
    <div x-show="isOpen" 
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-10 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        class="absolute bottom-20 right-0 w-[320px] md:w-[380px] h-[500px] bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.2)] border border-stone-100 flex flex-col overflow-hidden">
        
        
        <div class="bg-chinese-black p-4 flex items-center justify-between border-b border-chinese-gold/20">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-chinese-red rounded-xl rotate-45 flex items-center justify-center border border-chinese-gold shadow-lg">
                    <i class="fas fa-dragon text-chinese-gold text-sm -rotate-45"></i>
                </div>
                <div class="ml-1">
                    <h3 class="text-[10px] font-black text-chinese-gold uppercase tracking-widest leading-none">Golden Dragon</h3>
                    <p class="text-[14px] text-white/90 font-chinese mt-1">御用助手 <span class="text-[8px] italic text-white/40 uppercase ml-1">Imperial Concierge</span></p>
                </div>
            </div>
            <button @click="isOpen = false" class="text-white/30 hover:text-white">
                <i class="fas fa-circle-xmark text-xl"></i>
            </button>
        </div>

        
        <div id="chat-container" class="flex-grow p-5 overflow-y-auto bg-[#faf9f6] space-y-4 custom-scrollbar">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="<?php echo e($msg['role'] === 'ai' ? 'flex gap-3 max-w-[90%]' : 'flex flex-row-reverse gap-3 max-w-[90%] ml-auto'); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($msg['role'] === 'ai'): ?>
                        <div class="w-7 h-7 bg-white border border-stone-200 rounded-full flex-shrink-0 flex items-center justify-center text-[10px] text-chinese-red font-chinese font-bold shadow-sm">
                            龙
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="<?php echo e($msg['role'] === 'ai' 
                        ? 'bg-white border-l-4 border-chinese-red p-3 rounded-r-xl rounded-bl-xl shadow-sm text-stone-700' 
                        : 'bg-chinese-red text-white p-3 rounded-l-xl rounded-br-xl shadow-md'); ?> text-[11px] leading-relaxed font-medium">
                        <?php echo e($msg['text']); ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="p-4 bg-white border-t border-stone-50">
            <form wire:submit.prevent="sendMessage" class="relative flex items-center gap-2">
                <input type="text" wire:model="newMessage"
                    placeholder="Tulis pesan Anda..." 
                    class="w-full bg-stone-50 border border-stone-100 rounded-full px-4 py-2.5 text-[11px] focus:ring-1 focus:ring-chinese-red/20 outline-none">
                
                <button type="submit" class="w-9 h-9 bg-chinese-black text-chinese-gold rounded-xl flex items-center justify-center hover:bg-chinese-red transition-all shadow-lg active:scale-90">
                    <i class="fas fa-paper-plane text-[10px]"></i>
                </button>
            </form>
            
            
            <div class="flex justify-center mt-3 opacity-20">
                <i class="fas fa-yin-yang text-[10px] animate-spin-slow"></i>
            </div>
        </div>
    </div>

    <style>
        .animate-spin-slow { animation: spin 8s linear infinite; }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        .custom-scrollbar::-webkit-scrollbar { width: 3px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #d4af3733; border-radius: 10px; }
    </style>
</div><?php /**PATH D:\laragon\www\china-app\resources\views/livewire/chat-assistant.blade.php ENDPATH**/ ?>