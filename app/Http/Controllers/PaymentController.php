<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with(['user', 'subscription'])->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $subscriptions = Subscription::all();
        return view('payments.create', compact('users', 'subscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'subscription_id' => 'required|exists:subscriptions,id',
            'amount' => 'required|numeric',
            'payment_date' => 'nullable|date',
            'payment_method' => 'nullable|string|max:50',
            'status' => 'required|in:paid,failed,refunded',
        ]);
        Payment::create($data);
        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $users = User::all();
        $subscriptions = Subscription::all();
        return view('payments.edit', compact('payment', 'users', 'subscriptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'subscription_id' => 'required|exists:subscriptions,id',
            'amount' => 'required|numeric',
            'payment_date' => 'nullable|date',
            'payment_method' => 'nullable|string|max:50',
            'status' => 'required|in:paid,failed,refunded',
        ]);
        $payment->update($data);
        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index');
    }
}
