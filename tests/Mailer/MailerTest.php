<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.12.16
 * Time: 19:51
 */
namespace Conversio\Mail\Tests\Mailer;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Mail;
use Conversio\Mail\Mailer\Mailer;
use PHPUnit\Framework\TestCase;

/**
 * Class MailerTest
 * @package Conversio\Mail\Tests\Mailer
 */
class MailerTest extends TestCase
{
    public function testSend()
    {
        $mail = new Mail(new Address('test@test.de'));

        $mailer = new Mailer(new VoidAdapter(true));
        $this->assertTrue($mailer->send($mail));

        $mailer = new Mailer(new VoidAdapter(false));
        $this->assertFalse($mailer->send($mail));
    }
}