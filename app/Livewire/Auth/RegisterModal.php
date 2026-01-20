<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmailOtpMail;

class RegisterModal extends Component
{
    public $step = 1;

    public $email;
    public $verification_code;
    public $generated_code;

    public $name;
    public $password;
    public $password_confirmation;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function mount()
    {
        // PENTING: jangan reset step di sini
        $this->step = 1;
    }

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
        'close-register-modal' => 'closeModal',
    ];

    public function register()
    {
        if ($this->step !== 3) {
            return;
        }
    
        $this->validate([
            'name' => 'required|min:3',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->markEmailAsVerified();
    
        event(new Registered($user));
    
        Auth::login($user);
        session()->regenerate();

        $this->closeModal();
    
        $this->dispatch('alert', [
            'type' => 'success',
            'title' => 'Pendaftaran Berhasil',
            'message' => 'Terima kasih telah bergabung, ' . $user->name . '!',
        ]);

        return $this->redirect('/', navigate: true);
    }
    
    /* ================= STEP 1 ================= */
    public function sendVerificationCode()
    {
        $this->validate([
            'email' => 'required|email',
        ]);
    
        $this->generated_code = rand(100000, 999999);
    
        session([
            'register_otp' => $this->generated_code,
            'register_email' => $this->email,
            'register_otp_expires_at' => now()->addMinutes(10),
        ]);
    
        Mail::to($this->email)->send(
            new VerifyEmailOtpMail($this->generated_code)
        );
    
        $this->step = 2; // ⬅️ WAJIB
    }
    

 /* ================= STEP 2 ================= */
 public function verifyCode()
 {
     $this->validate([
         'verification_code' => 'required',
     ]);
 
     if (
         session('register_otp') != $this->verification_code ||
         now()->greaterThan(session('register_otp_expires_at'))
     ) {
         $this->addError('verification_code', 'Kode verifikasi tidak valid atau kadaluarsa.');
         return;
     }
 
     $this->step = 3; // ⬅️ PINDAH KE FORM USER + PASSWORD
 }
 


    public function render()
    {
        return view('livewire.auth.register-modal');
    }
}
