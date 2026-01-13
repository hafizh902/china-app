<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Pages;
use App\Livewire\Admin;

// Public
Route::get('/', Pages\HomePage::class)->name('home');
Route::get('/menu', Pages\MenuPage::class)->name('menu');
Route::get('/cart', Pages\CartPage::class)->name('cart');
Route::get('/checkout', Pages\CheckoutPage::class)->name('checkout');
Route::get('/orders', Pages\OrderHistoryPage::class)
    ->middleware('auth')
    ->name('orders');

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
    });

require __DIR__.'/settings.php';
