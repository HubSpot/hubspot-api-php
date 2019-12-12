<?php

$hubSpot = Helpers\HubspotClientHelper::createFactory();

// https://developers.hubspot.com/docs/methods/contacts/v2/get_contacts_properties
$properties = $hubSpot->contactProperties()->all()->getData();

include __DIR__.'/../../views/properties/list.php';
