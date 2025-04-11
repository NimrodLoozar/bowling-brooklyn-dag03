<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReserveringController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// Martijn
Route::get('reservations', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservations.index');
Route::get('reservations/{reservation}/edit', [App\Http\Controllers\ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('reservations/{reservation}', [App\Http\Controllers\ReservationController::class, 'update'])->name('reservations.update');


require __DIR__.'/auth.php';
