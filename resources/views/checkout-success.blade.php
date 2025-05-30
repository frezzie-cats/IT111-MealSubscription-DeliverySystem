@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-6 py-20 text-center">
    <div class="bg-white rounded-lg shadow p-10">
        <div class="text-green-500 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2l4 -4m5 2a9 9 0 11-18 0a9 9 0 0118 0z" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-2">Payment Successful!</h2>
        <p class="text-gray-600 mb-6">You've successfully subscribed to the <strong>Weekly Wellness Plan</strong>.</p>

        <div class="bg-gray-100 p-4 rounded mb-6 text-left text-sm">
            <p><strong>Start Date:</strong> April 28, 2025</p>
            <p><strong>Delivery Days:</strong> Monday, Wednesday, Friday</p>
            <p><strong>Price:</strong> ₱799/week</p>
        </div>

        <a href="{{ route('dashboard') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded hover:bg-indigo-500 transition">
            Go to Dashboard
        </a>
    </div>
</div>
@endsection
