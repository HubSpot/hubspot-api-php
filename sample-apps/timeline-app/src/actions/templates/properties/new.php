<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateToken;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

if (!array_key_exists('id', $_GET)) {
    header('Location: /templates/list');
}

$property = new TimelineEventTemplateToken();
$property->setName(getValueOrNull('name', $_POST));
$property->setLabel(getValueOrNull('label', $_POST));
if (array_key_exists('type', $_POST)) {
    $property->setType($_POST['type']);
}

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $hubSpot->crm()->timeline()->tokensApi()
        ->create(
            $_GET['id'],
            getEnvOrException('HUBSPOT_APPLICATION_ID'),
            $property
        )
    ;

    header('Location: /templates/show?id='.$_GET['id']);
}

include __DIR__.'/../../../views/properties/form.php';
