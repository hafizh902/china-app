<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $showLogoutConfirm = false;

    public function openLoginModal()
    {
        $this->dispatch('open-login-modal');
    }

    public function openRegisterModal()
    {
        $this->dispatch('open-register-modal');
    }

    public function confirmLogout()
    {
        $this->showLogoutConfirm = true;
    }

    public function cancelLogout()
    {
        $this->showLogoutConfirm = false;
    }

    public function logout()
    {
        Auth::logout();
        $this->showLogoutConfirm = false;

        // Dispatch success alert
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Anda telah berhasil logout. Sampai jumpa lagi!',
            'title' => 'Logout Berhasil'
        ]);

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}