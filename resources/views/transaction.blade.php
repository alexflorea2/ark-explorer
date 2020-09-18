<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl py-4  leading-tight">
            {{ __('Transaction') }}
        </h2>
        <p class="pb-4">{{$id}}</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
            <livewire:transaction :transactionId="$id"/>
            </div>
        </div>
    </div>
</x-guest-layout>
