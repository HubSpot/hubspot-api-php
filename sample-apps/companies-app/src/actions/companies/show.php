<?php

use Helpers\CompanyPropertiesHelper;
use Helpers\HubspotClientHelper;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

function format_properties_for_request($keyValueProperties)
{
    $properties = [];
    foreach ($keyValueProperties as $key => $value) {
        $properties[] = [
            'name' => $key,
            'value' => $value,
        ];
    }

    return $properties;
}

$companyProperties = [];
if (isset($_POST['name'])) {
    $companyProperties = $_POST;
    $redirectParams = [];
    if (!isset($companyProperties['id'])) {
        // https://developers.hubspot.com/docs/methods/companies/create_company
        $response = $hubSpot->companies()->create(format_properties_for_request($companyProperties));
        $redirectParams['created'] = true;
    } else {
        $id = $companyProperties['id'];
        unset($companyProperties['id']);
        // https://developers.hubspot.com/docs/methods/companies/update_company
        $response = $hubSpot->companies()->update($id, format_properties_for_request($companyProperties));
        $redirectParams['updated'] = true;
    }

    $redirectParams['id'] = $response->getData()->companyId;

    if (HubspotClientHelper::isResponseSuccessful($response)) {
        header('Location: /companies/show.php?'.http_build_query($redirectParams));
        exit();
    }

    $errorResponse = $response;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // https://developers.hubspot.com/docs/methods/companies/get_company
    $company = $hubSpot->companies()->getById($id)->getData();
    foreach ($company->properties as $key => $property) {
        $companyProperties[$key] = $property->value;
    }

    $contactsIds = $hubSpot->crmAssociations()->get(
        $id,
        $hubSpot->crmAssociations()::COMPANY_TO_CONTACT,
        ['limit' => 20]
    )->getData();
    $contacts = [];
    $contactsObj = $hubSpot->contacts()->getBatchByIds($contactsIds->results, ['property' => ['firstname', 'lastname']])->getData();
    $contacts = array_map(function ($contact) {
        return [
            'id' => $contact->vid,
            'name' => $contact->properties->firstname->value.' '.$contact->properties->lastname->value,
        ];
    }, (array) $contactsObj);
}

// https://developers.hubspot.com/docs/methods/companies/get_company_properties
$properties = $hubSpot->companyProperties()->all()->getData();

$formFields = [];
foreach ($properties as $property) {
    $propertyName = $property->name;
    if (CompanyPropertiesHelper::isEditable($property)) {
        $formFields[] = [
            'name' => $property->name,
            'label' => $property->label,
            'value' => $companyProperties[$propertyName],
        ];
    }
}

include __DIR__.'/../../views/companies/show.php';
