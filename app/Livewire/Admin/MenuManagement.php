<?php

namespace App\Livewire\Admin;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Menu;
use App\Services\SupabaseStorageService;


class MenuManagement extends Component
{
    use WithFileUploads;

    public $image; // file upload
    public ?int $menuId = null;
    public bool $showCreateModal = false;
    public bool $showEditModal = false;
    public string $name = '';
    public string $description = '';
    public string $category = '';
    public int $price = 0;
    public bool $is_available = true;

    public $selectedItems = [];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:100',
            'category' => 'required|string|max:100',
            'price' => 'required|integer|min:0',
            'is_available' => 'boolean',
        ];
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->showCreateModal = true;
    }

    public function store(SupabaseStorageService $storage)
    {
        $this->validate();
    
        $imagePath = null;
    
        if ($this->image) {
            $filename = 'menu-' . uniqid() . '.' . $this->image->extension();
            $imagePath = "menus/{$filename}";
    
            $storagePath = $storage->upload($this->image, $imagePath);
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
    

    public function edit(int $id)
    {
        $menu = Menu::findOrFail($id);

        $this->menuId = $menu->id;
        $this->name = $menu->name;
        $this->description = $menu->description;
        $this->category = $menu->category;
        $this->price = $menu->price;
        $this->is_available = $menu->is_available;

        $this->showEditModal = true;
    }

    public function update()
    {
        $this->validate();

        Menu::where('id', $this->menuId)->update([
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'price' => $this->price,
            'is_available' => $this->is_available,
        ]);

        $this->resetForm();
        $this->showEditModal = false;
    }


    public function deleteSelected()
    {
        Menu::whereIn('id', $this->selectedItems)->delete();
        $this->selectedItems = [];
        session()->flash('message', 'Selected items deleted successfully.');
    }

    private function resetForm()
    {
        $this->reset([
            'menuId',
            'name',
            'description',
            'category',
            'price',
            'is_available',
        ]);

        $this->is_available = true;
    }

    public function render()
    {
        return view('livewire.Admin.menu-management', [
            'items' => Menu::simplePaginate(10),
        ]);
    }
}
