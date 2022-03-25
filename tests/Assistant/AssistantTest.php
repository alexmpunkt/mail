<?php

namespace Conversio\Mail\Tests\Assistant;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Assistant\Assistant;
use Conversio\Mail\Pipeline\MailPipeline;
use Conversio\Mail\Pipeline\ProcessResult;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class AssistantTest
 * @package Conversio\Mail\Tests\Assitant
 */
class AssistantTest extends TestCase
{
    public function testListen(): void
    {
        $this->assertInstanceOf(Assistant::class, Assistant::listen());
    }

    public function testListenTo(): void
    {
        try {
            $address = Assistant::listenTo(new Address('test@test.de'))->getMail()->sender()->getAddress();
            $this->assertEquals('test@test.de', $address);
        } catch (Exception $e) {
            $this->fail();
        }
    }

    public function testWrite(): void
    {
        $this->assertEquals('This is a test', Assistant::listen()->write('This is a test')->getMail()->content()->getText());
    }

    public function testWriteHtml(): void
    {
        $html = Assistant::listen()->writeHtml('<b>This is a test</b>')->getMail()->content()->getHtml();
        $this->assertEquals('<b>This is a test</b>', $html);
    }

    public function testCopyTo(): void
    {
        $first  = new Address('copy1@test.de');
        $second = new Address('copy2@test.de');
        $this->assertEquals([$first, $second], Assistant::listen()->copyTo($first)->copyTo($second)->getMail()->ccs()->asArray());
    }

    public function testBlindTo(): void
    {
        $first  = new Address('blind1@test.de');
        $second = new Address('blind2@test.de');
        $this->assertEquals([$first, $second], Assistant::listen()->blindTo($first)->blindTo($second)->getMail()->bccs()->asArray());
    }

    public function testWithSubject(): void
    {
        $subject = Assistant::listen()->withSubject('This is the Subject')->getMail()->getSubject();
        $this->assertEquals('This is the Subject', $subject);
    }

    public function testSendThrough(): void
    {
        $this->assertInstanceOf(ProcessResult::class, Assistant::listen()->sendThrough(new MailPipeline()));
    }
}
