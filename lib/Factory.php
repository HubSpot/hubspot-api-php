<?php

namespace HubSpot;

use GuzzleHttp\Client;
use HubSpot\Factory\Objects;

/**
 * Class Factory.
 *
 * @method Objects objects()
 */
class Factory
{
    /** @var Config */
    protected $config;

    public function __construct($config = null)
    {
        $this->config = $config ?: new Config();
    }

    /**
     * @param string $name
     * @param mixed  $args
     *
     * @return mixed
     */
    public function __call($name, $args)
    {
        $resource = '\\HubSpot\\Factory\\'.ucfirst($name);
        $clientConfigClassName = '\\HubSpot\\Client\\Crm\\'.ucfirst($name).'\\Configuration';

        $clientConfig = $this->config->convertToClientConfig($clientConfigClassName);

        return new $resource(new Client(), $clientConfig);
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Config $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
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
        $config = new Config();
        $config->setApiKey($apiKey);

        return new static($config);
    }

    public static function createWithAccessToken($accessToken)
    {
        $config = new Config();
        $config->setAccessToken($accessToken);

        return new static($config);
    }
}
