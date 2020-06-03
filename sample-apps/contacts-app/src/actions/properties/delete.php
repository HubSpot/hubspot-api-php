<?php

use Helpers\HubspotClientHelper;
use HubSpot\Crm\ObjectType;

$hubSpot = HubspotClientHelper::createFactory();

if (isset($_GET['name'])) {
    // https://developers.hubspot.com/docs-beta/crm/properties
    $hubSpot->crm()->properties()->coreApi()->archive(
        ObjectType::CONTACTS,
        $_GET['name']
    );
}

header('Location: /properties/list');
