<?php

namespace Conversio\Mail\Pipeline;

use Conversio\Mail\Mail;

/**
 * Class MailPipeline
 * @package Conversio\Mail\Pipeline
 */
final class MailPipeline implements MailPipelineInterface
{
    /**
     * @var MailPipeInterface[]
     */
    private $pipes = [];

    /**
     * @param MailPipeInterface $mailpipe
     */
    public function appendPipe(MailPipeInterface $mailpipe)
    {
        $this->pipes[] = $mailpipe;
    }

    /**
     * @param Mail $mail
     *
     * @return ProcessResult
     */
    public function process(Mail $mail): ProcessResult
    {
        $processMail = clone $mail;
        $result      = ProcessResult::new();
        $result->setStatus(ProcessResult::SUCCEEDED);
        foreach ($this->pipes as $pipe) {
            $result = $pipe->process($processMail, $result);
        }

        return $result;
    }
}