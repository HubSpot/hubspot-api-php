<?php

namespace Repositories;

use Helpers\DBClientHelper;

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

        return $query->fetch();
    }

    public static function delete(string $dealId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('delete from '.static::TABLE.' where deal_id = ?')
        ;

        $query->execute([
            $dealId,
        ]);
    }
}
