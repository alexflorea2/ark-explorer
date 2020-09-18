<?php


namespace Ark\Domain\Wallets;


class WalletModel
{
    private $id;
    private $balance;
    private $isDelegate;
    private $isResigned;
    private $delegate = null;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return WalletModel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     * @return WalletModel
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsDelegate()
    {
        return $this->isDelegate;
    }

    /**
     * @param mixed $isDelegate
     * @return WalletModel
     */
    public function setIsDelegate($isDelegate)
    {
        $this->isDelegate = $isDelegate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsResigned()
    {
        return $this->isResigned;
    }

    /**
     * @param mixed $isResigned
     * @return WalletModel
     */
    public function setIsResigned($isResigned)
    {
        $this->isResigned = $isResigned;

        return $this;
    }

    /**
     * @return null
     */
    public function getDelegate()
    {
        return $this->delegate;
    }

    /**
     * @param null $delegate
     * @return WalletModel
     */
    public function setDelegate($delegate)
    {
        $this->delegate = $delegate;

        return $this;
    }

    public function isActive() : bool
    {
        return !$this->isResigned;
    }
}
