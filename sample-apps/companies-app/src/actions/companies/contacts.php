<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactory();

function create_or_delete_contacts_associations($companyId, $contactsIds)
{
    $crmAssociations = HubspotClientHelper::createFactory()->crmAssociations();
    $redirectParams = [
        'id' => $companyId,
    ];

    $data = array_map(function (int $contactId) use ($companyId, $crmAssociations) {
        return [
            'fromObjectId' => $contactId,
            'toObjectId' => $companyId,
            'category' => 'HUBSPOT_DEFINED',
            'definitionId' => $crmAssociations::CONTACT_TO_COMPANY,
        ];
    }, $contactsIds);

    if (isset($_POST['addToCompany'])) {
        $crmAssociations->createBatch($data);
        $redirectParams['contactsAdded'] = true;
    } elseif (isset($_POST['deleteFromCompany'])) {
        $crmAssociations->deleteBatch($data);
        $redirectParams['contactsDeleted'] = true;
    }

    return '/companies/show.php?'.http_build_query($redirectParams);
}

$companyId = $_GET['companyId'] ?: null;

if (isset($_POST['contactsIds'])) {
    $contactsIds = array_keys($_POST['contactsIds']);
    $redirectUrl = create_or_delete_contacts_associations($companyId, $contactsIds);
    header('Location: '.$redirectUrl);
    exit();
}

$search = $_GET['search'];
if (!empty($search)) {
    // https://developers.hubspot.com/docs/methods/contacts/search_contacts
    $contacts = $hubSpot->contacts()->search($search)->getData()->contacts;
} else {
    // https://developers.hubspot.com/docs/methods/companies/get-all-companies
    $contacts = $hubSpot->contacts()->all([])->getData()->contacts;
}

$associatedContacts = [];
if (count($contacts) > 0) {
    $associationResponse = $hubSpot->crmAssociations()->get(
        $companyId,
        $hubSpot->crmAssociations()::COMPANY_TO_CONTACT,
        ['limit' => 20]
    );
    if (HubspotClientHelper::isResponseSuccessful($associationResponse)) {
        $associatedContacts = $associationResponse->getData()->results;
    }
}
include __DIR__.'/../../views/companies/contacts.php';
