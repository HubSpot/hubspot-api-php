<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateCreateRequest;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
$type = [
    'name' => getValueOrNull('name', $_POST),
    'headerTemplate' => getValueOrNull('headerTemplate', $_POST),
    'detailTemplate' => getValueOrNull('detailTemplate', $_POST),
    'objectType' => getValueOrNull('objectType', $_POST),
];

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $request = new TimelineEventTemplateCreateRequest();
    $request->setName($type['name']);
    $request->setHeaderTemplate($type['headerTemplate']);
    $request->setDetailTemplate($type['detailTemplate']);
    $request->setObjectType($type['objectType']);
    
    $response = $hubSpot->crm()->timeline()->templatesApi()
        ->createEventTemplate(
            getEnvOrException('HUBSPOT_APPLICATION_ID'),
            $request
        );

    header('Location: /templates/show.php?id='.$response->getId());
}

include __DIR__.'/../../views/templates/form.php';
