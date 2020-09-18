<?php

namespace Tests\Unit;

use Ark\App\Factories\BlocksFactory;
use Ark\Domain\Blocks\BlockModel;
use Tests\TestCase;

class BlocksFactoryTest extends TestCase
{
    public function testParsesDataToValidBlockModel()
    {
        $block_data = '{"data":{"id":"3f2ced05c870e856658842e7ff0559e33fe485c2593eba7b06c1f7c424f3de8f","version":0,"height":13629058,"previous":"9536197d8d3b3d0c14f1af7ac20be0ed94a950e00f828970fb71644cecb88e49","forged":{"reward":"200000000","fee":"0","total":"200000000","amount":"0"},"payload":{"hash":"e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855","length":0},"generator":{"username":"arkane","address":"AZDc97RxUETWX3tPKEvWHWMNdrfN8CvEpR","publicKey":"03a28aeb6b15e792f1753caae663a52f15ab642ae7cdee6fcdbc5416ffc0f4f702"},"signature":"304402201a9a65c2e3afa624bdfb7fd691921cfe02f4c995a2a28597974251e2155909710220332d4ea8e0b8fcb6e186faa37ea56f90c1008e3ca0caebf8383240eb55a7f8db","confirmations":1,"transactions":0,"timestamp":{"epoch":110244240,"unix":1600345440,"human":"2020-09-17T12:24:00.000Z"}}}';

        $service =  app(BlocksFactory::class);

        $result = $service->makeBlock( json_decode($block_data,true)['data'] );

        $this->assertEquals(BlockModel::class, get_class($result));
        $this->assertEquals("3f2ced05c870e856658842e7ff0559e33fe485c2593eba7b06c1f7c424f3de8f", $result->getId());
    }
}
