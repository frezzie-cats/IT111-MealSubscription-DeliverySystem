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
    <br><br><br><br><br>

    <section class="my-landscape-section bg-black">
  <img src="/assets/vegies.avif" alt="Landscape" class="w-full object-cover">
</section>

<div class="w-full py-12">

    {{-- Basic Meals --}}
<h2 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-black text-transparent bg-clip-text bg-gradient-to-r from-gray-400 via-emerald-500 to-emerald-400 leading-none tracking-tight mb-10 pt-24 [text-shadow:_-8px_0px_0_rgba(16,185,129,0.6)]">
  FEATURED MEALS
</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4 mb-12">
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/spanish.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Egg and Spanish Omelette</h4>
            <p class="text-sm text-gray-600">Low Carb</p>
        </a>
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/tuna.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Tuna Lettuce Wrap</h4>
            <p class="text-sm text-gray-600">Low Carb</p>
        </a>
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/cucumber.webp') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Cucumber Slices with Cream Cheese</h4>
            <p class="text-sm text-gray-600">Low Carb</p>
        </a>
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/berries.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Greek Yogurt with Chia Seeds and Berries</h4>
            <p class="text-sm text-gray-600">Low Carb</p>
        </a>
    </div>

    {{-- Standard Meals --}}
    <h2 class="text-4xl font-extrabold text-gray-100 mb-10 text-center">Standard Meals!</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4 mb-12">
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/chicken.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Grilled Chicken with Mixed Veggies</h4>
            <p class="text-sm text-gray-600">Low Carb & Rich in Protein</p>
        </a>
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/beans.jpeg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Baked Tilapia with Green Beans</h4>
            <p class="text-sm text-gray-600">Low Carb & Rich in Protein</p>
        </a>
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/sandwhich.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Chicken Sandwich</h4>
            <p class="text-sm text-gray-600">Low Carb & Rich in Protein</p>
        </a>
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/cup.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Fruit Cup with Cottage Cheese</h4>
            <p class="text-sm text-gray-600">Low Carb & Rich in Protein</p>
        </a>
    </div>

    {{-- Premium Meals --}}
    <h2 class="text-4xl font-extrabold text-gray-100 mb-10 text-center">Premium Meals!</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4 mb-12">
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/salmon.png') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Grilled Salmon with Asparagus and Lemon Butter Sauce</h4>
            <p class="text-sm text-gray-600">Low Carb & Rich in Protein + Rich in omega-3 fatty acids, supports heart and brain health, anti-inflammatory</p>
        </a>
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/grilled.webp') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Herb-Crusted Chicken Breast with Cauliflower Purée</h4>
            <p class="text-sm text-gray-600">Low Carb & Rich in Protein + High in lean protein, supports muscle maintenance, cauliflower is high in fiber and antioxidants</p>
        </a>
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/avocado.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Seared Tuna Steak with Mixed Greens and Avocado</h4>
            <p class="text-sm text-gray-600">Low Carb & Rich in Protein + High in lean protein and omega-3s for heart and joint health, avocado adds healthy monounsaturated fats and potassium</p>
        </a>
    <a href="#" class="bg-white rounded-xl shadow-lg transition transform hover:-translate-y-1 p-4 text-center animate-float-left-right">
            <img src="{{ asset('assets/straw.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Mixed Berry Salad with Walnuts and Feta Cheese</h4>
            <p class="text-sm text-gray-600">Low Carb & Rich in Protein + High in antioxidants, fiber, and healthy fats, supports brain and heart health, walnut and feta add protein and flavor</p>
        </a>
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
