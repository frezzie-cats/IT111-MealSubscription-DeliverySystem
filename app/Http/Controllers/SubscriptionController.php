<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Exception;
use App\Models\MealPlan;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'plan_id' => 'required|exists:meal_plans,id',
            'delivery_days' => 'required|array',
            'start_date' => 'required|date',
        ]);

        $plan = MealPlan::findOrFail($request->plan_id);

        try {
            // Set your Stripe secret key
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create a Stripe Checkout Session
            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'php',
                        'product_data' => [
                            'name' => $plan->name,
                        ],
                        'unit_amount' => $plan->price * 100, // Convert to cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('checkout-success'),
                'cancel_url' => url()->previous(),
                'metadata' => [
                    'user_id' => auth()->id(),
                    'delivery_days' => implode(',', $request->delivery_days),
                    'start_date' => $request->start_date,
                ],
            ]);

            // Redirect to Stripe Checkout
            return redirect($session->url);

        } catch (Exception $e) {
            // Redirect back with error message
            return back()->withInput()->withErrors(['stripe' => 'Payment error: ' . $e->getMessage()]);
        }
    }
}
