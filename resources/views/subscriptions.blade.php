@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">My Subscriptions</h2>

    @php
        $activeSubscriptions = $subscriptions->where('status', 'active');
        $pastSubscriptions = $subscriptions->whereIn('status', ['cancelled', 'expired']);
    @endphp

    <!-- Active Subscriptions -->
    <div class="mb-10">
        <h3 class="text-xl font-semibold text-indigo-600 mb-4">Active Subscription</h3>
        @forelse($activeSubscriptions as $subscription)
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-indigo-500 mb-4">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <h4 class="text-lg font-bold text-gray-800">{{ $subscription->mealPlan->name ?? 'N/A' }}</h4>
                        <p class="text-sm text-gray-600">Start Date: {{ \Carbon\Carbon::parse($subscription->start_date)->format('F d, Y') }}</p>
                        @if($subscription->delivery_days)
                            <p class="text-sm text-gray-600">
                                Delivery Days: {{ is_array($subscription->delivery_days) ? implode(', ', $subscription->delivery_days) : $subscription->delivery_days }}
                            </p>
                        @endif
                        <span class="inline-block mt-2 text-sm font-medium text-green-600 bg-green-100 px-3 py-1 rounded">{{ ucfirst($subscription->status) }}</span>
                    </div>
                    <div class="text-right">
                        <span class="block text-lg font-bold text-indigo-600 mb-2">
                            ₱{{ number_format($subscription->mealPlan->price ?? 0, 2) }}/{{ $subscription->mealPlan->billing_cycle ?? '' }}
                        </span>
                        <a href="{{ route('subscriptions.cancel', $subscription->id) }}"
                           class="bg-red-600 text-white text-sm px-4 py-2 rounded hover:bg-red-500 transition ml-2">Cancel</a>

                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-lg shadow p-6 text-gray-500">No active subscriptions.</div>
        @endforelse
    </div>

    <!-- Past Subscriptions -->
    <div>
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Previous Subscriptions</h3>
        <div class="space-y-4">
            @forelse($pastSubscriptions as $subscription)
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-gray-300">
                    <h4 class="text-lg font-bold text-gray-800 mb-1">{{ $subscription->mealPlan->name ?? 'N/A' }}</h4>
                    <p class="text-sm text-gray-600">Start Date: {{ \Carbon\Carbon::parse($subscription->start_date)->format('F d, Y') }}</p>
                    @if($subscription->end_date)
                        <p class="text-sm text-gray-600">End Date: {{ \Carbon\Carbon::parse($subscription->end_date)->format('F d, Y') }}</p>
                    @endif
                    <span class="inline-block mt-2 text-sm font-medium text-gray-500 bg-gray-100 px-3 py-1 rounded">{{ ucfirst($subscription->status) }}</span>

                    @if($subscription->status === 'cancelled')
                        <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" class="inline-block mt-4"
                              onsubmit="return confirm('Are you sure you want to permanently delete this subscription?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition">
                                Delete
                            </button>
                        </form>
                    @endif
                </div>
            @empty
                <div class="bg-white rounded-lg shadow p-6 text-gray-500">No previous subscriptions.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
