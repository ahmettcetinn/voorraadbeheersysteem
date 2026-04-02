<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReserveringController;

Route::get('/', [ProductController::class, 'index'])->name('producten.index');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('producten.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('producten.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('producten.destroy');
Route::get('/product/create', [ProductController::class, 'create'])->name('producten.create');
Route::post('/product', [ProductController::class, 'store'])->name('producten.store');

// Reservering routes
Route::get('/reserveringen', [ReserveringController::class, 'index'])->name('reserveringen.index');
Route::get('/reservering/create', [ReserveringController::class, 'create'])->name('reserveringen.create');
Route::post('/reservering', [ReserveringController::class, 'store'])->name('reserveringen.store');
Route::delete('/reservering/{id}', [ReserveringController::class, 'destroy'])->name('reserveringen.destroy');