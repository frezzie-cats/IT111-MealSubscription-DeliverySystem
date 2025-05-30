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
            <div class="bg-white p-6 rounded shadow-lg transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <img src="https://img.icons8.com/ios-filled/100/indigodark/cutlery.png" alt="Meals" class="mx-auto mb-4" width="60">
                <h4 class="text-lg font-semibold mb-2">Nutritious Meals</h4>
                <p class="text-gray-600">Crafted by nutritionists and chefs to meet your dietary goals.</p>
            </div>
            <div class="bg-white p-6 rounded shadow-lg transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <img src="https://img.icons8.com/ios-filled/100/indigodark/delivery.png" alt="Delivery" class="mx-auto mb-4" width="60">
                <h4 class="text-lg font-semibold mb-2">Fast Delivery</h4>
                <p class="text-gray-600">Timely, fresh, and right to your doorstep — every time.</p>
            </div>
            <div class="bg-white p-6 rounded shadow-lg transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
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
            <div class="bg-white rounded-lg shadow-lg transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl hover:scale-105">
                <img src="{{ asset('storage/' . $plan->image_url) }}" class="w-full h-48 object-cover" alt="{{ $plan->name }}">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">{{ $plan->name }}</h4>
                    <p class="text-gray-600 mb-4 text-sm">{{ $plan->description }}</p>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-indigo-600 font-semibold text-lg">₱{{ number_format($plan->price, 2) }}/{{ $plan->billing_cycle }}</span>
                        <a href="{{ route('subscribe', ['plan' => $plan->id]) }}" class="text-indigo-600 font-medium hover:underline">Subscribe</a>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Like Button -->
                        <button type="button"
                            class="flex items-center gap-1 group like-btn"
                            data-id="{{ $plan->id }}"
                            title="Like"
                            style="outline: none; border: none; background: none;">
                            <img src="{{ asset('storage/icons/thumbs-up.png') }}"
                                 alt="Like"
                                 class="w-6 h-6 like-icon {{ in_array($plan->id, $likedPlans) ? 'filter-blue' : 'filter-gray' }}">
                            <span class="text-gray-700 like-count">{{ $plan->like }}</span>
                        </button>
                        <!-- Dislike Button -->
                        <button type="button"
                            class="flex items-center gap-1 group dislike-btn"
                            data-id="{{ $plan->id }}"
                            title="Dislike"
                            style="outline: none; border: none; background: none;">
                            <img src="{{ asset('storage/icons/thumbs-down.png') }}"
                                 alt="Dislike"
                                 class="w-6 h-6 dislike-icon {{ in_array($plan->id, $dislikedPlans) ? 'filter-red' : 'filter-gray' }}">
                            <span class="text-gray-700 dislike-count">{{ $plan->dislike }}</span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="bg-emerald-100 py-20">
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Like
    document.querySelectorAll('.like-btn').forEach(function(btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const planId = this.dataset.id;
            fetch(`/meal-plans/${planId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    this.querySelector('.like-icon').classList.add('text-blue-500');
                    this.querySelector('.like-count').textContent = data.likes;
                }
            });
        });
    });

    // Dislike
    document.querySelectorAll('.dislike-btn').forEach(function(btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const planId = this.dataset.id;
            fetch(`/meal-plans/${planId}/dislike`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    this.querySelector('.dislike-icon').classList.add('text-red-500');
                    this.querySelector('.dislike-count').textContent = data.dislikes;
                }
            });
        });
    });
});
</script>r
@endsection
