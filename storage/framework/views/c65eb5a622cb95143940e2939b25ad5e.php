<footer class="relative bg-stone-900 text-stone-300 overflow-hidden">
    
    <div class="h-1.5 w-full bg-gradient-to-r from-red-800 via-amber-400 to-red-800"></div>
    
    <div class="max-w-7xl mx-auto px-6 py-12 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            
            
            <div class="md:col-span-4">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-red-700 rounded-lg flex items-center justify-center border border-amber-500/50 shadow-[0_0_15px_rgba(185,28,28,0.4)]">
                        <span class="text-amber-400 font-serif text-2xl font-bold">福</span>
                    </div>
                    <span class="text-white font-serif text-xl font-bold tracking-widest uppercase">The Dragon <br> <span class="text-amber-500 text-xs tracking-[0.3em]">Kitchen</span></span>
                </div>
                <p class="text-sm leading-relaxed text-stone-400 italic mb-6">
                     <?php echo e(__('language.footer_tagline')); ?>

                </p>
                
                <div class="flex gap-3">
                    <a href="#" class="w-8 h-8 rounded-full bg-stone-800 flex items-center justify-center hover:bg-red-700 transition-all text-white text-xs border border-stone-700">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/<?php echo e(\App\Models\SystemConfig::get('footer_phone')[0]['footer_phone'] ?? ''); ?>" class="w-8 h-8 rounded-full bg-stone-800 flex items-center justify-center hover:bg-red-700 transition-all text-white text-xs border border-stone-700">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            
            <div class="md:col-span-5">
                <h4 class="text-white font-serif font-bold mb-6 flex items-center gap-2 uppercase tracking-widest text-sm">
                    <span class="w-6 h-[1px] bg-amber-500"></span>
                    <?php echo e(__('language.masterminds')); ?>

                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    
                    <a href="https://github.com/hafizh902" target="_blank" class="group flex flex-col items-center p-3 rounded-xl bg-stone-800/40 border border-stone-700/50 hover:border-amber-500/50 transition-all">
                        <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-stone-700 group-hover:border-red-600 transition-all mb-2 shadow-lg">
                            <img src="https://avatars.githubusercontent.com/u/176177899?v=4" alt="Dev 1" class="w-full h-full object-cover">
                        </div>
                        <span class="text-[10px] font-bold text-stone-300 group-hover:text-amber-400 truncate w-full text-center">Hafizh</span>
                        <span class="text-[8px] text-stone-500 uppercase tracking-tighter"></span>
                    </a>

                    
                    <a href="https://github.com/revanzaRaihan" target="_blank" class="group flex flex-col items-center p-3 rounded-xl bg-stone-800/40 border border-stone-700/50 hover:border-amber-500/50 transition-all">
                        <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-stone-700 group-hover:border-red-600 transition-all mb-2 shadow-lg">
                            <img src="https://avatars.githubusercontent.com/u/176389096?v=4" alt="Dev 2" class="w-full h-full object-cover">
                        </div>
                        <span class="text-[10px] font-bold text-stone-300 group-hover:text-amber-400 truncate w-full text-center">Revanza</span>
                        <span class="text-[8px] text-stone-500 uppercase tracking-tighter"></span>
                    </a>

                    
                    <a href="https://github.com/Darren-Putra" target="_blank" class="group flex flex-col items-center p-3 rounded-xl bg-stone-800/40 border border-stone-700/50 hover:border-amber-500/50 transition-all">
                        <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-stone-700 group-hover:border-red-600 transition-all mb-2 shadow-lg">
                            <img src="https://avatars.githubusercontent.com/u/176541287?v=4" alt="Dev 3" class="w-full h-full object-cover">
                        </div>
                        <span class="text-[10px] font-bold text-stone-300 group-hover:text-amber-400 truncate w-full text-center">Darren</span>
                        <span class="text-[8px] text-stone-500 uppercase tracking-tighter"></span>
                    </a>
                </div>
            </div>

            
            <div class="md:col-span-3">
                <h4 class="text-white font-serif font-bold mb-6 flex items-center gap-2 uppercase tracking-widest text-sm">
                    <span class="w-6 h-[1px] bg-amber-500"></span>
                    <?php echo e(__('language.contact')); ?>

                </h4>
                <ul class="space-y-3 text-xs text-stone-400">
                    <li class="flex items-center gap-3">
                        <i class="fas fa-map-marker-alt text-red-600"></i>
                        <span><?php echo e(\App\Models\SystemConfig::get('footer_address')[0]['footer_address'] ?? ''); ?></span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone-alt text-red-600"></i>
                        <span><?php echo e(\App\Models\SystemConfig::get('footer_phone')[0]['footer_phone'] ?? ''); ?></span>
                    </li>
                    <li class="mt-6 pt-4 border-t border-stone-800">
                    <div>
                <h4 class="text-white font-serif font-bold mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 bg-red-700 rotate-45"></span>
                    <?php echo e(__('language.operational_hours')); ?>

                </h4>
                <div class="space-y-2 text-sm text-stone-400">
                    <p class="flex justify-between"><span><?php echo e(__('language.weekday')); ?>:</span> <span class="text-white">10:00 - 22:00</span></p>
                    <p class="flex justify-between"><span><?php echo e(__('language.weekend')); ?>:</span> <span class="text-white">09:00 - 23:00</span></p>
                    <p class="mt-4 pt-4 border-t border-stone-800 text-[10px] uppercase tracking-widest text-amber-500/60 font-bold">
                        <?php echo e(__('language.open_cny')); ?>

                    </p>
                </div>
            </div>
                    </li>
                </ul>
            </div>
        </div>

        
        <div class="absolute bottom-4 right-6 text-9xl font-serif text-white/[0.02] select-none pointer-events-none">龍</div>
    </div>

    
    <div class="bg-black py-6 border-t border-stone-800/50">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4 text-[9px] uppercase tracking-[0.3em] text-stone-500 font-medium">
            <p>&copy; 2026 The Dragon Kitchen. <?php echo e(__('language.crafted_with_prosperity')); ?></p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-amber-500 transition-colors"><?php echo e(__('language.privacy')); ?></a>
                <a href="#" class="hover:text-amber-500 transition-colors"><?php echo e(__('language.terms')); ?></a>
                <a href="https://github.com/hafizh902/china-app" class="flex items-center gap-2 text-white hover:text-amber-400">
                    <i class="fab fa-github text-sm"></i> Repository
                </a>
            </div>
        </div>
    </div>
</footer><?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/livewire/Pages/footer-page.blade.php ENDPATH**/ ?>