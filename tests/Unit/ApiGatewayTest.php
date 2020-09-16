<?php

namespace Tests\Unit;

use Ark\Infrastructure\Services\ApiDevNetGateway;
use Ark\Infrastructure\Services\ApiGateway;
use Ark\Infrastructure\Services\ApiGatewayInterface;
use Ark\Infrastructure\Services\ApiMainNetGateway;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class ApiGatewayTest extends TestCase
{
    public function testCorrectGatewayIsInContainer()
    {
        $service = app(ApiGatewayInterface::class);

        $this->assertEquals(get_class($service), ApiMainNetGateway::class);

        if( env('ARK_NET','main') == 'main' )
        {
            $this->assertEquals(get_class($service), ApiMainNetGateway::class);
        }
        else
        {
            $this->assertEquals(get_class($service), ApiDevNetGateway::class);
        }
    }

    public function testExceptionIsThrownForNonJson()
    {
        $this->expectException(\Exception::class);

        Http::fake([
                       'explorer.ark.io/api/*' => Http::response('I am not a json', 200),
                   ]);

        $service = app(ApiGateway::class);
        $service->call('test');
    }

    public function testHasJsonHeadersAndDecodesJson()
    {
        $data = ['key1'=>'value1','key2'=>2];
        $json_stub = json_encode($data);

        Http::fake([
                       'explorer.ark.io/api/*' => Http::response($json_stub, 200),
                   ]);

        $service = app(ApiGateway::class);
        $result = $service->call('http://explorer.ark.io/api/');

        Http::assertSent(function ($request) {
            return $request->hasHeader('Content-Type','application/json');
        });

        $this->assertEquals($data, $result);
    }
}
