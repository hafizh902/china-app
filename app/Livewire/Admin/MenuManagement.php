<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Menu;

class MenuManagement extends Component
{
    protected $layout = 'app';

    public function render()
    {
        $items = Menu::all()->map(function($menu) {
            return [
                'id' => $menu->id,
                'name' => $menu->name,
                'category' => $menu->category,
                'price' => $menu->price,
                'available' => $menu->is_available,
            ];
        });

        return view('livewire.admin.menu-management', compact('items'));
    }
}