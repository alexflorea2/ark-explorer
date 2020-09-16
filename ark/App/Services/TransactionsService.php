<?php


namespace Ark\App\Services;


use Ark\Domain\Transactions\TransactionModel;
use Ark\Domain\Transactions\TransactionsCollection;
use Ark\Domain\Transactions\TransactionsResource;
use Ark\Domain\Wallets\WalletModel;
use Ark\Infrastructure\Services\ApiGatewayInterface;

class TransactionsService
{
    private ApiGatewayInterface $api;

    public function __construct(ApiGatewayInterface $api)
    {
        $this->api = $api;
    }

    public function getTransactions(int $page = 1, int $limit = 10)
    {
        $apiData = $this->api->getTransactions($page, $limit);

        $totalItems = $apiData['meta']['totalCount'];
        $perPage =  $apiData['meta']['count'];

        $collection = new TransactionsCollection();

        foreach($apiData['data'] as $item)
        {
            $sender = (new WalletModel())->setId($item['sender']);

            $recipient = (new WalletModel())->setId($item['recipient']);

            $collection->add(
                        (new TransactionModel())
                            ->setId($item['id'])
                            ->setSender($sender)
                            ->setRecipient($recipient)
            );
        }

        return new TransactionsResource($collection, $totalItems, $perPage);
    }
}
