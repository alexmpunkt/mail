<?php

namespace Conversio\Mail;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Address\AddressContainer;
use Conversio\Mail\Attachment\AttachmentContainer;
use DateTime;
use Exception;

/**
 * Class Mail
 * @package Conversio\Mail
 */
class Mail
{
    /**
     * @var string $id
     */
    private string $id = '';

    /**
     * @var Address|null
     */
    private ?Address $sender = null;

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
     * @var DateTime
     */
    private DateTime $createdAt;

    /**
     * @var AddressContainer
     */
    private AddressContainer $replyTos;

    /**
     * Mail constructor.
     *
     * @param DateTime|null $createdAt
     */
    public function __construct(DateTime $createdAt = null)
    {
        $this->content     = new Content();
        $this->recipients  = new AddressContainer();
        $this->ccs         = new AddressContainer();
        $this->bccs        = new AddressContainer();
        $this->replyTos    = new AddressContainer();
        $this->attachments = new AttachmentContainer();
        $this->createdAt   = $createdAt ?? new DateTime();
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
        if (!$this->isSenderSet()) {
            throw new Exception('There is no sender given');
        }

        return $this->sender;
    }

    /**
     * @return bool
     */
    public function isSenderSet(): bool
    {
        return $this->sender !== null;
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
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
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
