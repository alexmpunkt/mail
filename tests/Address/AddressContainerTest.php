<?php

namespace Conversio\Mail\Tests\Address;

use Conversio\Mail\Address\Address;
use Conversio\Mail\Address\AddressContainer;
use PHPUnit\Framework\TestCase;

/**
 * Class AddressContainerTest
 * @package Conversio\Mail\Tests\Address
 */
class AddressContainerTest extends TestCase
{
    public function testIsEmpty()
    {
        $container = new AddressContainer();
        $this->assertTrue($container->isEmpty());
    }

    public function testIsNotEmpty()
    {
        $address   = new Address('test@test.de', 'Max Mustermann');
        $container = new AddressContainer();
        $container->addAddress($address);
        $this->assertFalse($container->isEmpty());
    }

    public function testAddAddress()
    {
        $address   = new Address('test@test.de', 'Max Mustermann');
        $address2  = new Address('test2@test.de', 'Max Mustermann');
        $container = new AddressContainer();
        $container->addAddress($address);
        $this->assertEquals(1, $container->count());
        $container->addAddress($address2);
        $this->assertEquals(2, $container->count());
    }

    public function testSize()
    {
        $address   = new Address('test@test.de', 'Max Mustermann');
        $address2  = new Address('test2@test.de', 'Max Mustermann');
        $address3  = new Address('test3@test.de', 'Max Mustermann');
        $container = new AddressContainer();
        $container->addAddress($address);
        $this->assertEquals(1, $container->count());
        $container->addAddress($address2);
        $this->assertEquals(2, $container->count());
        $container->addAddress($address3);
        $this->assertEquals(3, $container->count());
    }

    public function testAsArray()
    {
        $container = new AddressContainer();
        $this->assertEquals([], $container->asArray());

        $address  = new Address('test@test.de', 'Max Mustermann');
        $address2 = new Address('test2@test.de', 'Max Mustermann');
        $address3 = new Address('test3@test.de', 'Max Mustermann');
        $container->addAddress($address);
        $container->addAddress($address2);
        $container->addAddress($address3);

        $this->assertCount(3, $container->asArray());
    }

    public function testClear()
    {
        $container = new AddressContainer();
        $container->addAddress(new Address('test@example.com', 'Testmail'));
        $this->assertEquals(1, $container->count());

        $container->clear();
        $this->assertEquals(0, $container->count());
    }
}