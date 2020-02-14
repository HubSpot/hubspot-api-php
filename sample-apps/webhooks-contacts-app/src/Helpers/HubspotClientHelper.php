<?php

namespace Helpers;

use HubSpot\Discovery\Discovery;
use HubSpot\Factory;

class HubspotClientHelper
{
    public static function createFactory(): Discovery
    {
        if (OAuth2Helper::isAuthenticated()) {
            $accessToken = OAuth2Helper::refreshAndGetAccessToken();

            return Factory::createWithAccessToken($accessToken);
        }

        $apiKey = $_ENV['HUBSPOT_API_KEY'];
        if (!empty($apiKey)) {
            return Factory::createWithApiKey($apiKey);
        }

        throw new \Exception('Please specify API key or authorize via OAuth');
    }
}
