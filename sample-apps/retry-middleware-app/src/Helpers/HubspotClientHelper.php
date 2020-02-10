<?php

namespace Helpers;

use HubSpot\Discovery\Discovery;
use HubSpot\Factory;
use HubSpot\RetryMiddlewareFactory;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;

class HubspotClientHelper
{
    public static function createFactory(): Discovery
    {
        $apiKey = $_ENV['HUBSPOT_API_KEY'];
        if (!empty($apiKey)) {
            return Factory::createWithApiKey($apiKey, static::getClient());
        }

        throw new \Exception('Please specify API key or authorize via OAuth');
    }
    
    public static function getClient() : Client
    {
        $handlerStack = HandlerStack::create();
        $handlerStack->push(RetryMiddlewareFactory::createRateLimitMiddleware());
        
        return new Client(['handler' => $handlerStack]);
    }
}
