<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterModal extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function openModal()
    {
        $this->showModal = true;
        $this->resetValidation();
        $this->reset(['name', 'email', 'password', 'password_confirmation']);
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
        $this->reset(['name', 'email', 'password', 'password_confirmation']);
    }

    protected $listeners = [
        'open-register-modal' => 'openModal',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $this->closeModal();

        // Dispatch success alert
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Terima kasih telah bergabung, ' . $user->name . '! Akun Anda telah berhasil dibuat.',
            'title' => 'Pendaftaran Berhasil'
        ]);

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.register-modal');
    }
}
