@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-cover bg-center text-white py-20" style="background-image: url('/assets/cover.jpg');">
  <div class="bg-black/40 absolute inset-0 z-0"></div> <!-- Optional overlay for text contrast -->
  <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
    <h2 class="text-5xl font-extrabold leading-tight mb-4">Healthy. Fresh. Delivered.</h2>
    <p class="text-xl mb-6 max-w-2xl mx-auto">Choose meal plans tailored to your goals. We'll take care of the cooking and delivery, so you can focus on living well.</p>
    <a href="{{ route('plans') }}" class="bg-white text-indigo-600 font-semibold px-6 py-3 rounded-full shadow hover:bg-gray-100 transition">
      Browse Plans
    </a>
  </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h3 class="text-3xl font-bold text-gray-800 mb-10">Why Choose QuickBite?</h3>
        <div class="grid md:grid-cols-3 gap-10">
            <div class="bg-white p-6 rounded shadow hover:shadow-md transition">
                <img src="https://img.icons8.com/ios-filled/100/indigodark/cutlery.png" alt="Meals" class="mx-auto mb-4" width="60">
                <h4 class="text-lg font-semibold mb-2">Nutritious Meals</h4>
                <p class="text-gray-600">Crafted by nutritionists and chefs to meet your dietary goals.</p>
            </div>
            <div class="bg-white p-6 rounded shadow hover:shadow-md transition">
                <img src="https://img.icons8.com/ios-filled/100/indigodark/delivery.png" alt="Delivery" class="mx-auto mb-4" width="60">
                <h4 class="text-lg font-semibold mb-2">Fast Delivery</h4>
                <p class="text-gray-600">Timely, fresh, and right to your doorstep — every time.</p>
            </div>
            <div class="bg-white p-6 rounded shadow hover:shadow-md transition">
                <img src="https://img.icons8.com/?size=100&id=7994&format=png&color=000000" alt="Flexible Payment" class="mx-auto mb-4" width="60">
                <h4 class="text-lg font-semibold mb-2">Flexible Plans</h4>
                <p class="text-gray-600">Weekly or monthly subscriptions with secure online payments.</p>
            </div>
        </div>
    </div>
</section>

<!-- Popular Plans -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12 text-gray-800">Our Popular Plans</h3>
        <div class="grid md:grid-cols-3 gap-8">
            @php
                $likedPlans = session('liked_plans', []);
                $dislikedPlans = session('disliked_plans', []);
            @endphp
            @foreach ($popularPlans as $plan)
            <div class="bg-gray-50 rounded-lg shadow-lg hover:shadow-xl transition overflow-hidden">
                <img src="{{ asset('storage/' . $plan->image_url) }}" class="w-full h-48 object-cover" alt="{{ $plan->name }}">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">{{ $plan->name }}</h4>
                    <p class="text-gray-600 mb-4 text-sm">{{ $plan->description }}</p>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-indigo-600 font-semibold text-lg">₱{{ number_format($plan->price, 2) }}/{{ $plan->billing_cycle }}</span>
                        <a href="{{ route('subscribe', ['plan' => $plan->id]) }}" class="text-indigo-600 font-medium hover:underline">Subscribe</a>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Like Form -->
                        <form action="{{ route('meal-plans.like', $plan->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="flex items-center gap-1 group" title="Like">
                                <svg class="w-6 h-6 {{ in_array($plan->id, $likedPlans) ? 'text-red-500' : 'text-emerald-400 group-hover:text-emerald-600' }} transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                                </svg>
                                <span class="text-gray-700">{{ $plan->like }}</span>
                            </button>
                        </form>
                        <!-- Dislike Form -->
                        <form action="{{ route('meal-plans.dislike', $plan->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="flex items-center gap-1 group" title="Dislike">
                                <svg class="w-6 h-6 {{ in_array($plan->id, $dislikedPlans) ? 'text-red-500' : 'text-red-400 group-hover:text-red-600' }} transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 18a1 1 0 01-.707-.293l-6.828-6.829a6 6 0 018.486-8.486l.049.049.049-.049a6 6 0 018.486 8.486l-6.828 6.829A1 1 0 0110 18z"/>
                                </svg>
                                <span class="text-gray-700">{{ $plan->dislike }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="bg-gray-100 py-20">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h3 class="text-3xl font-bold text-gray-800 mb-10">What Our Customers Say</h3>
        @if(isset($latestFeedbacks) && count($latestFeedbacks))
            @foreach($latestFeedbacks as $feedback)
                <div class="bg-white p-8 rounded shadow-md mb-8">
                    <p class="text-gray-700 italic mb-6">
                        "{{ $feedback->comment }}"
                    </p>
                    <h5 class="font-bold text-indigo-600">
                        – {{ $feedback->user?->name ?? 'Anonymous' }}
                    </h5>
                </div>
            @endforeach
        @else
            <div class="bg-white p-8 rounded shadow-md">
                <p class="text-gray-700 italic mb-6">No feedback yet.</p>
            </div>
        @endif
    </div>
</section>
@endsection
