<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SystemConfig;
use App\Services\SupabaseStorageService;
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
    
    public $googleMapsLink = ''; 
    public string $activeTab = 'page';

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function updatedPhoneCode($value)
    {
        $this->updateFooterPhone();
    }

    public function updatedPhoneNumber($value)
    {
        $this->updateFooterPhone();
    }

    // 🔥 LOGIKA BARU: Parse Link Google Maps
    public function updatedGoogleMapsLink($value)
    {
        if (empty($value)) return;

        // Regex Lat/Lng
        preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $value, $matches);

        if (isset($matches[1]) && isset($matches[2])) {
            $lat = (float) $matches[1];
            $lng = (float) $matches[2];

            $this->form['restaurant_lat'] = $lat;
            $this->form['restaurant_lng'] = $lng;
            
            $this->dispatch('notify-success', message: 'Location extracted from link!');
            
            // ⚡ Beritahu Map (Frontend) untuk pindah lokasi
            $this->dispatch('update-map-view', lat: $lat, lng: $lng); 
        }
    }

    // Method untuk update dari Map Picker (Drag Marker / Search Result)
    public function updateCoordinates($lat, $lng)
    {
        $this->form['restaurant_lat'] = $lat;
        $this->form['restaurant_lng'] = $lng;
    }

    private function updateFooterPhone()
    {
        $this->form['footer_phone'] = $this->phoneCode . $this->phoneNumber;
    }

    public function mount()
    {
        $this->config = SystemConfig::firstOrCreate([]);

        // Setup Phone
        $this->phoneCode = '+62';
        $this->phoneNumber = '';
        if ($this->config->footer_phone) {
            $phone = $this->config->footer_phone;
            foreach (['+62', '+1', '+44'] as $code) {
                if (str_starts_with($phone, $code)) {
                    $this->phoneCode = $code;
                    $this->phoneNumber = substr($phone, strlen($code));
                    break;
                }
            }
            if (!$this->phoneNumber) $this->phoneNumber = $phone;
        }

        // Setup Form Data
        $this->form = [
            'brand_name'      => $this->config->brand_name,
            'brand_logo'      => $this->config->brand_logo,
            'footer_address'  => $this->config->footer_address,
            'footer_phone'    => $this->config->footer_phone,
            'active_from'     => $this->config->active_from,
            'active_until'    => $this->config->active_until,
            'site_closed'     => (bool) $this->config->site_closed,
            'tax_percent'     => $this->config->tax_percent,
            'delivery_fee'    => $this->config->delivery_fee,
            'restaurant_lat'  => $this->config->restaurant_lat ?? -6.200000, // Default Jakarta
            'restaurant_lng'  => $this->config->restaurant_lng ?? 106.816666,
            'price_per_km'    => $this->config->price_per_km,
        ];
    }

    public function save(SupabaseStorageService $storage)
    {
        try {
            $this->validate([
                'form.brand_name'      => 'required|string|max:255',
                'form.footer_phone'    => 'nullable|string|max:50',
                'form.tax_percent'     => 'required|integer|min:0|max:100',
                'form.delivery_fee'    => 'required|integer|min:0',
                'form.price_per_km'    => 'nullable|integer|min:0',
                'form.restaurant_lat'  => 'required|numeric',
                'form.restaurant_lng'  => 'required|numeric',
                'brand_logo'           => 'nullable|image|max:2048',
            ]);

            if ($this->brand_logo) {
                if ($this->config->brand_logo) {
                    $storage->delete($this->config->brand_logo);
                }
                $filename = 'brand-logo-' . Str::uuid() . '.' . $this->brand_logo->extension();
                $path = $storage->upload($this->brand_logo, "brand/{$filename}");
                $this->form['brand_logo'] = $path;
            }

            SystemConfig::updateOrCreate(['id' => 1], $this->form);

            $this->config = SystemConfig::first();
            $this->reset('brand_logo', 'googleMapsLink');
            
            $this->dispatch('notify-success', message: 'Settings saved successfully!');
            $this->dispatch('page-refresh');

        } catch (\Throwable $e) {
            $this->dispatch('notify-success', message: 'Failed to save settings.');
            report($e);
        }
    }

    public function render()
    {
        return view('livewire.Admin.config-page');
    }
}