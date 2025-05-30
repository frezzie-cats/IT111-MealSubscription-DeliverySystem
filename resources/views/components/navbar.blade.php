<!-- resources/views/components/navbar.blade.php -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-indigo-600">QuickBite</h1>

        <nav class="space-x-4 flex items-center">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600">Home</a>
            <a href="{{ route('plans') }}" class="text-gray-600 hover:text-indigo-600">Plans</a>
            <a href="{{ route('about') }}" class="text-gray-600 hover:text-indigo-600">About</a>
            <a href="{{ route('contact') }}" class="text-gray-600 hover:text-indigo-600">Contact</a>

            @guest
                <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">Login</a>
            @endguest

            @auth
            <div x-data="{ open: false }" class="relative inline-block text-left">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4f46e5&color=fff"
                         alt="Profile"
                         class="w-8 h-8 rounded-full border border-gray-300">
                    <span class="text-gray-700 hidden md:inline">{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4 text-gray-500 ml-1" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <!--Dropdown-->
                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg z-50">

                    <!--My Subscriptions--> 
                    <a href="{{ route('subscriptions') }}"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Subscriptions</a>

                    <!--Dashboard-->
                    <a href="{{ route('dashboard') }}"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>

                    <!--Delivery Schedule-->
                    <a href="{{ route('schedule') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delivery Schedule</a>

                       
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
            @endauth
        </nav>
    </div>
</header>
