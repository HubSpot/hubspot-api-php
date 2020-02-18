<?php

namespace Helpers;

use Predis\Client;

class RedisHelper {
    protected static $client = null;
    
    public static function getClient(): Client
    {
        if (empty(static::$client)) {
            static::$client = new Client([
                'scheme' => 'tcp',
                'host'   => 'redis',
                'port'   => 6379,
            ]);

            static::$client->connect();
        }
        return static::$client;
    }
}
