<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginModal extends Component
{
    public $email;
    public $password;
    public $remember = false;
    public $showModal = false;

    protected $rules = [
        'email' => 'required|string|email',
        'password' => 'required|string',
    ];

    public function openModal()
    {
        $this->showModal = true;
        $this->resetValidation();
        $this->reset(['email', 'password', 'remember']);
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
        $this->reset(['email', 'password', 'remember']);
    }

    protected $listeners = [
        'open-login-modal' => 'openModal',
        'close-register-modal' => 'closeModal',
    ];

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->closeModal();

            // Dispatch success alert
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Selamat datang kembali, ' . Auth::user()->name . '! Semoga hari Anda menyenangkan.',
                'title' => 'Login Berhasil'
            ]);

            return redirect('/');
        }

        $this->addError('email', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login-modal');
    }
}
