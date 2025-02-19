<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PropertyController::class, 'index'])->name('properties.index');

Route::get('/dashboard', [BookingController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('properties', PropertyController::class)->except(['show'])->middleware(['auth']);

Route::post('/properties/{property}/bookings', [BookingController::class, 'store'])->name('bookings.store')->middleware('auth');
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy')->middleware('auth');
Route::get('/bookings/active', [BookingController::class, 'active'])->name('bookings.active')->middleware('auth');

require __DIR__.'/auth.php';
