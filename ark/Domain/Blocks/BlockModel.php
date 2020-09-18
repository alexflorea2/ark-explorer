<?php


namespace Ark\Domain\Blocks;


use Ark\Domain\Users\UserModel;

class BlockModel
{
    private string $id;
    private float $height;
    private string $previous;
    private int $confirmations;
    private int $transactions;

    /**
     * @return int
     */
    public function getTransactions(): int
    {
        return $this->transactions;
    }

    /**
     * @param int $transactions
     * @return BlockModel
     */
    public function setTransactions(int $transactions): BlockModel
    {
        $this->transactions = $transactions;

        return $this;
    }
    private array $timestamp;
    private UserModel $generator;
    private array $forged;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return BlockModel
     */
    public function setId(string $id): BlockModel
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @return BlockModel
     */
    public function setHeight(float $height): BlockModel
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrevious(): string
    {
        return $this->previous;
    }

    /**
     * @param string $previous
     * @return BlockModel
     */
    public function setPrevious(string $previous): BlockModel
    {
        $this->previous = $previous;

        return $this;
    }

    /**
     * @return int
     */
    public function getConfirmations(): int
    {
        return $this->confirmations;
    }

    /**
     * @param int $confirmations
     * @return BlockModel
     */
    public function setConfirmations(int $confirmations): BlockModel
    {
        $this->confirmations = $confirmations;

        return $this;
    }

    /**
     * @return array
     */
    public function getTimestamp(): array
    {
        return $this->timestamp;
    }

    /**
     * @param array $timestamp
     * @return BlockModel
     */
    public function setTimestamp(array $timestamp): BlockModel
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return UserModel
     */
    public function getGenerator(): UserModel
    {
        return $this->generator;
    }

    /**
     * @param UserModel $generator
     * @return BlockModel
     */
    public function setGenerator(UserModel $generator): BlockModel
    {
        $this->generator = $generator;

        return $this;
    }

    /**
     * @return array
     */
    public function getForged(): array
    {
        return $this->forged;
    }

    /**
     * @param array $forged
     * @return BlockModel
     */
    public function setForged(array $forged): BlockModel
    {
        $this->forged = $forged;

        return $this;
    }

    public function getReward()
    {
        return $this->forged['reward'] ?? 0;
    }

    public function getFee()
    {
        return $this->forged['fee'] ?? 0;
    }

    public function getTotalForged()
    {
        return $this->forged['total'] ?? 0;
    }

    public function getAmount()
    {
        return $this->forged['amount'] ?? 0;
    }

}
