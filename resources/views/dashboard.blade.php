@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden sm:rounded-lg border border-gray-200 shadow-lg transform transition-transform duration-300 hover:shadow-2xl hover:-translate-y-1 hover:scale-[1.01]">
            <div class="p-6 text-gray-900">
                <h3 class="text-2xl font-bold mb-6">Quick Navigation</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('plans') }}" class="block p-4 bg-indigo-50 rounded hover:bg-indigo-100">
                        <div class="font-semibold">Meal Plans</div>
                        <div class="text-sm text-gray-600">Browse available meal plans.</div>
                    </a>
                    <a href="{{ route('plans') }}" class="block p-4 bg-indigo-50 rounded hover:bg-indigo-100">
                        <div class="font-semibold">Subscribe</div>
                        <div class="text-sm text-gray-600">Start a new subscription.</div>
                    </a>
                    <a href="{{ url('/schedule') }}" class="block p-4 bg-indigo-50 rounded hover:bg-indigo-100">
                        <div class="font-semibold">Delivery Schedule</div>
                        <div class="text-sm text-gray-600">View your delivery schedule.</div>
                    </a>
                    <a href="{{ url('/subscriptions') }}" class="block p-4 bg-indigo-50 rounded hover:bg-indigo-100">
                        <div class="font-semibold">My Subscriptions</div>
                        <div class="text-sm text-gray-600">Manage your subscriptions.</div>
                    </a>
                    <a href="{{ url('/about') }}" class="block p-4 bg-indigo-50 rounded hover:bg-indigo-100">
                        <div class="font-semibold">About</div>
                        <div class="text-sm text-gray-600">Learn more about us.</div>
                    </a>
                    <a href="{{ url('/contact') }}" class="block p-4 bg-indigo-50 rounded hover:bg-indigo-100">
                        <div class="font-semibold">Contact</div>
                        <div class="text-sm text-gray-600">Get in touch with our team.</div>
                    </a>
                    <a href="{{ url('/cancel-subscription') }}" class="block p-4 bg-indigo-50 rounded hover:bg-indigo-100">
                        <div class="font-semibold">Cancel Subscription</div>
                        <div class="text-sm text-gray-600">Cancel your current subscription.</div>
                    </a>
                    <a href="{{ url('/checkout-success') }}" class="block p-4 bg-indigo-50 rounded hover:bg-indigo-100">
                        <div class="font-semibold">Checkout Success</div>
                        <div class="text-sm text-gray-600">See confirmation after successful checkout.</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
