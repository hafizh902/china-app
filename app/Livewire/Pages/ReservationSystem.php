<?php
namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Table;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationSystem extends Component
{
    public $selectedTable = null;
    public $booking_date;
    public $booking_time;
    public $step = 1; // 1: Pilih Meja, 2: Pembayaran

    public function mount() {
        $this->booking_date = date('Y-m-d');
    }

    // Mendapatkan list meja yang sudah dibooking pada jam terpilih
    public function getOccupiedTablesProperty() {
        if (!$this->booking_date || !$this->booking_time) return [];
        
        return Reservation::where('reservation_date', $this->booking_date)
            ->where('reservation_time', $this->booking_time)
            ->whereIn('status', ['pending', 'confirmed'])
            ->pluck('table_id')
            ->toArray();
    }

    public function selectTable($id) {
        if (in_array($id, $this->occupiedTables)) {
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Meja sudah dipesan!']);
            return;
        }
        $this->selectedTable = $id;
    }

    public function confirmReservation() {
        $this->validate([
            'selectedTable' => 'required',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
        ]);

        $reservation = Reservation::create([
            'user_id' => auth()->id(),
            'table_id' => $this->selectedTable,
            'reservation_date' => $this->booking_date,
            'reservation_time' => $this->booking_time,
            'expires_at' => now()->addMinutes(15),
            'status' => 'pending'
        ]);

        $this->step = 2; // Pindah ke halaman bayar DP
    }

    public function render() {
        return view('livewire.Pages.reservation-page', [
            'tables' => Table::where('is_active', true)->get()
        ]);
    }
}