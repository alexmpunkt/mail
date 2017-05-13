<?php

namespace Conversio\Mail\Tests\Pipeline;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Mail;
use Conversio\Mail\Pipeline\MailPipeline;
use Conversio\Mail\Pipeline\Pipe\CustomPipe;
use Conversio\Mail\Pipeline\ProcessResult;
use PHPUnit\Framework\TestCase;

/**
 * Class MailPipelineTest
 * @package Conversio\Mail\Tests\Pipeline
 */
final class MailPipelineTest extends TestCase
{
    public function testProcess()
    {
        $pipeline = new MailPipeline();
        $mail     = new Mail(new Address('mail@test.de'));
        $pipeline->appendPipe(new CustomPipe(function (Mail $mail, ProcessResult $result) {
            $result->setStatus(ProcessResult::SUCCEEDED);
        }));
        $result = $pipeline->process($mail);
        $this->assertTrue($result->succeeded());
    }
}