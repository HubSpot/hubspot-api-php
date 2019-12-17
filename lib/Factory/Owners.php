<?php

namespace HubSpot\Factory;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Owners\Configuration;

/**
 * @method \HubSpot\Client\Crm\Owners\Api\DefaultApi defaultApi()
 */
class Owners
{
    /** @var Client */
    private $client;

    /** @var Configuration */
    private $config;

    public function __construct($client, $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    /**
     * @param string $name
     * @param mixed  $args
     *
     * @return mixed
     */
    public function __call($name, $args)
    {
        $resource = '\\HubSpot\\Client\\Crm\\Owners\\Api\\'.ucfirst($name);

        return new $resource($this->client, $this->config);
    }
}
