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

    public function makeTransaction(array $data) : TransactionModel
    {
        $sender = (new WalletModel())->setId($data['sender']);

        $recipient = (new WalletModel())->setId($data['recipient']);

        return (new TransactionModel())
            ->setId($data['id'])
            ->setAmount($data['amount'])
            ->setFee($data['fee'])
            ->setTimestamp($data['timestamp'])
            ->setType($data['type'])
            ->setAsset($data['asset'] ?? [])
            ->setTypeGroup($data['typeGroup'])
            ->setSender($sender)
            ->setRecipient($recipient);
    }

    public function getTransactions(int $page = 1, int $limit = 10) : TransactionsResource
    {
        $apiData = $this->api->getTransactions($page, $limit);

        $totalItems = $apiData['meta']['totalCount'];
        $perPage =  $apiData['meta']['count'];

        $collection = new TransactionsCollection();

        foreach($apiData['data'] as $item)
        {
            $collection->add( $this->makeTransaction($item) );
        }

        return new TransactionsResource($collection, $totalItems, $perPage);
    }

    public function getTransaction(string $id) : TransactionModel
    {
        $apiData = $this->api->getTransaction($id);

        return $this->makeTransaction($apiData['data']);
    }
}
