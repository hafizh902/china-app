<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SystemConfig;
use App\Services\SupabaseStorageService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ConfigPage extends Component
{
    use WithFileUploads;

    protected $layout = 'app';

    public SystemConfig $config;

    public array $form = [];

    public $brand_logo;

    public string $activeTab = 'page';

    public function mount()
    {
        $this->config = SystemConfig::firstOrCreate([]);

        $this->form = [
            'brand_name'     => $this->config->brand_name,
            'brand_logo'     => $this->config->brand_logo,
            'footer_address' => $this->config->footer_address,
            'footer_phone'   => $this->config->footer_phone,
            'active_from'    => $this->config->active_from,
            'active_until'   => $this->config->active_until,
            'site_closed'    => (bool) $this->config->site_closed,
            'tax_percent'    => $this->config->tax_percent,
            'delivery_fee'   => $this->config->delivery_fee,
        ];
    }

    public function save(SupabaseStorageService $storage)
    {
        try {
            $this->validate([
                'form.brand_name'    => 'required|string|max:255',
                'form.footer_phone' => 'nullable|string|max:50',
                'form.tax_percent'  => 'required|integer|min:0|max:100',
                'form.delivery_fee' => 'required|integer|min:0',
                'brand_logo'        => 'nullable|image|max:2048',
            ]);

            if ($this->brand_logo) {

                // 🔥 Hapus logo lama (kalau ada)
                if ($this->config->brand_logo) {
                    $storage->delete($this->config->brand_logo);
                }

                // Generate nama file
                $filename = 'brand-logo-' . Str::uuid() . '.' . $this->brand_logo->extension();

                // Upload ke Supabase
                $path = $storage->upload(
                    $this->brand_logo,
                    "brand/{$filename}"
                );

                // Simpan PATH ke DB
                $this->form['brand_logo'] = $path;
            }

            SystemConfig::updateOrCreate(
                ['id' => 1],
                $this->form
            );

            $this->config = SystemConfig::first();

            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Settings saved successfully'
            ]);
        } catch (\Throwable $e) {
            $this->dispatchBrowserEvent('toast', [
                'type' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }


    public function render()
    {
        return view('livewire.Admin.config-page');
    }
}
