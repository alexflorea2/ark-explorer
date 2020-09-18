<?php


namespace Ark\Domain\Users;


class UserModel
{
    private string $username;
    private string $address;
    private string $publicKey;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return UserModel
     */
    public function setUsername(string $username): UserModel
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return UserModel
     */
    public function setAddress(string $address): UserModel
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * @param string $publicKey
     * @return UserModel
     */
    public function setPublicKey(string $publicKey): UserModel
    {
        $this->publicKey = $publicKey;

        return $this;
    }


}
