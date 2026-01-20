<?php
namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Table;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationSystem extends Component
{
    public $selectedTable = null;
    public $selectedTime = null;
    public $booking_date;
    public $step = 1; // 1: Pilih Meja, 2: Pembayaran

    public function mount() {
        $this->booking_date = date('Y-m-d');
    }

    // Mendapatkan waktu yang tersedia untuk setiap meja
    public function getAvailableTimesProperty() {
        if (!$this->booking_date) return collect();

        $tables = Table::where('is_active', true)->get();
        $availableTimes = ['10:00', '12:00', '14:00', '16:00','18:00','20:00'];

        $result = [];
        foreach ($tables as $table) {
            $occupiedTimes = Reservation::where('table_id', $table->id)
                ->where('reservation_date', $this->booking_date)
                ->whereIn('status', ['pending', 'confirmed'])
                ->pluck('reservation_time')
                ->toArray();

            $result[$table->id] = array_diff($availableTimes, $occupiedTimes);
        }

        return collect($result);
    }

    public function selectTableAndTime($tableId, $time) {
        // Check if the time is available for this table
        if (!in_array($time, $this->availableTimes->get($tableId, []))) {
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Waktu sudah dipesan untuk meja ini!']);
            return;
        }
        $this->selectedTable = $tableId;
        $this->selectedTime = $time;
    }

    public function confirmReservation() {
        $this->validate([
            'selectedTable' => 'required',
            'selectedTime' => 'required',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        $reservation = Reservation::create([
            'user_id' => auth()->id(),
            'table_id' => $this->selectedTable,
            'reservation_date' => $this->booking_date,
            'reservation_time' => $this->selectedTime,
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