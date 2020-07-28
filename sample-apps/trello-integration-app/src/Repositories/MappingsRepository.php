<?php

namespace Repositories;

use Helpers\DBClientHelper;

class MappingsRepository
{
    const TABLE = 'mappings';

    public static function create(string $dealId, string $cardId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('insert into '.static::TABLE.' (deal_id, card_id) values (?, ?)');
        
        $query->execute([$dealId, $cardId]);
    }

    public static function findByBoardIdAndPipelineId(string $boardId, string $pipelineId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select * from '.static::TABLE.' where board_id = ? and pipeline_id = ?');

        $query->execute([
            $boardId,
            $pipelineId,
        ]);

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
