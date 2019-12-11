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
    const API_KEY_IDENTIFIED = 'hapikey';

    /** @var string */
    private $apiKey;

    /** @var string */
    private $accessToken;

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
        if (null !== $this->apiKey) {
            $config->setApiKey(static::API_KEY_IDENTIFIED, $this->apiKey);
        }
        if (null !== $this->accessToken) {
            $config->setAccessToken($this->accessToken);
        }

        return new $resource(new Client(), $config);
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
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

    public static function createWithAccessToken($accessToken)
    {
        $factory = new static();
        $factory->setAccessToken($accessToken);

        return $factory;
    }
}
