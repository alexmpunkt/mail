<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.12.16
 * Time: 19:45
 */
namespace Conversio\Mail\Mailer;

use Conversio\Mail\Mail;
use Conversio\Mail\Mailer\Adapter\MailerAdapterInterface;

class Mailer implements MailerInterface
{

    /**
     * @var MailerAdapterInterface
     */
    private $adapter;

    /**
     * Mailer constructor.
     *
     * @param MailerAdapterInterface $adapter
     */
    public function __construct(MailerAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param Mail $mail
     *
     * @return bool
     */
    public function send(Mail $mail): bool
    {
        return $this->adapter->send($mail);
    }

}