<?php

use Helpers\HubspotClientHelper;

$contacts = HubspotClientHelper::createFactory()->crm()->contacts()->getAll();

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=contacts.csv');
$file = fopen('php://output', 'w');

fputcsv($file, ['Id', 'Email', 'Firstname', 'Lastname']);

foreach ($contacts as $contact) {
    fputcsv($file, [
        $contact->getId(),
        $contact->getProperties()['email'],
        $contact->getProperties()['firstname'],
        $contact->getProperties()['lastname'],
    ]);
}

fclose($file);
