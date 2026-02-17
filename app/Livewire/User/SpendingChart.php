<?php

namespace App\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SpendingChart extends Component
{
    public int $totalSpent = 0;
    public int $orderCount = 0;
    public array $dates = [];
    public array $totals = [];

    public string $month = '';
    public string $monthLabel = '';
    public bool $autoSelectedMonth = false;

    public function mount(): void
    {
        $userId = Auth::id();

        if (!$userId) {
            return;
        }

        $requestedMonth = $this->normalizeMonth(request('month'));
        $selectedMonth = $requestedMonth
            ? Carbon::createFromFormat('Y-m', $requestedMonth)->startOfMonth()
            : now()->startOfMonth();

        $startOfMonth = $selectedMonth->copy()->startOfMonth()->startOfDay();
        $endOfMonth = $selectedMonth->copy()->endOfMonth()->endOfDay();

        if (!$requestedMonth) {
            $hasOrdersThisMonth = Order::query()
                ->where('user_id', $userId)
                ->where('status', '!=', 'cancelled')
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->exists();

            if (!$hasOrdersThisMonth) {
                $latestOrderAt = Order::query()
                    ->where('user_id', $userId)
                    ->where('status', '!=', 'cancelled')
                    ->latest('created_at')
                    ->value('created_at');

                if ($latestOrderAt) {
                    $this->autoSelectedMonth = true;

                    $selectedMonth = Carbon::parse($latestOrderAt)->startOfMonth();
                    $startOfMonth = $selectedMonth->copy()->startOfMonth()->startOfDay();
                    $endOfMonth = $selectedMonth->copy()->endOfMonth()->endOfDay();
                }
            }
        }

        $this->month = $selectedMonth->format('Y-m');
        $this->monthLabel = $selectedMonth->format('M Y');

        $this->totalSpent = (int) round(
            Order::where('user_id', $userId)
                ->where('payment_status', 'paid')
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->sum('total')
        );

        // Total orders this month (excluding cancelled)
        $this->orderCount = Order::where('user_id', $userId)
            ->where('status', '!=', 'cancelled')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

        // Daily spending aggregation
        $dailyData = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->where('user_id', $userId)
            ->where('status', '!=', 'cancelled')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date')
            ->mapWithKeys(fn($total, $date) => [(string) $date => (int) round($total)])
            ->all();

        // Fill all days of the month
        $dates = [];
        $totals = [];
        $cursor = $startOfMonth->copy();

        while ($cursor->lte($endOfMonth)) {
            $dateKey = $cursor->toDateString();
            $dates[] = $dateKey;
            // Make sure values are integers, not floats
            $totals[] = (int) ($dailyData[$dateKey] ?? 0);
            $cursor->addDay();
        }

        $this->dates = $dates;
        $this->totals = $totals;
    }

    private function normalizeMonth(mixed $month): ?string
    {
        if (!is_string($month)) {
            return null;
        }

        $month = trim($month);

        if (!preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $month)) {
            return null;
        }

        return $month;
    }

    public function render()
    {
        return view('livewire.user.spending-chart');
    }
}
