<?php

use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Models\MealPlan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Main pages
Route::get('/plans', [MealPlanController::class, 'index'])->name('plans');

Route::get('/subscribe/{plan}', function ($planId) {
    $plan = MealPlan::findOrFail($planId);
    return view('subscribe', compact('plan'));
})->name('subscribe');

Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/schedule', function () {
    return view('schedule');
})->name('schedule');

Route::get('/subscriptions', function () {
    return view('subscriptions');
})->name('subscriptions');

Route::get('/subscriptions/cancel', function () {
    // You can return a view or handle cancellation logic here
    return view('cancel-subscription');
})->name('subscriptions.cancel');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/cancel-subscription', function () {
    return view('cancel-subscription');
})->name('cancel-subscription');

Route::get('/checkout-success', function () {
    return view('checkout-success');
})->name('checkout-success');

// Profile routes (auth required)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
