<?php

namespace App\Http\Livewire;

use Ark\App\Services\TransactionsService;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;


class Transactions extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render(TransactionsService $service)
    {
        $data = $service->getTransactions($this->page, 10, $this->searchTerm);

        $paginator =  new LengthAwarePaginator(
            $data->getItems(), $data->gettotal(), $data->getPerPage(),  $this->page, ["path" => "transactions"]
        );

        return view('livewire.transactions')->with('paginator',$paginator);
    }
}
