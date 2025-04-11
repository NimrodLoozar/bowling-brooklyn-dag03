<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

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
Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
Route::get('reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');

// Results Overview
Route::get('results', [ReservationController::class, 'showResults'])->name('results.show');
Route::post('results', [ReservationController::class, 'handleResultsRequest'])->name('results.filter');

require __DIR__ . '/auth.php';
