<?php

use Components\Paginator;
use Helpers\HubspotClientHelper;
use Repositories\EventsRepository;

$hubSpot = HubspotClientHelper::createFactory();

$paginator = new Paginator(EventsRepository::getEventsCount(), '/webhooks/events.php');

$contactsIds = EventsRepository::findLastModifiedObjectsIds($paginator->getFrom(), $paginator->getPerPage());

function format_event($event)
{
    // "contact.creation" => "creation"
    $event['event_type'] = explode('.', $event['event_type'])[1];

    return $event;
}

$contacts = [];
foreach ($contactsIds as $contactsId) {
    $contact = [
        'id' => $contactsId,
        'events' => array_map('format_event', EventsRepository::findEventTypesByObjectId($contactsId)),
    ];
    $response = $hubSpot->contacts()->getById($contactsId);
    if (HubspotClientHelper::isResponseSuccessful($response)) {
        $contact['properties'] = $response->getData()->properties;
    }
    $contacts[] = $contact;
}

include __DIR__.'/../../views/webhooks/events.php';
