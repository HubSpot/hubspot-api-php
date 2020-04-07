<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
if (!array_key_exists('id', $_GET)) {
    header('Location: /types/list.php');
}

$response = $hubSpot->timeline()->getEventTypeById($_ENV['HUBSPOT_APPLICATION_ID'], intval($_GET['id']));
if (!HubspotClientHelper::isResponseSuccessful($response)) {
    throw new Exception($response->getReasonPhrase());
}
$type = $response->getData();

//http://developers.hubspot.com/docs/methods/timeline/get-timeline-event-type-properties
$propertiesResponse = $hubSpot->timeline()->getEventTypeProperties($_ENV['HUBSPOT_APPLICATION_ID'], intval($_GET['id']));
if (!HubspotClientHelper::isResponseSuccessful($propertiesResponse)) {
    throw new Exception($propertiesResponse->getReasonPhrase());
}
$properties = $propertiesResponse->getData();

include __DIR__.'/../../views/types/show.php';
