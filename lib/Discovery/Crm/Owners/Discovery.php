<?php

namespace HubSpot\Discovery\Crm\Owners;

use HubSpot\Client\Crm\Owners\Api\DefaultApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method DefaultApi defaultApi()
 */
class Discovery extends DiscoveryBase
{
    public function getAll(): array
    {
        $owners = [];
        $after = null;

        do {
            $page = $this->defaultApi()->getPage(null, $after, 100);

            $owners = array_merge($owners, $page->getResults());

            if (!is_null($page->getPaging())) {
                $after = $page->getPaging()->getNext()->getAfter();
            }
        } while (is_object($page) && $page->getPaging());

        return $owners;
    }
}
