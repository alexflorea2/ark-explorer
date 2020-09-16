<?php


namespace Ark\Infrastructure\Services;


use Illuminate\Support\Facades\Http;

class ApiGateway implements ApiGatewayInterface
{
    private $client;
    protected const API_URL = "";

    public function __construct(Http $client)
    {
        $this->client = $client;
    }

    public function call(string $path, array $params = []) : array
    {
        $response = $this->client::withOptions(['verify' => false])
                                    ->withHeaders(['Content-Type'=>'application/json'])
                                    ->get(static::API_URL . $path, $params);

        $response->throw();

        return $this->decode($response->body());
    }

    private function decode(string $jsonString) : array
    {
        return json_decode($jsonString, $assoc = true, $depth = 512, JSON_THROW_ON_ERROR);
    }

    public function getTransactions(int $page = 1, int $limit = 10) : array
    {
        return $this->call('transactions',['page'=>$page,'limit'=>$limit]);
    }

    public function getTransaction(string $id) : array
    {
        return $this->call("transactions/{$id}");
    }

    public function getBlocks(int $page = 1, int $limit = 10) : array
    {
        return $this->call('blocks',['page'=>$page,'limit'=>$limit]);
    }

    public function getBlock(string $id) : array
    {
        return $this->call("blocks/{$id}");
    }

    public function getWallets(int $page = 1, int $limit = 10) : array
    {
        return $this->call('wallets',['page'=>$page,'limit'=>$limit]);
    }

    public function getWallet(string $id) : array
    {
        return $this->call("wallets/{$id}");
    }
}
