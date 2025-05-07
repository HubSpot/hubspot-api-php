<?php

namespace HubSpot\Discovery\Crm\Owners;

use HubSpot\Client\Crm\Owners\Api\OwnersApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method OwnersApi ownersApi()
 */
class Discovery extends DiscoveryBase
{
    public function getAll(?string $email = null, ?string $after = null, bool $archived = false): array
    {
        $owners = [];

        do {
            $page = $this->OwnersApi()->getPage($email, $after, 100, $archived);

            $owners = array_merge($owners, $page->getResults());

            if (!is_null($page->getPaging())) {
                $after = $page->getPaging()->getNext()->getAfter();
            }
        } while (is_object($page) && $page->getPaging());

        return $owners;
    }
}
