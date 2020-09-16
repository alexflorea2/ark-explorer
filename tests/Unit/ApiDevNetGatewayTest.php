<?php

namespace Tests\Unit;

use Ark\Infrastructure\Services\ApiDevNetGateway;
use Ark\Infrastructure\Services\ApiGateway;
use Ark\Infrastructure\Services\ApiMainNetGateway;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class ApiDevNetGatewayTest extends TestCase
{
    public function testApiUrlIsCorrect()
    {
        $data = ['key1'=>'value1','key2'=>2];
        $json_stub = json_encode($data);

        Http::fake([
                       'dexplorer.ark.io/api/*' => Http::response($json_stub, 200),
                   ]);

        $service = app(ApiDevNetGateway::class);
        $service->call('test');

        Http::assertSent(function ($request) {
            Log::error($request->url());
            return $request->url() == "https://dexplorer.ark.io/api/test";
        });
    }
}
