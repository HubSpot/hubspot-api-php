<?php

use HubSpot\Client\Crm\Objects\Model\CollectionResponseSimplePublicObject;
use HubSpot\Client\Crm\Objects\Model\SimplePublicObject;
use HubSpot\Crm\ObjectType;

function get_contacts_for_export($maxPages = 10)
{
    $hubSpot = Helpers\HubspotClientHelper::createFactory();
    $contacts = [];
    $after = null;
    for ($pageNum = 0; $pageNum < $maxPages; ++$pageNum) {
        // https://developers.hubspot.com/docs-beta/crm/contacts
        /** @var CollectionResponseSimplePublicObject $contactsPage */
        $contactsPage = $hubSpot->crm()->contacts()->basicApi()->getPage(10, $after);
        $contacts = [
            ...$contacts,
            ...$contactsPage->getResults(),
        ];
        $next = $contactsPage->getPaging()->getNext();
        if (null === $next) {
            break;
        }
        $after = $next->getAfter();
    }

    return $contacts;
}

function generate_csv_rows($contacts, $properties)
{
    $headerRow = [
        ...$properties,
    ];
    $rows = [$headerRow];
    /** @var SimplePublicObject $contact */
    foreach ($contacts as $contact) {
        $row = [];
        foreach ($properties as $property) {
            $row[] = $contact->getProperties()[$property];
        }
        $rows[] = $row;
    }

    return $rows;
}

$contacts = get_contacts_for_export();

$propertiesToExport = ['email', 'firstname', 'lastname'];
$csvRows = generate_csv_rows($contacts, $propertiesToExport);

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=contacts.csv');
$fp = fopen('php://output', 'w');
foreach ($csvRows as $row) {
    fputcsv($fp, $row);
}
fclose($fp);
