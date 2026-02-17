<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Builder;

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

    public ?int $limit = null;

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

    public function render()
    {
        // Ambil daftar kategori unik dari database
        $categories = Menu::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->orderBy('category')
            ->pluck('category');

        // Query Utama
        $query = Menu::query()
            ->when(
                $this->category !== 'all',
                fn(Builder $q) => $q->where('category', $this->category)
            )
            ->when(
                $this->search,
                fn(Builder $q) => $q->where('name', 'like', "%{$this->search}%")
            )
            ->when(
                $this->sort === 'popular',
                fn(Builder $q) => $q
                    ->withSum('orderItems as total_sold', 'quantity')
                    ->orderByDesc('total_sold')
            )
            ->when(
                $this->sort === 'price-low',
                fn(Builder $q) => $q->orderBy('price')
            )
            ->when(
                $this->sort === 'price-high',
                fn(Builder $q) => $q->orderByDesc('price')
            )
            ->when(
                $this->sort === 'name',
                fn(Builder $q) => $q->orderBy('name')
            );

        if ($this->limit !== null) {
            $menuItems = $query->take($this->limit)->get();

            return view('livewire.pages.menu-page', [
                'menuItems'  => $menuItems,
                'hasMore'    => false,
                'categories' => $categories, // Pass categories to view
            ]);
        }

        // Clone query untuk menghitung total sebelum limit diterapkan
        $totalItems = $query->count();
        $menuItems = $query->take($this->perPage)->get();
        $hasMore = $totalItems > $menuItems->count();

        return view('livewire.pages.menu-page', [
            'menuItems'  => $menuItems,
            'hasMore'    => $hasMore,
            'categories' => $categories, // Pass categories to view
        ]);
    }
}