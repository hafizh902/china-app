<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class CartPage extends Component
{
    protected $layout = 'app';

    public function render()
    {
        $cart = session()->get('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $tax = $subtotal * 0.1;
        $total = $subtotal * 1.1;

        return view('livewire.pages.cart-page', compact('cart', 'subtotal', 'tax', 'total'));
    }
}