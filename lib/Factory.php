<?php

namespace HubSpot;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Objects\Configuration;

/**
 * Class Factory.
 *
 * @method \HubSpot\Factory\Objects objects()
 */
class Factory
{
    /** @var string */
    private $apiKey;

    /**
     * @param string $name
     * @param mixed  $args
     *
     * @return mixed
     */
    public function __call($name, $args)
    {
        $resource = '\\HubSpot\\Factory\\'.ucfirst($name);
        $configuration = '\\HubSpot\\Client\\Crm\\'.ucfirst($name).'\\Configuration';
        /** @var Configuration $config */
        $config = new $configuration();
        if (!empty($this->apiKey)) {
            $config->setApiKey('hapikey', $this->apiKey);
        }

        return new $resource(new Client(), $config);
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    public static function createWithApiKey($apiKey)
    {
        $factory = new static();
        $factory->setApiKey($apiKey);

        return $factory;
    }
}
