<?php
/**
 * @var $wallet \Ark\Domain\Wallets\WalletModel
 */
?>

<div
    x-data="setup()"
>
    <div class="my-4 py-6 rounded-lg shadow-md">
        <div class="mt-2">
            <p>Wallet</p>
            <h4 class="text-2xl text-white font-bold">
                {{ $wallet->getId() }}
            </h4>
        </div>
        <div class="flex space-x-4 items-center">
            @if( $wallet->isActive() )
            <span class="px-2 py-1 bg-green-400 text-white font-bold rounded">
                Active
            </span>
            @else
            <span class="px-2 py-1 bg-red-600 text-white font-bold rounded">
                Resigned
            </span>
            @endif
            <span>
                <span x-text="ArkApp.helpers.readableCurrency(balance)"></span>
            </span>
        </div>
    </div>
</div>

<script>
function setup()
{
    return {
        id: '{{ $wallet->getId() }}',
        balance: '{{ $wallet->getBalance() }}'
    }
}
</script>
