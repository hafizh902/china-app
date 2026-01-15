<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Menu;

class MenuPage extends Component
{
    protected $layout = 'app';

    #[Url]
    public string $category = 'all';

    #[Url]
    public string $search = '';

    #[Url]
    public string $sort = 'popular';

    public function setSort(string $value): void
    {
        $this->sort = $value;
    }

    public function render()
    {
        $items = Menu::query()
            ->when(
                $this->category !== 'all',
                fn ($q) => $q->where('category', $this->category)
            )
            ->when(
                $this->search,
                fn ($q) => $q->where('name', 'like', '%' . $this->search . '%')
            )
            ->when(
                $this->sort === 'price-low',
                fn ($q) => $q->orderBy('price')
            )
            ->when(
                $this->sort === 'price-high',
                fn ($q) => $q->orderByDesc('price')
            )
            ->when(
                $this->sort === 'name',
                fn ($q) => $q->orderBy('name')
            )
            ->when(
                $this->sort === 'popular',
                fn ($q) => $q->latest() // atau orderBy('sold_count')
            )
            ->paginate(4);

        return view('livewire.Pages.menu-page', [
            'menuItems' => $items,
        ]);
    }
}
