<?php

namespace Repositories;

use Helpers\DBClientHelper;
use PDO;

class WebhooksRepository
{
    const TABLE = 'card_webhooks';

    public static function findOneByCardId(string $cardId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select * from '.static::TABLE.' where card_id = ? limit 1')
        ;

        $query->execute([$cardId]);

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

    public static function insert(string $cardId, string $webhookId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('insert into '.static::TABLE.' (card_id, webhook_id) values (?, ?)')
        ;
        
        $query->execute([
            $cardId,
            $webhookId,
        ]);
    }
    
    public static function delete(int $id)
    {
        $query = DBClientHelper::getClient()
            ->prepare('delete from '.static::TABLE.' where id = ?')
        ;

        $query->execute([
            $id,
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
