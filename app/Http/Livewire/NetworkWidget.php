<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NetworkWidget extends Component
{
    public bool $main;

    public function render()
    {
        $currentNetwork = session('ARK_NET') ?? env('ARK_NET', 'main');

        $this->main = $currentNetwork === 'main';

        return view('livewire.network-widget')->with('network', $currentNetwork)->with('main',$this->main);
    }
}
