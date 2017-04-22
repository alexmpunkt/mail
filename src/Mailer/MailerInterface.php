<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.12.16
 * Time: 19:45
 */
namespace Conversio\Mail\Mailer;

use Conversio\Mail\Mail;

/**
 * Interface MailerInterface
 * @package Conversio\Mail\Mailer
 */
interface MailerInterface
{
    /**
     * @param Mail $mail
     *
     * @return bool
     */
    public function send(Mail $mail): bool;
}