<?php

namespace Recca0120\Config\Repositories;

use ArrayAccess;
use Illuminate\Contracts\Config\Repository as RepositoryContract;

/**
 * AbstractRepository.
 */
abstract class AbstractRepository implements ArrayAccess, RepositoryContract
{
    /**
     * $config.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * __construct.
     *
     * @method __construct
     *
     * @param \Illuminate\Contracts\Config\Repository $config [description]
     */
    public function __construct(RepositoryContract $config)
    {
        $this->config = $config;
    }

    /**
     * Determine if the given configuration value exists.
     *
     * @param string $key
     *
     * @return bool
     */
    public function has($key)
    {
        return $this->config->has($key);
    }

    /**
     * Get the specified configuration value.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->config->get($key, $default);
    }

    /**
     * Get all of the configuration items for the application.
     *
     * @return array
     */
    public function all()
    {
        return $this->config->all();
    }

    /**
     * Set a given configuration value.
     *
     * @param array|string $key
     * @param mixed        $value
     *
     * @return void
     */
    public function set($key, $value = null)
    {
        $this->config->set($key, $value);
    }

    /**
     * Prepend a value onto an array configuration value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public function prepend($key, $value)
    {
        return $this->config->prepend($key, $value);
    }

    /**
     * Push a value onto an array configuration value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public function push($key, $value)
    {
        return $this->config->push($key, $value);
    }

    /**
     * Determine if the given configuration option exists.
     *
     * @param string $key
     *
     * @return bool
     */
    public function offsetExists($key)
    {
        return $this->has($key);
    }

    /**
     * Get a configuration option.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->get($key);
    }

    /**
     * Set a configuration option.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }

    /**
     * Unset a configuration option.
     *
     * @param string $key
     *
     * @return void
     */
    public function offsetUnset($key)
    {
        $this->set($key, null);
    }
}