<?php

use Components\Paginator;
use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\BatchReadInputSimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectId;
use Repositories\EventsRepository;

function formatEvent($event)
{
    // "contact.creation" => "creation"
    $event['event_type'] = explode('.', $event['event_type'])[1];

    return $event;
}

$hubSpot = HubspotClientHelper::createFactory();
$paginator = new Paginator(EventsRepository::getEventsCount(), '/webhooks/events');
$contactsIds = EventsRepository::findLastModifiedObjectsIds($paginator->getFrom(), $paginator->getPerPage());

if (count($contactsIds) > 0) {
    $request = new BatchReadInputSimplePublicObjectId();
    $request->setInputs(array_map(function ($id) {
        $contactId = new SimplePublicObjectId();
        $contactId->setId($id);

        return $contactId;
    }, $contactsIds));

    $response = $hubSpot->crm()->contacts()->batchApi()->read($request);

    $names = [];
    if (!empty($response->getResults())) {
        foreach ($response->getResults() as $object) {
            $names[$object->getId()] = trim($object->getProperties()['firstname']
                .' '.$object->getProperties()['lastname']);
        }
    }

    $contacts = array_map(function ($id) use ($names) {
        $name = null;
        if (array_key_exists($id, $names)) {
            $name = $names[$id];
        }

        return [
            'id' => $id,
            'events' => array_map('formatEvent', EventsRepository::findEventTypesByObjectId($id)),
            'name' => $name,
        ];
    }, $contactsIds);
} else {
    $contacts = [];
}

include __DIR__.'/../../views/webhooks/events.php';
