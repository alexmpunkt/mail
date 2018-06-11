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
    private $html = '';

    /**
     * @var string
     */
    private $text = '';

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
    public function setHtml(string $html)
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
    public function setText(string $text)
    {
        $this->text = $text;
    }
}