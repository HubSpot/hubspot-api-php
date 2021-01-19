<?php

use Helpers\WebhooksHelper;
use Repositories\AssociationRepository;

if (isset($_GET['hs_object_id'], $_POST['card_id'])) {
    AssociationRepository::create($_GET['hs_object_id'], $_POST['card_id']);

    WebhooksHelper::create($_POST['card_id']);

    header('Location: /trello/search-frame-success');

    exit();
}

$dealName = $_GET['dealname'];

include __DIR__.'/../../views/trello/search-frame.php';
