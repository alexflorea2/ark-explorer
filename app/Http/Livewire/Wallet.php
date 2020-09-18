<?php

namespace App\Http\Livewire;

use Ark\App\Services\WalletsService;
use Livewire\Component;


class Wallet extends Component
{
    public string $walletId;

    public function render(WalletsService $service)
    {
        $wallet = $service->getWallet($this->walletId);

        return view('livewire.wallet')->with('wallet', $wallet);
    }
}
