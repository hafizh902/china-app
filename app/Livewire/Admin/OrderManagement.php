<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class OrderManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    protected $layout = 'app';

    // UI state
    public bool $showDetailModal = false;
    public ?int $selectedOrderId = null;

    // filters
    public string $search = '';
    public string $statusFilter = '';
    public string $typeFilter = '';

    // editable
    public string $editStatus = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'statusFilter' => ['except' => ''],
        'typeFilter' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingTypeFilter()
    {
        $this->resetPage();
    }

    public function openDetail(int $orderId)
    {
        $order = Order::findOrFail($orderId);

        $this->selectedOrderId = $orderId;
        $this->editStatus = $order->status;
        $this->showDetailModal = true;
    }

    public function updateStatus()
    {
        $this->validate([
            'editStatus' => 'required|in:pending,preparing,ready,completed,cancelled',
        ]);

        $order = Order::findOrFail($this->selectedOrderId);

        $order->update([
            'status' => $this->editStatus,
        ]);

        $this->showDetailModal = false;
    }


    public function render()
    {
        $orders = Order::with(['user', 'items'])
            ->when($this->search, function ($q) {
                $q->where('order_number', 'like', "%{$this->search}%")
                    ->orWhereHas(
                        'user',
                        fn($u) =>
                        $u->where('name', 'like', "%{$this->search}%")
                    );
            })
            ->when(
                $this->statusFilter,
                fn($q) =>
                $q->where('status', $this->statusFilter)
            )
            ->when(
                $this->typeFilter,
                fn($q) =>
                $q->where('order_type', $this->typeFilter)
            )
            ->latest()
            ->paginate(10);

        $selectedOrder = $this->selectedOrderId
            ? Order::with(['user', 'items.menu'])->find($this->selectedOrderId)
            : null;

        return view('livewire.Admin.order-management', [
            'orders' => $orders,
            'selectedOrder' => $selectedOrder,
        ]);
    }
}
