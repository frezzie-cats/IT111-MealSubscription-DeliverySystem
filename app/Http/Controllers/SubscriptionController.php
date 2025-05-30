<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\MealPlan;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Exception;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['user', 'mealPlan'])->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        $users = User::all();
        $mealPlans = MealPlan::all();
        return view('subscriptions.create', compact('users', 'mealPlans'));
    }

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

    public function show(Subscription $subscription)
    {
        return view('subscriptions.show', compact('subscription'));
    }

    public function edit(Subscription $subscription)
    {
        $users = User::all();
        $mealPlans = MealPlan::all();
        return view('subscriptions.edit', compact('subscription', 'users', 'mealPlans'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'meal_plan_id' => 'required|exists:meal_plans,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:active,cancelled,expired',
        ]);
        $subscription->update($data);
        return redirect()->route('subscriptions.index');
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('subscriptions.index');
    }
}
