<?php

declare(strict_types=1);

namespace PhpConf;

use PHPMailer\PHPMailer\PHPMailer;

class EmailNotifier
{
    public function notify(string $recipient, string $subject, string $content): void
    {
        $mailer = new PHPMailer(true);
        $mailer->Host = 'email-testing';
        $mailer->Port = 1025;
        $mailer->isSMTP();
        $mailer->SMTPSecure = false;

        $mailer->setFrom('notification@bank.com', 'Your Bank');
        $mailer->addAddress($recipient);
        $mailer->Subject = $subject;
        $mailer->AltBody = $content;
        $mailer->Body = $content;
        $mailer->send();
    }
}