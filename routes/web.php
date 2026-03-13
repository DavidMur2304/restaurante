<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WaiterController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/carta', [PublicController::class, 'menu'])->name('menu');
Route::get('/espacios', [PublicController::class, 'spaces'])->name('spaces');

Route::get('/reservas', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservas', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('/contacto', [ContactController::class, 'create'])->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

// Auth routes
require __DIR__.'/auth.php';

// Waiter panel routes (authenticated)
Route::middleware('auth')->prefix('panel')->name('waiter.')->group(function () {
    Route::get('/', [WaiterController::class, 'dashboard'])->name('dashboard');
    Route::get('/mesa/{id}', [WaiterController::class, 'tableDetail'])->name('table');
    Route::post('/comanda', [OrderController::class, 'store'])->name('order.store');
    Route::patch('/comanda/{order}/estado', [OrderController::class, 'updateStatus'])->name('order.status');
    Route::post('/mesa/liberar', [OrderController::class, 'freeTable'])->name('table.free');
    Route::delete('/reserva/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
    Route::post('/reserva/{reservation}/mesa', [ReservationController::class, 'assignTable'])->name('reservation.assign');
});

// Redirect /dashboard to waiter panel
Route::get('/dashboard', function () {
    return redirect()->route('waiter.dashboard');
})->middleware('auth');
