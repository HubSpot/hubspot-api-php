<?php

use Helpers\HubspotClientHelper;
use Helpers\TrelloApi;

$board = TrelloApi::getBoard($_GET['board_id']);

$pipeline = HubspotClientHelper::createFactory()
    ->crm()->pipelines()->pipelinesApi()->getById('deals', $_GET['pipeline_id']);

include __DIR__.'/../../views/mappings/form.php';
