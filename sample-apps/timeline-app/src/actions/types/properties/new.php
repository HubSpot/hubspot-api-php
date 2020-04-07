<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
if (!array_key_exists('id', $_GET)) {
    header('Location: /types/list.php');
}
$property = [
    'name' => getValueOrNull('name', $_POST),
    'label' => getValueOrNull('label', $_POST),
    'propertyType' => getValueOrNull('propertyType', $_POST),
];

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $response = $hubSpot->timeline()->createEventTypeProperty(
        $_ENV['HUBSPOT_APPLICATION_ID'],
        $_GET['id'],
        $property['name'],
        $property['label'],
        $property['propertyType']
    );

    if (HubspotClientHelper::isResponseSuccessful($response)) {
        header('Location: /types/show.php?id='.$_GET['id']);
        exit();
    }
}

include __DIR__.'/../../../views/properties/form.php';
