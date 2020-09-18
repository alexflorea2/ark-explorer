<?php


namespace Ark\Domain\Transactions;


class TransactionsResource
{
    private TransactionsCollection $items;
    private int $total;

    public function __construct(TransactionsCollection $items, int $total)
    {
        $this->items = $items;
        $this->total = $total;
    }

    public function getItems() : TransactionsCollection
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
