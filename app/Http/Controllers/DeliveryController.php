<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::with('subscription')->get();
        return view('deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subscriptions = Subscription::all();
        return view('deliveries.create', compact('subscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'delivery_date' => 'required|date',
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'delivery_status' => 'nullable|in:pending,delivered,failed',
            'address' => 'required|string',
        ]);
        Delivery::create($data);
        return redirect()->route('deliveries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        return view('deliveries.show', compact('delivery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        $subscriptions = Subscription::all();
        return view('deliveries.edit', compact('delivery', 'subscriptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        $data = $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'delivery_date' => 'required|date',
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'delivery_status' => 'nullable|in:pending,delivered,failed',
            'address' => 'required|string',
        ]);
        $delivery->update($data);
        return redirect()->route('deliveries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('deliveries.index');
    }
}
