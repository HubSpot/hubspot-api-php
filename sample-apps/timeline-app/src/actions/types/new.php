<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
$type = [
    'name' => getValueOrNull('name', $_POST),
    'headerTemplate' => getValueOrNull('headerTemplate', $_POST),
    'detailTemplate' => getValueOrNull('detailTemplate', $_POST),
    'objectType' => getValueOrNull('objectType', $_POST),
];

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $response = $hubSpot->timeline()->createEventType(
        $_ENV['HUBSPOT_APPLICATION_ID'],
        $type['name'],
        $type['headerTemplate'],
        $type['detailTemplate'],
        $type['objectType']
    );
    if (HubspotClientHelper::isResponseSuccessful($response)) {
        header('Location: /types/show.php?id='.$response->getData()->id);
    }
}

include __DIR__.'/../../views/types/form.php';
