<?php
namespace Conversio\Mail;

use Conversio\Address\Address;
use Conversio\Address\AddressContainer;
use Conversio\Attachment\AttachmentContainer;

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07.12.16
 * Time: 22:13
 */
class Mail
{

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
    public function getContent(): Content
    {
        return $this->content;
    }

    /**
     * @return AddressContainer
     */
    public function getRecipients(): AddressContainer
    {
        return $this->recipients;
    }

    /**
     * @return Address
     */
    public function getSender(): Address
    {
        return $this->sender;
    }

    /**
     * @return AddressContainer
     */
    public function getCcs(): AddressContainer
    {
        return $this->ccs;
    }

    /**
     * @return AddressContainer
     */
    public function getBccs(): AddressContainer
    {
        return $this->bccs;
    }

}