<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateUpdateRequest;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

if (!array_key_exists('id', $_GET)) {
    header('Location: /templates/list.php');
}

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $request = new TimelineEventTemplateUpdateRequest();
    $request->setId($_GET['id']);
    $request->setName($_POST['name']);
    $request->setHeaderTemplate($_POST['headerTemplate']);
    $request->setDetailTemplate($_POST['detailTemplate']);
    //$request->setObjectType(getValueOrNull('objectType', $_POST));
    
    $hubSpot->crm()->timeline()->templatesApi()
        ->updateEventTemplate(
            $request,
            getEnvOrException('HUBSPOT_APPLICATION_ID')
        );
    
    header('Location: /templates/show.php?id='.$_GET['id']);
}

$template = $hubSpot->crm()->timeline()->templatesApi()
    ->getEventTemplateById(
        $_GET['id'],
        getEnvOrException('HUBSPOT_APPLICATION_ID')
    );

include __DIR__.'/../../views/templates/form.php';
