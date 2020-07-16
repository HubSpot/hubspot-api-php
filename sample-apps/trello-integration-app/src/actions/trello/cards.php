<?php

use Formatters\CardsFormatter;
use Helpers\TrelloApi;
use Repositories\AssociationRepository;

header('Content-Type: application/json');
if (isset($_GET['hs_object_id'])) {
    $associatedDeal = AssociationRepository::findOneByDealId($_GET['hs_object_id']);

    $card = null;

    if (!empty($associatedDeal)) {
        $card = TrelloApi::getCard($associatedDeal['card_id']);
    }

    echo json_encode(CardsFormatter::cardExtensionDataResponse($associatedDeal, $card));
}
