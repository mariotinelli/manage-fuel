<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Subscribed;
use App\Livewire\Subscribe;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');


Route::get('/subscribe', Subscribe::class)->name('subscribe');

Route::get('/billing', function (Request $request) {
    return $request->user()->redirectToBillingPortal(route('dashboard'));
})->middleware(['auth'])->name('billing');

Route::middleware([
    Authenticate::class,
    Subscribed::class
])->group(function () {

    Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
