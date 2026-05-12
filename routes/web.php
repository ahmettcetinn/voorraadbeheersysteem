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

// ← NIEUW: Registratie route!
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
// Gebruiker profiel bekijken (docent mag iedereen, student alleen zichzelf)
Route::get('/gebruiker/{id}', [LoginController::class, 'profiel'])->name('gebruiker.profiel');
// Documentatie pagina - publiek toegankelijk
Route::get('/documentatie', function () {
    return view('documentatie');
})->name('documentatie');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('producten.index');
    Route::get('/product/{id}/detail', [ProductController::class, 'detail'])->name('producten.detail');
    Route::get('/product/create', [ProductController::class, 'create'])->name('producten.create');
    Route::post('/product', [ProductController::class, 'store'])->name('producten.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('producten.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('producten.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('producten.destroy');

    Route::get('/reserveringen', [ReserveringController::class, 'index'])->name('reserveringen.index');
    Route::get('/reservering/create', [ReserveringController::class, 'create'])->name('reserveringen.create');
    Route::post('/reservering', [ReserveringController::class, 'store'])->name('reserveringen.store');
    Route::delete('/reservering/{id}', [ReserveringController::class, 'destroy'])->name('reserveringen.destroy');
    // Mijn Account - Eigen reserveringen zien
    Route::get('/mijn-account', [ReserveringController::class, 'mijnAccount'])->name('mijn.account');
});