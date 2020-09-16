<?php


namespace Ark\Domain\Wallets;


class WalletModel
{
    private string $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id) : self
    {
        $this->id = $id;
        return $this;
    }
}
