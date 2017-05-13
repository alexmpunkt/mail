<?php

namespace Conversio\Mail\Tests\Pipeline;

use Codeception\Specify;
use Conversio\Mail\Pipeline\ProcessResult;
use PHPUnit\Framework\TestCase;

/**
 * Class ProcessResultTest
 * @package Conversio\Mail\Tests\Pipeline
 */
final class ProcessResultTest extends TestCase
{
    use Specify;

    public function testStatus()
    {
        $this->specify('none', function () {
            $result = ProcessResult::new();
            $this->assertFalse($result->succeeded());
            $this->assertFalse($result->errored());
            $this->assertFalse($result->failed());
        });

        $this->specify('succeeded', function () {
            $result = ProcessResult::new()->setStatus(ProcessResult::SUCCEEDED);
            $this->assertTrue($result->succeeded());
            $this->assertFalse($result->errored());
            $this->assertFalse($result->failed());
        });

        $this->specify('errored', function () {
            $result = ProcessResult::new()->setStatus(ProcessResult::ERRORED);
            $this->assertFalse($result->succeeded());
            $this->assertTrue($result->errored());
            $this->assertFalse($result->failed());
        });

        $this->specify('failed', function () {
            $result = ProcessResult::new()->setStatus(ProcessResult::FAILED);
            $this->assertFalse($result->succeeded());
            $this->assertFalse($result->errored());
            $this->assertTrue($result->failed());
        });
    }

    public function testInfo()
    {
        $result = ProcessResult::new();
        $this->assertFalse($result->hasInfoFor('test'));
        $result->addInfo('test', 'This is the Info');
        $this->assertTrue($result->hasInfoFor('test'));
        $this->assertEquals('This is the Info', $result->getInfo('test'));
    }
}