<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateTokenUpdateRequest;

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
if (!array_key_exists('template_id', $_GET) || !array_key_exists('name', $_GET)) {
    header('Location: /templates/list');
}

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $request = new TimelineEventTemplateTokenUpdateRequest();
    $request->setLabel($_POST['label']);

    $response = $hubSpot->crm()->timeline()->tokensApi()
        ->update(
            $_GET['template_id'],
            $_GET['name'],
            getEnvOrException('HUBSPOT_APPLICATION_ID'),
            $request
        )
    ;

    header('Location: /templates/show?id='.$_GET['template_id']);
}

$template = $hubSpot->crm()->timeline()->templatesApi()->getById(
    $_GET['template_id'],
    getEnvOrException('HUBSPOT_APPLICATION_ID')
);

$property = null;

if (count($template->getTokens()) > 0) {
    foreach ($template->getTokens() as $token) {
        if ($token->getName() == $_GET['name']) {
            $property = $token;

            break;
        }
    }
}

if (is_null($property)) {
    http_response_code(404);

    exit();
}

include __DIR__.'/../../../views/properties/form.php';
