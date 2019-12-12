<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactory();

if (isset($_GET['name'])) {
    // https://developers.hubspot.com/docs/methods/contacts/v2/delete_contact_property
    $response = $hubSpot->contactProperties()->delete($_GET['name']);
    if (!HubspotClientHelper::isResponseSuccessfulButEmpty($response)) {
        $message = json_encode($response);
        include __DIR__.'/../../views/error.php';
        exit();
    }
}

header('Location: /properties/list.php');
