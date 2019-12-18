<?php

namespace HubSpot\Factory;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Owners\Configuration;
use ReflectionClass;
use ReflectionException;

class Base
{
    /** @var Client */
    protected $client;

    /** @var Configuration */
    protected $config;

    public function __construct($client, $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    /**
     * @param string $name
     * @param mixed  $args
     *
     * @throws ReflectionException
     *
     * @return mixed
     */
    public function __call($name, $args)
    {
        $className = (new ReflectionClass(get_class($this)))->getShortName();
        $resource = '\\HubSpot\\Client\\Crm\\'.$className.'\\Api\\'.ucfirst($name);

        return new $resource($this->client, $this->config);
    }
}
