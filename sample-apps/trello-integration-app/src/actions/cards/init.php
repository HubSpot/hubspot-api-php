<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardActions;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardCreateRequest;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardFetchBody;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardObjectTypeBody;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardDisplayBody;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardResponse;
use Repositories\CardRepository;
use Helpers\UrlHelper;

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    $cardId = CardRepository::getCardId();
    
    include __DIR__.'/../../views/cards/init.php';
    exit();
}

$appId = getEnvOrException('HUBSPOT_APPLICATION_ID');

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

$objectType = new CardObjectTypeBody();
$objectType->setName('deals');
$objectType->setPropertiesToSend(['hs_object_id', 'dealname']);

$fetchBody = new CardFetchBody();
$fetchBody->setTargetUrl(UrlHelper::getCardFetchUrl());
$fetchBody->setObjectTypes([$objectType]);

$action = new CardActions();
$action->setBaseUrls([UrlHelper::generateServerUri()]);

$request = new CardCreateRequest();
$request->setTitle(CardRepository::CARD_TITLE);
$request->setFetch($fetchBody);
$request->setActions($action);
$request->setDisplay(new CardDisplayBody());

$card = $hubSpot->crm()->extensions()->cards()->cardsApi()
    ->create($appId, $request);

if ($card instanceof CardResponse) {
    CardRepository::saveCardId($card->getId());
}

header('Location: /');
