<?php


namespace Ark\App\Services;


interface ApiGatewayInterface
{
    public function call(string $path, array $params = []) : array;

    public function getTransactions(int $page = 1, int $limit = 10) : array;

    public function getTransaction(string $id) : array;

    public function getBlocks(int $page = 1, int $limit = 10) : array;

    public function getBlock(string $id) : array;

    public function getWallets(int $page = 1, int $limit = 10) : array;

    public function getWallet(string $id) : array;

}
