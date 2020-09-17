<?php

namespace Tests\Unit;

use Ark\Domain\Transactions\TransactionModel;
use PHPUnit\Framework\TestCase;

class TransactionModelTest extends TestCase
{
    public function testGetAmountIfNotMultiPayment()
    {
        $transaction = (new TransactionModel())
            ->setId('id')
            ->setAmount(100)
            ->setType(TransactionModel::CORE_TYPE_VOTE)
            ->setTypeGroup(TransactionModel::TYPE_GROUP_CORE);

        $this->assertEquals(100, $transaction->getAmount());
    }

    public function testGetAmountIfMultiPayment()
    {
        $transaction = (new TransactionModel())
            ->setId('id')
            ->setAmount(100)
            ->setType(TransactionModel::CORE_TYPE_MULTI_PAYMENT)
            ->setTypeGroup(TransactionModel::TYPE_GROUP_CORE)
            ->setAsset(['payments' => [['amount'=>10],['amount'=>20],['amount'=>30]]]);

        $this->assertEquals(60, $transaction->getAmount());
    }
}
