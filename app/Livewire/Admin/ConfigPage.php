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
    public string $phoneCode = '+62';
    public string $phoneNumber = '';

    public string $activeTab = 'page';

public function updatedPhoneCode($value)
{
    $this->updateFooterPhone();
}

public function updatedPhoneNumber($value)
{
    $this->updateFooterPhone();
}

private function updateFooterPhone()
{
    $this->form['footer_phone'] = $this->phoneCode . $this->phoneNumber;
}


public function mount()
{
    $this->config = SystemConfig::firstOrCreate([]);

    // default
    $this->phoneCode = '+62';
    $this->phoneNumber = '';

    if ($this->config->footer_phone) {
        $phone = $this->config->footer_phone;

        // jika nomor DB sudah include kode, bisa biarkan $phoneCode sesuai dropdown
        // tapi ambil hanya nomor setelah kode +62 / +1 / dsb
        foreach (['+62', '+1', '+44'] as $code) {
            if (str_starts_with($phone, $code)) {
                $this->phoneCode = $code;
                $this->phoneNumber = substr($phone, strlen($code)); // ambil sisanya tanpa trim
                break;
            }
        }

        // jika tidak ada kode yang match, biarkan semua di phoneNumber
        if (!$this->phoneNumber) {
            $this->phoneNumber = $phone;
        }
    }

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
        } catch (\Throwable $e) {
        }
    }


    public function render()
    {
        return view('livewire.Admin.config-page');
    }
}
