<?php

namespace Formatters;

use Helpers\UrlHelper;

class CardsFormatter
{
    public static function cardExtensionDataResponse($associatedDeal = null, $card = null): array
    {
        $results = [];

        if (!empty($associatedDeal)) {
            $result = [
                'objectId' => $card->idShort,
                'title' => $card->name,
                'link' => $card->shortUrl,
            ];

            if (count($card->members) > 0) {
                $values = [];
                foreach ($card->members as $member) {
                    $values[] = $member->username;
                }

                $result['properties'][] = [
                    'label' => 'Members',
                    'dataType' => 'STRING',
                    'value' => implode(', ', $values),
                ];
            }

            $results[] = $result;

            $primaryAction = [
                'type' => 'ACTION_HOOK',
                'httpMethod' => 'DELETE',
                'associatedObjectProperties' => ['hs_object_id'],
                'uri' => UrlHelper::getUrl('/trello/delete-association'),
                'label' => 'Remove the association',
            ];
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
