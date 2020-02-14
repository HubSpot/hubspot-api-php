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
     */
    public static function create(ClientInterface $client = null, Config $config = null): Discovery
    {
        return new Discovery($client ?: new Client(), $config ?: new Config());
    }

    public static function createWithApiKey(string $apiKey, ClientInterface $client = null): Discovery
    {
        $config = new Config();
        $config->setApiKey($apiKey);

        return static::create($client, $config);
    }

    public static function createWithAccessToken(string $accessToken, ClientInterface $client = null): Discovery
    {
        $config = new Config();
        $config->setAccessToken($accessToken);

        return static::create($client, $config);
    }
}
