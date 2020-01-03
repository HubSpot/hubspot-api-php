<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Objects\Model\CollectionResponseSimplePublicObject;
use HubSpot\Crm\ObjectType;

$hubSpot = HubspotClientHelper::createFactory();

/** @var CollectionResponseSimplePublicObject $companiesPage */
$companiesPage = $hubSpot->crm()->objects()->basicApi()->getPage(ObjectType::COMPANY);

include __DIR__.'/../../views/companies/list.php';
