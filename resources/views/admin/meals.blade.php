@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Manage Meal Plans</h1>

<div class="mb-4 text-right">
    <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500 text-sm">
        + Add New Meal Plan
    </a>
</div>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="min-w-full table-auto">
        <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
            <tr>
                <th class="px-6 py-3">Plan Name</th>
                <th class="px-6 py-3">Price</th>
                <th class="px-6 py-3">Delivery Days</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
            @php
                $plans = [
                    ['name' => 'Weekly Wellness Plan', 'price' => '₱799/week', 'days' => 'Mon, Wed, Fri'],
                    ['name' => 'Low-Carb Monthly Plan', 'price' => '₱2999/month', 'days' => 'Tue, Thu'],
                    ['name' => 'Family Plan', 'price' => '₱499/week', 'days' => 'Mon–Fri'],
                ];
            @endphp

            @foreach ($plans as $plan)
            <tr>
                <td class="px-6 py-4">{{ $plan['name'] }}</td>
                <td class="px-6 py-4">{{ $plan['price'] }}</td>
                <td class="px-6 py-4">{{ $plan['days'] }}</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-indigo-600 hover:underline text-sm mr-3">Edit</a>
                    <a href="#" class="text-red-600 hover:underline text-sm">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
