<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\MealPlan;
use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Exception;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['user', 'mealPlan'])->get();
        return view('subscriptions', compact('subscriptions'));
    }

    public function create()
    {
        $users = User::all();
        $mealPlans = MealPlan::all();
        return view('subscriptions.create', compact('users', 'mealPlans'));
    }

    public function cancel($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('cancel-subscription', compact('subscription'));
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'plan_id' => 'required|exists:meal_plans,id',
            'delivery_days' => 'required|array|min:1',
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
                'success_url' => route('checkout-success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => url()->previous(),
                'metadata' => [
                    'user_id' => auth()->id(),
                    'plan_id' => $plan->id,
                    'start_date' => $request->start_date,
                    'delivery_days' => json_encode($request->delivery_days), // Pass as JSON string
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

    public function checkoutSuccess(Request $request)
    {
        $session_id = $request->get('session_id');
        if (!$session_id) {
            return redirect()->route('dashboard')->with('error', 'No session ID found.');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = StripeSession::retrieve($session_id);

        // Check for an active subscription for this user and meal plan
        $activeSubscription = Subscription::where('user_id', $session->metadata->user_id ?? auth()->id())
            ->where('meal_plan_id', $session->metadata->plan_id ?? null)
            ->where('status', 'active')
            ->first();

        if ($activeSubscription) {
            // User already has an active subscription for this meal plan
            return redirect()->route('subscriptions.index')->with('error', 'You already have an active subscription for this meal plan.');
        }

        // Prevent duplicate payment records
        $existingPayment = Payment::where('user_id', $session->metadata->user_id ?? null)
            ->where('amount', $session->amount_total / 100)
            ->where('status', 'paid')
            ->first();

        if (!$existingPayment) {
            // 1. Create the subscription
            $deliveryDays = isset($session->metadata->delivery_days)
                ? json_decode($session->metadata->delivery_days, true)
                : [];

            $subscription = Subscription::create([
                'user_id' => $session->metadata->user_id ?? auth()->id(),
                'meal_plan_id' => $session->metadata->plan_id ?? null,
                'start_date' => $session->metadata->start_date ?? now(),
                'delivery_days' => $deliveryDays,
                'status' => 'active',
            ]);

            // 2. Create the payment with the subscription_id
            Payment::create([
                'user_id' => $subscription->user_id,
                'subscription_id' => $subscription->id,
                'amount' => $session->amount_total / 100,
                'payment_date' => now(),
                'payment_method' => 'stripe',
                'status' => 'paid',
            ]);
        }

        return view('checkout-success');
    }
    public function cancelAction(Subscription $subscription)
    {
        $subscription->update(['status' => 'cancelled']);
        return redirect()->route('subscriptions.index')->with('success', 'Subscription cancelled successfully.');
    }
}
