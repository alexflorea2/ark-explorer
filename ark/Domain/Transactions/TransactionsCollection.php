<?php


namespace Ark\Domain\Transactions;


class TransactionsCollection  extends \IteratorIterator
{
    public function __construct(TransactionModel ...$items)
    {
        parent::__construct(new \ArrayIterator($items));
    }
    public function current() : TransactionModel
    {
        return parent::current();
    }

    public function add(TransactionModel $transaction)
    {
        $this->getInnerIterator()->append($transaction);
    }
    public function set(int $key, TransactionModel $transaction)
    {
        $this->getInnerIterator()->offsetSet($key, $transaction);
    }
}
