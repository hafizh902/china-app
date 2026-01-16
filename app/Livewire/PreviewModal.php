<?php

namespace App\Livewire;

use Livewire\Component;

class PreviewModal extends Component
{
    public $showModal = false;
    public $selectedItem = null;

    protected $listeners = [
        'preview-modal' => 'openModal',  // Mendengarkan event untuk membuka modal
        'close-preview-modal' => 'closeModal', // Mendengarkan event untuk menutup modal
    ];

    public function openModal($item = null)
    {
        $this->selectedItem = $item;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedItem = null;
    }

    public function render()
    {

        return view('livewire.pages.preview-modal');
    }
}
