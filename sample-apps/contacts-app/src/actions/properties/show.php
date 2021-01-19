<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Properties\Model\PropertyUpdate;
use HubSpot\Crm\ObjectType;

$hubSpot = HubspotClientHelper::createFactory();
if (isset($_POST['name'])) {
    $propertyUpdate = new PropertyUpdate($_POST);
    // https://developers.hubspot.com/docs-beta/crm/properties
    $hubSpot->crm()->properties()->coreApi()->update(
        ObjectType::CONTACTS,
        $_POST['name'],
        $propertyUpdate
    );

    header('Location: /properties/list');

    exit();
}

if (isset($_GET['name'])) {
    // https://developers.hubspot.com/docs-beta/crm/properties
    $property = $hubSpot->crm()->properties()->coreApi()->getByName(
        ObjectType::CONTACTS,
        $_GET['name']
    );

    include __DIR__.'/../../views/properties/show.php';
}
