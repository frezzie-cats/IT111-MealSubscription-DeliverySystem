@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-4xl font-extrabold text-gray-800 mb-10 text-center">Choose Your Meal Plan</h2>

    <div class="grid md:grid-cols-3 gap-8">
        @php
            $plans = [
                [
                    'name' => 'Weekly Wellness Plan',
                    'price' => '₱799/week',
                    'description' => '7 meals per week for health-focused individuals.',
                    'image' => 'https://th.bing.com/th/id/OIP.Hyo0UGOPbO-wM4CngYQ9pAHaFw?cb=iwp2&w=2534&h=1972&rs=1&pid=ImgDetMain'
                ],
                [
                    'name' => 'Low-Carb Monthly Plan',
                    'price' => '₱2999/month',
                    'description' => 'Ideal for keto and low-carb lifestyles.',
                    'image' => 'https://th.bing.com/th/id/OIP.Hyo0UGOPbO-wM4CngYQ9pAHaFw?cb=iwp2&w=2534&h=1972&rs=1&pid=ImgDetMain'
                ],
                [
                    'name' => 'Family Plan',
                    'price' => '₱499/week',
                    'description' => 'Meal deliveries for 2–4 people, 5 days a week.',
                    'image' => 'https://th.bing.com/th/id/OIP.Hyo0UGOPbO-wM4CngYQ9pAHaFw?cb=iwp2&w=2534&h=1972&rs=1&pid=ImgDetMain'
                ],
            ];
        @endphp

        @foreach ($plans as $plan)
        <div class="bg-white rounded-lg shadow hover:shadow-md transition overflow-hidden">
            <img src="{{ $plan['image'] }}" alt="{{ $plan['name'] }}" class="w-full h-48 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $plan['name'] }}</h3>
                <p class="text-gray-600 mb-4">{{ $plan['description'] }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-indigo-600 font-semibold text-lg">{{ $plan['price'] }}</span>
                    <a href="{{ route('subscribe') }}" class="text-sm bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500 transition">
                        Subscribe
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
