@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">Contact Us</h2>

    <div class="grid md:grid-cols-2 gap-8">
        <!-- Contact Info -->
        <div class="space-y-6">
            <p class="text-lg text-gray-700">
                Got questions? Feedback? We'd love to hear from you.
                Our team is here to help you get the most out of your QuickBite experience.
            </p>

            <div class="text-gray-700 space-y-2 text-sm">
                <p><strong>Email:</strong> support@quickbite.ph</p>
                <p><strong>Phone:</strong> +63 912 345 6789</p>
                <p><strong>Address:</strong> Brgy. Nutrition Ave, Healthy City, PH 4000</p>
            </div>
        </div>

        <!-- Contact Form (Static for now) -->
        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="#">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea id="message" name="message" rows="4" required
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                </div>

                <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-500 transition">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
