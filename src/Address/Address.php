<?php

namespace Conversio\Mail\Address;

/**
 * Class Address
 * @package Conversio\Mail\Address
 */
class Address implements \JsonSerializable
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
    public function equals(self $address): bool
    {
        return $this->getAddress() === $address->getAddress();
    }

    /**
     * Specify data which should be serialized to JSON
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}