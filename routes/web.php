<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\EventController;

// Admin Controller
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;


// ================= USER AREA =================
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');

Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


// ================= ADMIN AREA =================
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/events', [AdminEventController::class, 'index'])->name('events');

    Route::get('/events/create', [AdminEventController::class, 'create'])
        ->name('events.create');

    Route::post('/events', [AdminEventController::class, 'store'])
        ->name('events.store');

    Route::get('/events/{event}/edit', [AdminEventController::class, 'edit'])
        ->name('events.edit');

    Route::put('/events/{event}', [AdminEventController::class, 'update'])
        ->name('events.update');

    Route::delete('/events/{event}', [AdminEventController::class, 'destroy'])
        ->name('events.destroy');


    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

});