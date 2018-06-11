<?php

namespace Conversio\Mail\Tests;

use Conversio\Mail\Content;
use PHPUnit\Framework\TestCase;

/**
 * Class ContentTest
 * @package Conversio\Mail\Tests
 */
class ContentTest extends TestCase
{
    public function testGetHtml()
    {
        $content = new Content();
        $this->assertEquals('', $content->getHtml());
        $this->assertFalse($content->hasHtmlContent());
        $content->setHtml('<b>Dies ist ein Text</b>');
        $this->assertEquals('<b>Dies ist ein Text</b>', $content->getHtml());
        $this->assertTrue($content->hasHtmlContent());
    }

    public function testGetText()
    {
        $content = new Content();
        $this->assertEquals('', $content->getText());
        $this->assertFalse($content->hasTextContent());
        $content->setText('Dies ist ein Text');
        $this->assertEquals('Dies ist ein Text', $content->getText());
        $this->assertTrue($content->hasTextContent());
    }
}