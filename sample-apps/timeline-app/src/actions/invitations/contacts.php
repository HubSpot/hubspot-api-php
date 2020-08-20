<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\Filter;
use HubSpot\Client\Crm\Contacts\Model\FilterGroup;
use HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest;
use Telegram\TelegramBot;

if (!array_key_exists('id', $_GET)) {
    header('Location: /invitations/list');
}

TelegramBot::init();

$hubSpot = HubspotClientHelper::createFactory();

if (array_key_exists('search', $_GET) && !empty($_GET['search'])) {
    $filter = new Filter();
    $filter
        ->setOperator('EQ')
        ->setPropertyName('email')
        ->setValue($_GET['search'])
    ;

    $filterGroup = new FilterGroup();
    $filterGroup->setFilters([$filter]);

    $searchRequest = new PublicObjectSearchRequest();
    $searchRequest->setFilterGroups([$filterGroup]);

    $contacts = $hubSpot->crm()->contacts()->searchApi()->doSearch($searchRequest);
} else {
    $contacts = $hubSpot->crm()->contacts()->basicApi()->getPage();
}

include __DIR__.'/../../views/invitations/contacts.php';
