<?php

use Helpers\CardHelper;
use Helpers\WebhooksHelper;
use Helpers\WebhooksTrelloApi;
use Repositories\CardRepository;
use Repositories\WebhooksRepository;

$cardId = CardRepository::getCardId();

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    include __DIR__.'/../../views/cards/init.php';

    exit();
}

CardHelper::createOrUpdate($cardId);

$webhooks = WebhooksRepository::getAllWithAssociations();

foreach ($webhooks as $webhook) {
    if (empty($webhook['id'])) {
        WebhooksHelper::create($webhook['card_id']);
    } else {
        WebhooksTrelloApi::update($webhook['webhook_id'], $webhook['card_id']);
    }
}

header('Location: /');
