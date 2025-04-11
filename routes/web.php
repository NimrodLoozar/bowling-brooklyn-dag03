<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Http\Controllers\UitslagController;
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

    Route::get('uitslagen', [UitslagController::class, 'index'])->name('uitslagen.index');
    Route::get('uitslagen/{id}/edit', [UitslagController::class, 'edit'])->name('uitslagen.edit');
    Route::post('uitslagen/{id}', [UitslagController::class, 'update'])->name('uitslagen.update');
    Route::get('uitslagen/reservering/{id}', [UitslagController::class, 'show'])->name('uitslagen.show');
});

require __DIR__.'/auth.php';
