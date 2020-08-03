<?php

namespace Repositories;

use Helpers\DBClientHelper;
use PDO;

class AssociationRepository
{
    const TABLE = 'associations';

    public static function create(string $dealId, string $cardId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('insert into '.static::TABLE.' (deal_id, card_id) values (?, ?)')
        ;
        $query->execute([$dealId, $cardId]);
    }

    public static function findOneByDealId(string $dealId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select * from '.static::TABLE.' where deal_id = ? limit 1')
        ;

        $query->execute([$dealId]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function findByCardId(string $cardId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select * from '.static::TABLE.' where card_id = ? ')
        ;

        $query->execute([$cardId]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countByCardId(string $cardId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select count(*) from '.static::TABLE.' where card_id = ?')
        ;

        $query->execute([$cardId]);

        return $query->fetchColumn();
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
