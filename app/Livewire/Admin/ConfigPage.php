<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SystemConfig;
use Illuminate\Support\Facades\Storage;

class ConfigPage extends Component
{
    use WithFileUploads;

    protected $layout = 'app';

    public SystemConfig $config;

    public $brand_logo;

    public string $activeTab = 'page';

    public function mount()
    {
        // abort_unless(auth()->user()?->is_admin, 403);

        $this->config = SystemConfig::firstOrCreate(
            [],
            [
                'brand_name' => 'My Restaurant',
            ]
        );
    }

    public function save()
    {
        $this->validate([
            'config.brand_name' => 'required|string|max:255',
            'brand_logo' => 'nullable|image|max:2048',
            'config.tax_percent' => 'required|integer|min:0|max:100',
            'config.delivery_fee' => 'required|integer|min:0',
        ]);

        if ($this->brand_logo) {
            $path = $this->brand_logo->store('brand', 'public');
            $this->config->brand_logo = $path;
        }

        $this->config->save();

        session()->flash('success', 'Configuration updated');
    }

    public function render()
    {
        return view('livewire.Admin.config-page');
    }
}
