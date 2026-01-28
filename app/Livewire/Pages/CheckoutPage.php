<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SystemConfig;
use App\Services\Xendit\InvoiceService;
use App\Services\DeliveryService;
use Illuminate\Validation\ValidationException;

class CheckoutPage extends Component
{
    public $firstName, $lastName, $email, $phone, $address, $orderType = 'delivery', $payment = 'cash', $instructions;

    public $lat, $lng;
    public $restaurantLat, $restaurantLng;

    protected $listeners = [
        'language-changed' => '$refresh',
    ];

    protected $rules = [
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required_if:orderType,delivery',
        'lat' => 'required_if:orderType,delivery',
        'lng' => 'required_if:orderType,delivery',
    ];

    public function mount()
    {
        if (Auth::check()) {
            $this->email = Auth::user()->email;
        }

        $config = SystemConfig::firstOrCreate([]);
        $this->restaurantLat = $config->restaurant_lat ?? -6.200000;
        $this->restaurantLng = $config->restaurant_lng ?? 106.816666;
    }

    public function setLocation($lat, $lng, $address = null)
    {
        $this->lat = $lat;
        $this->lng = $lng;
        
        if ($address) {
            $this->address = $address;
        }
    }

    private function getDeliveryFee($config)
    {
        if ($this->orderType !== 'delivery') {
            return 0;
        }

        $defaultFlatFee = $config->delivery_fee ?? 15000;

        if ($this->lat && $this->lng) {
            $distance = DeliveryService::calculateDistance(
                $config->restaurant_lat ?? $this->restaurantLat,
                $config->restaurant_lng ?? $this->restaurantLng,
                $this->lat,
                $this->lng
            );

            $pricePerKm = $config->price_per_km ?? 5000;
            $calculatedFee = $distance * $pricePerKm;

            $finalFee = max($calculatedFee, $defaultFlatFee);

            $roundingMultiple = 500;

            return round($finalFee / $roundingMultiple) * $roundingMultiple;
        }
        return $defaultFlatFee;
    }

    public function placeOrder()
    {
        try {
            $this->validate();
        } catch (ValidationException $e) {
            $this->dispatch('validation-failed', [
                'message' => __('language.validation_error_message') ?? 'Mohon lengkapi data yang ditandai merah, termasuk lokasi pengiriman.'
            ]);
            throw $e;
        }

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            $this->dispatch('toast', message: 'Your cart is empty!');
            return;
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $config = SystemConfig::firstOrCreate([]);

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $tax = $subtotal * ($config->tax_percent / 100);

        $deliveryFee = $this->getDeliveryFee($config);

        $total = $subtotal + $tax + $deliveryFee;

        $order = Auth::user()->orders()->create([
            'order_number' => 'ORD-' . now()->format('Ymd') . rand(1000, 9999),
            'status' => 'pending',
            'order_type' => $this->orderType,
            'payment_method' => $this->payment,
            'payment_status' => 'pending',
            'delivery_address' => $this->orderType === 'delivery' ? $this->address : null,
            'delivery_lat' => $this->lat,
            'delivery_lng' => $this->lng,

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
                'menu_id' => $item['id'],
                'menu_name' => $item['name'],
                'menu_price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart');

        if ($this->payment === 'xendit') {
            $invoice = InvoiceService::create($order);
            $order->update([
                'xendit_invoice_id' => $invoice->getId(),
                'xendit_invoice_url' => $invoice->getInvoiceUrl(),
            ]);
            return redirect()->away($invoice->getInvoiceUrl());
        }

        $order->update([
            'payment_status' => 'paid',
            'status' => 'preparing',
        ]);

        return redirect()->route('orders');
    }

    public function render()
    {
        $cart = session()->get('cart', []);
        $config = SystemConfig::firstOrCreate([]);

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $tax = $subtotal * ($config->tax_percent / 100);

        $deliveryFee = $this->getDeliveryFee($config);

        $total = $subtotal + $tax + $deliveryFee;

        return view('livewire.Pages.checkout-page', compact('cart', 'subtotal', 'tax', 'deliveryFee', 'total'));
    }
}
