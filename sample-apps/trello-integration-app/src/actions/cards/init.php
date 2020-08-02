<?php

use Helpers\CardHelper;
use Helpers\WebhooksTrelloApi;
use Helpers\WebhooksHelper;
use Repositories\{CardRepository, WebhooksRepository};

$cardId = CardRepository::getCardId();

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    include __DIR__.'/../../views/cards/init.php';
    exit();
}

CardHelper::createOrUpdate($cardId);

$webhooks = WebhooksRepository::getAllWithAssociations();

foreach ($webhooks as $webhook) {
    if(empty($webhook['id'])) {
        WebhooksHelper::create($webhook['card_id']);
    } else {
        WebhooksTrelloApi::update($webhook['webhook_id'], $webhook['card_id']);
    }
}

header('Location: /');
