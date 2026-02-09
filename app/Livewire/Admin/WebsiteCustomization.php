<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SystemConfig;
use App\Models\SellerCustomization;
use App\Services\SupabaseStorageService;
use Illuminate\Support\Str;

class WebsiteCustomization extends Component
{
    use WithFileUploads;

    public SellerCustomization $customization;
    public array $form = [];
    
    // File uploads
    public $hero_background;
    public $og_image_file;
    public $favicon_file;
    
    // Features management
    public $newFeature = ['icon' => 'shield', 'title' => '', 'description' => '', 'color' => 'indigo'];
    public $editingFeatureIndex = null;
    
    // Custom sections
    public $newSection = ['type' => 'text', 'title' => '', 'content' => '', 'image' => null];
    public $editingSectionIndex = null;
    
    // Social links
    public $socialLinks = [
        'facebook' => '',
        'instagram' => '',
        'twitter' => '',
        'tiktok' => '',
        'whatsapp' => '',
    ];
    
    // Preview mode
    public $previewMode = false;
    
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $sellerId = auth()->user()->seller_id ?? 1; // Adjust based on your auth
        
        $this->customization = SellerCustomization::firstOrCreate(
            ['seller_id' => $sellerId],
            $this->getDefaultValues()
        );

        $this->loadFormData();
    }

    private function getDefaultValues(): array
    {
        return [
            'hero_title' => 'Temukan Produk',
            'hero_subtitle' => 'Favorit Anda Disini.',
            'hero_description' => 'Kami menyediakan koleksi terbaik dengan kualitas terjamin. Nikmati pengalaman belanja online yang mudah, aman, dan cepat.',
            'hero_cta_text' => 'Belanja Sekarang',
            'hero_secondary_cta_text' => 'Pelajari Lebih Lanjut',
            'hero_overlay_opacity' => '95',
            'show_store_badge' => true,
            'show_features_section' => true,
            'features' => [
                [
                    'icon' => 'shield',
                    'title' => 'Kualitas Terjamin',
                    'description' => 'Kami mengutamakan kualitas dalam setiap produk yang kami tawarkan, memastikan kepuasan pelanggan.',
                    'color' => 'indigo'
                ],
                [
                    'icon' => 'truck-fast',
                    'title' => 'Pengiriman Cepat',
                    'description' => 'Pesanan Anda diproses instan dan dikirim dengan aman ke seluruh lokasi.',
                    'color' => 'cyan'
                ],
                [
                    'icon' => 'tags',
                    'title' => 'Harga Terbaik',
                    'description' => 'Dapatkan penawaran kompetitif dan promo menarik setiap harinya.',
                    'color' => 'emerald'
                ]
            ],
            'catalog_title' => 'Produk Unggulan',
            'catalog_subtitle' => 'Pilihan Pelanggan',
            'catalog_product_limit' => 4,
            'show_catalog_section' => true,
            'primary_color' => '#4F46E5',
            'secondary_color' => '#06B6D4',
            'accent_color' => '#10B981',
            'theme' => 'modern',
            'font_family' => 'default',
            'enable_chat' => true,
            'enable_reviews' => true,
            'enable_reservations' => false,
        ];
    }

    private function loadFormData()
    {
        $this->form = [
            'hero_background_image' => $this->customization->hero_background_image,
            'hero_title' => $this->customization->hero_title,
            'hero_subtitle' => $this->customization->hero_subtitle,
            'hero_description' => $this->customization->hero_description,
            'hero_cta_text' => $this->customization->hero_cta_text,
            'hero_secondary_cta_text' => $this->customization->hero_secondary_cta_text,
            'hero_overlay_opacity' => $this->customization->hero_overlay_opacity,
            'store_badge_text' => $this->customization->store_badge_text,
            'show_store_badge' => $this->customization->show_store_badge,
            'show_features_section' => $this->customization->show_features_section,
            'features' => $this->customization->features ?? [],
            'catalog_title' => $this->customization->catalog_title,
            'catalog_subtitle' => $this->customization->catalog_subtitle,
            'catalog_product_limit' => $this->customization->catalog_product_limit,
            'show_catalog_section' => $this->customization->show_catalog_section,
            'custom_sections' => $this->customization->custom_sections ?? [],
            'meta_title' => $this->customization->meta_title,
            'meta_description' => $this->customization->meta_description,
            'meta_keywords' => $this->customization->meta_keywords,
            'primary_color' => $this->customization->primary_color,
            'secondary_color' => $this->customization->secondary_color,
            'accent_color' => $this->customization->accent_color,
            'theme' => $this->customization->theme,
            'font_family' => $this->customization->font_family,
            'footer_text' => $this->customization->footer_text,
            'enable_chat' => $this->customization->enable_chat,
            'enable_reviews' => $this->customization->enable_reviews,
            'enable_reservations' => $this->customization->enable_reservations,
        ];

        $this->socialLinks = $this->customization->social_links ?? [
            'facebook' => '',
            'instagram' => '',
            'twitter' => '',
            'tiktok' => '',
            'whatsapp' => '',
        ];
    }

    // Feature Management
    public function addFeature()
    {
        $this->validate([
            'newFeature.title' => 'required|string|max:100',
            'newFeature.description' => 'required|string|max:500',
        ]);

        $features = $this->form['features'] ?? [];
        $features[] = $this->newFeature;
        $this->form['features'] = $features;

        $this->newFeature = ['icon' => 'shield', 'title' => '', 'description' => '', 'color' => 'indigo'];
        $this->dispatch('notify-success', message: 'Feature added successfully!');
    }

    public function removeFeature($index)
    {
        $features = $this->form['features'];
        unset($features[$index]);
        $this->form['features'] = array_values($features);
        $this->dispatch('notify-success', message: 'Feature removed!');
    }

    public function moveFeature($index, $direction)
    {
        $features = $this->form['features'];
        $newIndex = $direction === 'up' ? $index - 1 : $index + 1;

        if ($newIndex >= 0 && $newIndex < count($features)) {
            $temp = $features[$index];
            $features[$index] = $features[$newIndex];
            $features[$newIndex] = $temp;
            $this->form['features'] = $features;
        }
    }

    // Custom Section Management
    public function addCustomSection()
    {
        $this->validate([
            'newSection.title' => 'required|string|max:100',
            'newSection.content' => 'required|string',
        ]);

        $sections = $this->form['custom_sections'] ?? [];
        $sections[] = $this->newSection;
        $this->form['custom_sections'] = $sections;

        $this->newSection = ['type' => 'text', 'title' => '', 'content' => '', 'image' => null];
        $this->dispatch('notify-success', message: 'Section added!');
    }

    public function removeCustomSection($index)
    {
        $sections = $this->form['custom_sections'];
        unset($sections[$index]);
        $this->form['custom_sections'] = array_values($sections);
        $this->dispatch('notify-success', message: 'Section removed!');
    }

    public function togglePreview()
    {
        $this->previewMode = !$this->previewMode;
    }

    public function save(SupabaseStorageService $storage)
    {
        try {
            $this->validate([
                'form.hero_title' => 'required|string|max:200',
                'form.hero_subtitle' => 'required|string|max:200',
                'form.primary_color' => 'required|string',
                'form.catalog_product_limit' => 'required|integer|min:1|max:12',
                'hero_background' => 'nullable|image|max:5120',
                'og_image_file' => 'nullable|image|max:2048',
                'favicon_file' => 'nullable|image|mimes:png,ico|max:512',
            ]);

            // Upload hero background
            if ($this->hero_background) {
                if ($this->customization->hero_background_image) {
                    $storage->delete($this->customization->hero_background_image);
                }
                $filename = 'hero-bg-' . Str::uuid() . '.' . $this->hero_background->extension();
                $path = $storage->upload($this->hero_background, "customization/{$filename}");
                $this->form['hero_background_image'] = $path;
            }

            // Upload OG image
            if ($this->og_image_file) {
                if ($this->customization->og_image) {
                    $storage->delete($this->customization->og_image);
                }
                $filename = 'og-image-' . Str::uuid() . '.' . $this->og_image_file->extension();
                $path = $storage->upload($this->og_image_file, "customization/{$filename}");
                $this->form['og_image'] = $path;
            }

            // Upload favicon
            if ($this->favicon_file) {
                if ($this->customization->favicon) {
                    $storage->delete($this->customization->favicon);
                }
                $filename = 'favicon-' . Str::uuid() . '.' . $this->favicon_file->extension();
                $path = $storage->upload($this->favicon_file, "customization/{$filename}");
                $this->form['favicon'] = $path;
            }

            // Save social links
            $this->form['social_links'] = $this->socialLinks;

            $this->customization->update($this->form);

            $this->reset('hero_background', 'og_image_file', 'favicon_file');
            
            $this->dispatch('notify-success', message: 'Website customization saved!');
            $this->dispatch('page-refresh');

        } catch (\Throwable $e) {
            $this->dispatch('notify-success', message: 'Failed to save customization: ' . $e->getMessage());
            report($e);
        }
    }

    public function render()
    {
        return view('livewire.Admin.website-customization');
    }
}