@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Manage Users</h1>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="min-w-full table-auto">
        <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Role</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
            @php
                $users = [
                    ['name' => 'Maria Cruz', 'email' => 'maria@example.com', 'role' => 'user'],
                    ['name' => 'Admin One', 'email' => 'admin@example.com', 'role' => 'admin'],
                    ['name' => 'Juan Dela Cruz', 'email' => 'juan@example.com', 'role' => 'user'],
                ];
            @endphp

            @foreach ($users as $user)
            <tr>
                <td class="px-6 py-4">{{ $user['name'] }}</td>
                <td class="px-6 py-4">{{ $user['email'] }}</td>
                <td class="px-6 py-4 capitalize">{{ $user['role'] }}</td>
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
