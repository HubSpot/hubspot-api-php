<?php

use Formatters\CardsFormatter;
use Repositories\AssociationRepository;
use Helpers\TrelloApi;

header('Content-Type: application/json');
if (isset($_GET['hs_object_id'])) {
    $associatedDeal = AssociationRepository::findOneByDealId($_GET['hs_object_id']);
    
    $card = TrelloApi::getCard($associatedDeal['card_id']);
    echo json_encode(CardsFormatter::cardExtensionDataResponse($associatedDeal, $card));
} else {
    
    echo json_encode(CardsFormatter::cardExtensionDataResponse());
}

