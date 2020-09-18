<?php

namespace Tests\Unit;

use Ark\App\Factories\TransactionsFactory;
use Ark\App\Services\TransactionsService;
use Ark\Domain\Transactions\TransactionModel;
use Tests\TestCase;

class TransactionsFactoryTest extends TestCase
{
    public function testParsesDataToValidTransactionModel()
    {
        $transaction_data = '{"id":"f9187b5cd2e1df61bdc75b4474a8e9e4901701716d01c1ada03bbf2b0a4da539","blockId":"258be78e5359f750c19c99e4791d2430bd8317b5dc187692cb6e10998a2a5c07","version":2,"type":6,"typeGroup":1,"amount":"0","fee":"10000000","sender":"AWBW9QD53oArEEEb965KiRxTXDPKv2iWn8","senderPublicKey":"020cafa960cd435d271f4207f1a89900de32ba678a0fbb05455f82cbaf22bce3a5","recipient":"AWBW9QD53oArEEEb965KiRxTXDPKv2iWn8","signature":"1e6626c4e164c222c3ca5a20db4c58595a98dc9e04dd277b30fc7d26bfeea35590d58026f460a9fbfeabe863d421a8cae385b802edae085dca6d2eba3ed998cf","signSignature":"5c13b49433a350eb851f0069f5505d5f21fb97f2b5235b44eaca6fe432ad88aac2887308dcf4464096f11991f35cb8c9d0ed1d4fec9037636e9a025bfff09c2e","vendorField":"Delegate DEV51 | Small Wallets Friendly | 95% Share","asset":{"payments":[{"amount":"2151314014","recipientId":"AbAwcdoGEyn7krPtuFkwsQArpB9R42Q4xQ"},{"amount":"5174089833","recipientId":"APbGaqj2uvMPJubKPP77QkcU6iA3NUoiJk"},{"amount":"3663237233","recipientId":"ALjTwZTLdYUdbevWHSp42xM45RxPMkhgKb"}]},"confirmations":294,"timestamp":{"epoch":110153352,"unix":1600254552,"human":"2020-09-16T11:09:12.000Z"},"nonce":"40"}';

        $service =  app(TransactionsFactory::class);

        $result = $service->makeTransaction( json_decode($transaction_data,true) );

        $this->assertEquals(TransactionModel::class, get_class($result));
        $this->assertEquals("f9187b5cd2e1df61bdc75b4474a8e9e4901701716d01c1ada03bbf2b0a4da539", $result->getId());
    }
}
