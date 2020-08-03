<?php

use Helpers\WebhooksHelper;
use Repositories\AssociationRepository;

if (isset($_GET['hs_object_id'])) {
    $dealId = $_GET['hs_object_id'];
    $association = AssociationRepository::findOneByDealId($dealId);

    if (!empty($association)) {
        WebhooksHelper::deleteByCardId($association['card_id']);

        AssociationRepository::delete($association['id']);
    }
}

http_response_code(204);
