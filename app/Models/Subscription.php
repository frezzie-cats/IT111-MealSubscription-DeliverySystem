<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id', 'meal_plan_id', 'start_date', 'end_date', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mealPlan()
    {
        return $this->belongsTo(MealPlan::class);
    }
}
