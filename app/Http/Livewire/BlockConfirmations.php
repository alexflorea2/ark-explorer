<?php

namespace App\Http\Livewire;

use Ark\App\Services\BlocksService;
use Livewire\Component;

class BlockConfirmations extends Component
{
    public float $blockHeight;
    public float $blockConfirmations;

    public function render(BlocksService $service)
    {
        $confirmations = $this->blockConfirmations;

        try {
            $confirmations = $service->computeConfirmations($this->blockHeight);
        }
        catch (\Exception $e)
        {
            //
        }

        return view('livewire.block-confirmations')->with('confirmations',$confirmations);
    }
}
