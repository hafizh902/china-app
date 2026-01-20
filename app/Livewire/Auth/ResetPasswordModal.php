<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordModal extends Component
{
    public $showModal = false;
    public int $step = 1; // 1 = OTP, 2 = password

    public string $otp = '';
    public ?string $generatedOtp = null;

    public string $password = '';
    public string $password_confirmation = '';
    public int $resendCooldown = 60; // detik
    public bool $canResend = false;


    // Menangani pembukaan modal
    protected $listeners = [
        'open-reset-password-modal' => 'openModal',
        'close-reset-password-modal' => 'closeModal',
    ];

    public function openModal()
    {
        $this->reset([
            'otp',
            'password',
            'password_confirmation',
        ]);

        $this->showModal = true;
        $this->step = 1;

        // ❗ HANYA kirim OTP kalau:
        // - belum pernah ada
        // - atau cooldown sudah lewat
        if ($this->canSendOtp()) {
            $this->sendOtp();
        }
    }

    protected function canSendOtp(): bool
    {
        $resendAt = session('password_reset_otp_resend_at');

        if (!$resendAt) {
            return true;
        }

        return now()->greaterThan($resendAt);
    }

    public function closeModal()
    {
        $this->reset();
        $this->showModal = false;
    }

    public function sendOtp()
    {
        // ❌ Kalau masih cooldown → STOP
        if (!$this->canSendOtp()) {
            return;
        }
    
        $otp = random_int(100000, 999999);
    
        session([
            'password_reset_otp' => $otp,
            'password_reset_otp_expires' => now()->addMinutes(10),
            'password_reset_otp_resend_at' => now()->addSeconds($this->resendCooldown),
        ]);
    
        $this->canResend = false;
    
        \Mail::raw(
            "Kode verifikasi password Anda: {$otp}",
            fn ($message) => $message
                ->to(auth()->user()->email)
                ->subject('Kode Verifikasi Ganti Password')
        );
    }
    

    public function tick()
    {
        // cuma untuk trigger re-render
    }

    public function getResendRemainingProperty(): int
    {
        $resendAt = session('password_reset_otp_resend_at');
    
        if (!$resendAt) {
            $this->canResend = true;
            return 0;
        }
    
        // hitung selisih, lalu paksa INT (tanpa koma)
        $seconds = (int) floor(now()->diffInSeconds($resendAt, false));
    
        if ($seconds <= 0) {
            $this->canResend = true;
            return 0;
        }
    
        $this->canResend = false;
        return $seconds;
    }

    public function resendOtp()
    {
        if (!$this->canResend) {
            return;
        }

        $this->sendOtp();
    }


    public function verifyOtp()
    {
        if (
            session('password_reset_otp') !== $this->otp ||
            now()->greaterThan(session('password_reset_otp_expires'))
        ) {
            $this->addError('otp', 'Kode verifikasi tidak valid atau sudah kedaluwarsa.');
            return;
        }

        $this->step = 2; // lanjut ke form password
    }

    public function updatePassword()
    {
        $this->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        Auth::user()->update([
            'password' => Hash::make($this->password),
        ]);

        session()->forget(['password_reset_otp', 'password_reset_otp_expires']);

        $this->dispatch('toast', type: 'success', message: 'Password berhasil diubah');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.auth.reset-password-modal');
    }
}
