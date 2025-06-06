<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function index()
    {
        $plans = MealPlan::all();
        return view('plans', compact('plans'));
    }

    public function create()
    {
        return view('meal_plans.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'billing_cycle' => 'required|string|max:10',
            'image_url' => 'nullable|string',
            'like' => 'nullable|integer',
            'dislike' => 'nullable|integer',
        ]);
        MealPlan::create($data);
        return redirect()->route('plans')->with('success', 'Meal plan created successfully.');
    }

    public function show(MealPlan $mealPlan)
    {
        return view('meal_plans.show', compact('mealPlan'));
    }

    public function edit(MealPlan $mealPlan)
    {
        return view('meal_plans.edit', compact('mealPlan'));
    }

    public function update(Request $request, MealPlan $mealPlan)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'billing_cycle' => 'required|string|max:10',
            'image_url' => 'nullable|string',
            'like' => 'nullable|integer',
            'dislike' => 'nullable|integer',
        ]);
        $mealPlan->update($data);
        return redirect()->route('plans')->with('success', 'Meal plan updated successfully.');
    }

    public function destroy(MealPlan $mealPlan)
    {
        $mealPlan->delete();
        return redirect()->route('plans')->with('success', 'Meal plan deleted successfully.');
    }

    // Return the meal plan with the largest like value
    public function mostLiked()
    {
        $plans = MealPlan::orderByDesc('like')->take(3)->get();
        return response()->json($plans);
    }

    // Return the meal plan with the largest dislike value
    public function mostDisliked()
    {
        $plan = MealPlan::orderByDesc('dislike')->first();
        return response()->json($plan);
    }

    // Increment like count
    public function like($id)
    {
        $plan = MealPlan::findOrFail($id);
        $plan->increment('like');
        // Optionally update session likedPlans here
        return response()->json(['success' => true, 'likes' => $plan->like]);
    }

    // Increment dislike count
    public function dislike($id)
    {
        $plan = MealPlan::findOrFail($id);
        $plan->increment('dislike');
        // Optionally update session dislikedPlans here
        return response()->json(['success' => true, 'dislikes' => $plan->dislike]);
    }
}
