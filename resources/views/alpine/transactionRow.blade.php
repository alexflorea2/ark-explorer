@php
$componentData = new \stdClass();
$componentData->id = $transaction->getId();
$componentData->senderId = $transaction->getSender()->getId();
$componentData->recipientId = $transaction->getRecipient()->getId();
$componentData->amount = $transaction->getAmount();
$componentData->fee = $transaction->getFee();
@endphp

<tr wire:key="tr_row_{{$transaction->getId()}}"  x-data="{{json_encode($componentData)}}">
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
        <a href="{{ route('transactions.detail',['id'=>$transaction->getId()]) }}">
            <span class="hint--bottom" x-bind:aria-label="id" x-text="ArkApp.helpers.truncate(id)"></span>
        </a>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
        {{ \Carbon\Carbon::parse( $transaction->getTimestamp()['unix'] ) }}
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
        <span class="hint--bottom" x-bind:aria-label="senderId" x-text="ArkApp.helpers.truncate(senderId)"></span>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
        <span class="hint--bottom" x-bind:aria-label="recipientId" x-text="ArkApp.helpers.truncate(recipientId)"></span>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
        <span x-text="ArkApp.helpers.readableCurrency(amount)"></span>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
        <span x-text="ArkApp.helpers.readableCurrency(fee)"></span>
    </td>
</tr>
