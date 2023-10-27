<?php

declare(strict_types=1);

namespace PhpConf;

class Transaction
{
    public function transfer(float $amount, Account $from, Account $to): void
    {
        $from->debit($amount);
        $to->credit($amount);
    }
}