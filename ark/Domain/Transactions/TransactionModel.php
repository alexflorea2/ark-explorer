<?php


namespace Ark\Domain\Transactions;


use Ark\Domain\Wallets\WalletModel;

class TransactionModel
{
    private string $id;
    private ?WalletModel $sender = null;
    private ?WalletModel $recipient = null;

    public function getId() : string
    {
        return $this->id;
    }

    public function setId($id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function getSender(): ?WalletModel
    {
        return $this->sender;
    }

    public function getRecipient(): ?WalletModel
    {
        return $this->recipient;
    }

    public function setSender(WalletModel $wallet) : self
    {
        $this->sender = $wallet;
        return $this;
    }

    public function setRecipient(WalletModel $wallet) : self
    {
        $this->recipient = $wallet;
        return $this;
    }
}
