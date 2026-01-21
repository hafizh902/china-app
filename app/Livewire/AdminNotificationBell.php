<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Reservation;

class AdminNotificationBell extends Component
{
  public function render()
{
    // Ambil Order (preparing = dianggap baru/aktif)
    $orders = Order::latest()->take(15)->get()->map(function($item) {
        $item->notif_type = 'order';
        $item->is_active = ($item->status === 'preparing'); // Masih aktif jika preparing
        return $item;
    });

    // Ambil Reservasi (pending = dianggap baru/aktif)
    $reservations = Reservation::latest()->take(15)->get()->map(function($item) {
        $item->notif_type = 'reservation';
        $item->is_active = ($item->status === 'pending'); // Masih aktif jika pending
        return $item;
    });

    // Gabung dan Urutkan
    $allNotifications = $orders->concat($reservations)->sortByDesc('created_at')->take(15);
    
    // Hitung hanya yang aktif untuk angka di Bel
    $notifCount = $allNotifications->where('is_active', true)->count();

    return view('livewire.admin-notification-bell', [
        'allNotifications' => $allNotifications,
        'notifCount' => $notifCount
    ]);
}
}