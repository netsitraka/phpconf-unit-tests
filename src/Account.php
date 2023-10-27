<?php

namespace PhpConf;

class Account
{
    public function __construct(private readonly string $ownerEmail, private float $balance)
    {
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @return string
     */
    public function getOwnerEmail(): string
    {
        return $this->ownerEmail;
    }

    public function credit(float $amount): void
    {
    }

    public function debit(float $amount): void
    {
    }
}