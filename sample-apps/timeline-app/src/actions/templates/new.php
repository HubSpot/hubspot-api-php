<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateCreateRequest;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

$template = new TimelineEventTemplateCreateRequest();
$template->setName(getValueOrNull('name', $_POST));
$template->setHeaderTemplate(getValueOrNull('headerTemplate', $_POST));
$template->setDetailTemplate(getValueOrNull('detailTemplate', $_POST));
$template->setObjectType(getValueOrNull('objectType', $_POST));

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $response = $hubSpot->crm()->timeline()->templatesApi()
        ->create(
            getEnvOrException('HUBSPOT_APPLICATION_ID'),
            $template
        )
    ;

    header('Location: /templates/show?id='.$response->getId());
}

include __DIR__.'/../../views/templates/form.php';
