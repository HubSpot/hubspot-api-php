<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateToken;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

if (!array_key_exists('id', $_GET)) {
    header('Location: /templates/list.php');
}

$property = [
    'name' => getValueOrNull('name', $_POST),
    'label' => getValueOrNull('label', $_POST),
    'propertyType' => getValueOrNull('propertyType', $_POST),
];

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $response = $hubSpot->crm()->timeline()->tokensApi()
        ->createEventTemplateToken($event_template_id, $app_id)
        ->createEventTypeProperty(
        $_ENV['HUBSPOT_APPLICATION_ID'],
        $_GET['id'],
        $property['name'],
        $property['label'],
        $property['propertyType']
    );

    if (HubspotClientHelper::isResponseSuccessful($response)) {
        header('Location: /templates/show.php?id='.$_GET['id']);
        exit();
    }
}

include __DIR__.'/../../../views/properties/form.php';
