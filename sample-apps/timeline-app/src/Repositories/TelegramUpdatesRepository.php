<?php

namespace Repositories;

use Helpers\DBClientHelper;

class TelegramUpdatesRepository
{
    public static function findMaxId()
    {
        $db = DBClientHelper::getClient();
        $query = $db->query('select max(id) from telegram_update');

        return $query->fetchColumn(0);
    }

    public static function save($update)
    {
        $db = DBClientHelper::getClient();
        $params = [$update['id']];
        $query = $db->prepare('insert into telegram_update (id) values (?)');
        $query->execute($params);
    }
}
