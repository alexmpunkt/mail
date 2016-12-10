<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07.12.16
 * Time: 22:13
 */

namespace Conversio\Mail\Address;

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
    public function asArray() : array
    {
        return $this->addresses;
    }

    /**
     * @return bool
     */
    public function isEmpty() : bool
    {
        return empty($this->addresses);
    }

    /**
     * @return int
     */
    public function size() : int
    {
        return count($this->addresses);
    }
}