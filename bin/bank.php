<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require __DIR__ . '/../vendor/autoload.php';

use PhpConf\Account;
use PhpConf\Transaction;

$printAccount = fn(Account $a) => sprintf("-> %s have %.2f$\n", $a->getOwnerEmail(), $a->getBalance());

$john = new Account('john@email.com', 500.0);
echo $printAccount($john);
$jane = new Account('jane@email.com', 100.0);
echo $printAccount($jane);

$transaction = new Transaction();
$transaction->transfer(amount: 200.0, from: $john, to: $jane);

echo "After the transaction 1\n";
echo $printAccount($john);
echo $printAccount($jane);
