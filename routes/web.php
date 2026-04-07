<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReserveringController;
use App\Http\Controllers\LoginController;

// ====================
// PUBLIEKE ROUTES (geen login nodig)
// ====================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ====================
// BESCHERMDE ROUTES (login verplicht)
// ====================
Route::middleware(['auth'])->group(function () {

    // Producten - ALLEEN DOCENT mag toevoegen/bewerken/verwijderen
    Route::get('/', [ProductController::class, 'index'])->name('producten.index');
    Route::get('/product/create', [ProductController::class, 'create'])
        ->name('producten.create')
        ->middleware('role:docent');  // Alleen docent

    Route::post('/product', [ProductController::class, 'store'])
        ->name('producten.store')
        ->middleware('role:docent');  // Alleen docent

    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])
        ->name('producten.edit')
        ->middleware('role:docent');  // Alleen docent

    Route::put('/product/{id}', [ProductController::class, 'update'])
        ->name('producten.update')
        ->middleware('role:docent');  // Alleen docent

    Route::delete('/product/{id}', [ProductController::class, 'destroy'])
        ->name('producten.destroy')
        ->middleware('role:docent');  // Alleen docent

    // Reserveringen - IEDEREEN mag reserveren
    Route::get('/reserveringen', [ReserveringController::class, 'index'])->name('reserveringen.index');
    Route::get('/reservering/create', [ReserveringController::class, 'create'])->name('reserveringen.create');
    Route::post('/reservering', [ReserveringController::class, 'store'])->name('reserveringen.store');
    Route::delete('/reservering/{id}', [ReserveringController::class, 'destroy'])->name('reserveringen.destroy');

});