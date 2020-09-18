<?php


namespace Ark\Domain\Blocks;


class BlocksResource
{
    private BlocksCollection $items;
    private int $total;

    public function __construct(BlocksCollection $items, int $total)
    {
        $this->items = $items;
        $this->total = $total;
    }

    public function getItems() : BlocksCollection
    {
        return $this->items;
    }

    public function getTotal() : int
    {
        return $this->total;
    }

    public function getNoOfItems() : int
    {
        return $this->items->count();
    }
}
