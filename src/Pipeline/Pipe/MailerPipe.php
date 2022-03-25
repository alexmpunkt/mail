<?php

namespace Conversio\Mail\Pipeline\Pipe;

use Conversio\Mail\Mail;
use Conversio\Mail\Mailer\MailerInterface;
use Conversio\Mail\Pipeline\MailPipeInterface;
use Conversio\Mail\Pipeline\ProcessResult;

/**
 * Class MailerPipe
 * @package Conversio\Mail\Pipeline\Pipe
 */
final class MailerPipe implements MailPipeInterface
{
    /**
     * @var MailerInterface
     */
    private MailerInterface $mailer;

    /**
     * MailerPipe constructor.
     *
     * @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param Mail          $mail
     * @param ProcessResult $result
     *
     * @return ProcessResult
     */
    public function process(Mail $mail, ProcessResult $result): ProcessResult
    {
        if ($result->errored()) {
            return $result;
        }

        if ($this->mailer->send($mail)) {
            $result->setStatus(ProcessResult::SUCCEEDED);
        } else {
            $result->setStatus(ProcessResult::FAILED);
            $result->addInfo(self::class, $this->mailer->getErrorInfo());
        }

        return $result;
    }
}
