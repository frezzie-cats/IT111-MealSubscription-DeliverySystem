<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feedback;
use App\Models\User;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/data/feedback.json'));
        $feedbacks = json_decode($json, true);

        $userIds = User::pluck('id')->all();

        foreach ($feedbacks as $feedback) {
            // Assign a random user_id from existing users
            $feedback['user_id'] = $userIds[array_rand($userIds)];
            Feedback::create($feedback);
        }
    }
}
