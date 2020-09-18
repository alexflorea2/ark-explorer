<?php
/**
 * @var $transaction \Ark\Domain\Transactions\TransactionModel
 */

?>

<div
    x-data="setup()"
>
    <div class="flex justify-between px-2 py-2 text-lg border-b-2 border-gray-200">
        <p class="flex">
            Sender
        </p>
        <p class="text-gray-500">
            <a class="text-blue-500 hover:text-blue-900 font-semibold"
               href="{{ route('wallet.detail',['id'=>$transaction->getSender()->getId()]) }}">
                {{ $transaction->getSender()->getId() }}
            </a>
        </p>
    </div>
    <div class="flex justify-between px-2 py-2 text-lg border-b-2 border-gray-200">
        <p class="flex">
            Recipient
        </p>
        <p class="text-gray-500">
            <a class="text-blue-500 hover:text-blue-900 font-semibold"
               href="{{ route('wallet.detail',['id'=>$transaction->getRecipient()->getId()]) }}">
                {{ $transaction->getRecipient()->getId() }}
            </a>
        </p>
    </div>
    <div class="flex justify-between px-2 py-2 text-lg border-b-2 border-gray-200">
        <p class="flex">
            Transaction type
        </p>
        <p class="text-gray-500">
            {{ $transaction->getReadableType() }}
        </p>
    </div>
    <div class="flex justify-between px-2 py-2 text-lg border-b-2 border-gray-200">
        <p class="flex">
            Confirmations
        </p>
        <p class="text-gray-500">
            {{ $transaction->getConfirmations() }}
        </p>
    </div>
    <div class="flex justify-between px-2 py-2 text-lg border-b-2 border-gray-200">
        <p class="flex">Amount</p>
        <p class="text-gray-500">
            <span x-text="ArkApp.helpers.readableCurrency(amount)"></span>
        </p>
    </div>
    <div class="flex justify-between px-2 py-2 text-lg border-b-2 border-gray-200">
        <p class="flex">Fee</p>
        <p class="text-gray-500">
            <span x-text="ArkApp.helpers.readableCurrency(fee)"></span>
        </p>
    </div>
    <div class="flex justify-between px-2 py-2 text-lg border-b-2 border-gray-200">
        <p class="flex">
            Timestamp
        </p>
        <p class="text-gray-500">
            {{ \Carbon\Carbon::parse($transaction->getTimestamp()['unix']) }}
        </p>
    </div>
    <div class="flex justify-between px-2 py-2 text-lg border-b-2 border-gray-200">
        <p class="flex">
            Nonce
        </p>
        <p class="text-gray-500">
            {{ $transaction->getNonce() }}
        </p>
    </div>
    <div class="flex justify-between px-2 py-2 text-lg border-b-2 border-gray-200">
        <p class="flex">
            Block ID
        </p>
        <p class="text-gray-500">
            <a class="text-blue-500 hover:text-blue-900 font-semibold"
               href="{{ route('blocks.detail',['id'=>$transaction->getBlock()->getId()]) }}">
                {{ $transaction->getBlock()->getId() }}
            </a>
        </p>
    </div>
</div>

<script>
    function setup() {
        return {
            id: '{{ $transaction->getId() }}',
            amount: '{{ $transaction->getAmount() }}',
            fee: '{{ $transaction->getFee() }}'
        }
    }
</script>
