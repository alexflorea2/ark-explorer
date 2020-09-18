<?php

namespace App\Http\Livewire;

use Ark\App\Services\TransactionsService;
use Ark\App\Services\WalletsService;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;


class Transactions extends Component
{
    use WithPagination;

    public ?string $entity = null;
    public $entityId = null;
    private $perPage = 10;

    public function render(TransactionsService $service, WalletsService $walletsService)
    {
        switch ( $this->entity )
        {
            case 'wallet':
                $data = $walletsService->getTransactions($this->entityId, $this->page, $this->perPage);
                $path = "/wallets/{$this->entityId}/transactions";
                break;
            default :
                $path = "/transactions";
                $data = $service->getTransactions($this->page, 10);
                break;
        }

        $paginator =  new LengthAwarePaginator(
            $data->getItems(), $data->getTotal(), $this->perPage,  $this->page, ["path" => $path]
        );

        return view('livewire.transactions')->with('paginator',$paginator);
    }
}
