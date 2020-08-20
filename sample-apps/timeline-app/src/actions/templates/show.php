<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
if (!array_key_exists('id', $_GET)) {
    header('Location: /templates/list');
}

$template = $hubSpot->crm()->timeline()->templatesApi()
    ->getById($_GET['id'], getEnvOrException('HUBSPOT_APPLICATION_ID'))
;

include __DIR__.'/../../views/templates/show.php';
