<?php

namespace Formatters;

use Helpers\UrlHelper;

class CardsFormatter {
    
    public static function cardExtensionDataResponse($associatedDeals = [], $card = null): array
    {
        $results = [];
        
        if (!empty($associatedDeals)) {
            /*
             * result = {
            "objectId": card.short_id,
            "title": card.name,
            "link": card.short_url,
        }
        if len(card.members) > 0:
            result["properties"] = [
                {
                    "label": "Members",
                    "dataType": "STRING",
                    "value": ", ".join([member.username for member in card.members]),
                }
            ]
        results = [result]
        primary_action = {
            "type": "ACTION_HOOK",
            "httpMethod": "DELETE",
            "associatedObjectProperties": ["hs_object_id",],
            "uri": url_for("trello.cards.delete_association", _external=True),
            "label": "Remove the association",
        }
             */
        } else {
            $primaryAction = [
                'type' => 'IFRAME',
                'width' => 650,
                'height' => 350,
                'uri' => UrlHelper::getUrl('/trello/search-frame'),
                'label' => 'Associate Trello card',
                'associatedObjectProperties' => ['hs_object_id', 'dealname'],
            ];
        }
        
        return [
            'results' => $results,
            'primaryAction' => $primaryAction,
        ];
    }
}
