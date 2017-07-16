<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.12.16
 * Time: 21:04
 */

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
        $this->assertEquals('',$content->getHtml());
        $content->setHtml('<b>Dies ist ein Text</b>');
        $this->assertEquals('<b>Dies ist ein Text</b>', $content->getHtml());
    }

    public function testGetText()
    {
        $content = new Content();
        $this->assertEquals('',$content->getText());
        $content->setText('Dies ist ein Text');
        $this->assertEquals('Dies ist ein Text', $content->getText());
    }
}