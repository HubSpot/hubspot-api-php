<?php

namespace Repositories;

use Helpers\RedisHelper;

class CardRepository {
    
    const CARD_ID_KEY = 'extension_card_id';
    
    const CARD_TITLE = 'Trello Integration Test Card';
    
    public static function getCardId()
    {
        return RedisHelper::getClient()->get(static::CARD_ID_KEY);
    }

    public static function saveCardId($cardId)
    {
        RedisHelper::getClient()->set(static::CARD_ID_KEY, $cardId);
    }
}
