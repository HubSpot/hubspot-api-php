<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Properties\Model\Property;
use HubSpot\Client\Crm\Properties\Model\PropertyCreate;
use HubSpot\Crm\ObjectType;

$hubSpot = HubspotClientHelper::createFactory();

if (isset($_POST['name'])) {
    $propertyCreate = new PropertyCreate($_POST);
    // https://developers.hubspot.com/docs-beta/crm/properties
    $hubSpot->crm()->properties()->coreApi()->create(
        ObjectType::CONTACTS,
        $propertyCreate
    );

    header('Location: /properties/list');

    exit();
}

$property = new Property();
$property
    ->setType('string')
    ->setFieldType('text')
    ->setGroupName('contactinformation')
;

include __DIR__.'/../../views/properties/show.php';
