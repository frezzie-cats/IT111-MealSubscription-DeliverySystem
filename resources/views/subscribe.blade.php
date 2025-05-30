@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Subscribe to a Meal Plan</h2>

    <!-- Meal Plan Summary -->
    <div class="bg-white rounded-lg shadow p-6 mb-10">
        <div class="flex items-center gap-6">
            <img src="{{ asset('storage/' . $plan->image_url) }}" alt="Meal Plan" class="w-64 rounded">
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $plan->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $plan->description }}</p>
                <span class="text-indigo-600 font-bold text-xl">₱{{ number_format($plan->price, 2) }}/{{ $plan->billing_cycle }}</span>
            </div>
        </div>
    </div>

    <!-- Subscription Options -->
    <form action="{{ route('subscribe.store') }}" method="POST" class="bg-white rounded-lg shadow p-6">
        @csrf
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">

        @if ($errors->has('stripe'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                {{ $errors->first('stripe') }}
            </div>
        @endif

        <div class="mb-6">
            <label for="delivery_days" class="block text-sm font-medium text-gray-700 mb-2">Choose Your Delivery Days</label>
            <div class="grid grid-cols-3 gap-2">
                @foreach(['Monday', 'Wednesday', 'Friday'] as $day)
                <label class="inline-flex items-center">
                    <input type="checkbox" name="delivery_days[]" value="{{ $day }}" class="form-checkbox text-indigo-600"
                        {{ (is_array(old('delivery_days')) && in_array($day, old('delivery_days'))) ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">{{ $day }}</span>
                </label>
                @endforeach
            </div>
            @error('delivery_days')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Subscription Start Date</label>
            <input type="date" name="start_date" id="start_date" class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <button type="submit" class="bg-indigo-600 text-white font-semibold px-6 py-3 rounded hover:bg-indigo-500 transition">
            Proceed to Payment
        </button>
    </form>
</div>
@endsection
