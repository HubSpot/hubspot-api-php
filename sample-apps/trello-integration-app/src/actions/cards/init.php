<?php

use Helpers\HubspotClientHelper;
use Helpers\UrlHelper;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardActions;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardCreateRequest;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardDisplayBody;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardFetchBody;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardObjectTypeBody;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardPatchRequest;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardResponse;
use Repositories\CardRepository;

$cardId = CardRepository::getCardId();

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    include __DIR__.'/../../views/cards/init.php';
    exit();
}

$appId = getEnvOrException('HUBSPOT_APPLICATION_ID');

$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

$objectType = new CardObjectTypeBody();
$objectType->setName('deals');
$objectType->setPropertiesToSend(['hs_object_id', 'dealname']);

$fetchBody = new CardFetchBody();
$fetchBody->setTargetUrl(UrlHelper::getUrl('/trello/cards'));
$fetchBody->setObjectTypes([$objectType]);

$action = new CardActions();
$action->setBaseUrls([UrlHelper::generateServerUri()]);

if (empty($cardId)) {
    $request = new CardCreateRequest();
    $request->setTitle(CardRepository::CARD_TITLE);
    $request->setFetch($fetchBody);
    $request->setActions($action);
    $request->setDisplay(new CardDisplayBody());

    $card = $hubSpot->crm()->extensions()->cards()->cardsApi()
        ->create($appId, $request)
    ;
} else {
    $request = new CardPatchRequest();
    $request->setTitle(CardRepository::CARD_TITLE);
    $request->setActions($action);
    $request->setFetch($fetchBody);
    $request->setDisplay(new CardDisplayBody());

    $card = $hubSpot->crm()->extensions()->cards()->cardsApi()
        ->update($appId, $cardId, $request)
    ;
}

if ($card instanceof CardResponse) {
    CardRepository::saveCardId($card->getId());
    $_SESSION['initUrl'] = UrlHelper::generateServerUri();
}

header('Location: /');
