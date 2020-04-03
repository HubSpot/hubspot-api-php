<?php

use HubSpot\Crm\ObjectType;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

// https://developers.hubspot.com/docs-beta/crm/properties
$properties = $hubSpot->crm()->properties()->coreApi()
    ->getAll(ObjectType::CONTACTS)->getResults();

include __DIR__.'/../../views/properties/list.php';
