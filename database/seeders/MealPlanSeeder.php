<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MealPlan;

class MealPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/data/meal_plan.json'));
        $plans = json_decode($json, true);

        foreach ($plans as $plan) {
            MealPlan::create($plan);
        }
    }
}
