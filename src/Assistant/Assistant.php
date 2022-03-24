<?php

namespace Conversio\Mail\Assistant;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Attachment\AttachmentInterface;
use Conversio\Mail\Mail;
use Conversio\Mail\Pipeline\MailPipelineInterface;
use Conversio\Mail\Pipeline\ProcessResult;

/**
 * Class Assistant
 * @package Conversio\Mail\Assitant
 */
final class Assistant
{
    /**
     * @var Mail $mail
     */
    private Mail $mail;

    /**
     * @return Assistant
     */
    public static function listen(): self
    {
        return new self();
    }

    /**
     * @param Address $sender
     *
     * @return Assistant
     */
    public static function listenTo(Address $sender): self
    {
        $assistant = self::listen();
        $assistant->from($sender);

        return $assistant;
    }

    /**
     * Assistant constructor.
     */
    public function __construct()
    {
        $this->mail = new Mail();
    }

    /**
     * @param Address $sender
     *
     * @return Assistant
     */
    public function from(Address $sender): self
    {
        $this->mail->setSender($sender);

        return $this;
    }

    /**
     * @param Address $to
     *
     * @return Assistant
     */
    public function to(Address $to): self
    {
        $this->mail->recipients()->addAddress($to);

        return $this;
    }

    /**
     * @param string $content
     *
     * @return Assistant
     */
    public function write(string $content): self
    {
        $this->mail->content()->setText($content);

        return $this;
    }

    /**
     * @param string $html
     *
     * @return Assistant
     */
    public function writeHtml(string $html): self
    {
        $this->mail->content()->setHtml($html);

        return $this;
    }

    /**
     * @param Address $address
     *
     * @return Assistant
     */
    public function copyTo(Address $address): self
    {
        $this->mail->ccs()->addAddress($address);

        return $this;
    }

    /**
     * @param Address $address
     *
     * @return Assistant
     */
    public function blindTo(Address $address): self
    {
        $this->mail->bccs()->addAddress($address);

        return $this;
    }

    /**
     * @param string $subject
     *
     * @return Assistant
     */
    public function withSubject(string $subject): self
    {
        $this->mail->setSubject($subject);

        return $this;
    }

    /**
     * @param AttachmentInterface $attachment
     *
     * @return Assistant
     */
    public function withAttachment(AttachmentInterface $attachment): self
    {
        $this->mail->attachments()->addAttachment($attachment);

        return $this;
    }

    /**
     * @return Mail
     */
    public function getMail(): Mail
    {
        return $this->mail;
    }

    /**
     * @param MailPipelineInterface $pipeline
     *
     * @return ProcessResult
     */
    public function sendThrough(MailPipelineInterface $pipeline): ProcessResult
    {
        return $pipeline->process($this->getMail());
    }
}
