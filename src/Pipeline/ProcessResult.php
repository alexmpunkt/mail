<?php

namespace Conversio\Mail\Pipeline;

use Exception;

/**
 * Class ProcessResult
 * @package Conversio\Mail\Pipeline
 */
final class ProcessResult
{
    public const SUCCEEDED = 'success';
    public const FAILED    = 'failed';
    public const ERRORED   = 'errored';

    private string $status;
    private array  $infos      = [];
    private array  $attributes = [];

    /**
     * @return ProcessResult
     */
    public static function new(): self
    {
        return new self();
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus(string $status): ProcessResult
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return bool
     */
    public function succeeded(): bool
    {
        return $this->status === self::SUCCEEDED;
    }

    /**
     * @return bool
     */
    public function failed(): bool
    {
        return $this->status === self::FAILED;
    }

    /**
     * @return bool
     */
    public function errored(): bool
    {
        return $this->status === self::ERRORED;
    }

    /**
     * @param string $key
     * @param string $info
     */
    public function addInfo(string $key, string $info): void
    {
        $this->infos[$key] = $info;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasInfoFor(string $key): bool
    {
        return array_key_exists($key, $this->infos);
    }

    /**
     * @param string $key
     *
     * @return string
     * @throws Exception
     */
    public function getInfo(string $key): string
    {
        if ($this->hasInfoFor($key)) {
            return $this->infos[$key];
        }
        throw new Exception(sprintf('no information available for %s', $key));
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function hasAttribute($key): bool
    {
        return array_key_exists($key, $this->attributes);
    }

    /**
     * @param $key
     *
     * @return mixed
     * @throws Exception
     */
    public function getAttribute($key)
    {
        if ($this->hasAttribute($key)) {
            return $this->attributes[$key];
        }
        throw new Exception(sprintf('no attribute set fpr %s', $key));
    }

    /**
     * @param $key
     * @param $value
     *
     * @return self
     */
    public function withAttribute($key, $value): self
    {
        $this->attributes[$key] = $value;

        return $this;
    }
}
