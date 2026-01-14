<?php

namespace App\Livewire\Pages;

use Livewire\Component;

// Komponen Livewire untuk halaman utama (landing page)
class HomePage extends Component
{
    // Menggunakan layout 'app' untuk semua halaman
    protected $layout = 'app';

    // Method render untuk menampilkan view
    public function render()
    {
        return view('livewire.pages.home-page');
    }
}