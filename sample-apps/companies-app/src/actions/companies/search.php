<?php

$searchDomain = $_GET['search'];
if (empty($searchDomain)) {
    header('Location: /companies/list.php');
    exit();
}

$hubSpot = Helpers\HubspotClientHelper::createFactory();

https://developers.hubspot.com/docs/methods/companies/search_companies_by_domain
$companies = $hubSpot->companies()->searchByDomain($searchDomain, [
    'name', 'domain',
])->getData()->results;

include __DIR__.'/../../views/companies/list.php';
