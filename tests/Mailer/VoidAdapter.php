<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.12.16
 * Time: 19:52
 */

namespace Conversio\Mail\Tests\Mailer;

use Conversio\Mail\Mail;
use Conversio\Mail\Mailer\Adapter\MailerAdapterInterface;

/**
 * Class VoidAdapter
 * @package Conversio\Mail\Tests\Mailer
 */
class VoidAdapter implements MailerAdapterInterface
{
    /**
     * @var bool
     */
    private $returnVal;

    /**
     * VoidAdapter constructor.
     *
     * @param bool $returnVal
     */
    public function __construct(bool $returnVal)
    {
        $this->returnVal = $returnVal;
    }

    /**
     * @param Mail $mail
     *
     * @return bool
     */
    public function send(Mail $mail): bool
    {
        return $this->returnVal;
    }

    /**
     * @return string
     */
    public function getErrorInfo(): string
    {
        return '';
    }
}
