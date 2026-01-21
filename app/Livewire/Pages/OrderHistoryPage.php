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
        $query = Order::with('items.menu')
            ->where('user_id', Auth::id());

        // Filter by date if provided
        if (request('date')) {
            $query->whereDate('created_at', request('date'));
        }

        // Show all records if 'all' parameter is set, otherwise paginate
        if (request('all')) {
            $orders = Auth::check()
                ? $query->latest()->get()
                : collect();
        } else {
            $orders = Auth::check()
                ? $query->latest()->paginate(10)
                : collect();
        }

        return view('livewire.Pages.order-history-page', compact('orders'));
    }
}
