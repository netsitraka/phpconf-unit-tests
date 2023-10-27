<?php

declare(strict_types=1);

namespace PhpConf;

class Transaction
{
    public function __construct(private readonly Notifier $notifier)
    {
    }

    public function transfer(float $amount, Account $from, Account $to): void
    {
        $from->debit($amount);
        $to->credit($amount);
        $this->notifier->notify($from, sprintf("You transferred $%.2f to %s", $amount, $to->getOwnerEmail()));
        $this->notifier->notify($to, sprintf("You received $%.2f from %s", $amount, $from->getOwnerEmail()));
    }
}