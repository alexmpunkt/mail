<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08.12.16
 * Time: 20:54
 */

namespace Conversio\Mail\Attachment;

class AttachmentContainer
{

    /**
     * @var Attachment[]
     */
    private $attachments;

    /**
     * @param Attachment $attachment
     */
    public function addAttachment(Attachment $attachment)
    {
        $this->attachments[] = $attachment;
    }

    /**
     * @return Attachment[]
     */
    public function asArray()
    {
        return $this->attachments;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->attachments);
    }

}