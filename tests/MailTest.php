<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.12.16
 * Time: 11:46
 */
namespace Conversio\Mail\Tests;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Address\AddressContainer;
use Conversio\Mail\Attachment\AttachmentContainer;
use Conversio\Mail\Content;
use Conversio\Mail\Mail;
use \PHPUnit_Framework_TestCase;

class MailTest extends PHPUnit_Framework_TestCase
{

    public function testGetId()
    {
        $mail = new Mail(new Address('test@test.de'));
        $mail->setId('kJhdhw7271Daw');
        $this->assertEquals('kJhdhw7271Daw', $mail->getId());

        $mail = new Mail(new Address('test@test.de'));
        $mail->setId('klj90823KHJDHW');
        $this->assertEquals('klj90823KHJDHW', $mail->getId());

        $mail = new Mail(new Address('test@test.de'));
        $this->assertEquals('', $mail->getId());
    }

    public function testGetSender()
    {
        $mail = new Mail(new Address('john.doe@test.de', 'John Doe'));
        $this->assertTrue($mail->sender()->equals(new Address('john.doe@test.de', 'John Doe')));

        $mail = new Mail(new Address('max.mustermann@test.de', 'Max Mustermann'));
        $this->assertTrue($mail->sender()->equals(new Address('max.mustermann@test.de')));
    }

    /**
     * @return Mail
     */
    private function getMail()
    {
        return new Mail(new Address('john.doe@test.de', 'John Doe'));
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

    public function testGetCreatedAt()
    {
        $mail = new Mail(new Address('test@test.de'), new \DateTime('2016-01-01'));
        $this->assertEquals(new \DateTime('2016-01-01'), $mail->getCreatedAt());
    }
}