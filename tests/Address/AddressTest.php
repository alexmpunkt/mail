<?php
namespace Conversio\Mail\Tests\Address;

use Conversio\Mail\Address\Address;

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08.12.16
 * Time: 21:42
 */
class AddressTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAddress()
    {
        $address = new Address('myaddress@test.de');
        $this->assertEquals('myaddress1@test.de', $address->getAddress());

        $address = new Address('');
        $this->assertEquals('', $address->getAddress());
    }

    public function testGetGetName()
    {
        $address = new Address('myaddress@test.de');
        $this->assertEquals('', $address->getName());

        $address = new Address('myaddress@test.de', 'Max Mustermann');
        $this->assertEquals('Max Mustermann', $address->getName());
    }

    public function testisValid()
    {
        $address = new Address('myaddress@test.de');
        $this->assertTrue($address->isValid());

        $address = new Address('myaddress(at)test.de');
        $this->assertFalse($address->isValid());

        $address = new Address('myaddress@test.de.com');
        $this->assertTrue($address->isValid());
    }

}