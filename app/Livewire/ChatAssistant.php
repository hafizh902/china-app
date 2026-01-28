<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\AiService;
use App\Services\RestaurantAiService;


class ChatAssistant extends Component
{
    public $isOpen = false;
    public $newMessage = '';
    public $messages = [];

    public function mount()
    {
        // Pesan sambutan awal dengan sentuhan brand yang lebih kuat
        if (empty($this->messages)) {
            $this->messages[] = [
                'role' => 'ai',
                'text' => 'Selamat datang di Golden Dragon Pavilion. Saya Concierge Imperial Anda. Ada yang bisa saya bantu mengenai menu atau reservasi hari ini? 🏮'
            ];
        }
    }

    /**
     * Sinkronisasi status buka/tutup dari Frontend ke Backend
     * Penting agar status $isOpen di Livewire tidak 'desync' saat ditutup via Alpine
     */
    public function toggleChat()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function sendMessage()
    {
        $validated = trim($this->newMessage);
        if (empty($validated)) return;

        // 1. Simpan pesan user
        $this->messages[] = [
            'role' => 'user',
            'text' => $validated
        ];

        $this->newMessage = '';
        $this->dispatch('scroll-bottom');

        // 2. Panggil AI
        $this->askAi();
    }

    protected function askAi()
    {
        try {
            $restaurantAi = app(RestaurantAiService::class);
            $aiService = app(AiService::class);

            $messages = $restaurantAi->buildMessages($this->messages);

            $reply = $aiService->chat($messages);

            $this->messages[] = [
                'role' => 'ai',
                'text' => $reply
            ];
        } catch (\Throwable $e) {
            logger()->error('Chat AI Error', [
                'error' => $e->getMessage()
            ]);

            $this->messages[] = [
                'role' => 'ai',
                'text' => 'Mohon maaf, sistem kami sedang mengalami gangguan.'
            ];
        }

        $this->dispatch('scroll-bottom');
    }


    protected function autoReply($query)
    {
        // Ini hanya placeholder logika backend
        // Anda bisa mengintegrasikan OpenAI / Claude di sini
        $this->messages[] = [
            'role' => 'ai',
            'text' => 'Terima kasih telah bertanya. Saya sedang memproses informasi mengenai "' . $query . '". Mohon tunggu sebentar...'
        ];

        $this->dispatch('scroll-bottom');
    }

    public function render()
    {
        return view('livewire.chat-assistant');
    }
}
