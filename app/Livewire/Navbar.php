<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $showLogoutConfirm = false; // Variabel untuk kontrol tampilan modal logout

    // Fungsi untuk membuka login modal
    public function openLoginModal()
    {
        $this->dispatch('open-login-modal');
    }

    // Fungsi untuk membuka register modal
    public function openRegisterModal()
    {
        $this->dispatch('open-register-modal');
    }

    public function openLogoutModal()
    {
        // Mengirim event browser ke client untuk membuka modal logout
        $this->dispatch('open-logout-modal');
    }
    // Render tampilan navbar
    public function render()
    {
        return view('livewire.navbar');
    }
}
