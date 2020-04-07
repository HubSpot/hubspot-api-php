<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
if (!array_key_exists('type_id', $_GET) || !array_key_exists('property_id', $_GET)) {
    header('Location: /types/list.php');
}

$response = $hubSpot->timeline()->deleteEventTypeProperty(
    $_ENV['HUBSPOT_APPLICATION_ID'],
    $_GET['type_id'],
    $_GET['property_id']
);

if (HubspotClientHelper::isEmptyResponseSuccessful($response)) {
    header('Location: /types/show.php?id='.$_GET['type_id']);
    exit();
}
