<?php

declare(strict_types=1);

namespace Test;

use PhpConf\Account;
use PHPUnit\Framework\TestCase;

class AmountTest extends TestCase
{
    private Account $account;

    protected function setUp(): void
    {
        $this->account = new Account('test@example.com', 500);
    }

    public function testCreditShouldIncreaseTheAmountOfMoneyInAnAccount(): void
    {
        $this->account->credit(10);
        $this->assertEquals(510, $this->account->getBalance());
    }

    public function testDebitShouldDecreaseTheAmountOfMoneyInAnAccount(): void
    {
        $this->account->debit(10);
        $this->assertEquals(490, $this->account->getBalance());
    }
}