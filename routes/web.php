<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Orders;
use App\Livewire\Pages\Products;
use App\Livewire\Pages\Users;
use App\Livewire\PendingUser;
use App\Livewire\Welcome;

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
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

use Illuminate\Foundation\Auth\EmailVerificationRequest;
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

use Illuminate\Http\Request;
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Route::get('/pending', PendingUser::class)->name('pending');

require __DIR__.'/auth.php';
