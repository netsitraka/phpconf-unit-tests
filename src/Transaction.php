<?php

declare(strict_types=1);

namespace PhpConf;

readonly class Transaction
{
    public function __construct(private Notifier $notifier, private FeeCalculator $transferFeeCalculator)
    {
    }

    public function transfer(float $amount, Account $from, Account $to): void
    {
        $fee = $this->transferFeeCalculator->calculateFeet($amount);

        $from->debit($amount + $fee);
        $to->credit($amount);

        $this->notifier->notify($from, sprintf("You transferred $%.2f to %s", $amount, $to->getOwnerEmail()));
        $this->notifier->notify($to, sprintf("You received $%.2f from %s", $amount, $from->getOwnerEmail()));
    }
}