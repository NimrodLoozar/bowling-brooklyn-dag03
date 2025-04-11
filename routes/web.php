<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Http\Controllers\UitslagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PersoonController;

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

    Route::get('uitslagen', [UitslagController::class, 'index'])->name('uitslagen.index');
    Route::get('uitslagen/{id}/edit', [UitslagController::class, 'edit'])->name('uitslagen.edit');
    Route::post('uitslagen/{id}', [UitslagController::class, 'update'])->name('uitslagen.update');
    Route::get('uitslagen/reservering/{id}', [UitslagController::class, 'show'])->name('uitslagen.show');
});

// Martijn
Route::get('reserveringen', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('reserveringen/wijzegingen', [ReservationController::class, 'show'])->name('reservations.show');
Route::get('reserveringen/{id}/bewerking', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('reserveringen/{id}', [ReservationController::class, 'update'])->name('reservations.update');

// Results Overview
Route::get('results', [ReservationController::class, 'showResults'])->name('results.show');
Route::post('results', [ReservationController::class, 'handleResultsRequest'])->name('results.filter');

require __DIR__ . '/auth.php';
