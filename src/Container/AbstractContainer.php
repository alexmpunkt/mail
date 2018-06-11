<?php

namespace Conversio\Mail\Container;

/**
 * Class AbstractContainer
 * @package Conversio\Mail\Container
 */
abstract class AbstractContainer
{
    /**
     * @var array
     */
    protected $store = [];

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->store);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->store);
    }

    /**
     * @return array
     */
    public function asArray(): array
    {
        return $this->store;
    }
}