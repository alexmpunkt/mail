<?php

namespace Conversio\Mail\Address;

use Conversio\Mail\Container\AbstractContainer;

/**
 * Class AddressContainer
 * @package Conversio\Mail\Address
 */
class AddressContainer extends AbstractContainer
{
    /**
     * @param Address $address
     */
    public function addAddress(Address $address): void
    {
        $this->store[] = $address;
    }
}
