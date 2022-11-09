<?php

namespace Conversio\Mail\Tests\Pipeline\Pipe;

use Codeception\Specify;
use Conversio\Mail\Mail;
use Conversio\Mail\Mailer\MailerInterface;
use Conversio\Mail\Pipeline\Pipe\MailerPipe;
use Conversio\Mail\Pipeline\ProcessResult;
use PHPUnit\Framework\TestCase;

/**
 * Class MailerPipeTest
 * @package Conversio\Mail\Tests\Pipeline\Pipe
 */
final class MailerPipeTest extends TestCase
{
    use Specify;

    public function testProcess(): void
    {
        $this->specify('successfully send', function () {
            $pipe   = new MailerPipe($this->getMailerMock(true));
            $result = ProcessResult::new();
            $mail   = new Mail();
            $this->assertTrue($pipe->process($mail, $result)->succeeded());
        });

        $this->specify('send failed', function () {
            $pipe   = new MailerPipe($this->getMailerMock(false));
            $result = ProcessResult::new();
            $mail   = new Mail();
            $this->assertTrue($pipe->process($mail, $result)->failed());
        });

        $this->specify('send failed, check info', function () {
            $pipe   = new MailerPipe($this->getMailerMock(false, 'errorinfo'));
            $result = ProcessResult::new();
            $mail   = new Mail();
            $result = $pipe->process($mail, $result);
            $this->assertTrue($result->failed());
            $this->assertTrue($result->hasInfoFor(get_class($pipe)));
            $this->assertEquals('errorinfo', $result->getInfo(get_class($pipe)));
        });

        $this->specify('pass on already errored result', function () {
            $pipe   = new MailerPipe($this->getMailerMock(true));
            $result = ProcessResult::new();
            $result->setStatus(ProcessResult::ERRORED);
            $mail = new Mail();
            $this->assertTrue($pipe->process($mail, $result)->errored());
        });
    }

    /**
     * @param bool   $sendResponse
     * @param string $errorInfo
     *
     * @return MailerInterface
     */
    private function getMailerMock(bool $sendResponse, string $errorInfo = ''): MailerInterface
    {
        $mock = $this->getMockBuilder(MailerInterface::class)->onlyMethods(['send', 'getErrorInfo'])->getMock();
        $mock->method('send')->willReturn($sendResponse);
        $mock->method('getErrorInfo')->willReturn($errorInfo);

        /**@var MailerInterface $mock */
        return $mock;
    }
}
