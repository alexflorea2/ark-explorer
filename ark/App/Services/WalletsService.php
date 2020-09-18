<?php


namespace Ark\App\Services;


use Ark\Domain\Transactions\TransactionsResource;
use Ark\Domain\Wallets\WalletModel;
use Ark\Infrastructure\Services\ApiGatewayInterface;
use Ark\App\Factories\TransactionsFactory;
use Psr\Log\LoggerInterface;

class WalletsService
{
    private ApiGatewayInterface $api;
    private TransactionsFactory $transactionsFactory;
    private LoggerInterface $logger;

    public function __construct(ApiGatewayInterface $api, TransactionsFactory $transactionsFactory, LoggerInterface $logger)
    {
        $this->api = $api;
        $this->transactionsFactory = $transactionsFactory;
        $this->logger = $logger;
    }

    public function makeWallet(array $data) : WalletModel
    {
        return (new WalletModel())
            ->setId($data['address'])
            ->setBalance($data['balance'])
            ->setDelegate($data['attributes']['delegate'] ?? null)
            ->setIsDelegate($data['isDelegate'])
            ->setIsResigned($data['isResigned']);
    }

    public function getWallet(string $id) : WalletModel
    {
        $apiData = $this->api->getWallet($id);

        return $this->makeWallet($apiData['data']);
    }

    public function getTransactions($id, int $page = 1, int $limit = 10) : TransactionsResource
    {
        $totalItems = 0;
        $items = [];
        try {
            $apiData = $this->api->getWalletTransactions($id, $page, $limit);
            $totalItems = $apiData['meta']['totalCount'];
            $items = $apiData['data'];
        }
        catch (\Exception $e)
        {
            // Api did not respond
            $info = json_encode($e->getTrace()[1]);
            $this->logger->error("{$info}");
            $this->logger->error($e->getMessage());
        }

        return $this->transactionsFactory->makeTransactionsResource($totalItems, $items);
    }
}
