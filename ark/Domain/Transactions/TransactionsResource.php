<?php


namespace Ark\Domain\Transactions;


class TransactionsResource
{
    private TransactionsCollection $items;
    private int $total;
    private int $perPage;

    public function __construct(TransactionsCollection $items, int $total, int $perPage)
    {
        $this->items = $items;
        $this->total = $total;
        $this->perPage = $perPage;
    }

    public function getItems() : TransactionsCollection
    {
        return $this->items;
    }

    public function getTotal() : int
    {
        return $this->total;
    }

    public function getPerPage() : int
    {
        return $this->perPage;
    }
}
