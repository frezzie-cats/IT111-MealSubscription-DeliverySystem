<?php

namespace App\Http\Controllers;

use App\Models\MealPlanMeal;
use Illuminate\Http\Request;

class MealPlanMealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meals = MealPlanMeal::all();
        return view('meal_plan_meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meal_plan_meals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'meal_plan_id' => 'required|exists:meal_plans,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);
        MealPlanMeal::create($data);
        return redirect()->route('meal-plan-meals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MealPlanMeal $mealPlanMeal)
    {
        return view('meal_plan_meals.show', compact('mealPlanMeal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MealPlanMeal $mealPlanMeal)
    {
        return view('meal_plan_meals.edit', compact('mealPlanMeal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MealPlanMeal $mealPlanMeal)
    {
        $data = $request->validate([
            'meal_plan_id' => 'required|exists:meal_plans,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);
        $mealPlanMeal->update($data);
        return redirect()->route('meal-plan-meals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MealPlanMeal $mealPlanMeal)
    {
        $mealPlanMeal->delete();
        return redirect()->route('meal-plan-meals.index');
    }
}
