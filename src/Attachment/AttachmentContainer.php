<?php

namespace Conversio\Mail\Attachment;

use Conversio\Mail\Container\AbstractContainer;

/**
 * Class AttachmentContainer
 * @package Conversio\Mail\Attachment
 */
class AttachmentContainer extends AbstractContainer
{
    /**
     * @param AttachmentInterface $attachment
     */
    public function addAttachment(AttachmentInterface $attachment)
    {
        $this->store[] = $attachment;
    }

    /**
     * @return AttachmentInterface[]
     */
    public function asArray(): array
    {
        return parent::asArray();
    }
}