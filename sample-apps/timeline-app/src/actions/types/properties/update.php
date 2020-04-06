<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
if (!array_key_exists('type_id', $_GET) || !array_key_exists('property_id', $_GET)) {
    header('Location: /types/list.php');
}

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $property = [
        'name' => getValueOrNull('name', $_POST),
        'label' => getValueOrNull('label', $_POST),
        'propertyType' => getValueOrNull('propertyType', $_POST),
    ];
    $response = $hubSpot->timeline()->updateEventTypeProperty(
        $_ENV['HUBSPOT_APPLICATION_ID'],
        $_GET['type_id'],
        $_GET['property_id'],
        $property['name'],
        $property['label'],
        $property['propertyType']
    );

    if (HubspotClientHelper::isResponseSuccessful($response)) {
        header('Location: /types/show.php?id='.$_GET['type_id']);
        exit();
    }
} else {
    $response = $hubSpot->timeline()->getEventTypeProperties($_ENV['HUBSPOT_APPLICATION_ID'], $_GET['type_id']);
    if (!HubspotClientHelper::isResponseSuccessful($response)) {
        throw new Exception($response->getReasonPhrase());
    }

    foreach ($response->getData() as $propertyStd) {
        if ($propertyStd->id == $_GET['property_id']) {
            $property = (array) $propertyStd;

            break;
        }
    }
}

include __DIR__.'/../../../views/properties/form.php';
