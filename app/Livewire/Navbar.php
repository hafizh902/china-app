<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $showLogoutConfirm = false; 
    public $search = '';
    public $currentLocale = 'en';

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



    public function updatedSearch()
    {
        if (!empty($this->search)) {
            return redirect()->route('menu', ['search' => $this->search]);
        }
    }


      public function setLanguage($locale)
      {
          $this->currentLocale = $locale;
          session(['locale' => $this->currentLocale]);
          app()->setLocale($this->currentLocale);
          $this->dispatch('language-switched');
      }

    public function mount()
    {
        $this->currentLocale = session('locale', 'cn');
    }


    // Render tampilan navbar
    public function render()
    {
        return view('livewire.navbar');
    }
}
