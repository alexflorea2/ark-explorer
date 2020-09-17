<?php

namespace App\Http\Livewire;

use Ark\App\Services\TransactionsService;
use Livewire\Component;


class Transaction extends Component
{
    public string $transactionId;

    public function render(TransactionsService $service)
    {
        $transaction = $service->getTransaction($this->transactionId);

        return view('livewire.transaction')->with('transaction', $transaction);
    }
}
