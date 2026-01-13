<?php

use Illuminate\Support\Facades\Route;

// Route untuk halaman utama
Route::get('/', \App\Livewire\Pages\HomePage::class)->name('home');

// Route settings user
Route::middleware(['auth'])->group(function () {
    Route::get('/settings', function () {
        return view('settings');
    })->name('user.settings');
});

// Route Public - dapat diakses semua orang
Route::get('/', \App\Livewire\Pages\HomePage::class)->name('home'); // Halaman utama
Route::get('/menu', \App\Livewire\Pages\MenuPage::class)->name('menu'); // Halaman menu
Route::get('/cart', \App\Livewire\Pages\CartPage::class)->name('cart'); // Halaman keranjang
Route::get('/checkout', \App\Livewire\Pages\CheckoutPage::class)->name('checkout'); // Halaman checkout
Route::get('/orders', \App\Livewire\Pages\OrderHistoryPage::class)->name('orders'); // Riwayat pesanan

// Route Admin - hanya untuk user dengan role admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard'); // Dashboard admin
    Route::get('/menu', \App\Livewire\Admin\MenuManagement::class)->name('admin.menu'); // Management menu
    Route::get('/orders', \App\Livewire\Admin\OrderManagement::class)->name('admin.orders'); // Management pesanan
});

// Route untuk tampilan frontend acuan
Route::view('resto', 'resto_app')->name('resto_app');

require __DIR__.'/settings.php';
