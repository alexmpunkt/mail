<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07.12.16
 * Time: 22:14
 */

namespace Conversio\Mail\Address;

/**
 * Class Address
 * @package Conversio\Mail\Address
 */
class Address
{
    /**
     * @var string $address
     */
    protected $address;

    /**
     * @var string $name
     */
    private $name;

    /**
     * Address constructor.
     *
     * @param string $address
     * @param string $name
     */
    public function __construct(string $address, string $name = '')
    {
        $this->address = strtolower(trim($address));
        $this->name    = trim($name);
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
    public function isValid(): bool
    {
        return filter_var($this->address, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Checks, if the given addresses are equal. this only includes the address, the name is being ignored
     *
     * @param Address $address
     *
     * @return bool
     */
    public function equals(Address $address): bool
    {
        return $this->getAddress() === $address->getAddress();
    }
}