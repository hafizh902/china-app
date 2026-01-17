<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Menu;

class MenuPage extends Component
{
    protected $layout = 'app';

    public int $perPage = 8;

    #[Url]
    public string $category = 'all';

    #[Url]
    public string $search = '';

    #[Url]
    public string $sort = 'popular';

    public function loadMore(): void
    {
        $this->perPage += 8;
    }

    public function setSort(string $value): void
    {
        $this->sort = $value;
        $this->resetList();
    }

    public function updatedCategory()
    {
        $this->resetList();
    }
    public function updatedSearch()
    {
        $this->resetList();
    }
    public function updatedSort()
    {
        $this->resetList();
    }

    private function resetList(): void
    {
        $this->perPage = 8;
    }

    public ?int $limit = null;


    public function render()
    {
        $query = Menu::query()
            ->when(
                $this->category !== 'all',
                fn($q) => $q->where('category', $this->category)
            )
            ->when(
                $this->search,
                fn($q) => $q->where('name', 'like', "%{$this->search}%")
            )
            ->when($this->sort === 'price-low', fn($q) => $q->orderBy('price'))
            ->when($this->sort === 'price-high', fn($q) => $q->orderByDesc('price'))
            ->when($this->sort === 'name', fn($q) => $q->orderBy('name'))
            ->when($this->sort === 'popular', fn($q) => $q->latest());

        // MODE HOME (limit)
        if ($this->limit !== null) {
            $menuItems = $query->take($this->limit)->get();

            return view('livewire.Pages.menu-page', [
                'menuItems' => $menuItems,
                'hasMore'   => false, // disable infinite scroll
            ]);
        }

        $menuItems = $query->take($this->perPage)->get();
        $hasMore   = $query->count() > $menuItems->count();

        return view('livewire.Pages.menu-page', [
            'menuItems' => $menuItems,
            'hasMore'   => $hasMore,
        ]);
    }
}
