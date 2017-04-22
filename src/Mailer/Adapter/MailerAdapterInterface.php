<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.12.16
 * Time: 19:46
 */
namespace Conversio\Mail\Mailer\Adapter;

use Conversio\Mail\Mail;

/**
 * Interface MailerAdapterInterface
 * @package Conversio\Mail\Mailer\Adapter
 */
interface MailerAdapterInterface
{
    /**
     * @param Mail $mail
     *
     * @return bool
     */
    public function send(Mail $mail): bool;

    /**
     * @return string
     */
    public function getErrorInfo(): string;
}