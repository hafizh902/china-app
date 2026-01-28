<div class="fixed bottom-6 right-6 z-[999]">
    {{-- TOMBOL FLOAT (Tema Lentera Chinese) --}}
    <button wire:click="toggleChat" 
        class="group relative flex items-center justify-center w-16 h-16 bg-chinese-red hover:bg-chinese-black text-white rounded-2xl shadow-[0_10px_30px_rgba(196,30,58,0.4)] transition-all duration-500 active:scale-95 border-b-4 border-chinese-gold">
        
        @if(!$isOpen)
            {{-- Icon Lentera Modern --}}
            <div class="flex flex-col items-center gap-0.5">
                <div class="w-1 h-2 bg-chinese-gold rounded-full"></div>
                <i class="fas fa-lightbulb text-2xl text-chinese-gold shadow-sm"></i>
                <div class="w-4 h-1 bg-chinese-gold/50 rounded-full"></div>
            </div>
        @else
            <i class="fas fa-times text-2xl text-white"></i>
        @endif

        {{-- Label Tipis --}}
        <span class="absolute -top-10 right-0 bg-chinese-black text-chinese-gold text-[9px] px-2 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity uppercase tracking-widest border border-chinese-gold/30">
            Ask Dragon
        </span>
    </button>

    {{-- JENDELA CHAT --}}
    <div x-show="$wire.isOpen" 
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-10 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        class="absolute bottom-20 right-0 w-[350px] md:w-[400px] h-[580px] bg-[#FCF9F2] rounded-t-[2.5rem] rounded-b-[1rem] shadow-[0_20px_60px_rgba(0,0,0,0.3)] border-t-4 border-chinese-red flex flex-col overflow-hidden">
        
        {{-- HEADER: Chinese Pavilion Style --}}
        <div class="bg-chinese-black p-6 flex items-center justify-between relative overflow-hidden">
            {{-- Dekorasi Pattern Awan (Subtle) --}}
            <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/oriental-tiles.png');"></div>
            
            <div class="flex items-center gap-4 relative z-10">
                <div class="w-12 h-12 bg-chinese-red border-2 border-chinese-gold rounded-full flex items-center justify-center shadow-lg">
                    <i class="fas fa-dragon text-chinese-gold text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xs font-black text-chinese-gold uppercase tracking-[0.3em]">Dragon Pavilion</h3>
                    <p class="text-[10px] text-white/60 font-chinese uppercase tracking-tighter">Customer Service AI</p>
                </div>
            </div>
            
            <button wire:click="toggleChat" class="text-chinese-gold/50 hover:text-chinese-gold transition-colors relative z-10">
                <i class="fas fa-circle-xmark text-xl"></i>
            </button>
        </div>

        {{-- AREA CHAT --}}
        <div id="chat-container" class="flex-grow p-6 overflow-y-auto space-y-6 scroll-smooth bg-transparent">
            @foreach($messages as $msg)
                <div class="{{ $msg['role'] === 'ai' ? 'flex gap-3 max-w-[90%]' : 'flex flex-row-reverse gap-3 max-w-[90%] ml-auto' }}">
                    
                    @if($msg['role'] === 'ai')
                        <div class="w-8 h-8 bg-chinese-black border border-chinese-gold rounded-lg flex-shrink-0 flex items-center justify-center shadow-sm">
                            <i class="fas fa-fan text-[10px] text-chinese-gold animate-spin-slow"></i>
                        </div>
                    @endif

                    <div class="{{ $msg['role'] === 'ai' 
                        ? 'bg-white border-l-4 border-chinese-red p-4 rounded-r-xl rounded-bl-xl shadow-sm' 
                        : 'bg-chinese-red p-4 rounded-l-xl rounded-br-xl shadow-md shadow-chinese-red/10' }}">
                        <p class="{{ $msg['role'] === 'ai' ? 'text-[12px] text-stone-800' : 'text-[12px] text-white' }} leading-relaxed font-medium">
                            {{ $msg['text'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- INPUT AREA --}}
        <div class="p-5 bg-white border-t border-stone-200/50">
            <form wire:submit.prevent="sendMessage" class="flex items-center gap-3">
                <div class="relative flex-grow">
                    <input type="text" 
                        wire:model="newMessage"
                        placeholder="Type your message..." 
                        class="w-full bg-stone-100 border-none rounded-xl px-4 py-3 text-[12px] focus:ring-2 focus:ring-chinese-red/20 outline-none text-chinese-black font-medium">
                </div>
                
                <button type="submit" 
                    class="w-12 h-12 bg-chinese-black text-chinese-gold rounded-xl flex items-center justify-center hover:bg-chinese-red hover:text-white transition-all shadow-md active:scale-90 border border-chinese-gold/20">
                    <i class="fas fa-paper-plane text-sm"></i>
                </button>
            </form>
            
            <div class="mt-4 flex items-center justify-center gap-3 opacity-20">
                <span class="text-[14px] font-chinese text-chinese-black">福</span>
                <p class="text-[8px] text-chinese-black font-black uppercase tracking-[0.3em]">Dragon Pavilion Assistant</p>
                <span class="text-[14px] font-chinese text-chinese-black">禄</span>
            </div>
        </div>
    </div>

    <style>
        .animate-spin-slow {
            animation: spin 6s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>

    <script>
        window.addEventListener('scroll-bottom', event => {
            setTimeout(() => {
                const container = document.getElementById('chat-container');
                if(container) container.scrollTop = container.scrollHeight;
            }, 100);
        });
    </script>
</div>