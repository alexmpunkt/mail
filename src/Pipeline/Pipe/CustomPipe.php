<?php

namespace Conversio\Mail\Pipeline\Pipe;

use Conversio\Mail\Mail;
use Conversio\Mail\Pipeline\MailPipeInterface;
use Conversio\Mail\Pipeline\ProcessResult;

/**
 * Class CustomPipe
 */
final class CustomPipe implements MailPipeInterface
{
    private $callable;

    /**
     * CustomPipe constructor.
     *
     * @param Callable $callable
     */
    public function __construct($callable)
    {
        $this->callable = $callable;
    }

    /**
     * @param Mail          $mail
     * @param ProcessResult $result
     *
     * @return ProcessResult
     */
    public function process(Mail $mail, ProcessResult $result): ProcessResult
    {
        return call_user_func($this->callable, $mail, $result);
    }
}