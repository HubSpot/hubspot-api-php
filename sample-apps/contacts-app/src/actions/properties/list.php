<?php

use HubSpot\Crm\ObjectType;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

$properties = $hubSpot->crm()->properties()->coreApi()->getcrmv3propertiesobjectType(ObjectType::CONTACTS);

include __DIR__.'/../../views/properties/list.php';
