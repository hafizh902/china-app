<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckoutPage extends Component
{
    public $firstName, $lastName, $email, $phone, $address, $orderType = 'delivery', $payment = 'cash', $instructions;

    protected $listeners = [
        'language-changed' => '$refresh',
    ];

    protected $rules = [
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required_if:orderType,delivery',
    ];

    protected $messages = [
        'firstName.required' => 'First name need to be filled.',
        'lastName.required'  => 'Last name need to be filled.',
        'email.required'     => 'Email need to be filled.',
        'email.email'        => 'Email Format is not valid.',
        'phone.required'     => 'Phone Number need to be filled.',
        'address.required_if' => 'Address need to be filled for delivery.',
    ];

    public function placeOrder()
    {
        $this->validate();

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            $this->dispatch('toast', message: 'Your cart is empty!');
            return;
        }

        // Hitung ulang subtotal, tax, total
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $tax = $subtotal * 0.1;
        $deliveryFee = $this->orderType === 'delivery' ? 29900 : 0;
        $total = $subtotal + $tax + $deliveryFee;

        // Pastikan user sudah login
        if (!Auth::check()) {
            $this->dispatch('toast', message: 'Please log in to place an order.');
            return redirect()->route('login');
        }

        $order = User::find(Auth::id())->orders()->create([
            'order_number' => 'ORD-' . now()->format('Ymd') . rand(1000, 9999),
            'status' => 'pending',
            'order_type' => $this->orderType,
            'delivery_address' => $this->orderType === 'delivery' ? $this->address : null,
            'customer_name' => $this->firstName . ' ' . $this->lastName,
            'customer_email' => $this->email,
            'customer_phone' => $this->phone,
            'special_instructions' => $this->instructions,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'delivery_fee' => $deliveryFee,
            'total' => $total,
        ]);

        foreach ($cart as $item) {
            $order->items()->create([
                'menu_id'    => $item['id'],
                'menu_name'  => $item['name'],
                'menu_price' => $item['price'], // WAJIB sesuai DB
                'quantity'   => $item['quantity'],
                'subtotal'   => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart');
        session()->flash('order_success', 'Your order has been placed successfully!');
        return redirect()->route('orders');
    }

    public function render()
    {
        $cart = session()->get('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $tax = $subtotal * 0.1;
        $deliveryFee = $this->orderType === 'delivery' ? 29900 : 0;
        $total = $subtotal + $tax + $deliveryFee;

        return view('livewire.Pages.checkout-page', compact('cart', 'subtotal', 'tax', 'deliveryFee', 'total'));
    }
}
