@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Delivery Schedule</h2>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Day</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                @php
                    $deliveries = [
                        ['date' => 'May 24, 2025', 'day' => 'Friday', 'status' => 'Scheduled'],
                        ['date' => 'May 27, 2025', 'day' => 'Monday', 'status' => 'Scheduled'],
                        ['date' => 'May 29, 2025', 'day' => 'Wednesday', 'status' => 'Pending'],
                    ];
                @endphp

                @foreach ($deliveries as $delivery)
                <tr>
                    <td class="px-6 py-4">{{ $delivery['date'] }}</td>
                    <td class="px-6 py-4">{{ $delivery['day'] }}</td>
                    <td class="px-6 py-4">
                        @if ($delivery['status'] === 'Scheduled')
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-600 rounded-full font-medium">
                                Scheduled
                            </span>
                        @elseif ($delivery['status'] === 'Pending')
                            <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full font-medium">
                                Pending
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
