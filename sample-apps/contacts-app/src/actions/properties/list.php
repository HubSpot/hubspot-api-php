<?php

use HubSpot\Crm\ObjectType;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

$properties = $hubSpot->crm()->properties()->coreApi()->getcrmv3propertiesobjectType(ObjectType::CONTACTS)->getResults();

include __DIR__.'/../../views/properties/list.php';
