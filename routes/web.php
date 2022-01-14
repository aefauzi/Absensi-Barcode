<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
	    return redirect('/management');
	});
	Route::get('/management', [App\Http\Controllers\ManagementController::class, 'index'])->name('management');

	Route::get('/recap', [App\Http\Controllers\RecapController::class, 'index'])->name('recap');

	Route::get('/presensi', [App\Http\Controllers\PresensiController::class, 'index'])->name('presensi');

	Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
	Route::post('/profile-update', [App\Http\Controllers\ProfileController::class, 'update']);
	Route::get('/qrcode/{id}', [App\Http\Controllers\ProfileController::class, 'generate_qr'])->name('generate');
});