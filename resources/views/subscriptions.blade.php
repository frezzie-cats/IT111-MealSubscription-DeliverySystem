@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">My Subscriptions</h2>

    <!-- Active Subscriptions -->
    <div class="mb-10">
        <h3 class="text-xl font-semibold text-indigo-600 mb-4">Active Subscription</h3>

        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-indigo-500">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h4 class="text-lg font-bold text-gray-800">Weekly Wellness Plan</h4>
                    <p class="text-sm text-gray-600">Start Date: April 28, 2025</p>
                    <p class="text-sm text-gray-600">Delivery Days: Monday, Wednesday, Friday</p>
                    <span class="inline-block mt-2 text-sm font-medium text-green-600 bg-green-100 px-3 py-1 rounded">Active</span>
                </div>
                <div class="text-right">
                    <span class="block text-lg font-bold text-indigo-600 mb-2">₱799/week</span>
                    <a href="{{ route('subscriptions.cancel') }}" 
                        class="bg-red-600 text-white text-sm px-4 py-2 rounded hover:bg-red-500 transition">Cancel Subscription</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Past Subscriptions -->
    <div>
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Previous Subscriptions</h3>

        <div class="space-y-4">
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-gray-300">
                <h4 class="text-lg font-bold text-gray-800 mb-1">Low-Carb Monthly Plan</h4>
                <p class="text-sm text-gray-600">Start Date: February 1, 2025</p>
                <p class="text-sm text-gray-600">End Date: March 1, 2025</p>
                <span class="inline-block mt-2 text-sm font-medium text-gray-500 bg-gray-100 px-3 py-1 rounded">Expired</span>
            </div>
        </div>
    </div>
</div>
@endsection
