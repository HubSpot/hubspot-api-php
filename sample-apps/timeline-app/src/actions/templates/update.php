<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

if (!array_key_exists('id', $_GET)) {
    header('Location: /types/list.php');
}
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $type = [
        'name' => getValueOrNull('name', $_POST),
        'headerTemplate' => getValueOrNull('headerTemplate', $_POST),
        'detailTemplate' => getValueOrNull('detailTemplate', $_POST),
        'objectType' => getValueOrNull('objectType', $_POST),
    ];
    $response = $hubSpot->timeline()->updateEventType(
        $_ENV['HUBSPOT_APPLICATION_ID'],
        $_GET['id'],
        $type['name'],
        $type['headerTemplate'],
        $type['detailTemplate'],
        $type['objectType']
    );
    if (HubspotClientHelper::isResponseSuccessful($response)) {
        header('Location: /types/show.php?id='.$_GET['id']);
    }
}
if (!isset($type)) {
    $typeResponse = $hubSpot->timeline()->getEventTypeById($_ENV['HUBSPOT_APPLICATION_ID'], intval($_GET['id']));
    if (!HubspotClientHelper::isResponseSuccessful($typeResponse)) {
        throw new Exception($typeResponse->getReasonPhrase());
    }
    $type = (array) $typeResponse->getData();
}
include __DIR__.'/../../views/templates/form.php';
