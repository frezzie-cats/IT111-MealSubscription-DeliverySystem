@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-6 py-20 text-center">
    <div class="bg-white rounded-lg shadow p-10">
        <div class="text-red-500 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M18.364 5.636l-12.728 12.728m12.728 0L5.636 5.636" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-2">Cancel Subscription?</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to cancel your <strong>Weekly Wellness Plan</strong> subscription?</p>
        <p class="text-sm text-gray-500 mb-6">You will stop receiving meals starting from the next delivery schedule.</p>

        <form action="{{ route('subscriptions.cancelAction', $subscription->id) }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-500 transition">
                Yes, Cancel Subscription
            </button>
            <a href="{{ route('subscriptions.index') }}"
               class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300 transition">
                Go Back
            </a>
        </form>
    </div>
</div>
@endsection
