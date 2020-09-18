<?php

namespace Tests\Unit;

use Ark\App\Factories\BlocksFactory;
use Ark\App\Services\BlocksService;
use Ark\Domain\Blocks\BlockModel;
use Ark\Infrastructure\Services\ApiGateway;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BlocksServiceTest extends TestCase
{
    public function testComputesBlockHeight()
    {
        Http::fake([
                       'explorer.ark.io/api/*' => Http::response('{"data":{"block":{"height":1000}}}', 200),
                   ]);

        $service = app(BlocksService::class);
        $confirmations = $service->computeConfirmations(100);

        $this->assertEquals(900, $confirmations);
    }
}
