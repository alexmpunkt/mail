<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.12.16
 * Time: 21:22
 */
namespace Conversio\Mail\Attachment\Persistence;

use Conversio\Mail\Attachment\AttachmentInterface;
use League\Flysystem\File;

class FileAttachment implements AttachmentInterface
{
    /**
     * @var File
     */
    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function getMimeType(): string
    {
        return $this->file->getMimetype();
    }

    public function getContent(): string
    {
        return $this->file->read();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->file->getPath();
    }

    public function getExtension(): string
    {
        return basename($this->file->getPath());
    }

    public function getFullname(): string
    {
        return $this->getName() . '.' . $this->getExtension();
    }

}