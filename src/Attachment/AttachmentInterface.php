<?php

namespace Conversio\Mail\Attachment;

/**
 * Interface AttachmentInterface
 * @package Conversio\Mail\Attachment
 */
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