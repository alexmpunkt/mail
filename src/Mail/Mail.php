<?php
namespace Conversio\Mail;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Address\AddressContainer;
use Conversio\Mail\Attachment\AttachmentContainer;
use DateTime;

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07.12.16
 * Time: 22:13
 */
class Mail
{
    /**
     * @var string $id
     */
    private $id = '';

    /**
     * @var Address
     */
    private $sender;

    /**
     * @var string
     */
    private $subject = '';

    /**
     * @var Content
     */
    private $content;

    /**
     * @var AddressContainer
     */
    private $recipients;

    /**
     * @var AddressContainer
     */
    private $ccs;

    /**
     * @var AddressContainer
     */
    private $bccs;

    /**
     * @var AttachmentContainer
     */
    private $attachments;

    /**
     * @var DateTime
     */
    private $createdAt;

    public function __construct(Address $sender, DateTime $createdAt = null)
    {
        $this->sender      = $sender;
        $this->content     = new Content();
        $this->recipients  = new AddressContainer();
        $this->ccs         = new AddressContainer();
        $this->bccs        = new AddressContainer();
        $this->attachments = new AttachmentContainer();
        $this->createdAt   = $createdAt !== null ? $createdAt : new DateTime();
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
     * @return Address
     */
    public function sender(): Address
    {
        return $this->sender;
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
    public function setId(string $id)
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
    public function setSubject(string $subject)
    {
        $this->subject = $subject;
    }

}