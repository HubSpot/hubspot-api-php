<?php

use Helpers\HubspotClientHelper;

$history = HubspotClientHelper::createFactory()
    ->crm()->imports()->coreApi()->getPage();

include __DIR__.'/../../views/imports/history.php';
