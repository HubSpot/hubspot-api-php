<?php

namespace Repositories;

use Helpers\DBClientHelper;
use Helpers\OAuth2Helper;
use PDO;

class TokensRepository
{
    public static function getToken()
    {
        $query = DBClientHelper::getClient()
            ->query('select * from tokens order by id desc limit 1')
        ;

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function insert(array $token)
    {
        $db = DBClientHelper::getClient();
        $query = $db->prepare('insert into tokens (refresh_token, access_token, expires_in, expires_at) values (?, ?, ?, ?)');
        $query->execute([
            $token['refresh_token'],
            $token['access_token'],
            $token['expires_in'],
            OAuth2Helper::getExpiresAt($token['expires_in']),
        ]);
    }

    public static function update(array $token)
    {
        $db = DBClientHelper::getClient();
        $query = $db->prepare('update tokens set refresh_token = ?, access_token = ?, expires_in = ?, expires_at = ? where id = ?');
        $query->execute([
            $token['refresh_token'],
            $token['access_token'],
            $token['expires_in'],
            OAuth2Helper::getExpiresAt($token['expires_in']),
            $token['id'],
        ]);
    }

    public static function save(array $token)
    {
        $savedToken = static::getToken();
        if ($savedToken) {
            $token['id'] = $savedToken['id'];
            static::update($token);
        } else {
            static::insert($token);
        }
    }
}
