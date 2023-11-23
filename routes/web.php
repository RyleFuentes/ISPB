<?php

use Illuminate\Support\Facades\Route;

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

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('orders', 'orders')
    ->middleware(['auth', 'verified'])
    ->name('orders');

Route::view('products', 'products')
    ->middleware(['auth', 'verified'])
    ->name('products');

Route::view('users', 'users')
    ->middleware(['auth', 'verified'])
    ->name('users');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
