<?php

declare(strict_types=1);

namespace Test;

use PhpConf\Account;
use PhpConf\Notifier;
use PhpConf\Transaction;
use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{
    public function testTransferShouldMoveMoneyFromAnAccountToAnother(): void
    {
        // Arrange
        $from = new Account('account1@example.com', 500);
        $to = new Account('account2@example.com', 400);
        $notifier = $this->createMock(Notifier::class);
        $transaction = new Transaction($notifier);

        // Act
        $transaction->transfer(100, $from, $to);

        // Assert
        $this->assertEquals(400, $from->getBalance());
        $this->assertEquals(500, $to->getBalance());
    }

    public function testTransferShouldNotifyDebtorAndCreditorAboutTheTransaction(): void
    {
        $from = new Account('account1@example.com', 500);
        $to = new Account('account2@example.com', 400);

        $notifier = $this->createMock(Notifier::class);
        $notifier->expects($this->exactly(2))->method('notify');

        $transaction = new Transaction($notifier);
        $transaction->transfer(100, $from, $to);
    }
}