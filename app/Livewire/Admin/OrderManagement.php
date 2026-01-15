<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrderManagement extends Component
{
    protected $layout = 'app';

    public function render()
    {
        $orders = Order::with('user')->latest()->take(10)->get()->map(function($order) {
            return [
                $order->order_number,
                $order->user->name ?? 'N/A',
                $order->items->count(),
                $order->total,
                $order->order_type,
                $order->status,
                $order->created_at->format('Y-m-d'),
            ];
        });

        return view('livewire.Admin.order-management', compact('orders'));
    }
}