<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

if (array_key_exists('id', $_GET)) {
    $response = $hubSpot->timeline()->deleteEventType($_ENV['HUBSPOT_APPLICATION_ID'], intval($_GET['id']));

    if (!HubspotClientHelper::isEmptyResponseSuccessful($response)) {
        throw new Exception($response->getReasonPhrase());
    }
}

header('Location: /templates/list.php');
