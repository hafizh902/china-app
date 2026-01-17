<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderHistoryPage extends Component
{
    public $selectedOrder = null;
    public $showModal = false;

    public function viewInvoice($orderId)
    {
        $this->selectedOrder = Order::with('items')->find($orderId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedOrder = null;
    }
    protected $layout = 'app';

    public function render()
    {
        $orders = Auth::check()
            ? Order::with('items')
            ->where('user_id', Auth::id())
            ->latest()
            ->get()
            : collect();

        return view('livewire.Pages.order-history-page', compact('orders'));
    }
}
