<?php

namespace Repositories;

class CardRepository
{
    const CARD_ID_KEY = 'ExtensionCardId';

    const CARD_TITLE = 'Trello Integration Test Card';

    public static function getCardId()
    {
        return SettingsRepository::getSetting(static::CARD_ID_KEY);
    }

    public static function saveCardId($cardId)
    {
        SettingsRepository::save(static::CARD_ID_KEY, $cardId);
    }
}
