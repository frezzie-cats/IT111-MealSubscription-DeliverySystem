<?php

use Illuminate\Support\Facades\Route;
use App\Models\MealPlan;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\MealPlanMealController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderHistoryController;
use App\Models\Feedback;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Meal Plans (public index and subscribe)
    Route::get('/plans', [MealPlanController::class, 'index'])->name('plans');
    Route::get('/subscribe/{plan}', function ($planId) {
        $plan = MealPlan::findOrFail($planId);
        return view('subscribe', compact('plan'));
    })->name('subscribe');

    // Subscription creation
    Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe.store');

    // Static pages
    Route::view('/schedule', 'schedule')->name('schedule');
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');
    Route::view('/subscriptions/cancel', 'cancel-subscription')->name('subscriptions.cancel');
    Route::view('/cancel-subscription', 'cancel-subscription')->name('cancel-subscription');
    Route::get('/checkout-success', [SubscriptionController::class, 'checkoutSuccess'])->name('checkout-success');

    // Dashboard (show top 3 popular plans)
    Route::get('/dashboard', function () {
        $popularPlans = MealPlan::orderByDesc('like')->take(3)->get();
        $latestFeedbacks = Feedback::with('user')->latest()->take(2)->get();
        return view('home', compact('popularPlans', 'latestFeedbacks'));
    })->middleware(['auth'])->name('dashboard');

    // MealPlan CRUD (except index, which is public)
    Route::resource('meal-plans', MealPlanController::class)->except(['index']);

    // Most liked/disliked meal plans (JSON)
    Route::get('/meal-plans/most-liked', [MealPlanController::class, 'mostLiked'])->name('meal-plans.most-liked');
    Route::get('/meal-plans/most-disliked', [MealPlanController::class, 'mostDisliked'])->name('meal-plans.most-disliked');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Like/Dislike meal plans
    Route::post('/meal-plans/{id}/like', [MealPlanController::class, 'like'])->name('meal-plans.like');
    Route::post('/meal-plans/{id}/dislike', [MealPlanController::class, 'dislike'])->name('meal-plans.dislike');

});

require __DIR__.'/auth.php';
require __DIR__.'/feedback.php';
require __DIR__.'/meal_plan.php';
require __DIR__.'/subscription.php';
require __DIR__.'/delivery.php';
require __DIR__.'/payment.php';
require __DIR__.'/order_history.php';
