<?php

namespace App\Http\Livewire;

use Ark\App\Services\BlocksService;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;


class Blocks extends Component
{
    use WithPagination;

    private int $perPage = 10;

    public function render(BlocksService $service)
    {
        $data = $service->getBlocks($this->page, $this->perPage);

        $paginator =  new LengthAwarePaginator(
            $data->getItems(), $data->gettotal(), $this->perPage,  $this->page, ["path" => "blocks"]
        );

        return view('livewire.blocks')->with('paginator',$paginator);
    }
}
