<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.12.16
 * Time: 21:10
 */

namespace Conversio\Mail\Attachment;

interface AttachmentInterface
{
    /**
     * @return string
     */
    public function getMimeType(): string;

    /**
     * @return string
     */
    public function getContent(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getExtension(): string;

    /**
     * @return string
     */
    public function getFullname(): string;

}