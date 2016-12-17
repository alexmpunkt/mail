<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08.12.16
 * Time: 20:54
 */

namespace Conversio\Mail\Attachment;

use Conversio\Mail\Container\AbstractContainer;

class AttachmentContainer extends AbstractContainer
{

    /**
     * @param AttachmentInterface $attachment
     */
    public function addAttachmentInterface(AttachmentInterface $attachment)
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