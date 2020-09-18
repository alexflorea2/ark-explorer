<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl px-6 mx-auto">
            <div class="bg-blue-900 text-white px-6 overflow-hidden sm:rounded-lg">
            <livewire:wallet :walletId="$id"/>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white sm:rounded-lg">
                <h2 class="text-blue-900 mb-4 px-6 font-semibold text-xl leading-tight">Transactions</h2>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white sm:rounded-lg">
                <livewire:transactions entity="wallet" :entityId="$id"/>
            </div>
        </div>
    </div>


</x-guest-layout>
