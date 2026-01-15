<?php
namespace App\Livewire\Auth;

use Livewire\Component;

class ResetPasswordModal extends Component
{
    public $showModal = false;

    // Menangani pembukaan modal
    protected $listeners = [
        'open-reset-password-modal' => 'openModal',
        'close-login-modal' => 'closeModal',
        'close-reset-password-modal' => 'closeModal',
    ];

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.auth.reset-password-modal');
    }
}
