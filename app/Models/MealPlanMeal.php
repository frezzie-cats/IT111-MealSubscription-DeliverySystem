<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealPlanMeal extends Model
{
    protected $fillable = [
        'meal_plan_id', 'name', 'description', 'image_url'
    ];

    public function mealPlan()
    {
        return $this->belongsTo(MealPlan::class);
    }
}
