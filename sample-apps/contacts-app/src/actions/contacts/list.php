<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactory();

// https://developers.hubspot.com/docs/methods/contacts/get_contacts
$response = $hubSpot->contacts()->all([
    'count' => 10,
]);
$contacts = $response['contacts'];

include __DIR__.'/../../views/contacts/list.php';
