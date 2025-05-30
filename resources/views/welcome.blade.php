<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FreshMeals - Premium Meal Delivery Service</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* Include your Tailwind CSS here or link to CDN */
                @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
            </style>
        @endif
    </head>
    <body class="font-inter antialiased bg-gradient-to-br from-green-50 via-white to-emerald-50 min-h-screen">
        <!-- Navigation - Updated with new color palette -->
        <nav class="bg-emerald-100 shadow-sm border-b border-gray-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-2xl font-bold text-emerald-400">FreshMeals</h1>
                        </div>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-8">
                            <a href="#how-it-works" class="text-gray-800 hover:text-blue-500 px-3 py-2 text-sm font-medium transition-colors">How It Works</a>
                            <a href="#menu" class="text-gray-800 hover:text-blue-500 px-3 py-2 text-sm font-medium transition-colors">Menu</a>
                            <a href="#pricing" class="text-gray-800 hover:text-blue-500 px-3 py-2 text-sm font-medium transition-colors">Pricing</a>
                            <a href="#about" class="text-gray-800 hover:text-blue-500 px-3 py-2 text-sm font-medium transition-colors">About</a>
                        </div>
                    </div>

                    <!-- Auth Links -->
                    @if (Route::has('login'))
                        <div class="flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="bg-emerald-400 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-emerald-700 transition-colors">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-800 hover:text-blue-500 px-3 py-2 text-sm font-medium transition-colors">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-gray-800 hover:text-blue-500 px-3 py-2 text-sm font-medium transition-colors">
                                        Get Started
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Main Content Container -->
        <div class="flex min-h-screen">
            <!-- Main Content Area -->
            <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
                <div class="max-w-7xl w-full">
                    <!-- Two-column layout from medium screens up -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 lg:gap-20 items-center">
                        <!-- Left Content -->
                        <div class="text-center md:text-left space-y-6 md:space-y-8">
                            <!-- Main Heading -->
                            <div class="space-y-4">
                                <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-black text-gray-900 leading-none tracking-tight">
                                    FRESH<br>
                                    <span class="text-emerald-400">MEALS</span>
                                </h1>
                                <h2 class="text-xl sm:text-2xl lg:text-3xl font-semibold text-gray-800">
                                    Why FreshMeals?
                                </h2>
                            </div>

                            <!-- Features List - Fixed alignment -->
                            <div class="space-y-3 max-w-md mx-auto md:mx-0">
                                <div class="flex items-start">
                                    <div class="w-4 h-4 bg-yellow-400 rounded-full mt-1 mr-4 flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <span class="font-medium text-gray-800">Personalized Meals to Match Your Diet</span>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-4 h-4 bg-orange-400 rounded-full mt-1 mr-4 flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <span class="font-medium text-gray-800">Pre-Prepped, Fresh Ingredients—Zero Guesswork</span>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-4 h-4 bg-yellow-400 rounded-full mt-1 mr-4 flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <span class="font-medium text-gray-800">Sustainable, Vacuum-Sealed Packaging</span>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-4 h-4 bg-orange-400 rounded-full mt-1 mr-4 flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <span class="font-medium text-gray-800">Weekly, Flexible Subscriptions</span>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-4 h-4 bg-yellow-400 rounded-full mt-1 mr-4 flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <span class="font-medium text-gray-800">Nutritionist-Approved Recipes</span>
                                    </div>
                                </div>
                            </div>

                            <!-- CTA Section -->
                            <div class="space-y-6">
                                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900">
                                    Select Your Plan now!
                                </h3>
                                
                                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                                    <a href="{{ route('register') }}" class="bg-emerald-400 text-white px-8 py-4 rounded-full text-lg font-bold hover:bg-emerald-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                        Start Your Journey
                                    </a>
                                    <a href="#how-it-works" class="border-2 border-emerald-400 text-emerald-400 px-8 py-4 rounded-full text-lg font-bold hover:bg-emerald-50 transition-all duration-300">
                                        Learn More
                                    </a>
                                </div>

                               
                            </div>
                        </div>

                        <!-- Right Content - Meal Image -->
                        <div class="flex justify-center md:justify-end mt-8 md:mt-0">
                            <div class="relative">
                                <!-- Plan Card Styling -->
                                <div class="w-72 h-72 sm:w-80 sm:h-80 md:w-[350px] md:h-[350px] lg:w-[450px] lg:h-[450px] xl:w-[500px] xl:h-[500px] rounded-full overflow-hidden shadow-xl bg-white border-4 border-gray-200 hover:border-emerald-400 transition-colors p-4">
                                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                                         alt="Fresh healthy meal bowl" 
                                         class="w-full h-full object-cover rounded-full">
                                </div>
                                <!-- Decorative elements with updated colors -->
                                <div class="absolute -top-4 -right-4 w-16 h-16 bg-yellow-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute -bottom-6 -left-6 w-20 h-20 bg-orange-400 rounded-full opacity-40 animate-pulse delay-1000"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Bottom Navigation (Visible only on mobile) -->
        <div class="md:hidden fixed bottom-0 left-0 right-0 bg-gray-50 bg-opacity-90 backdrop-blur-sm border-t border-gray-200 z-50">
            <div class="flex justify-around items-center py-3">
                <button class="p-3 rounded-full hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <button class="p-3 rounded-full hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </button>
                <button class="p-3 rounded-full hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                    </svg>
                </button>
                <button class="p-3 rounded-full hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Sample Plan Cards Section (Optional) -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-12">Choose Your Plan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Plan Card 1 -->
                    <div class="bg-white border border-gray-200 hover:border-emerald-400 rounded-xl p-6 shadow-sm transition-all duration-300 hover:shadow-md">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold">Starter</h3>
                            <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6">Perfect for individuals looking to try our service.</p>
                        <div class="text-3xl font-bold mb-6">$9.99<span class="text-sm font-normal text-gray-500">/meal</span></div>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                3 meals per week
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Single serving
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Free delivery
                            </li>
                        </ul>
                        <a href="#" class="block w-full bg-emerald-400 text-white text-center py-3 rounded-lg font-medium hover:bg-emerald-700 transition-colors">
                            Select Plan
                        </a>
                    </div>

                    <!-- Plan Card 2 -->
                    <div class="bg-white border border-gray-200 hover:border-emerald-400 rounded-xl p-6 shadow-sm transition-all duration-300 hover:shadow-md">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold">Family</h3>
                            <div class="w-10 h-10 bg-orange-400 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6">Ideal for families looking for convenient meal options.</p>
                        <div class="text-3xl font-bold mb-6">$8.49<span class="text-sm font-normal text-gray-500">/meal</span></div>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                5 meals per week
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                4 servings each
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Free delivery
                            </li>
                        </ul>
                        <a href="#" class="block w-full bg-emerald-400 text-white text-center py-3 rounded-lg font-medium hover:bg-emerald-700 transition-colors">
                            Select Plan
                        </a>
                    </div>

                    <!-- Plan Card 3 -->
                    <div class="bg-white border border-gray-200 hover:border-emerald-400 rounded-xl p-6 shadow-sm transition-all duration-300 hover:shadow-md">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold">Premium</h3>
                            <div class="w-10 h-10 bg-emerald-400 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6">Our most flexible plan with premium recipe options.</p>
                        <div class="text-3xl font-bold mb-6">$11.99<span class="text-sm font-normal text-gray-500">/meal</span></div>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Any number of meals
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Premium recipes
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Priority delivery
                            </li>
                        </ul>
                        <a href="#" class="block w-full bg-emerald-400 text-white text-center py-3 rounded-lg font-medium hover:bg-emerald-700 transition-colors">
                            Select Plan
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>