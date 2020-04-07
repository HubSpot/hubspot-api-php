<?php

namespace Helpers;

use Repositories\EventTypesRepository;
use Repositories\UsersRepository;

class TimelineEventHelper
{
    public static function createEvent(string $telegramChatId, string $eventTypeCode, array $eventTypeData = [])
    {
        //HubSpot API Wrapper here is intialized with OAuth credentials unlike in src/actions/events/init.php where Developer API Key is used
        //This is because here we will be calling API to post actual Events with Event Type created in src/actions/events/init.php
        $hubSpot = HubspotClientHelper::createFactory();
        // call implementing PUT /integrations/v1/:application‐id/timeline/event - https://developers.hubspot.com/docs/methods/timeline/create-or-update-event
        return $hubSpot->timeline()->createOrUpdate(
            getEnvOrException('HUBSPOT_APPLICATION_ID'),
            EventTypesRepository::getHubspotEventIDByCode($eventTypeCode),
            uniqid(),
            null,
            UsersRepository::getEmailByTelegramChatId($telegramChatId),
            null,
            [],
            null,
            $eventTypeData
        );
    }
}
