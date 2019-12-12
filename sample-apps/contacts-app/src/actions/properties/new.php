<?php

use Helpers\HubspotClientHelper;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

if (isset($_POST['name'])) {
    $propertyFields = $_POST;
    // https://developers.hubspot.com/docs/methods/contacts/v2/create_contacts_property
    $response = $hubSpot->contactProperties()->create($propertyFields);

    if (HubspotClientHelper::isResponseSuccessful($response)) {
        header('Location: /properties/list.php');
        exit();
    }

    $property = (object) $propertyFields;
    $errorResponse = $response;
} else {
    $property = (object) [
        'type' => 'string',
    ];
}

include __DIR__.'/../../views/properties/show.php';
