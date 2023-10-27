<?php

declare(strict_types=1);

namespace Test;

use PhpConf\Account;
use PhpConf\Transaction;
use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{
    public function testTransferShouldMoveMoneyFromAnAccountToAnother(): void
    {
        // Arrange
        $from = new Account('account1@example.com', 500);
        $to = new Account('account2@example.com', 400);
        $transaction = new Transaction();

        // Act
        $transaction->transfer(100, $from, $to);

        // Assert
        $this->assertEquals(400, $from->getBalance());
        $this->assertEquals(500, $to->getBalance());
    }
}