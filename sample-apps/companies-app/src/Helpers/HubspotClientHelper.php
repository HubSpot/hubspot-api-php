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

            return Factory::createWithAccessToken($accessToken);
        }

        if (!empty($_ENV['HUBSPOT_API_KEY'])) {
            return Factory::createWithApiKey($_ENV['HUBSPOT_API_KEY']);
        }

        throw new \Exception('Please specify API key or authorize via OAuth');
    }
}
