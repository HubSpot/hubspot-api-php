<?php

namespace Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use HubSpot\Delay;
use HubSpot\Discovery\Discovery;
use HubSpot\Factory;
use HubSpot\RetryMiddlewareFactory;

class HubspotClientHelper
{
    public static function createFactory(): Discovery
    {
        if (OAuth2Helper::isAuthenticated()) {
            $accessToken = OAuth2Helper::refreshAndGetAccessToken();

            return Factory::createWithAccessToken($accessToken, static::getClient());
        }

        throw new \Exception('Please authorize via OAuth');
    }

    /**
     * This function creates Client and sets up Retries Middlewares in it.
     */
    public static function getClient(): Client
    {
        $handlerStack = HandlerStack::create();
        $handlerStack->push(
            RetryMiddlewareFactory::createRateLimitMiddleware(
                Delay::getConstantDelayFunction()
            )
        );

        $handlerStack->push(
            RetryMiddlewareFactory::createInternalErrorsMiddleware(
                Delay::getExponentialDelayFunction(2)
            )
        );

        return new Client(['handler' => $handlerStack]);
    }
}
