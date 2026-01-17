<?php 
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Table;
use App\Models\Reservation;

class ReservationMonitor extends Component
{
    public $selectedReservation = null;

    // Fungsi untuk mengubah status meja menjadi Tersedia kembali (Cancel/Expired)
    public function releaseTable($reservationId)
    {
        $res = Reservation::find($reservationId);
        $res->update(['status' => 'cancelled']);
        $this->selectedReservation = null;
        $this->dispatch('notify', ['message' => 'Meja telah dibebaskan.']);
    }

    // Fungsi untuk konfirmasi pembayaran DP
    public function confirmPayment($reservationId)
    {
        $res = Reservation::find($reservationId);
        $res->update(['status' => 'confirmed']);
        $this->selectedReservation = null;
        $this->dispatch('notify', ['message' => 'Pembayaran dikonfirmasi!']);
    }

    public function render()
    {
        return view('livewire.Admin.reservation-monitor', [
            'tables' => Table::all(),
            // Mengambil data reservasi hari ini untuk ditampilkan di denah
            'currentReservations' => Reservation::with('user')
                ->where('reservation_date', date('Y-m-d'))
                ->whereIn('status', ['pending', 'confirmed'])
                ->get()
                ->keyBy('table_id')
        ]);
    }
}