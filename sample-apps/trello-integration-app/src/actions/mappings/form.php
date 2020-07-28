<?php

use Helpers\HubspotClientHelper;
use Helpers\TrelloApi;
use Repositories\MappingsRepository;

$boardId = $_GET['board_id'];
$pipelineId = $_GET['pipeline_id'];

$board = TrelloApi::getBoard($boardId);
$lists = TrelloApi::getBoardList($boardId);

$pipeline = HubspotClientHelper::createFactory()
    ->crm()->pipelines()->pipelinesApi()->getById('deals', $pipelineId);

$mappings = MappingsRepository::findByBoardIdAndPipelineId($boardId, $pipelineId);

$mappings[] = [
    'id' => null,
    'board_list_id' => null,
    'pipeline_stage_id' => null,
];

include __DIR__.'/../../views/mappings/form.php';
