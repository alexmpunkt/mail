<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07.12.16
 * Time: 22:14
 */

namespace Conversio\Address;

class Address
{
    /**
     * @var string $address
     */
    private $address;

    /**
     * @var string $name
     */
    private $name;

    public function __construct(string $address, string $name = '')
    {
        $this->address = $address;
        $this->name    = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return filter_var($this->address, FILTER_VALIDATE_EMAIL);
    }

}