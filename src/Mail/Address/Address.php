<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07.12.16
 * Time: 22:14
 */

namespace Conversio\Mail\Address;

class Address
{
    /**
     * @var string $store
     */
    protected $store;

    /**
     * @var string $name
     */
    private $name;

    public function __construct(string $address, string $name = '')
    {
        $this->store = $address;
        $this->name  = $name;
    }

    /**
     * @return string
     */
    public function getStore(): string
    {
        return $this->store;
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
        return filter_var($this->store, FILTER_VALIDATE_EMAIL) !== false;
    }

}