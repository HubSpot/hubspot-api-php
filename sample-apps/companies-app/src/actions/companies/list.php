<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Companies\Model\CollectionResponseSimplePublicObject;

$hubSpot = HubspotClientHelper::createFactory();

/** @var CollectionResponseSimplePublicObject $companiesPage */
$companiesPage = $hubSpot->crm()->companies()->basicApi()->getPage();

include __DIR__.'/../../views/companies/list.php';
