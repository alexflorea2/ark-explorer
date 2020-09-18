<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl py-4  leading-tight">
            {{ __('Uups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Something is not quite ok :(</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
