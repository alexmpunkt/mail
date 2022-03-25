<?php

namespace Conversio\Mail\Tests\Pipeline;

use Codeception\Specify;
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
    use Specify;

    public function testProcess(): void
    {
        $this->specify('No pipe given', function () {
            $pipeline = new MailPipeline();
            $mail     = new Mail();
            $this->assertTrue($pipeline->process($mail)->succeeded());
        });

        $this->specify('Append single Pipe', function () {
            $pipeline = new MailPipeline();
            $mail     = new Mail();
            $pipeline->appendPipe(new CustomPipe(function (Mail $mail, ProcessResult $result) {
                return $result->setStatus(ProcessResult::ERRORED);
            }));
            $result = $pipeline->process($mail);
            $this->assertTrue($result->errored());
        });

        $this->specify('Append multiple Pipes', function () {
            $pipeline = new MailPipeline();
            $mail     = new Mail();
            $pipeline->appendPipe(new CustomPipe(function (Mail $mail, ProcessResult $result) {
                return $result->setStatus(ProcessResult::ERRORED);
            }));
            $pipeline->appendPipe(new CustomPipe(function (Mail $mail, ProcessResult $result) {
                return $result->setStatus(ProcessResult::FAILED);
            }));
            $result = $pipeline->process($mail);
            $this->assertTrue($result->failed());
        });

        $this->specify('Append multiple Pipes, passing Attributes', function () {
            $pipeline = new MailPipeline();
            $mail     = new Mail();
            $pipeline->appendPipe(new CustomPipe(function (Mail $mail, ProcessResult $result) {
                return $result->withAttribute('test1', 'test1');
            }));
            $pipeline->appendPipe(new CustomPipe(function (Mail $mail, ProcessResult $result) {
                return $result->withAttribute('test2', 'test2');
            }));
            $result = $pipeline->process($mail);
            $this->assertTrue($result->hasAttribute('test1'));
            $this->assertTrue($result->hasAttribute('test2'));
        });
    }
}
