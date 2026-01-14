<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutModal extends Component
{
    public $showLogoutConfirm = false; // Properti untuk mengontrol apakah modal tampil

    // Menangani pembukaan dan penutupan modal
    protected $listeners = [
        'open-logout-modal' => 'openModal',  // Mendengarkan event untuk membuka modal
        'close-logout-modal' => 'closeModal', // Mendengarkan event untuk menutup modal
    ];

    // Menampilkan modal
    public function openModal()
    {
        $this->showLogoutConfirm = true;
    }

    // Menutup modal
    public function closeModal()
    {
        $this->showLogoutConfirm = false;
    }

    // Fungsi untuk mengonfirmasi logout dan melanjutkan
    public function confirmLogout()
    {
        Auth::logout(); // Melakukan logout
        $this->showLogoutConfirm = false; // Menutup modal setelah logout

        // Dispatch alert sukses
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Anda telah berhasil logout. Sampai jumpa lagi!',
            'title' => 'Logout Berhasil'
        ]);

        // Redirect ke halaman utama
        return redirect('/');
    }

    // Render tampilan modal logout
    public function render()
    {
        return view('livewire.logout-modal');
    }
}
