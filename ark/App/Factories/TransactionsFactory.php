<?php


namespace Ark\App\Factories;


use Ark\Domain\Blocks\BlockModel;
use Ark\Domain\Transactions\TransactionModel;
use Ark\Domain\Transactions\TransactionsCollection;
use Ark\Domain\Transactions\TransactionsResource;
use Ark\Domain\Wallets\WalletModel;

class TransactionsFactory
{
    public function makeTransaction(array $data) : TransactionModel
    {
        $sender = (new WalletModel())->setId($data['sender']);

        $recipient = (new WalletModel())->setId($data['recipient']);

        $block = (new BlockModel())->setId($data['blockId']);

        return (new TransactionModel())
            ->setId($data['id'])
            ->setAmount($data['amount'])
            ->setFee($data['fee'])
            ->setTimestamp($data['timestamp'])
            ->setType($data['type'])
            ->setAsset($data['asset'] ?? [])
            ->setTypeGroup($data['typeGroup'])
            ->setNonce($data['nonce'])
            ->setConfirmations($data['confirmations'])
            ->setSender($sender)
            ->setRecipient($recipient)
            ->setBlock($block);
    }

    public function makeTransactionsResource(int $totalItems, array $items) : TransactionsResource
    {
        $collection = new TransactionsCollection();

        foreach($items as $item)
        {
            $collection->add( $this->makeTransaction($item) );
        }

        return new TransactionsResource($collection, $totalItems);
    }
}
