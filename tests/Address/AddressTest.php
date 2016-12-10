<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08.12.16
 * Time: 21:42
 */
use Conversio\Address\Address;

class AddressTest extends PHPUnit_Framework_TestCase
{
    public function testGetName()
    {
        $address = new Address('myaddress@test.de');
        $this->assertEquals('myaddress@test.de', $address->getAddress());

        $address = new Address('');
        $this->assertEquals('', $address->getAddress());
    }
}