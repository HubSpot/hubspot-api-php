<?php

use HubSpot\Client\Crm\Properties\Model\Property;
use HubSpot\Client\Crm\Properties\Model\PropertyCreate;
use HubSpot\Crm\ObjectType;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

if (isset($_POST['name'])) {
    $propertyCreate = new PropertyCreate($_POST);
    $hubSpot->crm()->properties()->coreApi()->postCrmV3PropertiesObjectType(
        ObjectType::CONTACTS,
        $propertyCreate
    );

    header('Location: /properties/list.php');
    exit();
}

$property = new Property();
$property
    ->setType('string')
    ->setGroupName('contactinformation')
;

include __DIR__.'/../../views/properties/show.php';
