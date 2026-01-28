<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

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
        // Validasi input
        $validated = trim($this->newMessage);
        if (empty($validated)) return;

        // 1. Simpan pesan User
        $this->messages[] = [
            'role' => 'user',
            'text' => $validated
        ];

        // Backup pesan untuk diproses ke AI nantinya
        $userQuery = $this->newMessage;
        
        // 2. Reset input field
        $this->newMessage = '';

        // 3. Simulasi Respon AI (Nanti ganti dengan API Call)
        // Kita beri delay sedikit agar terasa 'berpikir'
        $this->dispatch('scroll-bottom');
        
        // Contoh respon otomatis sederhana untuk testing
        $this->autoReply($userQuery);
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