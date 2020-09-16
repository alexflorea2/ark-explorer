<?php

namespace Tests\Unit;

use Ark\Domain\Transactions\TransactionsCollection;
use Ark\Domain\Transactions\TransactionsResource;
use PHPUnit\Framework\TestCase;

class TransactionResourceTest extends TestCase
{
    public function testBasicFunctionality()
    {
        $collection = new TransactionsCollection();
        $resource =  new TransactionsResource($collection, 100, 10);

        $this->assertEquals(10, $resource->getPerPage());
        $this->assertEquals(100, $resource->getTotal());
    }
}
