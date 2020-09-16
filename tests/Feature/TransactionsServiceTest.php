<?php

namespace Tests\Feature;

use Ark\App\Services\TransactionsService;
use Ark\Domain\Transactions\TransactionsResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionsServiceTest extends TestCase
{
    public function testWeGetATransactionsCollection()
    {
       $service = app(TransactionsService::class);

       $result = $service->getTransactions();

       $this->assertEquals(get_class($result), TransactionsResource::class );
    }
}
