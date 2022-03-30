<?php

namespace Conversio\Mail;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Address\AddressContainer;
use Conversio\Mail\Attachment\AttachmentContainer;
use Exception;

/**
 * Class Mail
 * @package Conversio\Mail
 */
class Mail
{
    /**
     * @var Address|null $id
     */
    private ?Address $sender = null;

    /**
     * @var Address|null
     */
    private ?Address $from = null;

    /**
     * @var string
     */
    private string $subject = '';

    /**
     * @var Content
     */
    private Content $content;

    /**
     * @var AddressContainer
     */
    private AddressContainer $recipients;

    /**
     * @var AddressContainer
     */
    private AddressContainer $ccs;

    /**
     * @var AddressContainer
     */
    private AddressContainer $bccs;

    /**
     * @var AttachmentContainer
     */
    private AttachmentContainer $attachments;

    /**
     * @var AddressContainer
     */
    private AddressContainer $replyTos;

    /**
     * Mail constructor
     */
    public function __construct()
    {
        $this->content     = new Content();
        $this->recipients  = new AddressContainer();
        $this->ccs         = new AddressContainer();
        $this->bccs        = new AddressContainer();
        $this->replyTos    = new AddressContainer();
        $this->attachments = new AttachmentContainer();
    }

    /**
     * @param Address $from
     *
     */
    public function setFrom(Address $from)
    {
        $this->from = $from;
    }

    /**
     * @return Address
     * @throws Exception
     */
    public function from(): Address
    {
        if (!$this->hasFrom()) {
            throw new Exception('There is no from given');
        }

        return $this->from;
    }

    /**
     * @param Address $sender
     */
    public function setSender(Address $sender): void
    {
        $this->sender = $sender;
    }

    /**
     * @return Address
     * @throws Exception
     */
    public function sender(): Address
    {
        if (!$this->hasSender()) {
            throw new Exception('There is no sender given');
        }

        return $this->sender;
    }

    /**
     * @return bool
     */
    public function hasSender(): bool
    {
        return $this->sender !== null;
    }

    /**
     * @return bool
     */
    public function hasFrom(): bool
    {
        return $this->from !== null;
    }

    /**
     * @return Content
     */
    public function content(): Content
    {
        return $this->content;
    }

    /**
     * @return AddressContainer
     */
    public function recipients(): AddressContainer
    {
        return $this->recipients;
    }

    /**
     * @return AddressContainer
     */
    public function ccs(): AddressContainer
    {
        return $this->ccs;
    }

    /**
     * @return AddressContainer
     */
    public function bccs(): AddressContainer
    {
        return $this->bccs;
    }

    /**
     * @return AttachmentContainer
     */
    public function attachments(): AttachmentContainer
    {
        return $this->attachments;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return AddressContainer
     */
    public function replyTos(): AddressContainer
    {
        return $this->replyTos;
    }
}
