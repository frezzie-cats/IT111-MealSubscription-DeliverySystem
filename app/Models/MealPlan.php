<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'billing_cycle', 'image_url', "like","dislike"
    ];
}
