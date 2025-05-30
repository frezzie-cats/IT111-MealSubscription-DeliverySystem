<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Stripe\Stripe;
use Stripe\Customer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Set your Stripe secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        $json = file_get_contents(database_path('seeders/data/users.json'));
        $users = json_decode($json, true);

        foreach ($users as $user) {
            $createdUser = User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make('password'),
                ]
            );

            // Create a Stripe customer for the user if not already set
            if (empty($createdUser->stripe_customer_id)) {
                $customer = Customer::create([
                    'email' => $createdUser->email,
                    'name' => $createdUser->name,
                ]);

                // Attach a test payment method (pm_card_visa) to the customer
                $paymentMethod = \Stripe\PaymentMethod::create([
                    'type' => 'card',
                    'card' => [
                        'token' => 'tok_visa', // Use a test token
                    ],
                ]);
                $paymentMethod->attach(['customer' => $customer->id]);

                $createdUser->stripe_customer_id = $customer->id;
                $createdUser->save();
            }

        }
    }
}
