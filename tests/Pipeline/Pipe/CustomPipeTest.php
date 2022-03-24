<?php

namespace Conversio\Mail\Tests\Pipeline\Pipe;

use Conversio\Mail\Mail;
use Conversio\Mail\Pipeline\Pipe\CustomPipe;
use Conversio\Mail\Pipeline\ProcessResult;
use PHPUnit\Framework\TestCase;

/**
 * Class CustomPipeTest
 * @package Conversio\Mail\Tests\Pipeline\Pipe
 */
final class CustomPipeTest extends TestCase
{
    public function testProcess(): void
    {
        $mail   = new Mail();
        $result = ProcessResult::new();
        $this->assertFalse($result->failed());
        $pipe = new CustomPipe(function (Mail $mail, ProcessResult $result) {
            return $result->setStatus(ProcessResult::FAILED);
        });
        $this->assertTrue($pipe->process($mail, $result)->failed());
    }
}
