<?php


namespace Ark\Domain\Blocks;


class BlocksCollection  extends \IteratorIterator
{
    public function __construct(BlockModel ...$items)
    {
        parent::__construct(new \ArrayIterator($items));
    }
    public function current() : BlockModel
    {
        return parent::current();
    }

    public function add(BlockModel $transaction)
    {
        $this->getInnerIterator()->append($transaction);
    }

    public function set(int $key, BlockModel $transaction)
    {
        $this->getInnerIterator()->offsetSet($key, $transaction);
    }

    public function count()
    {
        return iterator_count( $this->getInnerIterator() );
    }
}
