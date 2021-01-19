<?php

use Enums\EventTypeCode;
use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplate;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateCreateRequest;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateToken;
use HubSpot\Crm\ObjectType;
use Repositories\EventTypesRepository;

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    include __DIR__.'/../../views/events/init.php';

    exit();
}

EventTypesRepository::delete();

$appId = getEnvOrException('HUBSPOT_APPLICATION_ID');

//Intialize HubSpot API Wrapper using HUBSPOT_DEVELOPER_API_KEY needed to create Event Type
//Note that you asscoiate Event Types with application while actual events will be associated with objects in Portals, e.g. Contacts
//That is why Developer API Key is used to initialize the Wrapper to make calls to Event Type API links
$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

if (!EventTypesRepository::getHubspotEventIDByCode(EventTypeCode::BOT_ADDED)) {
    $botAddedRequest = new TimelineEventTemplateCreateRequest();
    $botAddedRequest->setName('Telegram Bot added');
    $botAddedRequest->setHeaderTemplate('# Telegram Bot added');
    $botAddedRequest->setDetailTemplate('This event happened on {{#formatDate timestamp}}{{/formatDate}}');
    $botAddedRequest->setObjectType(ObjectType::CONTACTS);
    $botAddedRequest->setTokens([]);

    $botAdded = $hubSpot->crm()->timeline()->templatesApi()
        ->create($appId, $botAddedRequest)
    ;

    if ($botAdded instanceof TimelineEventTemplate) {
        EventTypesRepository::insert([
            'code' => EventTypeCode::BOT_ADDED,
            'hubspot_event_type_id' => $botAdded->getId(),
        ]);
    }
}

if (!EventTypesRepository::getHubspotEventIDByCode(EventTypeCode::USER_INVITATION_ACTION)) {
    $invitationRequest = new TimelineEventTemplateCreateRequest();
    $invitationRequest->setName('User received/accepted/rejected an invitation');
    $invitationRequest->setHeaderTemplate('User {{ action }} an invitation for {{ name }}');
    $invitationRequest->setDetailTemplate('Event URL: [{{ event_url }}]({{ event_url }}) '.PHP_EOL.'This event happened on {{#formatDate timestamp}}{{/formatDate}}');
    $invitationRequest->setObjectType(ObjectType::CONTACTS);

    $invitationEventType = $hubSpot->crm()->timeline()->templatesApi()
        ->create($appId, $invitationRequest)
    ;

    if ($invitationEventType instanceof TimelineEventTemplate) {
        // We need to add 3 custom properties to this Event type in order to use them in Event's template
        //add custom property 'name' to this Event Type
        $nameRequest = new TimelineEventTemplateToken();
        $nameRequest->setName('name');
        $nameRequest->setLabel('Invitation Name');
        $nameRequest->setType('string');

        $nameProperty = $hubSpot->crm()->timeline()->tokensApi()
            ->create(
                $invitationEventType->getId(),
                $appId,
                $nameRequest
            )
        ;
        //add custom property 'action' to this Event Type
        $actionRequest = new TimelineEventTemplateToken();
        $actionRequest->setName('action');
        $actionRequest->setLabel('User Action');
        $actionRequest->setType('string');

        $actionProperty = $hubSpot->crm()->timeline()->tokensApi()
            ->create(
                $invitationEventType->getId(),
                $appId,
                $actionRequest
            )
        ;

        //add custom property 'event_url' to this Event Type
        $eventUrlRequest = new TimelineEventTemplateToken();
        $eventUrlRequest->setName('event_url');
        $eventUrlRequest->setLabel('Event URL');
        $eventUrlRequest->setType('string');

        $eventUrlProperty = $hubSpot->crm()->timeline()->tokensApi()
            ->create(
                $invitationEventType->getId(),
                $appId,
                $eventUrlRequest
            )
        ;

        if ($nameProperty instanceof TimelineEventTemplateToken
        && $actionProperty instanceof TimelineEventTemplateToken
        && $eventUrlProperty instanceof TimelineEventTemplateToken) {
            EventTypesRepository::insert([
                'code' => EventTypeCode::USER_INVITATION_ACTION,
                'hubspot_event_type_id' => $invitationEventType->getId(),
            ]);
        }
    }
}

header('Location: /');
