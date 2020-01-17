<?php

use HubSpot\Client\Crm\Objects\Model\CompanyInput;

$company = new CompanyInput([
    'properties' => [
        'name' => null,
        'domain' => null,
    ],
]);
if (isset($_POST['name'])) {
    $hubSpot = \Helpers\HubspotClientHelper::createFactory();
    $company->setProperties($_POST);
    $response = $hubSpot->crm()->companies()->basicApi()->create($company);

    header('Location: /companies/show.php?id='.$response->getId().'created=1');
    exit();
}

include __DIR__.'/../../views/companies/show.php';
