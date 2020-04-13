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
    
    $request = new TimelineEventTemplateToken();
    $request->setName($property['name']);
    $request->setLabel($property['label']);
    $request->setType($property['propertyType']);
    
    $hubSpot->crm()->timeline()->tokensApi()
        ->create(
            $_GET['id'],
            getEnvOrException('HUBSPOT_APPLICATION_ID'),
            $request
        );
    
    header('Location: /templates/show.php?id='.$_GET['id']);
}

include __DIR__.'/../../../views/properties/form.php';
