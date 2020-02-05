<?php

namespace HubSpot;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use HubSpot\Discovery\Discovery;

/**
 * Class Factory.
 */
class Factory
{
    /**
     * @param array $config
     *
     * @return Discovery
     */
    public static function create(ClientInterface $client = null, Config $config = null): Discovery
    {
        return new Discovery($client ?: new Client(), $config ?: new Config());
    }

    public static function createWithApiKey($apiKey): Discovery
    {
        $config = new Config();
        $config->setApiKey($apiKey);

        return static::create(null, $config);
    }

    public static function createWithAccessToken($accessToken): Discovery
    {
        $config = new Config();
        $config->setAccessToken($accessToken);

        return static::create(null, $config);
    }
}
