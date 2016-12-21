<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.12.16
 * Time: 19:46
 */
namespace Conversio\Mail\Mailer\Adapter;

use Conversio\Mail\Mail;

interface MailerAdapterInterface
{
    /**
     * @param Mail $mail
     *
     * @return bool
     */
    public function send(Mail $mail): bool;

}