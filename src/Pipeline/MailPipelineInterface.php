<?php

namespace Conversio\Mail\Pipeline;

use Conversio\Mail\Mail;

/**
 * Interface MailPipelineInterface
 * @package Conversio\Mail\Pipeline
 */
interface MailPipelineInterface
{
    /**
     * @param Mail $mail
     *
     * @return ProcessResult
     */
    public function process(Mail $mail): ProcessResult;
}