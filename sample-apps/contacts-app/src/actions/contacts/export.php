<?php

$hubSpot = Helpers\HubspotClientHelper::createFactory();

function get_contacts_for_export($maxPages = 10)
{
    global $hubSpot;
    $contacts = [];
    $vidOffset = null;
    for ($pageNum = 0; $pageNum < $maxPages; ++$pageNum) {
        // https://developers.hubspot.com/docs/methods/contacts/get_contacts
        $response = $hubSpot->contacts()->all([
            'count' => 10,
            'vidOffset' => $vidOffset,
        ]);
        foreach ($response->getData()->contacts as $contact) {
            $contacts[] = $contact;
        }
        $vidOffset = $response->getData()->{'vid-offset'};
        $hasMore = $response->getData()->{'has-more'};
        if (!$hasMore) {
            break;
        }
    }

    return $contacts;
}

function generate_csv_rows($contacts, $properties)
{
    $rows = [];
    $headerRow = [];
    foreach ($properties as $property) {
        $headerRow[] = $property->label;
    }
    $rows[] = $headerRow;
    foreach ($contacts as $contact) {
        $row = [];
        foreach ($properties as $property) {
            $propertyName = $property->name;
            $row[] = $contact->properties->{$propertyName}->value;
        }
        $rows[] = $row;
    }

    return $rows;
}

$contacts = get_contacts_for_export();

// https://developers.hubspot.com/docs/methods/contacts/v2/get_contacts_properties
$properties = $hubSpot->contactProperties()->all()->getData();

$csvRows = generate_csv_rows($contacts, $properties);

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=contacts.csv');
$fp = fopen('php://output', 'w');
foreach ($csvRows as $row) {
    fputcsv($fp, $row);
}
fclose($fp);
