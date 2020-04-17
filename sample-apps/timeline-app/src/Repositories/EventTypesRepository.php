<?php

namespace Repositories;

use Helpers\DBClientHelper;

class EventTypesRepository
{
    public static function getHubspotEventIDByCode(string $code)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select hubspot_event_type_id from event_types where code = ?')
        ;

        $query->execute([$code]);

        return $query->fetchColumn(0);
    }

    public static function insert($type)
    {
        $db = DBClientHelper::getClient();
        $query = $db->prepare('insert into event_types (code, hubspot_event_type_id) values (?, ?)');
        $query->execute([$type['code'], $type['hubspot_event_type_id']]);
    }

    public static function delete()
    {
        $db = DBClientHelper::getClient();
        $query = $db->prepare('delete from  event_types');
        $query->execute();
    }
}
