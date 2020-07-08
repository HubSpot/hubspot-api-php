<?php

namespace Repositories;

use Helpers\RedisHelper;

class TokensRepository
{
    const HUBSPOT_TOKEN = 'HubSpotToken';
    const TRELLO_TOKEN = 'TrelloToken';

    public static function getToken(string $key = 'HubSpotToken'): array
    {
        return (array) json_decode(RedisHelper::getClient()->get($key));
    }

    public static function save(mixed $token, string $key = 'HubSpotToken')
    {
        RedisHelper::getClient()->set($key, json_encode($token));
    }
}
