@php
    /**
    * @var $transaction \Ark\Domain\Transactions\TransactionModel
    */
   $componentData = new \stdClass();
   $componentData->id = $transaction->getId();
   $componentData->senderId = $transaction->getSender()->getId();
   $componentData->recipientId = $transaction->getRecipient()->getId();
   $componentData->amount = $transaction->getAmount();
   $componentData->fee = $transaction->getFee();
@endphp

<tr wire:key="tr_row_{{$transaction->getId()}}"  x-data="{{json_encode($componentData)}}">
    <td class="table-item-row">
        <a class="text-blue-500 hover:text-blue-900 font-semibold" href="{{ route('transactions.detail',['id'=>$transaction->getId()]) }}">
            <span class="hint--bottom" x-bind:aria-label="id" x-text="ArkApp.helpers.truncate(id)"></span>
        </a>
    </td>
    <td class="table-item-row">
        {{ \Carbon\Carbon::parse( $transaction->getTimestamp()['unix'] ) }}
    </td>
    <td class="table-item-row">
        <a class="text-blue-500 hover:text-blue-900 font-semibold" href="{{ route('wallet.detail',['id'=>$componentData->senderId]) }}">
            <span class="hint--bottom" x-bind:aria-label="senderId" x-text="ArkApp.helpers.truncate(senderId)"></span>
        </a>
    </td>
    <td class="table-item-row">
        @if( $transaction->isMultiPayment() )
            <span>Multipayment ({{$transaction->noOfPaymentsMade()}})</span>
        @else
            <a class="text-blue-500 hover:text-blue-900 font-semibold" href="{{ route('wallet.detail',['id'=>$componentData->recipientId]) }}">
                <span class="hint--bottom" x-bind:aria-label="recipientId" x-text="ArkApp.helpers.truncate(recipientId)"></span>
            </a>
        @endif
    </td>
    <td class="table-item-row">
        <span :class="{ 'text-green-500': fee == 10000000, 'text-red-500': fee != 10000000 }" x-text="ArkApp.helpers.readableCurrency(amount)"></span>
    </td>
    <td class="table-item-row">
        <span x-text="ArkApp.helpers.readableCurrency(fee)"></span>
    </td>
</tr>
