<?php

namespace Tests\Unit;

use Ark\App\Services\ApiGateway;
use Ark\App\Services\ApiMainNetGateway;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class ApiMainNetGatewayTest extends TestCase
{
    public function testApiUrlIsCorrect()
    {
        $data = ['key1'=>'value1','key2'=>2];
        $json_stub = json_encode($data);

        Http::fake([
                       'explorer.ark.io/api/*' => Http::response($json_stub, 200),
                   ]);

        $service = app(ApiMainNetGateway::class);
        $service->call('test');

        Http::assertSent(function ($request) {
            return $request->url() == "https://explorer.ark.io/api/test";
        });
    }
}
