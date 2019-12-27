<?php

namespace HubSpot;

use GuzzleHttp\Client;
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
    public static function create($config = null)
    {
        return new Discovery(new Client(), $config ?: new Config());
    }

    public static function createWithApiKey($apiKey)
    {
        $config = new Config();
        $config->setApiKey($apiKey);

        return static::create($config);
    }

    public static function createWithAccessToken($accessToken)
    {
        $config = new Config();
        $config->setAccessToken($accessToken);

        return static::create($config);
    }
}
