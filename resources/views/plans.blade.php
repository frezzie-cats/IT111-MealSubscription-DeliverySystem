@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-4xl font-extrabold text-emerald-400 mb-10 text-center">Basic Meals!</h2>
    
    @php
        $likedPlans = session('liked_plans', []);
        $dislikedPlans = session('disliked_plans', []);
    @endphp

    <div class="grid md:grid-cols-3 gap-8">
        @foreach ($plans as $plan)
        <div class="bg-white rounded-lg shadow hover:shadow-md transition overflow-hidden">
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
            @endforeach
        </div>
    </div>
    @endsection
