<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meal;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/data/meals.json'));
        $meals = json_decode($json, true);

        foreach ($meals as $meal) {
            Meal::create($meal);
        }
    }
}
