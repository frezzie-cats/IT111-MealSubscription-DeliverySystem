<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderHistoryController;

Route::get('/order_history', [OrderHistoryController::class, 'index'])->name('order_history.index');
Route::get('/order_history/create', [OrderHistoryController::class, 'create'])->name('order_history.create');
Route::post('/order_history', [OrderHistoryController::class, 'store'])->name('order_history.store');
Route::get('/order_history/{order_history}', [OrderHistoryController::class, 'show'])->name('order_history.show');
Route::get('/order_history/{order_history}/edit', [OrderHistoryController::class, 'edit'])->name('order_history.edit');
Route::put('/order_history/{order_history}', [OrderHistoryController::class, 'update'])->name('order_history.update');
Route::delete('/order_history/{order_history}', [OrderHistoryController::class, 'destroy'])->name('order_history.destroy');
