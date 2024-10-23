<?php

namespace HubSpot\Discovery\Crm\Associations\V4;

use HubSpot\Client\Crm\Associations\V4\Api\BasicApi;
use HubSpot\Client\Crm\Associations\V4\Api\BatchApi;
use HubSpot\Client\Crm\Associations\V4\Api\ReportApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi         basicApi()
 * @method BatchApi         batchApi()
 * @method ReportApi        reportApi()
 * @method Schema\Discovery schema()
 */
class Discovery extends DiscoveryBase {}
