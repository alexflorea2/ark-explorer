<?php


namespace Ark\App\Services;


use Ark\App\Factories\BlocksFactory;
use Ark\Domain\Blocks\{BlockModel, BlocksResource};
use Ark\Infrastructure\Services\ApiGatewayInterface;
use Psr\Log\LoggerInterface;

class BlocksService
{
    private ApiGatewayInterface $api;
    private BlocksFactory $blocksFactory;
    private LoggerInterface $logger;

    public function __construct(ApiGatewayInterface $api, BlocksFactory $blocksFactory, LoggerInterface $logger)
    {
        $this->api = $api;
        $this->blocksFactory = $blocksFactory;
        $this->logger = $logger;
    }

    public function computeConfirmations($blockHeight)
    {
        $blockchain =  $this->api->getBlockchain();

        return (float) $blockchain['data']['block']['height'] - $blockHeight;
    }

    public function getBlocks(int $page = 1, int $limit = 10) : BlocksResource
    {
        $totalItems = 0;
        $items = [];

        try {
            $apiData = $this->api->getBlocks($page, $limit);
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

        return $this->blocksFactory->makeBlocksResource($totalItems, $items);
    }

    public function getBlock(string $id) : BlockModel
    {
        $apiData = $this->api->getBlock($id);

        return $this->blocksFactory->makeBlock($apiData['data']);
    }
}
