<?php

namespace Helpers;

use HubSpot\Discovery\Discovery;
use HubSpot\Factory;

class HubspotClientHelper
{
    const HTTP_OK = 200;

    public static function createFactory(): Discovery
    {
        if (OAuth2Helper::isAuthenticated()) {
            $accessToken = Oauth2Helper::refreshAndGetAccessToken();

            return Factory::createWithAccessToken($accessToken);
        }

        $apiKey = $_ENV['HUBSPOT_API_KEY'];
        if (!empty($apiKey)) {
            return Factory::createWithApiKey($apiKey);
        }

        throw new \Exception('Please specify API key or authorize via OAuth');
    }

    public static function getOAuth2Resource()
    {
    }

    public static function isResponseSuccessful(Response $response): bool
    {
        return self::HTTP_OK === $response->getStatusCode();
    }
}
