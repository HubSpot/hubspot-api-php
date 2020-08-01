<?php

namespace Helpers;

use Helpers\UrlHelper;

class WebhooksTrelloApi extends TrelloApi
{
    public static function create(string $cardId)
    {
        return static::send(
            'webhooks/', 
            [
                'callbackURL' => static::getCallbackUrl(),
                'idModel' => $cardId,
            ],
            'POST'
        );
    }
    
    public static function delete(string $cardId)
    {
        return static::send(
            'webhooks/'.$cardId, 
            [],
            'DELETE'
        );
    }
    
    protected static function getCallbackUrl()
    {
        return UrlHelper::getUrl('/trello/webhook');
    }
}
