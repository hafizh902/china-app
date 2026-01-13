<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AuthModal extends Component
{
    public $isLogin = true; // true untuk login, false untuk register

    // Login fields
    public $loginEmail;
    public $loginPassword;
    public $remember = false;

    // Register fields
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public $showModal = false;

    protected function rules()
    {
        if ($this->isLogin) {
            return [
                'loginEmail' => 'required|string|email',
                'loginPassword' => 'required|string',
            ];
        } else {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ];
        }
    }

    public function openModal($isLogin = true)
    {
        $this->isLogin = $isLogin;
        $this->showModal = true;
        $this->resetValidation();
        $this->resetFields();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
        $this->resetFields();
    }

    private function resetFields()
    {
        if ($this->isLogin) {
            $this->reset(['loginEmail', 'loginPassword', 'remember']);
        } else {
            $this->reset(['name', 'email', 'password', 'password_confirmation']);
        }
    }

    public function switchToLogin()
    {
        $this->isLogin = true;
        $this->resetValidation();
        $this->resetFields();
    }

    public function switchToRegister()
    {
        $this->isLogin = false;
        $this->resetValidation();
        $this->resetFields();
    }

    protected $listeners = [
        'open-login-modal' => 'openModalForLogin',
        'open-register-modal' => 'openModalForRegister',
    ];

    public function openModalForLogin()
    {
        $this->openModal(true);
    }

    public function openModalForRegister()
    {
        $this->openModal(false);
    }

    public function login()
    {
        $this->validate([
            'loginEmail' => 'required|string|email',
            'loginPassword' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $this->loginEmail, 'password' => $this->loginPassword], $this->remember)) {
            $this->closeModal();
            return redirect()->refresh();
        }

        $this->addError('loginEmail', 'Email atau password salah.');
    }

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $this->closeModal();
        return redirect()->refresh();
    }

    public function render()
    {
        return view('livewire.auth.auth-modal');
    }
}