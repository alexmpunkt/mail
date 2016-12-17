<?php
namespace Conversio\Mail;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Address\AddressContainer;
use Conversio\Mail\Attachment\AttachmentContainer;

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
    private $id;

    /**
     * @var Address
     */
    private $sender;

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

    public function __construct(Address $sender)
    {
        $this->sender      = $sender;
        $this->content     = new Content();
        $this->recipients  = new AddressContainer();
        $this->ccs         = new AddressContainer();
        $this->bccs        = new AddressContainer();
        $this->attachments = new AttachmentContainer();
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

}