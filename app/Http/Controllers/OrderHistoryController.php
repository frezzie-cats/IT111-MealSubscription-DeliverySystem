<?php

namespace App\Http\Controllers;

use App\Models\OrderHistory;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = OrderHistory::with(['user', 'subscription', 'payment'])->get();
        return view('order_history.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $subscriptions = Subscription::all();
        $payments = Payment::all();
        return view('order_history.create', compact('users', 'subscriptions', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'subscription_id' => 'required|exists:subscriptions,id',
            'meal_plan_snapshot' => 'required|array',
            'payment_id' => 'required|exists:payments,id',
            'ordered_at' => 'nullable|date',
        ]);
        $data['meal_plan_snapshot'] = json_encode($data['meal_plan_snapshot']);
        OrderHistory::create($data);
        return redirect()->route('order_history.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderHistory $order_history)
    {
        return view('order_history.show', compact('order_history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderHistory $order_history)
    {
        $users = User::all();
        $subscriptions = Subscription::all();
        $payments = Payment::all();
        return view('order_history.edit', compact('order_history', 'users', 'subscriptions', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderHistory $order_history)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'subscription_id' => 'required|exists:subscriptions,id',
            'meal_plan_snapshot' => 'required|array',
            'payment_id' => 'required|exists:payments,id',
            'ordered_at' => 'nullable|date',
        ]);
        $data['meal_plan_snapshot'] = json_encode($data['meal_plan_snapshot']);
        $order_history->update($data);
        return redirect()->route('order_history.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderHistory $order_history)
    {
        $order_history->delete();
        return redirect()->route('order_history.index');
    }
}
