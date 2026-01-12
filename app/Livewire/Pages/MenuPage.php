<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Menu;

// Komponen Livewire untuk halaman menu dengan fitur filter dan pencarian
class MenuPage extends Component
{
    protected $layout = 'app';

    // Property untuk filter kategori (tersimpan di URL)
    #[Url]
    public $category = 'all';

    // Property untuk pencarian (tersimpan di URL)
    #[Url]
    public $search = '';

    // Property untuk sorting (tersimpan di URL)
    #[Url]
    public $sort = 'popular';

    // Method render untuk menampilkan menu dengan filter
    public function render()
    {
        // Query menu dengan filter kategori dan pencarian
        $items = Menu::when($this->category !== 'all', fn($q) => $q->where('category', $this->category))
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
            ->get();

        return view('livewire.pages.menu-page', ['menuItems' => $items]);
    }
}
