<?php

namespace Helpers;

use HubSpot\Client\Crm\Extensions\Cards\Model\CardActions;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardCreateRequest;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardDisplayBody;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardFetchBody;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardObjectTypeBody;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardPatchRequest;
use HubSpot\Client\Crm\Extensions\Cards\Model\CardResponse;
use Repositories\CardRepository;
use Repositories\SettingsRepository;

class CardHelper
{
    public static function createOrUpdate($cardId)
    {
        $appId = getEnvOrException('HUBSPOT_APPLICATION_ID');

        $hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

        if (empty($cardId)) {
            $request = static::prepareRequest(new CardCreateRequest());

            $card = $hubSpot->crm()->extensions()->cards()->cardsApi()
                ->create($appId, $request)
            ;
        } else {
            $request = static::prepareRequest(new CardPatchRequest());

            $card = $hubSpot->crm()->extensions()->cards()->cardsApi()
                ->update($appId, $cardId, $request)
            ;
        }

        if ($card instanceof CardResponse) {
            CardRepository::saveCardId($card->getId());
            SettingsRepository::save(SettingsRepository::INIT_URL, UrlHelper::generateServerUri());
        }
    }

    protected static function getFetchBody()
    {
        $objectType = new CardObjectTypeBody();
        $objectType->setName('deals');
        $objectType->setPropertiesToSend(['hs_object_id', 'dealname']);

        $fetchBody = new CardFetchBody();
        $fetchBody->setTargetUrl(UrlHelper::getUrl('/trello/cards'));
        $fetchBody->setObjectTypes([$objectType]);

        return $fetchBody;
    }

    protected static function getAction()
    {
        $action = new CardActions();
        $action->setBaseUrls([UrlHelper::generateServerUri()]);

        return $action;
    }

    protected static function prepareRequest($request)
    {
        $request->setTitle(CardRepository::CARD_TITLE);
        $request->setActions(static::getAction());
        $request->setFetch(static::getFetchBody());
        $request->setDisplay(new CardDisplayBody());

        return $request;
    }
}
