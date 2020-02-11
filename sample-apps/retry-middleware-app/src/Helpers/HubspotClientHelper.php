<?php

namespace Helpers;

use HubSpot\Discovery\Discovery;
use HubSpot\Factory;

class HubspotClientHelper
{
    public static function createFactory(): Discovery
    {
        if (OAuth2Helper::isAuthenticated()) {
            $accessToken = Oauth2Helper::refreshAndGetAccessToken();

            return Factory::createWithAccessToken($accessToken, static::getClient());
        }

        throw new \Exception('Please authorize via OAuth');
    }
    
    public static function getClient() : Client
    {
        $handlerStack = HandlerStack::create();
        $handlerStack->push(RetryMiddlewareFactory::createRateLimitMiddleware());
        
        return new Client(['handler' => $handlerStack]);
    }
}
