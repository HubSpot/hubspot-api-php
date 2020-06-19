<?php

namespace Helpers;

use Predis\Client;

class RedisHelper
{
    protected static $client = null;

    public static function getClient(): Client
    {
        if (empty(static::$client)) {
            static::$client = new Client([
                'scheme' => 'tcp',
                'host' => $_ENV['REDIS_HOST'],
                'port' => $_ENV['REDIS_PORT'],
            ]);

            static::$client->connect();
        }

        return static::$client;
    }
}
