<?php

namespace Conversio\Mail\Tests\Address;

use Codeception\Specify;
use Conversio\Mail\Address\Address;
use PHPUnit\Framework\TestCase;

/**
 * Class AddressTest
 * @package Conversio\Mail\Tests\Address
 */
class AddressTest extends TestCase
{
    use Specify;

    public function testGetAddress()
    {
        $address = new Address('myaddress@test.de');
        $this->assertEquals('myaddress@test.de', $address->getAddress());

        $address = new Address('');
        $this->assertEquals('', $address->getAddress());
    }

    public function testGetName()
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

    public function testEquals()
    {
        $this->specify('Adresses are not equal', function () {
            $address1 = new Address('test@test.de', 'John Doe');
            $address2 = new Address('mymail@test.de', 'John Doe');
            $this->assertFalse($address1->equals($address2));
            $this->assertFalse($address2->equals($address1));
        });

        $this->specify('Adresses and namnes are equal', function () {
            $address1 = new Address('test@test.de', 'John Doe');
            $address2 = new Address('test@test.de', 'John Doe');
            $this->assertTrue($address1->equals($address2));
            $this->assertTrue($address2->equals($address1));
        });

        $this->specify('Adresses are equal, names are not', function () {
            $address1 = new Address('test@test.de', 'John Doe');
            $address2 = new Address('test@test.de', 'James Doe');
            $this->assertTrue($address1->equals($address2));
            $this->assertTrue($address2->equals($address1));
        });
    }
}