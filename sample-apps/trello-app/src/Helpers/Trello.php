<?php

namespace Helpers;

use Repositories\TokensRepository;

class Trello {
    
    public static function getAuthUrl(
        string $key,
        string $return_url,
        string $name = 'HubSpot',
        string $expiration = '30days',
        string $scope = 'read',
        string $response_type = 'token'
    ): string
    {
        return 'https://trello.com/1/authorize?'.http_build_query([
            'key' => $key,
            'return_url' => $return_url,
            'name' => $name,
            'expiration' => $expiration,
            'scope' => $scope,
            'response_type' => $response_type
        ]);
    }
    
    public static function isAuthenticated(): bool
    {
        return !empty(TokensRepository::getToken(TokensRepository::TRELLO_TOKEN));
    }
}
