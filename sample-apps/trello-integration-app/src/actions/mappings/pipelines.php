<?php

use Helpers\HubspotClientHelper;

if (!isset($_GET['board_id'])) {
    header('Location: /mappings/boards');
}

$boardId = $_GET['board_id'];

$pipelines = HubspotClientHelper::createFactory()
    ->crm()->pipelines()->pipelinesApi()->getAll('deals');

include __DIR__.'/../../views/mappings/pipelines.php';
