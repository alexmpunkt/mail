<?php

namespace Conversio\Mail;

/**
 * Class Content
 * @package Conversio\Mail
 */
class Content
{
    /**
     * @var string
     */
    private string $html = '';

    /**
     * @var string
     */
    private string $text = '';

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * @param string $html
     */
    public function setHtml(string $html): void
    {
        $this->html = $html;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return bool
     */
    public function hasHtmlContent(): bool
    {
        return $this->html !== '';
    }

    /**
     * @return bool
     */
    public function hasTextContent(): bool
    {
        return $this->text !== '';
    }
}
