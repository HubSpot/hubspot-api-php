<?php

namespace Repositories;

use Helpers\DBClientHelper;

class UsersRepository
{
    public static function assignEmailToTelegramChatId(string $email, int $telegramChatId): void
    {
        $db = DBClientHelper::getClient();
        $params = [$telegramChatId, $email, $email];
        $query = $db->prepare('insert into user(telegram_chat_id, email) values (?, ?) ON DUPLICATE KEY UPDATE email = ?');
        $query->execute($params);
    }

    public static function getEmailByTelegramChatId(int $telegramChatId)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select email from user where telegram_chat_id = ?')
        ;
        $query->execute([$telegramChatId]);

        return $query->fetchColumn(0);
    }

    public static function getTelegramChatIdByEmail(string $email)
    {
        $query = DBClientHelper::getClient()
            ->prepare('select telegram_chat_id from user where email = ?')
        ;

        $query->execute([$email]);

        return $query->fetchColumn(0);
    }
}
