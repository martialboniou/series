<?php

namespace App\Notification;

use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\User\UserInterface;

class Sender
{
    //protected $mailer; -- PHP8

    public function __construct(protected MailerInterface $mailer)
    {
        //$this->$mailer = $mailer; -- PHP8
    }

    public function sendNewUserNotificationToAdmin(UserInterface $user): void
    {
        // test
        //file_put_contents('debug.txt', $user->getUsername());
        /*
        if ($user instanceof User)
            file_put_contents('debug.txt', $user->getEmail());
        else throw new \Exception('Not a user as defined in this application');
        */
        $message = new Email();
        $message->from('accounts@series.com')
            ->to('admin@series.com')
            ->subject('new account created on series.com!')
            ->html('<h1>New account!</h1><p>email: '. $user->getEmail(). '</p>');
        $this->mailer->send($message);
    }
}