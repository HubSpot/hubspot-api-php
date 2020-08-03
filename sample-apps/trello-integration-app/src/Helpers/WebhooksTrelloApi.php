<?php

namespace Helpers;

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

    public static function update(string $id, string $cardId)
    {
        return static::send(
            'webhooks/'.$id,
            [
                'callbackURL' => static::getCallbackUrl(),
                'idModel' => $cardId,
            ],
            'PUT'
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

    public static function getCallbackUrl()
    {
        return UrlHelper::getUrl('/trello/webhook');
    }
}
