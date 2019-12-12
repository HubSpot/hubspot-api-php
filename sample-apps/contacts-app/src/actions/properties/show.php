<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactory();
if (isset($_POST['name'])) {
    $propertyFields = $_POST;
    // https://developers.hubspot.com/docs/methods/contacts/v2/update_contact_property
    $response = $hubSpot->contactProperties()->update($propertyFields['name'], $propertyFields);
    if (HubspotClientHelper::isResponseSuccessful($response)) {
        $name = $response->data->name;
        header('Location: /properties/list.php');
        exit();
    }

    $property = (object) $propertyFields;
    $errorResponse = $response;
} else {
    $property = [];
    if (isset($_GET['name'])) {
        // https://developers.hubspot.com/docs/methods/companies/get_contact_property
        $response = $hubSpot->contactProperties()->get($_GET['name']);
        $property = $response->getData();
    }
}

include __DIR__.'/../../views/properties/show.php';
