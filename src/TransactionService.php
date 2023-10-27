<?php

namespace PhpConf;

use PHPMailer\PHPMailer\PHPMailer;

class TransactionService
{
    public function transfer(float $amount, Account $from, Account $to): void
    {
        $from->debit($amount);
        $to->credit($amount);

        $this->notify($from->getOwnerEmail(), sprintf("You transferred $%.2f to %s", $amount, $to->getOwnerEmail()));
        $this->notify($to->getOwnerEmail(), sprintf("You received $%.2f from %s", $amount, $from->getOwnerEmail()));
    }

    public function notify(string $recipient, string $content): void
    {
        $mailer = new PHPMailer(true);
        $mailer->Host = 'email-testing';
        $mailer->Port = 1025;
        $mailer->isSMTP();
        $mailer->SMTPSecure = false;

        $mailer->setFrom('notification@bank.com', 'Your Bank');
        $mailer->addAddress($recipient);
        $mailer->Subject = 'Hello ' . ucfirst(substr($recipient, 0, strpos($recipient, "@")));
        $mailer->AltBody = $content;
        $mailer->Body = $content;
        $mailer->send();
    }
}