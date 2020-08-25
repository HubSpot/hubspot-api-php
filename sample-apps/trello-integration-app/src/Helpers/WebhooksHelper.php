<?php

namespace Helpers;

use Repositories\AssociationRepository;
use Repositories\WebhooksRepository;

class WebhooksHelper
{
    public static function create(string $cardId)
    {
        if (empty(WebhooksRepository::findOneByCardId($cardId))) {
            $webhook = WebhooksTrelloApi::create($cardId);

            WebhooksRepository::insert($cardId, $webhook->id);
        }
    }

    public static function update(int $id, string $cardId, string $webhookId)
    {
        $webhook = WebhooksTrelloApi::update($webhookId, $cardId);

        WebhooksRepository::update($cardId, $webhook->id);

        return $webhook;
    }

    public static function deleteByCardId(string $cardId)
    {
        if (1 == AssociationRepository::countByCardId($cardId)) {
            $webhook = WebhooksRepository::findOneByCardId($cardId);

            if (!empty($webhook)) {
                WebhooksTrelloApi::delete($webhook['webhook_id']);
                WebhooksRepository::delete($webhook['id']);
            }
        }
    }
}
