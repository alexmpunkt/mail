<?php

namespace Conversio\Mail\Tests;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Address\AddressContainer;
use Conversio\Mail\Attachment\AttachmentContainer;
use Conversio\Mail\Content;
use Conversio\Mail\Mail;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class MailTest
 * @package Conversio\Mail\Tests
 */
class MailTest extends TestCase
{
    public function testGetSubject()
    {
        $mail = new Mail();
        $mail->setSubject('kJhdhw7271Daw');
        $this->assertEquals('kJhdhw7271Daw', $mail->getSubject());

        $mail = new Mail();
        $mail->setSubject('klj90823KHJDHW');
        $this->assertEquals('klj90823KHJDHW', $mail->getSubject());

        $mail = new Mail();
        $this->assertEquals('', $mail->getSubject());
    }

    public function testGetSender()
    {
        $mail = new Mail();
        $this->assertFalse($mail->hasSender());
        $mail->setSender(new Address('john.doe@test.de', 'John Doe'));
        $this->assertTrue($mail->sender()->equals(new Address('john.doe@test.de', 'John Doe')));
        $this->assertTrue($mail->hasSender());

        $mail->setSender(new Address('max.mustermann@test.de', 'Max Mustermann'));
        $this->assertTrue($mail->sender()->equals(new Address('max.mustermann@test.de')));
    }

    public function testGetFrom()
    {
        $mail = new Mail();
        $mail->setFrom(new Address('john.doe@test.de', 'John Doe'));
        $this->assertTrue($mail->getFrom()->equals(new Address('john.doe@test.de', 'John Doe')));
    }

    /**
     * @return Mail
     */
    private function getMail()
    {
        return new Mail();
    }

    public function testRecipients()
    {
        $this->assertInstanceOf(AddressContainer::class, $this->getMail()->recipients());
    }

    public function testCcs()
    {
        $this->assertInstanceOf(AddressContainer::class, $this->getMail()->ccs());
    }

    public function testBccs()
    {
        $this->assertInstanceOf(AddressContainer::class, $this->getMail()->bccs());
    }

    public function testContent()
    {
        $this->assertInstanceOf(Content::class, $this->getMail()->content());
    }

    public function testAttachments()
    {
        $this->assertInstanceOf(AttachmentContainer::class, $this->getMail()->attachments());
    }
}