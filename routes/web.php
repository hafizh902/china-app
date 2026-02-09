<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages;
use App\Livewire\Admin;
use App\Http\Controllers\XenditWebhookController;
use App\Livewire\Pages\SumerizePage;

/*
|--------------------------------------------------------------------------
| Livewire Guard
|--------------------------------------------------------------------------
*/
Route::get('/livewire/update', function () {
    return redirect('/')
        ->with('error', 'Invalid request method. Please use the application properly.');
});

/*
|--------------------------------------------------------------------------
| Guest Only Routes (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/', Pages\LandingPage::class)->name('landing');

    Route::get('/login', function () {
        return redirect()->route('home');
    })->name('login');
});

/*
|--------------------------------------------------------------------------
| Public Routes (Accessible after login)
|--------------------------------------------------------------------------
*/
Route::get('/home', Pages\HomePage::class)->name('home');
Route::get('/catalogue', Pages\MenuPage::class)->name('catalogue');
Route::get('/cart', Pages\CartPage::class)->name('cart');
Route::get('/checkout', Pages\CheckoutPage::class)->name('checkout');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/orders', Pages\OrderHistoryPage::class)->name('orders');
    Route::get('/reservation', Pages\ReservationSystem::class)->name('reservation');

// Route settings user
Route::middleware(['auth'])->group(function () {
    Route::get('/sumerize', SumerizePage::class)->name('sumerize');

    Route::get('/settings', function () {
        return view('settings');
    })->name('user.settings');
});

/*
|--------------------------------------------------------------------------
| Admin Notification History (non-Livewire)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/admin/notifications-history', function () {
    $ordersQuery = \App\Models\Order::query();
    $reservationsQuery = \App\Models\Reservation::query();

    if (request('date')) {
        $ordersQuery->whereDate('created_at', request('date'));
        $reservationsQuery->whereDate('reservation_date', request('date'));
    }

    if (request('all')) {
        $orders = $ordersQuery->latest()->get();
        $reservations = $reservationsQuery->latest()->get();
    } else {
        $orders = $ordersQuery->latest()->paginate(10);
        $reservations = $reservationsQuery->latest()->paginate(10);
    }

    return view('livewire.Admin.notifications', compact('orders', 'reservations'));
})->name('admin.notifications.all');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', Admin\Dashboard::class)->name('dashboard');
        Route::get('/menu', Admin\MenuManagement::class)->name('menu');
        Route::get('/orders', Admin\OrderManagement::class)->name('orders');
        Route::get('/reservations', Admin\ReservationMonitor::class)->name('reservations');
        Route::get('/configurations', Admin\ConfigPage::class)->name('configurations');
    });

/*
|--------------------------------------------------------------------------
| Extra Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/settings.php';

Route::get('/check-auth', function () {
    return response()->json([
        'authenticated' => auth()->check()
    ]);
});