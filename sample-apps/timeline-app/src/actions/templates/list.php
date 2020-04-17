<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

$response = $hubSpot->crm()->timeline()->templatesApi()
    ->getAll(getEnvOrException('HUBSPOT_APPLICATION_ID'))
;

include __DIR__.'/../../views/templates/list.php';
