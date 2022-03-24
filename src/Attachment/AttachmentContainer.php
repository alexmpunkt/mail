<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08.12.16
 * Time: 20:54
 */

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
    public function addAttachment(AttachmentInterface $attachment): void
    {
        $this->store[] = $attachment;
    }
}
