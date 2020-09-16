<?php

namespace Tests\Feature;

use Ark\App\Services\ApiGateway;
use Ark\App\Services\ApiMainNetGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiGatewayTest extends TestCase
{
    protected $apiService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->apiService =  app(ApiMainNetGateway::class);
    }

    public function testTransactionsDefaultParamsAndResponseMatch()
    {
        $transactionsResponse = $this->apiService->getTransactions();

        $this->assertArrayHasKey('meta', $transactionsResponse);
        $this->assertArrayHasKey('data', $transactionsResponse);
        $this->assertArrayHasKey('count', $transactionsResponse['meta']);
        $this->assertEquals(10, $transactionsResponse['meta']['count']);
    }

    public function testSingleTransactionResponse()
    {
        $transactionId = 'baa643ed52d8de0e9f60e2e795f938f6b8d824aeaef1aa7c3a7560d512f63222';

        $transactionResponse = $this->apiService->getTransaction($transactionId);

        $this->assertArrayHasKey('data', $transactionResponse);
        $this->assertArrayHasKey('id', $transactionResponse['data']);
        $this->assertEquals($transactionId, $transactionResponse['data']['id']);
    }

    public function testBlocksDefaultParamsAndResponseMatch()
    {
        $transactionsResponse = $this->apiService->getBlocks();

        $this->assertArrayHasKey('meta', $transactionsResponse);
        $this->assertArrayHasKey('data', $transactionsResponse);
        $this->assertArrayHasKey('count', $transactionsResponse['meta']);
        $this->assertEquals(10, $transactionsResponse['meta']['count']);
    }

    public function testSingleBlockResponse()
    {
        $blockId = '775eed895470e990464c2b3dbebe088324550af1ea9a0efe22b35836cc39fd27';

        $transactionResponse = $this->apiService->getBlock($blockId);

        $this->assertArrayHasKey('data', $transactionResponse);
        $this->assertArrayHasKey('id', $transactionResponse['data']);
        $this->assertEquals($blockId, $transactionResponse['data']['id']);
    }

    public function testWalletsDefaultParamsAndResponseMatch()
    {
        $transactionsResponse = $this->apiService->getWallets();

        $this->assertArrayHasKey('meta', $transactionsResponse);
        $this->assertArrayHasKey('data', $transactionsResponse);
        $this->assertArrayHasKey('count', $transactionsResponse['meta']);
        $this->assertEquals(10, $transactionsResponse['meta']['count']);
    }

    public function testSingleWalletResponse()
    {
        $walletId = 'AbnKvQu2DpDvxJBkkT8uBt5ZhgYuSdn6kg';

        $transactionResponse = $this->apiService->getWallet($walletId);

        $this->assertArrayHasKey('data', $transactionResponse);
        $this->assertArrayHasKey('address', $transactionResponse['data']);
        $this->assertEquals($walletId, $transactionResponse['data']['address']);
    }
}
