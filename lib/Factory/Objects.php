<?php

namespace HubSpot\Factory;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Objects\Configuration;

/**
 * Class Objects.
 *
 * @method \HubSpot\Client\Crm\Objects\Api\AssociationsApi associationsApi()
 * @method \HubSpot\Client\Crm\Objects\Api\BasicApi basicApi
 * @method \HubSpot\Client\Crm\Objects\Api\BatchApi batchApi()
 * @method \HubSpot\Client\Crm\Objects\Api\CreateNativeObjectsApi createNativeObjectsApi
 * @method \HubSpot\Client\Crm\Objects\Api\SearchApi searchApi()
 */
class Objects
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
     * @param mixed $args
     *
     * @return mixed
     */
    public function __call($name, $args)
    {
        $resource = '\\HubSpot\\Client\\Crm\\Objects\\Api\\'.ucfirst($name);

        return new $resource($this->client, $this->config);
    }
}
