<?php

namespace HubSpot;

use GuzzleHttp\Client;

/**
 * Class Factory.
 *
 * @method \Swagger\Client\Api\SearchApi         searchApi()
 * @method \Swagger\Client\Api\CreateNativeObjectsApi createNativeObjectsApi
 */
class Factory
{
    /** @var Client */
    private $client;

    public function __construct()
    {
        $client = new Client([
            'base_uri' => 'https://api.hubapi.com/crm/v3/objects',
        ]);

        $this->client = $client;
    }

    /**
     * Return an instance of a Resource based on the method called.
     *
     * @param string $name
     * @param mixed $args
     *
     * @return mixed
     */
    public function __call($name, $args)
    {
        $resource = '\\Swagger\\Client\\Api\\'.ucfirst($name);

        return new $resource($this->client);
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }
}
