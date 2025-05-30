@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Welcome, {{ Auth::user()->name }}</h2>

    <!-- Active Subscription Summary -->
    <div class="bg-white rounded-lg shadow p-6 mb-10">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-indigo-600">Your Active Subscription</h3>
            <a href="{{ route('subscriptions') }}" class="text-sm text-indigo-600 hover:underline">
                View All Subscriptions
            </a>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <p class="text-gray-700"><strong>Plan:</strong> Weekly Wellness Plan</p>
                <p class="text-gray-700"><strong>Start Date:</strong> April 28, 2025</p>
                <p class="text-gray-700"><strong>Delivery Days:</strong> Monday, Wednesday, Friday</p>
            </div>
            <div>
                <p class="text-gray-700"><strong>Status:</strong> <span class="text-green-600 font-semibold">Active</span></p>
                <p class="text-gray-700"><strong>Next Delivery:</strong> May 24, 2025</p>
            </div>
        </div>
    </div>

    <!-- (Optional) Delivery Preview -->
    {{-- Future feature: delivery schedule preview or order tracking --}}
</div>
@endsection
