<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07.12.16
 * Time: 22:13
 */

namespace Conversio\Address;

class AddressContainer
{
    /**
     * @var Address[] $addresses
     */
    private $addresses = [];

    public function addAddress(Address $address)
    {
        $this->addresses[] = $address;
    }

    /**
     * @return Address[]
     */
    public function asArray()
    {
        return $this->addresses;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->addresses);
    }
}