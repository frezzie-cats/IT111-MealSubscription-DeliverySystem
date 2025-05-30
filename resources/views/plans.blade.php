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
                    <!-- Like Form -->
                    <form action="{{ route('meal-plans.like', $plan->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="flex items-center gap-1 group" title="Like">
                            <svg class="w-6 h-6 {{ in_array($plan->id, $likedPlans) ? 'text-red-500' : 'text-emerald-400 group-hover:text-emerald-600' }} transition" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                            </svg>
                            <span class="text-gray-700">{{ $plan->like }}</span>
                        </button>
                    </form>
                    <!-- Dislike Form -->
                    <form action="{{ route('meal-plans.dislike', $plan->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="flex items-center gap-1 group" title="Dislike">
                            <svg class="w-6 h-6 {{ in_array($plan->id, $dislikedPlans) ? 'text-red-500' : 'text-red-400 group-hover:text-red-600' }} transition" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a1 1 0 01-.707-.293l-6.828-6.829a6 6 0 018.486-8.486l.049.049.049-.049a6 6 0 018.486 8.486l-6.828 6.829A1 1 0 0110 18z" />
                            </svg>
                            <span class="text-gray-700">{{ $plan->dislike }}</span>
                        </button>
                    </form>
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

@endsection