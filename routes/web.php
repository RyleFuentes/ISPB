<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Orders;
use App\Livewire\Pages\Products;
use App\Livewire\Pages\Suppliers;
use App\Livewire\Pages\Users;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('profile', 'profile')
    ->middleware(['auth', 'verified'])
    ->name('profile');

Route::middleware(['auth', 'verified',  ])->group(function() {
    Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('admin');
    Route::get('/products', Products::class)->name('products');
    Route::get('/orders', Orders::class)->name('orders');
    Route::get('/users', Users::class)->name('users')->middleware('admin');
    Route::get('/suppliers', Suppliers::class)->name('suppliers')->middleware('admin');
});


require __DIR__.'/auth.php';
