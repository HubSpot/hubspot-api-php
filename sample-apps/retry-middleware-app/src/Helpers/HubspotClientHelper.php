<?php

namespace Helpers;

use HubSpot\Discovery\Discovery;
use HubSpot\Factory;
use HubSpot\RetryMiddlewareFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\HandlerStack;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

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
        
        $logger = new Logger('log');
        $logger->pushHandler(new StreamHandler("php://stdout"));

        $handlerStack->push(
            Middleware::log(
                $logger,
                new MessageFormatter(MessageFormatter::SHORT)
            )
        );
        
        return new Client(['handler' => $handlerStack]);
    }
}
