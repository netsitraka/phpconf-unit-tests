<?php

declare(strict_types=1);

namespace Test;

use PhpConf\Account;
use PhpConf\Notifier;
use PhpConf\Transaction;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{
    private Account $from;
    private Account $to;
    private Notifier|MockObject $notifier;
    private Transaction $transaction;

    protected function setUp(): void
    {
        // Arrange
        $this->from = new Account('account1@example.com', 500);
        $this->to = new Account('account2@example.com', 400);
        $this->notifier = $this->createMock(Notifier::class);

        $this->transaction = new Transaction($this->notifier);
    }

    public function testTransferShouldMoveMoneyFromAnAccountToAnother(): void
    {
        // Act
        $this->transaction->transfer(100, $this->from, $this->to);

        // Assert
        $this->assertEquals(400, $this->from->getBalance());
        $this->assertEquals(500, $this->to->getBalance());
    }

    public function testTransferShouldNotifyDebtorAndCreditorAboutTheTransaction(): void
    {
        $this->notifier->expects($this->exactly(2))->method('notify');

        $this->transaction->transfer(100, $this->from, $this->to);
    }
}