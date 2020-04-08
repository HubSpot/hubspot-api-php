<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
// https://developers.hubspot.com/docs/methods/timeline/get-event-types
$response = $hubSpot->crm()->timeline()->templatesApi()
    ->getAllEventTemplates(getEnvOrException('HUBSPOT_APPLICATION_ID'));

if (!HubspotClientHelper::isResponseSuccessful($response)) {
    throw new Exception($response->getReasonPhrase());
}

$types = $response->getData();
include __DIR__.'/../../views/types/list.php';
