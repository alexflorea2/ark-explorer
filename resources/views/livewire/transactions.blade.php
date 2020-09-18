@php
    /**
    * @var $paginator Illuminate\Pagination\LengthAwarePaginator;
    * @var $items \Ark\Domain\Transactions\TransactionModel[];
    */
    $items = $paginator->items();
@endphp

@if( $paginator->count() === 0 )
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold">No data available</p>
    </div>
@else
    <div class="bg-gray-100">
        <div class="loadingOverlay" wire:loading>
            <div class="spinner"></div>
        </div>

        <table class="min-w-full table-auto">
            <thead>
            <tr>
                <th class="table-header-row">Id</th>
                <th class="table-header-row">Timestamp</th>
                <th class="table-header-row">Sender</th>
                <th class="table-header-row">Recipient</th>
                <th class="table-header-row">Amount</th>
                <th class="table-header-row">Fee</th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach($items as $i)
                @include('alpine.transactionRow',['transaction' => $i])
            @endforeach
            </tbody>
        </table>

        <div class="livewire-pagination mt-3">
            {{$paginator->links()}}
        </div>
    </div>
@endif
