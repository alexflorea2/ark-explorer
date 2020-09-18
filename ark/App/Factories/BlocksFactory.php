<?php


namespace Ark\App\Factories;


use Ark\Domain\Blocks\BlockModel;
use Ark\Domain\Blocks\BlocksCollection;
use Ark\Domain\Blocks\BlocksResource;
use Ark\Domain\Users\UserModel;

class BlocksFactory
{
    public function makeBlock(array $data) : BlockModel
    {
        $generator = (new UserModel())->setUsername($data['generator']['username'])
            ->setAddress($data['generator']['address'])
            ->setPublicKey($data['generator']['publicKey']);

        return (new BlockModel())
            ->setId($data['id'])
            ->setForged($data['forged'])
            ->setHeight($data['height'])
            ->setPrevious($data['previous'])
            ->setTimestamp($data['timestamp'])
            ->setGenerator($generator)
            ->setConfirmations($data['confirmations'])
            ->setTransactions($data['transactions']);
    }

    public function makeBlocksResource(int $totalItems, array $items) : BlocksResource
    {
        $collection = new BlocksCollection();

        foreach($items as $item)
        {
            $collection->add( $this->makeBlock($item) );
        }

        return new BlocksResource($collection, $totalItems);
    }
}
