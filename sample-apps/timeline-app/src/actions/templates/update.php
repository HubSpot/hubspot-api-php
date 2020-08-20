<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateUpdateRequest;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

if (!array_key_exists('id', $_GET)) {
    header('Location: /templates/list');
}

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $request = new TimelineEventTemplateUpdateRequest();
    $request->setId($_GET['id']);
    $request->setName($_POST['name']);
    $request->setHeaderTemplate($_POST['headerTemplate']);
    $request->setDetailTemplate($_POST['detailTemplate']);

    $hubSpot->crm()->timeline()->templatesApi()
        ->update(
            $_GET['id'],
            getEnvOrException('HUBSPOT_APPLICATION_ID'),
            $request
        )
    ;

    header('Location: /templates/show?id='.$_GET['id']);
}

$template = $hubSpot->crm()->timeline()->templatesApi()
    ->getById(
        $_GET['id'],
        getEnvOrException('HUBSPOT_APPLICATION_ID')
    )
;

include __DIR__.'/../../views/templates/form.php';
