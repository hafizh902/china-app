<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;

class PreviewModal extends Component
{
    public $showModal = false;
    public $selectedItem = null;

    protected $listeners = [
        'open-preview-modal' => 'openModal',  // Mendengarkan event untuk membuka modal
        'close-preview-modal' => 'closeModal', // Mendengarkan event untuk menutup modal
    ];

    public function openModal($itemId = null)
    {
        if ($itemId) {
            $this->selectedItem = Menu::find($itemId);
            $this->showModal = true;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedItem = null;
    }

    public function render()
    {

        return view('livewire.Pages.preview-modal');
    }
}
