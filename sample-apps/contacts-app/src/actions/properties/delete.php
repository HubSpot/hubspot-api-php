<?php

use Helpers\HubspotClientHelper;
use HubSpot\Crm\ObjectType;

$hubSpot = HubspotClientHelper::createFactory();

if (isset($_GET['name'])) {
    $hubSpot->crm()->properties()->coreApi()->deleteCrmV3PropertiesObjectTypePropertyName(
        ObjectType::CONTACTS,
        $_GET['name']

    );
}

header('Location: /properties/list.php');
