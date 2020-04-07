<?php

use Enums\EventTypeCode;
use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateCreateRequest;
use Repositories\EventTypesRepository;

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    include __DIR__.'/../../views/events/init.php';
    exit();
}

EventTypesRepository::delete();

$appId = getEnvOrException('HUBSPOT_APP_ID');

//Intialize HubSpot API Wrapper using HUBSPOT_DEVELOPER_API_KEY needed to create Event Type
//Note that you asscoiate Event Types with application while actual events will be associated with objects in Portals, e.g. Contacts 
//That is why Developer API Key is used to initialize the Wrapper to make calls to Event Type API links
$hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();

if (!EventTypesRepository::getHubspotEventIDByCode(EventTypeCode::BOT_ADDED)) {
    $botAddedRequest = new TimelineEventTemplateCreateRequest();
    $botAdded = $hubSpot->crm()->timeline()->templatesApi()
        ->createEventTemplate($app_id, $botAddedRequest);
//            ->createEventType(
//        getEnvOrException('HUBSPOT_APPLICATION_ID'),
//        'Telegram Bot added',
//        '# Telegram Bot added',
//        'This event happened on {{#formatDate timestamp}}{{/formatDate}}',
//        'CONTACT'
//    );

    if (HubspotClientHelper::isResponseSuccessful($botAdded)) {
        EventTypesRepository::insert([
            'code' => EventTypeCode::BOT_ADDED,
            'hubspot_event_type_id' => $botAdded->getData()->id,
        ]);
    }
}
//
if (!EventTypesRepository::getHubspotEventIDByCode(EventTypeCode::USER_INVITATION_ACTION)) {
    //create another event type with  https://api.hubapi.com/integrations/v1/<<appId>>/timeline/event-types?hapikey=<<developerHapikey>>&userId=<<yourUserId>>
    $invitationEventType = $hubSpot->timeline()->createEventType(
        getEnvOrException('HUBSPOT_APPLICATION_ID'),
        'User received/accepted/rejected an invitation',
        'User {{ action }} an invitation for {{ name }}',
        'Event URL: [{{ event_url }}]({{ event_url }})'."  \n".'This event happened on {{#formatDate timestamp}}{{/formatDate}}',
        'CONTACT'
    );

    if (HubspotClientHelper::isResponseSuccessful($invitationEventType)) {
    // We need to add 3 custom properties to this Event type in order to use them in Event's template
        //add custom property 'name' to this Event Type 
        //call to https://api.hubapi.com/integrations/v1/<<appId>>/timeline/event-types/<<eventTypeId>>/properties?hapikey=<<developerHapikey>>&userId=<<yourUserId>>
        $nameProperty = $hubSpot->timeline()->createEventTypeProperty(
            getEnvOrException('HUBSPOT_APPLICATION_ID'),
            $invitationEventType->getData()->id,
            'name',
            'Invitation Name',
            'String'
        );
        //add custom property 'action' to this Event Type 
        //call to https://api.hubapi.com/integrations/v1/<<appId>>/timeline/event-types/<<eventTypeId>>/properties?hapikey=<<developerHapikey>>&userId=<<yourUserId>>
        $actionProperty = $hubSpot->timeline()->createEventTypeProperty(
            getEnvOrException('HUBSPOT_APPLICATION_ID'),
            $invitationEventType->getData()->id,
            'action',
            'User Action',
            'String'
        );

        //add custom property 'event_url' to this Event Type 
        //call to https://api.hubapi.com/integrations/v1/<<appId>>/timeline/event-types/<<eventTypeId>>/properties?hapikey=<<developerHapikey>>&userId=<<yourUserId>>
        $actionProperty = $hubSpot->timeline()->createEventTypeProperty(
            getEnvOrException('HUBSPOT_APPLICATION_ID'),
            $invitationEventType->getData()->id,
            'event_url',
            'Event URL',
            'String'
        );
        if (HubspotClientHelper::isResponseSuccessful($nameProperty)
            && HubspotClientHelper::isResponseSuccessful($actionProperty)) {
            EventTypesRepository::insert([
                'code' => EventTypeCode::USER_INVITATION_ACTION,
                'hubspot_event_type_id' => $invitationEventType->getData()->id,
            ]);
        }
    }
}

header('Location: /');
