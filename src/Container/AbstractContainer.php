<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.12.16
 * Time: 20:57
 */
namespace Conversio\Mail\Container;

abstract class AbstractContainer
{
    /**
     * @var array
     */
    protected array $store = [];

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

    public function clear(): void
    {
        $this->store = [];
    }

}
