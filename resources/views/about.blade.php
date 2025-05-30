@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">About QuickBite</h2>

    <div class="bg-white shadow rounded-lg p-6 space-y-6 text-gray-700 text-lg leading-relaxed">
        <p>
            <strong>QuickBite</strong> is a meal subscription and delivery platform built for busy individuals and families who want healthy, ready-to-eat meals without the hassle of meal prep and planning.
        </p>

        <p>
            Our mission is to make nutritious eating accessible, consistent, and convenient. We work with local chefs and nutritionists to prepare high-quality meals delivered fresh to your door based on your chosen plan and schedule.
        </p>

        <p>
            Whether you're maintaining a healthy lifestyle, managing a specific diet, or just looking to save time — QuickBite has the right plan for you.
        </p>

        <p class="text-center font-medium text-indigo-600 mt-8">
            Eat well. Save time. Feel better. That’s the QuickBite promise.
        </p>
    </div>

    <!-- Optional: How it works section -->
    <div class="mt-16">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">How It Works</h3>
        <div class="grid md:grid-cols-3 gap-6 text-center">
            <div class="bg-white p-6 rounded shadow hover:shadow-md transition">
                <img src="https://img.icons8.com/ios-filled/100/4f46e5/list.png" class="mx-auto mb-4" width="60" />
                <h4 class="text-lg font-semibold mb-2">1. Choose a Plan</h4>
                <p class="text-gray-600 text-sm">Pick the meal plan that suits your needs and lifestyle.</p>
            </div>
            <div class="bg-white p-6 rounded shadow hover:shadow-md transition">
                <img src="https://img.icons8.com/ios-filled/100/4f46e5/meal.png" class="mx-auto mb-4" width="60" />
                <h4 class="text-lg font-semibold mb-2">2. Get Fresh Meals</h4>
                <p class="text-gray-600 text-sm">We cook and deliver meals straight to your door.</p>
            </div>
            <div class="bg-white p-6 rounded shadow hover:shadow-md transition">
                <img src="https://img.icons8.com/ios-filled/100/4f46e5/happy.png" class="mx-auto mb-4" width="60" />
                <h4 class="text-lg font-semibold mb-2">3. Enjoy & Repeat</h4>
                <p class="text-gray-600 text-sm">Eat healthy, feel amazing — and we handle the rest!</p>
            </div>
        </div>
    </div>
</div>
@endsection
