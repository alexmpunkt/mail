<?php

namespace Conversio\Mail\Pipeline;

use Conversio\Mail\Mail;

/**
 * interface MailPipeInterface
 * @package Conversio\Mail\Pipeline
 */
interface MailPipeInterface
{
    /**
     * @param Mail          $mail
     * @param ProcessResult $result
     *
     * @return ProcessResult
     */
    public function process(Mail $mail, ProcessResult $result): ProcessResult;
}