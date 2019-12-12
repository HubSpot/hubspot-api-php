<?php

$contacts = [];
$search = $_GET['search'];

if (empty($search)) {
    header('Location: /contacts/list.php');
    exit();
}

$hubSpot = Helpers\HubspotClientHelper::createFactory();

// https://developers.hubspot.com/docs/methods/contacts/search_contacts
$response = $hubSpot->contacts()->search($_GET['search']);
$contacts = $response['contacts'];

include __DIR__.'/../../views/contacts/list.php';
