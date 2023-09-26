<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Products;
use App\Livewire\Welcome;
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



Route::get('/', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/products', Products::class)->name('products');