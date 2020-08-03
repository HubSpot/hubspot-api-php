<?php

namespace Repositories;

use Helpers\DBClientHelper;
use PDO;

class MappingsRepository
{
    const TABLE = 'mappings';

    public static function create(string $boardId, string $listId, string $pipelineId, string $stageId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('insert into '.static::TABLE.' (board_id, board_list_id, pipeline_id, pipeline_stage_id) values (?, ?, ?, ?)')
        ;

        $query->execute([$boardId, $listId, $pipelineId, $stageId]);
    }

    public static function findOneByBoardListIdAndPipelineId(string $boardListId, string $pipelineId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select * from '.static::TABLE.' where board_list_id = ? and pipeline_id = ? limit 1')
        ;

        $query->execute([
            $boardListId,
            $pipelineId,
        ]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function findByBoardIdAndPipelineId(string $boardId, string $pipelineId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select * from '.static::TABLE.' where board_id = ? and pipeline_id = ?')
        ;

        $query->execute([
            $boardId,
            $pipelineId,
        ]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
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
