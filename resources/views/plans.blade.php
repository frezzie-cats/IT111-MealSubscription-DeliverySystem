@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-4xl font-extrabold text-emerald-400 mb-10 text-center">Basic Meals!</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-12">
        <a href="{{ route('plans', ['category' => 'basic']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
            <img src="{{ asset('assets/spanish.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Egg and Spanish Omelette</h4>
            <p class="text-sm text-gray-600">₱150</p>
            <p class="text-sm text-gray-600">Low Carb</p>

        </a>
        <a href="{{ route('plans', ['category' => 'standard']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
            <img src="{{ asset('assets/tuna.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Tuna Lettuce Wrap</h4>
            <p class="text-sm text-gray-600">₱145</p>
            <p class="text-sm text-gray-600">Low Carb</p>
        </a>
        <a href="{{ route('plans', ['category' => 'premium']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
            <img src="{{ asset('assets/cucumber.webp') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Cucumber Slices with Cream Cheese</h4>
            <p class="text-sm text-gray-600">₱145</p>
            <p class="text-sm text-gray-600">Low Carb</p>

        </a>
        <a href="{{ route('plans', ['category' => 'custom']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
            <img src="{{ asset('assets/berries.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
            <h4 class="text-lg font-bold text-gray-800">Greek Yogurt with Chia Seeds and Berries</h4>
            <p class="text-sm text-gray-600">₱155</p>
            <p class="text-sm text-gray-600">Low Carb</p>

        </a>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-4xl font-extrabold text-emerald-400 mb-10 text-center">Standard Meals!</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-12">
            <a href="{{ route('plans', ['category' => 'basic']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
                <img src="{{ asset('assets/chicken.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
                <h4 class="text-lg font-bold text-gray-800">Grilled Chicken with Mixed Veggies</h4>
                <p class="text-sm text-gray-600">₱175</p>
                <p class="text-sm text-gray-600">Low Carb & Rich in Protein</p>

            </a>
            <a href="{{ route('plans', ['category' => 'standard']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
                <img src="{{ asset('assets/beans.jpeg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
                <h4 class="text-lg font-bold text-gray-800">Baked Tilapia with Green Beans</h4>
                <p class="text-sm text-gray-600">₱160</p>
                <p class="text-sm text-gray-600">Low Carb & Rich in Protein</p>

            </a>
            <a href="{{ route('plans', ['category' => 'premium']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
                <img src="{{ asset('assets/sandwhich.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
                <h4 class="text-lg font-bold text-gray-800">Chicken Sandwich</h4>
                <p class="text-sm text-gray-600">₱165</p>
                <p class="text-sm text-gray-600">Low Carb & Rich in Protein</p>

            </a>
            <a href="{{ route('plans', ['category' => 'custom']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
                <img src="{{ asset('assets/cup.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
                <h4 class="text-lg font-bold text-gray-800">Fruit Cup with Cottage Cheese</h4>
                <p class="text-sm text-gray-600">₱160</p>
                <p class="text-sm text-gray-600">Low Carb & Rich in Protein</p>

            </a>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-4xl font-extrabold text-emerald-400 mb-10 text-center">Premium Meals!</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-12">
            <a href="{{ route('plans', ['category' => 'basic']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
                <img src="{{ asset('assets/salmon.png') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
                <h4 class="text-lg font-bold text-gray-800">Grilled Salmon with Asparagus and Lemon Butter Sauce</h4>
                <p class="text-sm text-gray-600">₱240</p>
                <p class="text-sm text-gray-600">Low Carb & Rich in Protein + Rich in omega-3 fatty acids, supports heart and brain health, anti-inflammatory</p>
            </a>

            <a href="{{ route('plans', ['category' => 'standard']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
                <img src="{{ asset('assets/grilled.webp') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
                <h4 class="text-lg font-bold text-gray-800">Herb-Crusted Chicken Breast with Cauliflower Purée</h4>
                <p class="text-sm text-gray-600">₱270</p>
                <p class="text-sm text-gray-600">Low Carb & Rich in Protein + High in lean protein, supports muscle maintenance, cauliflower is high in fiber and antioxidants</p>
            </a>

            <a href="{{ route('plans', ['category' => 'premium']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
                <img src="{{ asset('assets/avocado.jpg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
                <h4 class="text-lg font-bold text-gray-800"> Seared Tuna Steak with Mixed Greens and Avocado</h4>
                <p class="text-sm text-gray-600">₱295</p>
                <p class="text-sm text-gray-600">Low Carb & Rich in Protein + High in lean protein and omega-3s for heart and joint health, avocado adds healthy monounsaturated fats and potassium</p>

            </a>
            <a href="{{ route('plans', ['category' => 'custom']) }}" class="bg-white rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 p-4 text-center">
                <img src="{{ asset('assets/wagyu.jpeg') }}" alt="Basic Plan" class="w-full h-32 object-cover rounded mb-3">
                <h4 class="text-lg font-bold text-gray-800">Wagyu Beef Strips with Roasted Brussels Sprouts</h4>
                <p class="text-sm text-gray-600">₱285</p>
                <p class="text-sm text-gray-600">Low Carb & Rich in Protein + Contains CLA (conjugated linoleic acid) for fat metabolism, Brussels sprouts provide vitamin K and C for immune support</p>

            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($plans as $plan)
            <div class="bg-white rounded-lg shadow hover:shadow-md transition overflow-hidden">
                <img src="{{ $plan->image_url }}" alt="{{ $plan->name }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $plan->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $plan->description }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-indigo-600 font-semibold text-lg">₱{{ number_format($plan->price, 2) }}/{{ $plan->billing_cycle }}</span>
                        <a href="{{ route('subscribe', ['plan' => $plan->id]) }}" class="text-sm bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500 transition">
                            Subscribe
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection