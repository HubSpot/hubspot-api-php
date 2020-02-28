<?php

namespace Repositories;

use Helpers\RedisHelper;

class TokensRepository
{
    public static function getToken()
    {
        return (array) json_decode(RedisHelper::getClient()->get('token'));
    }

    public static function save(array $token)
    {
        RedisHelper::getClient()->set('token', json_encode($token));
    }
}
