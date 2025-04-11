<?php

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
Route::get('/reserveringen', [App\Http\Controllers\ReserveringController::class, 'index'])->name('reserveringen.index');
Route::get('/reserveringen/{reservering}/edit', [App\Http\Controllers\ReserveringController::class, 'edit'])->name('reserveringen.edit');
Route::put('/reserveringen/{reservering}', [App\Http\Controllers\ReserveringController::class, 'update'])->name('reserveringen.update');


require __DIR__.'/auth.php';
