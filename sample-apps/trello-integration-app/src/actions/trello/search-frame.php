<?php

use Repositories\AssociationRepository;

if (isset($_GET['hs_object_id'], $_POST['card_id'])) {
    AssociationRepository::create($_GET['hs_object_id'], $_POST['card_id']);

    header('Location: /trello/search-frame-success');
}
$dealName = $_GET['dealname'];

include __DIR__.'/../../views/trello/search-frame.php';
