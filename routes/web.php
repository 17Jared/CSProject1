<?php

use App\Http\Controllers\ArenaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LockController;
use App\Http\Controllers\LogoffController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ReservedArenasController;
use Illuminate\Support\Facades\Route;




Route::redirect('/', 'login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/reservations', [ReservationController::class, 'page'])->name('showReservations');

    Route::get('/addArena', [ArenaController::class, 'addArena'])->name('addArena');
    Route::post('/storeArena/{id}', [ArenaController::class, 'store'])->name('storeArena');
    Route::post('/goToBook/{arena_id}', [ArenaController::class, 'bookArena'])->name('goToBook');

    Route::post('/reservation/{arenaId}', [ReservationController::class, 'index'])->name('makeReservation');
    Route::post('/acceptRequest/{requestId}', [ReserveController::class, 'accept'])->name('acceptReservation');
    Route::post('/rejectRequest/{requestId}', [ReserveController::class, 'reject'])->name('rejectReservation');
});
Route::get('/lock', [LockController::class, 'lock'])->name('lock');
Route::post('/lock', [LockController::class, 'lock']);
Route::post('/logoff', [LogoffController::class, 'logout'])->name('logoff');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
