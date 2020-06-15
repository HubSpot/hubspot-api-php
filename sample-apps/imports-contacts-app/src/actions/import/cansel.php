<?php

use Helpers\HubspotClientHelper;

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: /import/history');
    exit();
}

$import = HubspotClientHelper::createFactory()
    ->crm()->imports()->coreApi()->cancel($_GET['id']);

header('Location: /import/history');
