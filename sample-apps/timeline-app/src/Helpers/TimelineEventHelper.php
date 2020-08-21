<?php

namespace Helpers;

use HubSpot\Client\Crm\Timeline\Model\TimelineEvent;
use Repositories\EventTypesRepository;
use Repositories\UsersRepository;

class TimelineEventHelper
{
    public static function createEvent(string $telegramChatId, string $eventTypeCode, array $tokens = [])
    {
        //HubSpot API Wrapper here is intialized with OAuth credentials unlike in src/actions/events/init.php where Developer API Key is used
        //This is because here we will be calling API to post actual Events with Event Type created in src/actions/events/init.php
        $request = new TimelineEvent();
        $request->setId(uniqid());
        $request->setEmail(UsersRepository::getEmailByTelegramChatId($telegramChatId));
        $request->setEventTemplateId(EventTypesRepository::getHubspotEventIDByCode($eventTypeCode));

        if (!empty($tokens)) {
            $request->setTokens($tokens);
        }

        return HubspotClientHelper::createFactory()->crm()->timeline()
            ->eventsApi()->create($request);
    }
}
