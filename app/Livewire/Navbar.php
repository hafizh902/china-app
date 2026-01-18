<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $showLogoutConfirm = false;
    public $search = '';
    public $currentLocale;

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

    public function mount()
    {
        $this->currentLocale = session('locale', config('app.locale'));
        app()->setLocale($this->currentLocale);
    }

    public function setLanguage($locale)
    {
        if (!in_array($locale, ['en', 'cn'])) return;

        session(['locale' => $locale]);
        app()->setLocale($locale);

        // Redirect to refresh the page with new locale
        return redirect(request()->fullUrl());
    }



    // Render tampilan navbar
    public function render()
    {
        return view('livewire.navbar');
    }
}
