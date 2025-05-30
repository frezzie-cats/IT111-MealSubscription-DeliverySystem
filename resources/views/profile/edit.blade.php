<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @includeIf('profile.partials.update-profile-information-form', ['user' => Auth::user()])
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @includeIf('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @includeIf('profile.partials.delete-user-form')
                </div>
            </div>

            @if(isset($card))
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-6">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-semibold mb-2">Card Information</h3>
                        <p>
                            <strong>Brand:</strong> {{ ucfirst($card->card->brand) }}<br>
                            <strong>Last 4:</strong> **** **** **** {{ $card->card->last4 }}<br>
                            <strong>Expires:</strong> {{ $card->card->exp_month }}/{{ $card->card->exp_year }}
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
