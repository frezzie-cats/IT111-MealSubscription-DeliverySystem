<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | QuickBite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6 font-bold text-indigo-600 text-xl border-b">Admin Panel</div>
            <nav class="mt-6 space-y-2 px-4">
                <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:text-indigo-600">Dashboard</a>
                <a href="{{ route('admin.meals') }}" class="block text-gray-700 hover:text-indigo-600">Manage Meals</a>
                <a href="{{ route('admin.users') }}" class="block text-gray-700 hover:text-indigo-600">Subscriptions</a>
                <a href="{{ route('admin.subscriptions') }}" class="block text-gray-700 hover:text-indigo-600">Users</a>
                <a href="{{ route('admin.deliveries') }}" class="block text-gray-700 hover:text-indigo-600">Manage Deliveries</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            @yield('content')
        </main>
    </div>
</body>
</html>
