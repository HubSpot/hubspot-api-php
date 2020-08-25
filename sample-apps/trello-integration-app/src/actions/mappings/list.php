<?php

use Helpers\HubspotClientHelper;
use Helpers\TrelloApi;
use Repositories\MappingsRepository;

if (!isset($_GET['board_id']) || !isset($_GET['pipeline_id'])) {
    header('Location: /mappings/boards');
}

$boardId = $_GET['board_id'];
$pipelineId = $_GET['pipeline_id'];

$board = TrelloApi::getBoard($boardId);
$lists = TrelloApi::getBoardList($boardId);

$pipeline = HubspotClientHelper::createFactory()
    ->crm()->pipelines()->pipelinesApi()->getById('deals', $pipelineId);

$mappings = MappingsRepository::findByBoardIdAndPipelineId($boardId, $pipelineId);

include __DIR__.'/../../views/mappings/list.php';
