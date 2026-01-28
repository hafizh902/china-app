<?php

namespace App\Livewire;

use Livewire\Component;

class ChatAssistant extends Component
{
    public $isOpen = false;
    public $newMessage = '';
    public $messages = [];

    public function mount()
    {
        // Pesan sambutan awal
        $this->messages[] = [
            'role' => 'ai',
            'text' => 'Halo! Saya asisten AI Golden Dragon. Ada yang bisa saya bantu terkait pesanan atau menu kami hari ini? 🏮'
        ];
    }

    public function toggleChat()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function sendMessage()
    {
        if (empty(trim($this->newMessage))) return;

        // Tambahkan pesan user ke array
        $this->messages[] = [
            'role' => 'user',
            'text' => $this->newMessage
        ];

        $input = $this->newMessage;
        $this->newMessage = '';

        // Di sini nanti Anda bisa menambahkan logika Backend AI
        // Untuk sekarang, kita buat simulasi respon statis
        $this->dispatch('scroll-bottom');
    }

    public function render()
    {
        return view('livewire.chat-assistant');
    }
}