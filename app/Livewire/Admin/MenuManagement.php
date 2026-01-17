<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Menu;
use App\Services\SupabaseStorageService;

class MenuManagement extends Component
{
    use WithFileUploads, WithPagination;

    // form
    public $image;
    public ?int $menuId = null;
    public bool $showCreateModal = false;
    public bool $showEditModal = false;
    public ?Menu $menu = null;

    public string $name = '';
    public string $description = '';
    public string $category = '';
    public int $price = 0;
    public bool $is_available = true;

    // delete
    public bool $deleteMode = false;
    public array $selectedItems = [];

    // filter n search
    public string $search = '';
    public string $filterCategory = '';
    public ?int $minPrice = null;
    public ?int $maxPrice = null;
    public string $sortBy = 'name_asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'filterCategory' => ['except' => ''],
        'minPrice' => ['except' => null],
        'maxPrice' => ['except' => null],
        'sortBy' => ['except' => 'name_asc'],
        'page' => ['except' => 1],
    ];

    // validate
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:0',
            'category' => 'required|string|max:100',
            'price' => 'required|integer|min:0',
            'is_available' => 'boolean',
        ];
    }

    // modal trigger
    public function openCreateModal()
    {
        $this->resetForm();
        $this->showCreateModal = true;
    }

    // create
    public function store(SupabaseStorageService $storage)
    {
        $this->validate();

        $storagePath = null;

        if ($this->image) {
            $filename = 'menu-' . uniqid() . '.' . $this->image->extension();
            $storagePath = $storage->upload($this->image, "menus/{$filename}");
        }

        Menu::create([
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'price' => $this->price,
            'is_available' => $this->is_available,
            'image' => $storagePath,
        ]);

        $this->resetForm();
        $this->showCreateModal = false;
    }

    // edit
    public function edit(int $id)
    {
        $this->menu = Menu::findOrFail($id);

        $this->menuId = $this->menu->id;
        $this->name = $this->menu->name;
        $this->description = $this->menu->description;
        $this->category = $this->menu->category;
        $this->price = $this->menu->price;
        $this->is_available = $this->menu->is_available;

        $this->showEditModal = true;
    }

    public function update(SupabaseStorageService $storage)
    {
        $this->validate();

        $updateData = [
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'price' => $this->price,
            'is_available' => $this->is_available,
        ];

        if ($this->image) {
            $filename = 'menu-' . uniqid() . '.' . $this->image->extension();
            $storagePath = $storage->upload($this->image, "menus/{$filename}");
            $updateData['image'] = $storagePath;
        }

        Menu::where('id', $this->menuId)->update($updateData);

        $this->resetForm();
        $this->showEditModal = false;
    }

    // delete mode
    public function toggleDeleteMode()
    {
        $this->deleteMode = !$this->deleteMode;
        $this->selectedItems = [];
    }

    public function deleteSelected()
    {
        if (empty($this->selectedItems)) {
            return;
        }

        // Check if any selected menus have associated order items
        $menusWithOrders = Menu::whereIn('id', $this->selectedItems)
            ->whereHas('orderItems')
            ->pluck('name')
            ->toArray();

        if (!empty($menusWithOrders)) {
            session()->flash('error', 'Tidak dapat menghapus menu yang sudah memiliki pesanan: ' . implode(', ', $menusWithOrders));
            return;
        }

        Menu::whereIn('id', $this->selectedItems)->delete();

        $this->selectedItems = [];
        $this->deleteMode = false;

        session()->flash('success', 'Menu berhasil dihapus.');
    }


    public function toggleSelection($id)
    {
        if (($key = array_search($id, $this->selectedItems)) !== false) {
            unset($this->selectedItems[$key]);
            $this->selectedItems = array_values($this->selectedItems);
        } else {
            $this->selectedItems[] = $id;
        }
    }

    // action panel
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function applyFilter()
    {
        $this->resetPage();
    }

    public function resetFilter()
    {
        $this->reset([
            'search',
            'filterCategory',
            'minPrice',
            'maxPrice',
            'sortBy',
        ]);

        $this->resetPage();
    }

    // form
    private function resetForm()
    {
        $this->reset([
            'menuId',
            'name',
            'description',
            'category',
            'price',
            'is_available',
            'image',
        ]);

        $this->is_available = true;
    }

    // render
    public function render()
    {
        $query = Menu::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('description', 'like', "%{$this->search}%");
            });
        }

        if ($this->filterCategory) {
            $query->where('category', $this->filterCategory);
        }

        if ($this->minPrice !== null) {
            $query->where('price', '>=', $this->minPrice);
        }

        if ($this->maxPrice !== null) {
            $query->where('price', '<=', $this->maxPrice);
        }

        match ($this->sortBy) {
            'name_desc'  => $query->orderBy('name', 'desc'),
            'price_asc'  => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            default      => $query->orderBy('name', 'asc'),
        };

        return view('livewire.Admin.menu-management', [
            'items' => $query->paginate(10)->withQueryString(),
        ]);
    }
}