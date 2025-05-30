<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealPlanController;

Route::get('/meal-plan-meals', [MealPlanMealController::class, 'index'])->name('meal-plan-meals.index');
Route::get('/meal-plan-meals/create', [MealPlanMealController::class, 'create'])->name('meal-plan-meals.create');
Route::post('/meal-plan-meals', [MealPlanMealController::class, 'store'])->name('meal-plan-meals.store');
Route::get('/meal-plan-meals/{meal_plan_meal}', [MealPlanMealController::class, 'show'])->name('meal-plan-meals.show');
Route::get('/meal-plan-meals/{meal_plan_meal}/edit', [MealPlanMealController::class, 'edit'])->name('meal-plan-meals.edit');
Route::put('/meal-plan-meals/{meal_plan_meal}', [MealPlanMealController::class, 'update'])->name('meal-plan-meals.update');
Route::delete('/meal-plan-meals/{meal_plan_meal}', [MealPlanMealController::class, 'destroy'])->name('meal-plan-meals.destroy');
