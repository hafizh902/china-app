<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Pages;
use App\Livewire\Admin;
use App\Http\Controllers\XenditWebhookController;

// Handle GET requests to livewire/update route (should redirect or show error)
Route::get('/livewire/update', function () {
    return redirect('/')->with('error', 'Invalid request method. Please use the application properly.');
});
// Public
Route::get('/', Pages\HomePage::class)->name('home');
Route::get('/menu', Pages\MenuPage::class)->name('menu');
Route::get('/cart', Pages\CartPage::class)->name('cart');
Route::get('/checkout', Pages\CheckoutPage::class)->name('checkout');   
Route::get('/orders', Pages\OrderHistoryPage::class)
    ->middleware('auth')
    ->name('orders');

Route::get('/reservation', Pages\ReservationSystem::class)
    ->middleware('auth')
    ->name('reservation');

// Route settings user
Route::middleware(['auth'])->group(function () {
    Route::get('/settings', function () {
        return view('settings');
    })->name('user.settings');
});

// Admin
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

require __DIR__.'/settings.php';
