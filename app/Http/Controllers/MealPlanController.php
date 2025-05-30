<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;

class MealPlanController extends Controller
{
    public function index()
    {
        $plans = MealPlan::all();
        return view('plans', compact('plans'));
    }
}
