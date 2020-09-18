@php
    /**
    * @var $block \Ark\Domain\Blocks\BlockModel
    */
   $componentData = new \stdClass();
   $componentData->id = $block->getId();
   $componentData->totalForged = $block->getTotalForged();
   $componentData->fees = $block->getFee();
   $componentData->userAddress = $block->getGenerator()->getAddress();
   $componentData->userName = $block->getGenerator()->getUsername();
@endphp

<tr wire:key="bl_row_{{$componentData->id}}"  x-data="{{json_encode($componentData)}}">
    <td class="table-item-row">
        <a class="text-blue-500 hover:text-blue-900 font-semibold" href="{{ route('blocks.detail',['id'=>$componentData->id]) }}">
            <span class="hint--bottom" x-bind:aria-label="id" x-text="ArkApp.helpers.truncate(id)"></span>
        </a>
    </td>
    <td class="table-item-row">
        {{ $block->getHeight() }}
    </td>
    <td class="table-item-row">
        {{ \Carbon\Carbon::parse( $block->getTimestamp()['unix'] ) }}
    </td>
    <td class="table-item-row">
        {{ $block->getTransactions() }}
    </td>
    <td class="table-item-row">
        <a class="text-blue-500 hover:text-blue-900 font-semibold" href="{{ route('wallet.detail',['id'=>$componentData->userAddress]) }}">
            <span class="hint--bottom" x-bind:aria-label="userAddress" x-text="userName"></span>
        </a>
    </td>
    <td class="table-item-row">
        <span x-text="ArkApp.helpers.readableCurrency(totalForged)"></span>
    </td>
    <td class="table-item-row">
        <span x-text="ArkApp.helpers.readableCurrency(fees)"></span>
    </td>
</tr>
