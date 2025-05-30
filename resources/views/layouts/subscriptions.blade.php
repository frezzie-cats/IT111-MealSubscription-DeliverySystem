@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Manage Subscriptions</h1>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="min-w-full table-auto">
        <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
            <tr>
                <th class="px-6 py-3">User</th>
                <th class="px-6 py-3">Plan</th>
                <th class="px-6 py-3">Start Date</th>
                <th class="px-6 py-3">Delivery Days</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
            @php
                $subscriptions = [
                    ['user' => 'Maria Cruz', 'plan' => 'Weekly Wellness', 'start' => 'Apr 28, 2025', 'days' => 'Mon, Wed, Fri', 'status' => 'active'],
                    ['user' => 'Juan Dela Cruz', 'plan' => 'Low-Carb Monthly', 'start' => 'Mar 1, 2025', 'days' => 'Tue, Thu', 'status' => 'cancelled'],
                    ['user' => 'Admin One', 'plan' => 'Family Plan', 'start' => 'May 15, 2025', 'days' => 'Mon–Fri', 'status' => 'active'],
                ];
            @endphp

            @foreach ($subscriptions as $sub)
            <tr>
                <td class="px-6 py-4">{{ $sub['user'] }}</td>
                <td class="px-6 py-4">{{ $sub['plan'] }}</td>
                <td class="px-6 py-4">{{ $sub['start'] }}</td>
                <td class="px-6 py-4">{{ $sub['days'] }}</td>
                <td class="px-6 py-4">
                    @if ($sub['status'] === 'active')
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded">Active</span>
                    @else
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-red-600 bg-red-100 rounded">Cancelled</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="text-indigo-600 hover:underline text-sm mr-3">View</a>
                    <a href="#" class="text-red-600 hover:underline text-sm">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
