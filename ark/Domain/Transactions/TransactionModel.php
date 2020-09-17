<?php


namespace Ark\Domain\Transactions;


use Ark\Domain\Wallets\WalletModel;

class TransactionModel
{
    private string $id;
    private ?WalletModel $sender = null;
    private ?WalletModel $recipient = null;
    private $amount;
    private $type;
    private $typeGroup;
    private $fee;
    private $timestamp;
    private array $asset;

    public const TYPE_GROUP_CORE = 1;
    public const TYPE_GROUP_MAGISTRATE = 2;

    public const CORE_TYPE_TRANSFER = 0;
    public const CORE_TYPE_SECOND_SIGNATURE = 1;
    public const CORE_TYPE_DELEGATE_REGISTRATION = 2;
    public const CORE_TYPE_VOTE = 3;
    public const CORE_TYPE_MULTI_SIGNATURE = 4;
    public const CORE_TYPE_IPFS = 5;
    public const CORE_TYPE_MULTI_PAYMENT = 6;
    public const CORE_TYPE_DELEGATE_RESIGNATION = 7;
    public const CORE_TYPE_TIMELOCK = 8;
    public const CORE_TYPE_TIMELOCK_CLAIM = 9;
    public const CORE_TYPE_TIMELOCK_REFUND = 10;

    public const MAGISTRATE_TYPE_BUSINESS_REGISTRATION = 0;
    public const MAGISTRATE_TYPE_BUSINESS_RESIGNATION = 1;
    public const MAGISTRATE_TYPE_BUSINESS_UPDATE = 2;
    public const MAGISTRATE_TYPE_BRIDGECHAIN_REGISTRATION = 3;
    public const MAGISTRATE_TYPE_BRIDGECHAIN_RESIGNATION = 4;
    public const MAGISTRATE_TYPE_BRIDGECHAIN_UPDATE = 5;

    public function getId() : string
    {
        return $this->id;
    }

    public function setId($id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($value) : self
    {
        $this->type = $value;
        return $this;
    }

    public function getTypeGroup()
    {
        return $this->typeGroup;
    }

    public function setTypeGroup($value) : self
    {
        $this->typeGroup = $value;
        return $this;
    }

    public function getAssets()
    {
        return $this->asset;
    }

    public function setAsset(array $value) : self
    {
        $this->asset = $value;
        return $this;
    }

    public function getFee()
    {
        return $this->fee;
    }

    public function setFee($value) : self
    {
        $this->fee = $value;
        return $this;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function setTimestamp($value) : self
    {
        $this->timestamp = $value;
        return $this;
    }

    public function getAmount()
    {
        if( $this->isMultiPayment() )
        {
            return $this->calculateMultiPaymentAmount();
        }
        return $this->amount;
    }

    public function setAmount(string $value) : self
    {
        $this->amount = $value;
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

    public function isMultiPayment()
    {
        return $this->typeGroup === self::TYPE_GROUP_CORE && $this->type === self::CORE_TYPE_MULTI_PAYMENT;
    }

    private function calculateMultiPaymentAmount()
    {
        if( empty($this->asset) || ( isset( $this->asset['payments'] ) && empty($this->asset['payments']) )  )
        {
            return 0;
        }
        return array_reduce($this->asset['payments'], function($carry, $item)
        {
            return $carry + (float) $item['amount'];
        });
    }
}
