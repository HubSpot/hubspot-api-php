<?php

namespace Helpers;

use HubSpot\Client\Crm\Contacts\Model\CollectionResponseWithTotalSimplePublicObject;
use HubSpot\Client\Crm\Contacts\Model\Filter;
use HubSpot\Client\Crm\Contacts\Model\FilterGroup;
use HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest;

class SearchHelper
{
    public static function getContacts(
        string $query,
        $after = null,
        $limit = 100
    ): CollectionResponseWithTotalSimplePublicObject {
        $request = new PublicObjectSearchRequest();

        if (!is_null($after)) {
            $filter = new Filter();
            $filter->setOperator('GT');
            $filter->setPropertyName('hs_object_id');
            $filter->setValue($after);

            $group = new FilterGroup();
            $group->setFilters([$filter]);

            $request->setFilterGroups([$group]);
        }

        $sorts = [
            [
                'propertyName' => 'hs_object_id',
                'direction' => 'ASCENDING',
            ],
        ];

        $request->setQuery($query);
        $request->setSorts($sorts);
        $request->setLimit($limit);

        return HubspotClientHelper::createFactory()
            ->crm()->contacts()->searchApi()->doSearch($request);
    }
}
