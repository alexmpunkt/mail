<?php

namespace Conversio\Mail\Tests\Assitant;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Assistant\Assistant;
use Conversio\Mail\Pipeline\MailPipeline;
use Conversio\Mail\Pipeline\ProcessResult;
use PHPUnit\Framework\TestCase;

/**
 * Class AssistantTest
 * @package Conversio\Mail\Tests\Assitant
 */
class AssistantTest extends TestCase
{
    public function testListen()
    {
        $this->assertInstanceOf(Assistant::class, Assistant::listen());
    }

    public function testListenTo()
    {
        $this->assertEquals('test@test.de', Assistant::listenTo(new Address('test@test.de'))
                                                     ->getMail()->sender()->getAddress());
    }

    public function testWrite()
    {
        $this->assertEquals('This is a test', Assistant::listen()->write('This is a test')->getMail()->content()->getText());
    }

    public function testWritehHtml()
    {
        $this->assertEquals('<b>This is a test</b>', Assistant::listen()
                                                              ->writeHtml('<b>This is a test</b>')->getMail()->content()->getHtml());
    }

    public function testCopyTo()
    {
        $first  = new Address('copy1@test.de');
        $second = new Address('copy2@test.de');
        $this->assertEquals([$first, $second], Assistant::listen()->copyTo($first)->copyTo($second)->getMail()->ccs()->asArray());
    }

    public function testBlindTo()
    {
        $first  = new Address('blind1@test.de');
        $second = new Address('blind2@test.de');
        $this->assertEquals([$first, $second], Assistant::listen()->blindTo($first)->blindTo($second)->getMail()->bccs()->asArray());
    }

    public function testWithSubject()
    {
        $this->assertEquals('This is the Subject', Assistant::listen()
                                                            ->withSubject('This is the Subject')->getMail()->getSubject());
    }

    public function testSendThrough()
    {
        $this->assertInstanceOf(ProcessResult::class, Assistant::listen()->sendThrough(new MailPipeline()));
    }
}