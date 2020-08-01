<?php

use Helpers\WebhooksTrelloApi;
use Repositories\AssociationRepository;
use Repositories\WebhooksRepository;

if (isset($_GET['hs_object_id'])) {
    
    $dealId = $_GET['hs_object_id'];
    $association = AssociationRepository::findOneByDealId($dealId);
    
    if (!empty($association)) {
        
        if (AssociationRepository::countByCardId($association['card_id']) == 1) {
            $webhook = WebhooksRepository::findOneByCardId($association['card_id']);
            
            if (!empty($webhook)) {
                WebhooksTrelloApi::delete($webhook['webhook_id']);
                WebhooksRepository::delete($webhook['id']);
            }
        }
        AssociationRepository::delete($association['id']);
    }
}

http_response_code(204);
