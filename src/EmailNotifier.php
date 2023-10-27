<?php

declare(strict_types=1);

namespace PhpConf;

use PHPMailer\PHPMailer\PHPMailer;

class EmailNotifier implements Notifier
{

    public function notify(Account $account, string $message): void
    {
        $recipient = $account->getOwnerEmail();

        $mailer = new PHPMailer(true);
        $mailer->Host = 'email-testing';
        $mailer->Port = 1025;
        $mailer->isSMTP();
        $mailer->SMTPSecure = false;

        $mailer->setFrom('notification@bank.com', 'Your Bank');
        $mailer->addAddress($recipient);
        $mailer->Subject = 'Hello ' . ucfirst(substr($recipient, 0, strpos($recipient, "@")));
        $mailer->AltBody = $message;
        $mailer->Body = $message;
        $mailer->send();
    }
}