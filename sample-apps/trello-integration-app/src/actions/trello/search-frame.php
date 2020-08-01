<?php

use Helpers\WebhooksTrelloApi;
use Repositories\AssociationRepository;
use Repositories\WebhooksRepository;

if (isset($_GET['hs_object_id'], $_POST['card_id'])) {
    AssociationRepository::create($_GET['hs_object_id'], $_POST['card_id']);
    $webhook = WebhooksTrelloApi::create($_POST['card_id']);
    WebhooksRepository::insert($_POST['card_id'], $webhook->id);
    
    header('Location: /trello/search-frame-success');
    exit();
}

$dealName = $_GET['dealname'];

include __DIR__.'/../../views/trello/search-frame.php';
