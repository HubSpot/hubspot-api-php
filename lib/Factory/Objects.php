<?php

namespace HubSpot\Factory;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Objects\Api\AssociationsApi;
use HubSpot\Client\Crm\Objects\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Api\CreateNativeObjectsApi;
use HubSpot\Client\Crm\Objects\Api\SearchApi;
use HubSpot\Client\Crm\Objects\Configuration;

/**
 * Class Objects.
 *
 * @method AssociationsApi associationsApi()
 * @method BasicApi basicApi
 * @method BatchApi batchApi()
 * @method CreateNativeObjectsApi createNativeObjectsApi
 * @method SearchApi searchApi()
 */
class Objects
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
     * @return mixed
     */
    public function __call($name, $args)
    {
        $resource = '\\HubSpot\\Client\\Crm\\Objects\\Api\\'.ucfirst($name);

        return new $resource($this->client, $this->config);
    }
}
