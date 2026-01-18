<?php

namespace App\Livewire;

use Livewire\Component;

// Komponen Livewire untuk mengelola keranjang belanja
class CartComponent extends Component
{
    // Array untuk menyimpan item di keranjang
    public $cart = [];
    protected $listeners = [
        'add-to-cart' => 'addToCart',
    ];

    // Private method to build image URL from image path
    private function buildImageUrl($image)
    {
        return $image ? rtrim(config('services.supabase.url'), '/') . '/storage/v1/object/public/' . config('services.supabase.bucket') . '/' . $image : null;
    }

    // Private method to normalize cart items
    private function normalizeCart()
    {
        foreach ($this->cart as $id => $item) {
            if (!isset($item['imageUrl'])) {
                $this->cart[$id]['imageUrl'] = $this->buildImageUrl($item['image'] ?? null);
            }
        }
        session()->put('cart', $this->cart);
    }

    // Method yang dipanggil saat komponen pertama kali dimuat
    public function mount()
    {
        $this->cart = session()->get('cart', []);
        $this->normalizeCart();
    }
    
    public function closeCart()
    {
        $this->dispatch('close-cart');
    }

    // Method untuk menambah item ke keranjang
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

        $this->dispatch('notify-success', message: $name . ' telah ditambahkan ke keranjang!');

        $processing = false;
    }

    // Method untuk menghapus item dari keranjang
    public function removeItem($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        $this->cart = $cart;
        $this->normalizeCart();
        $this->dispatch('cart-updated');
    }

    // Method untuk mengupdate quantity item
    public function updateQuantity($id, $qty)
    {
        // Jika quantity kurang dari 1, hapus item
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

    // Computed property untuk menghitung subtotal
    public function getSubtotalProperty()
    {
        return collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    }

    // Method render untuk menampilkan view
    public function render()
    {
        return view('livewire.cart-component', [
            'subtotal' => $this->subtotal,
            'tax' => $this->subtotal * 0.1, // Pajak 10%
            'total' => $this->subtotal * 1.1, // Total dengan pajak
            'count' => collect($this->cart)->sum('quantity'), // Total jumlah item
        ]);
    }
}
