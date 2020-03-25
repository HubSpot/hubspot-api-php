<?php

namespace Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use HubSpot\Delay;
use HubSpot\Discovery\Discovery;
use HubSpot\Factory;
use HubSpot\RetryMiddlewareFactory;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

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
     * This function creates Client and suts up Retries Middlewares in it.
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

        $logger = new Logger('log');
        $logger->pushHandler(new StreamHandler('php://stdout'));

        $handlerStack->push(
            Middleware::log(
                $logger,
                new MessageFormatter(MessageFormatter::SHORT)
            )
        );

        return new Client(['handler' => $handlerStack]);
    }
}
