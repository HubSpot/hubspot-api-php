<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
if (!array_key_exists('template_id', $_GET) || !array_key_exists('name', $_GET)) {
    header('Location: /templates/list');
}

$response = $hubSpot->crm()->timeline()->tokensApi()
    ->archive(
        $_GET['template_id'],
        $_GET['name'],
        getEnvOrException('HUBSPOT_APPLICATION_ID')
    )
;

header('Location: /templates/show?id='.$_GET['template_id']);
