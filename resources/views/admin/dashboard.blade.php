@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Welcome to the Admin Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Total Users</h2>
        <p class="text-3xl font-bold text-indigo-600">234</p>
    </div>
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Active Subscriptions</h2>
        <p class="text-3xl font-bold text-indigo-600">58</p>
    </div>
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Upcoming Deliveries</h2>
        <p class="text-3xl font-bold text-indigo-600">17</p>
    </div>
</div>
@endsection
