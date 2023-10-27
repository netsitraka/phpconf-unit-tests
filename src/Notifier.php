<?php

declare(strict_types=1);

namespace PhpConf;

interface Notifier
{
    public function notify(Account $account, string $message): void;
}