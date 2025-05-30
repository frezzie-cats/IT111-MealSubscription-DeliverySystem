@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-4xl font-extrabold text-gray-800 mb-10 text-center">Choose Your Meal Plan</h2>

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
