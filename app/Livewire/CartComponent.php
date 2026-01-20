<?php

namespace App\Livewire;

use App\Models\SystemConfig;
use Livewire\Component;

class CartComponent extends Component
{
    public $cart = [];
    protected $listeners = [
        'add-to-cart' => 'addToCart',
    ];

    private function buildImageUrl($image)
    {
        return $image ? rtrim(config('services.supabase.url'), '/') . '/storage/v1/object/public/' . config('services.supabase.bucket') . '/' . $image : null;
    }

    private function normalizeCart()
    {
        foreach ($this->cart as $id => $item) {
            if (!isset($item['imageUrl'])) {
                $this->cart[$id]['imageUrl'] = $this->buildImageUrl($item['image'] ?? null);
            }
        }
        session()->put('cart', $this->cart);
    }

    public function mount()
    {
        $this->cart = session()->get('cart', []);
        $this->normalizeCart();
    }

    public function closeCart()
    {
        $this->dispatch('close-cart');
    }

    public function addToCart($id, $name, $price, $image = null)
    {
        static $processing = false;

        if ($processing) {
            return;
        }

        $processing = true;

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'imageUrl' => $this->buildImageUrl($image),
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        $this->cart = $cart;

        $this->dispatch(
            'notify-success',
            message: __('language.added_to_cart', ['name' => $name])
        );

        $processing = false;
    }

    public function removeItem($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        $this->cart = $cart;
        $this->normalizeCart();
        $this->dispatch('cart-updated');
    }

    public function updateQuantity($id, $qty)
    {
        if ($qty < 1) {
            $this->removeItem($id);
            return;
        }

        $cart = session()->get('cart', []);
        $cart[$id]['quantity'] = $qty;
        session()->put('cart', $cart);
        $this->cart = $cart;
        $this->normalizeCart();
        $this->dispatch('cart-updated');
    }

    public function getSubtotalProperty()
    {
        return collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    }
       public function openLoginModal()
    {
        $this->dispatch('open-login-modal');
    }

    public function render()
    {
        $config = SystemConfig::firstOrCreate([]);
        $taxPercent = $config->tax_percent / 100; // Konversi persen ke desimal

        return view('livewire.cart-component', [
            'subtotal' => $this->subtotal,
            'tax' => $this->subtotal * $taxPercent,
            'total' => $this->subtotal + ($this->subtotal * $taxPercent),
            'count' => collect($this->cart)->sum('quantity'),
        ]);
    }
}
