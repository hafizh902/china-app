<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderHistoryPage extends Component
{
    protected $layout = 'app';

    public function render()
    {
        $orders = Auth::check() ? Order::where('user_id', Auth::id())->latest()->get() : collect();

        return view('livewire.Pages.order-history-page', compact('orders'));
    }
}