<?php

use Helpers\HubspotClientHelper;

$contacts = HubspotClientHelper::createFactory()->crm()->contacts()->getAll();

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=contacts.csv');
$file = fopen('php://output', 'w');

fputcsv($file, ['Email', 'Firstname', 'Lastname']);

foreach ($contacts as $contact) {
    fputcsv($file, array_values($contact->getProperties()));
}

fclose($file);
