<?php

use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\ArenaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LockController;
use App\Http\Controllers\LogoffController;
use App\Http\Controllers\ManagearenaController;
use App\Http\Controllers\MyBookController;
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
    Route::get('/unRespondedReservations', [ReservationController::class, 'page'])->name('showUnrespondedReservations')->middleware('admin');
    Route::get('/RespondedReservations', [ReservationController::class, 'page2'])->name('showRespondedReservations')->middleware('admin');
    Route::get('/mybookings', [MyBookController::class, 'index'])->name('myBookings');
    Route::get('/changeDetails/{id}', [ManagearenaController::class, 'changeDetailsPage'])->name('changeDetailsPage');

    Route::post('/changeDetails/{id}', [ManagearenaController::class, 'changeDetailsPage'])->name('changeDetailsPage');

    Route::get('/addArena', [ArenaController::class, 'addArena'])->name('addArena');
    Route::get('/manageArena', [ManagearenaController::class, 'index'])->name('manageArena');

    Route::post('/storeArena/{id}', [ArenaController::class, 'store'])->name('storeArena');
    Route::get('/changed', [ArenaController::class, 'changeDetails'])->name('changeDetails');

    Route::post('/changed', [ArenaController::class, 'changeDetails'])->name('changeDetails');
    Route::get('/deleteArena{id}', [ArenaController::class, 'deleteArena'])->name('deleteArena');

    Route::post('/deleteArena{id}', [ArenaController::class, 'deleteArena'])->name('deleteArena');
    Route::get('/goToBook/{arena_id}', [ArenaController::class, 'bookArena'])->name('goToBook');

    Route::post('/goToBook/{arena_id}', [ArenaController::class, 'bookArena'])->name('goToBook');

    Route::post('/reservation/{arenaId}', [ReservationController::class, 'index'])->name('makeReservation');
    Route::post('/reserve/{id}', [ReserveController::class, 'cancel'])->name('cancelMine');

    Route::post('/acceptRequest/{requestId}', [ReserveController::class, 'accept'])->name('acceptReservation')->middleware('admin');
    Route::post('/rejectRequest/{requestId}', [ReserveController::class, 'reject'])->name('rejectReservation')->middleware('admin');
    Route::post('/rejectRequest2/{requestId}', [ReserveController::class, 'reject2'])->name('rejectReservation2')->middleware('admin');
});

Route::post('/lock/{userId}', [LockController::class, 'lock'])->name('lock');
Route::post('/logoff', [LogoffController::class, 'logout'])->name('logoff');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
