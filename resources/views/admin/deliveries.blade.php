@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Manage Deliveries</h1>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="min-w-full table-auto">
        <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
            <tr>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3">User</th>
                <th class="px-6 py-3">Meal Plan</th>
                <th class="px-6 py-3">Delivery Day</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
            @php
                $deliveries = [
                    ['date' => 'May 24, 2025', 'user' => 'Maria Cruz', 'plan' => 'Weekly Wellness', 'day' => 'Friday', 'status' => 'pending'],
                    ['date' => 'May 27, 2025', 'user' => 'Juan Dela Cruz', 'plan' => 'Low-Carb Plan', 'day' => 'Monday', 'status' => 'delivered'],
                    ['date' => 'May 29, 2025', 'user' => 'Admin One', 'plan' => 'Family Plan', 'day' => 'Wednesday', 'status' => 'pending'],
                ];
            @endphp

            @foreach ($deliveries as $delivery)
            <tr>
                <td class="px-6 py-4">{{ $delivery['date'] }}</td>
                <td class="px-6 py-4">{{ $delivery['user'] }}</td>
                <td class="px-6 py-4">{{ $delivery['plan'] }}</td>
                <td class="px-6 py-4">{{ $delivery['day'] }}</td>
                <td class="px-6 py-4">
                    @if ($delivery['status'] === 'delivered')
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded">Delivered</span>
                    @else
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded">Pending</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="text-indigo-600 hover:underline text-sm mr-3">Mark as Delivered</a>
                    <a href="#" class="text-red-600 hover:underline text-sm">Cancel</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
