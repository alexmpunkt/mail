<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.12.16
 * Time: 21:04
 */

namespace Conversio\Mail\Tests;

use Conversio\Mail\Content;
use \PHPUnit_Framework_TestCase;

class ContentTest extends PHPUnit_Framework_TestCase
{
    public function testSetHtml()
    {
        $content = new Content();
        $content->setHtml('<b>Dies ist ein Text</b>');
        $this->assertEquals('<b>Dies ist ein Text</b>',$content->getHtml());
    }

    public function testSetText()
    {
        $content = new Content();
        $content->setText('Dies ist ein Text');
        $this->assertEquals('Dies ist ein Text',$content->getText());
    }
}