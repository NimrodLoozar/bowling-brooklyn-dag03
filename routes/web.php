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

    Route::get('reserveringen', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('reserveringen/wijzigen', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('reserveringen/{id}/bewerking', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('reserveringen/{id}', [ReservationController::class, 'update'])->name('reservations.update');
});

require __DIR__ . '/auth.php';
