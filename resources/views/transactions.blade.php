<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl py-4 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white sm:rounded-lg">
            <livewire:transactions />
            </div>
        </div>
    </div>
</x-guest-layout>
