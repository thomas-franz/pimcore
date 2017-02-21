<?php

namespace Pimcore\Bundle\PimcoreAdminBundle\Session;

use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

class AdminSessionStorageFactory
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $defaultOptions = [
        'name'             => 'pimcore_admin_sid',
        'use_trans_sid'    => false,
        'use_only_cookies' => false,
        'cookie_httponly'  => true
    ];

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->defaultOptions, $options);
    }

    /**
     * @return NativeSessionStorage
     */
    public function createStorage()
    {
        return new NativeSessionStorage($this->options);
    }

    /**
     * @param NativeSessionStorage $storage
     */
    public function initializeStorage(NativeSessionStorage $storage)
    {
        $storage->setOptions($this->options);
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function getOption($name)
    {
        return isset($this->options[$name]) ? $this->options[$name] : null;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
