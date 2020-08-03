<?php

namespace Repositories;

use Helpers\DBClientHelper;
use PDO;

class SettingsRepository
{
    const TABLE = 'settings';

    const HUBSPOT_TOKEN = 'HubSpotToken';
    const TRELLO_TOKEN = 'TrelloToken';
    const INIT_URL = 'InitUrl';

    public static function getSettingData(string $name)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select * from '.static::TABLE.' where name = ? limit 1')
        ;

        $query->execute([$name]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function getSetting(string $name)
    {
        $response = static::getSettingData($name);

        if (!empty($response)) {
            return $response['data'];
        }

        return null;
    }

    public static function insert(string $name, string $data)
    {
        $query = DBClientHelper::getClient()
            ->prepare('insert into '.static::TABLE.' (name, data) values (?, ?)')
        ;
        $query->execute([
            $name,
            $data,
        ]);
    }

    public static function update(string $name, string $data)
    {
        $db = DBClientHelper::getClient();
        $query = $db->prepare('update '.static::TABLE.' set data = ? where name = ?');

        $query->execute([
            $data,
            $name,
        ]);
    }

    public static function save(string $name, string $data)
    {
        if (!empty(static::getSettingData($name))) {
            static::update($name, $data);
        } else {
            static::insert($name, $data);
        }
    }
}
