<?php

use Helpers\HubspotClientHelper;
use HubSpot\Crm\ObjectType;
use HubSpot\Client\Crm\Objects\Model\CompanyInput;

if (!isset($_GET['id'])) {
    throw new \Exception('Contact id is not specified');
}

$id = $_GET['id'];

$hubSpot = HubspotClientHelper::createFactory();

$company = new CompanyInput([
    'name' => null,
    'domain' => null,
]);

if (isset($_POST['name'])) {
    $company->setProperties($_POST);
    $hubSpot->crm()->objects()->basicApi()->update(ObjectType::COMPANIES, $id, $company);
    
    header('Location: /companies/list.php');
    exit();
} else {
    
    $company = $hubSpot->crm()->objects()->basicApi()->getById(ObjectType::COMPANIES, $id);
    
    //$contactsIds = $hubSpot->crm()->objects()->associationsApi()->getAssociations(ObjectType::COMPANIES, $id, ObjectType::CONTACT);
}

include __DIR__.'/../../views/companies/show.php';
