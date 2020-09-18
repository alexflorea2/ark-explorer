<?php

namespace App\Http\Livewire;

use Ark\App\Services\BlocksService;
use Livewire\Component;


class Block extends Component
{
    public string $blockId;

    public function render(BlocksService $service)
    {
        $block = $service->getBlock($this->blockId);

        return view('livewire.block')->with('block', $block);
    }
}
