@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-indigo-600 to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
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
            @for ($i = 1; $i <= 3; $i++)
            <div class="bg-gray-50 rounded-lg shadow-lg hover:shadow-xl transition overflow-hidden">
                <img src="https://th.bing.com/th/id/OIP.Hyo0UGOPbO-wM4CngYQ9pAHaFw?cb=iwp2&w=2534&h=1972&rs=1&pid=ImgDetMain,{{ $i }}" class="w-full h-48 object-cover" alt="Meal {{ $i }}">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Weekly Wellness Plan</h4>
                    <p class="text-gray-600 mb-4 text-sm">7 nutritious meals delivered weekly. Great for those with busy schedules.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-indigo-600 font-semibold text-lg">₱799/week</span>
                        <a href="{{ route('subscribe') }}" class="text-indigo-600 font-medium hover:underline">Subscribe</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="bg-gray-100 py-20">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h3 class="text-3xl font-bold text-gray-800 mb-10">What Our Customers Say</h3>
        <div class="bg-white p-8 rounded shadow-md">
            <p class="text-gray-700 italic mb-6">"QuickBite has made my life so much easier. I eat healthy every day without the stress of cooking or planning!"</p>
            <h5 class="font-bold text-indigo-600">– Andrea S., Young Professional</h5>
        </div>
    </div>
</section>
@endsection
