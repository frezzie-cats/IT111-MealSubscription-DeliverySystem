@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-4xl font-extrabold text-gray-800 mb-10 text-center">Choose Your Meal Plan</h2>

    @php
    $likedPlans = session('liked_plans', []);
    $dislikedPlans = session('disliked_plans', []);
    @endphp

    <div class="grid md:grid-cols-3 gap-8">
        @foreach ($plans as $plan)
        <div class="bg-white rounded-lg shadow-lg transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl hover:scale-105">
            <img src="{{ asset('storage/' . $plan->image_url) }}" alt="{{ $plan->name }}" class="w-full h-48 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $plan->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $plan->description }}</p>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-indigo-600 font-semibold text-lg">₱{{ number_format($plan->price, 2) }}/{{ $plan->billing_cycle }}</span>
                    <a href="{{ route('subscribe', ['plan' => $plan->id]) }}" class="text-sm bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500 transition">
                        Subscribe
                    </a>
                </div>
                <div class="flex items-center gap-4 mt-2">
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
                    this.querySelector('.like-icon').classList.add('filter-blue');
                    this.querySelector('.like-icon').classList.remove('filter-gray');
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
                    this.querySelector('.dislike-icon').classList.add('filter-red');
                    this.querySelector('.dislike-icon').classList.remove('filter-gray');
                    this.querySelector('.dislike-count').textContent = data.dislikes;
                }
            });
        });
    });
});
</script>
@endsection
