<?php

namespace Repositories;

use Helpers\DBClientHelper;
use PDO;

class WebhooksRepository
{
    const TABLE = 'card_webhooks';

    public static function getAllWithAssociations()
    {
        $query = DBClientHelper::getClient()
            ->query('select distinct '.static::TABLE.'.id , '.AssociationRepository::TABLE.'.card_id, '.static::TABLE.'.webhook_id from '.AssociationRepository::TABLE.' left join  '.static::TABLE.' on '.AssociationRepository::TABLE.'.card_id = '.static::TABLE.'.card_id;')
        ;

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findOneByCardId(string $cardId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select * from '.static::TABLE.' where card_id = ? limit 1')
        ;

        $query->execute([$cardId]);

        return $query->fetch(PDO::FETCH_ASSOC);
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

    public static function update(int $id, string $webhookId)
    {
        $db = DBClientHelper::getClient();
        $query = $db->prepare('update '.static::TABLE.' set webhook_id = ? where id = ?');

        $query->execute([
            $webhookId,
            $id,
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
}
