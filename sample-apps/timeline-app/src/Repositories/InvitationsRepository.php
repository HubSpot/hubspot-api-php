<?php

namespace Repositories;

use Helpers\DBClientHelper;
use PDO;

class InvitationsRepository
{
    public static function list()
    {
        $query = DBClientHelper::getClient()
            ->query('select * from invitations')
        ;

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(int $id)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select * from invitations where id = ?')
        ;

        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function getRandom()
    {
        $query = DBClientHelper::getClient()
            ->prepare('select * from invitations order by rand() limit 1')
        ;

        $query->execute([]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function insert(array $invitation)
    {
        $query = DBClientHelper::getClient()
            ->prepare('insert into invitations (name, text, event_url) values (?, ?, ?)')
        ;

        $query->execute([
            $invitation['name'],
            $invitation['text'],
            $invitation['event_url'],
        ]);
    }

    public static function update(array $invitation)
    {
        $query = DBClientHelper::getClient()
            ->prepare('update invitations set name = ?, text = ? where id = ?')
        ;

        $query->execute([
            $invitation['name'],
            $invitation['text'],
            $invitation['event_url'],
            $invitation['id'],
        ]);
    }

    public static function delete(int $id)
    {
        $query = DBClientHelper::getClient()
            ->prepare('delete from invitations where id = ?')
        ;

        $query->execute([
            $id,
        ]);
    }
}
