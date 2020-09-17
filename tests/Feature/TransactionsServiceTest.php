<?php

namespace Tests\Feature;

use Ark\App\Services\TransactionsService;
use Ark\Domain\Transactions\TransactionModel;
use Ark\Domain\Transactions\TransactionsResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionsServiceTest extends TestCase
{
    private $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service =  app(TransactionsService::class);
    }

    public function testWeGetATransactionsCollection()
    {
       $result = $this->service->getTransactions();

       $this->assertEquals(TransactionsResource::class, get_class($result));
    }

    public function testWeGetATransactionModel()
    {
        $result = $this->service->getTransaction("e83f69bfd2aa06ad7ae776ee50ea15138a3e8bfb8f308996c861ed3165cb3f12");

        $this->assertEquals(TransactionModel::class, get_class($result));
    }
}
