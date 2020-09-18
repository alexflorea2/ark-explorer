<?php


namespace Ark\App\Services;


use Ark\App\Factories\TransactionsFactory;
use Ark\Domain\Transactions\{TransactionModel, TransactionsResource};
use Ark\Infrastructure\Services\ApiGatewayInterface;
use Psr\Log\LoggerInterface;

class TransactionsService
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

    public function getTransactions(int $page = 1, int $limit = 10) : TransactionsResource
    {
        $totalItems = 0;
        $items = [];
        try {
            $apiData = $this->api->getTransactions($page, $limit);
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

    public function getTransaction(string $id) : TransactionModel
    {
        $apiData = $this->api->getTransaction($id);

        return $this->transactionsFactory->makeTransaction($apiData['data']);
    }
}
