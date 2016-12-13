<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07.12.16
 * Time: 22:13
 */

namespace Conversio\Mail\Address;

use Conversio\Mail\Container\AbstractContainer;

class AddressContainer extends AbstractContainer
{
    /**
     * @var Address[] $store
     */
    protected $store = [];

    public function addAddress(Address $address)
    {
        $this->store[] = $address;
    }

    /**
     * @return Address[]
     */
    public function asArray(): array
    {
        return parent::asArray();
    }

}