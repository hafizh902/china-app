<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\Menu;

class Dashboard extends Component
{
    protected $layout = 'app';
    public function render()
    {
        $stats = [
            'orders' => Order::count(),
            'revenue' => Order::sum('total'),
            'active' => Order::whereIn('status', ['pending', 'preparing'])->count(),
            'menu' => Menu::count(),
        ];

        $recentOrders = Order::with('user')->latest()->take(5)->get()->map(function($order) {
            return [
                $order->order_number,
                $order->user->name ?? 'N/A',
                $order->items->count(),
                $order->total,
                $order->status,
                $order->created_at->format('Y-m-d'),
            ];
        });

        return view('livewire.admin.dashboard', compact('stats', 'recentOrders'));
    }
}