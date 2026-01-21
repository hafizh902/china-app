<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Reservation;

class AdminNotificationBell extends Component
{
    public $refreshKey = 0;
    public $deletedNotifications = [];

    public function deleteNotification($type, $id)
    {
        try {
            if ($type === 'order') {
                $order = Order::find($id);
                if ($order) {
                    $order->update(['status' => 'completed']);
                }
            } elseif ($type === 'reservation') {
                $reservation = Reservation::find($id);
                if ($reservation) {
                    $reservation->update(['status' => 'confirmed']);
                }
            }

            // Add to deleted notifications array for client-side filtering
            $this->deletedNotifications[] = $type . '-' . $id;

            // Force re-render by changing refresh key
            $this->refreshKey++;

            // Dispatch success message
            $this->dispatch('notify', ['type' => 'success', 'message' => 'Notifikasi berhasil dihapus']);
        } catch (\Exception $e) {
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Gagal menghapus notifikasi: ' . $e->getMessage()]);
        }
    }

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

    // Filter out deleted notifications
    $allNotifications = $allNotifications->filter(function($item) {
        $key = $item->notif_type . '-' . $item->id;
        return !in_array($key, $this->deletedNotifications);
    });

    // Hitung hanya yang aktif untuk angka di Bel
    $notifCount = $allNotifications->where('is_active', true)->count();

    return view('livewire.admin-notification-bell', [
        'allNotifications' => $allNotifications,
        'notifCount' => $notifCount
    ]);
}
}