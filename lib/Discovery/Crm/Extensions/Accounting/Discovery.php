<?php

namespace HubSpot\Discovery\Crm\Extensions\Accounting;

use HubSpot\Client\Crm\Extensions\Accounting\Api\CallbacksApi;
use HubSpot\Client\Crm\Extensions\Accounting\Api\InvoiceApi;
use HubSpot\Client\Crm\Extensions\Accounting\Api\SettingsApi;
use HubSpot\Client\Crm\Extensions\Accounting\Api\SyncApi;
use HubSpot\Client\Crm\Extensions\Accounting\Api\UserAccountsApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method CallbacksApi    callbacksApi()
 * @method InvoiceApi      invoiceApi()
 * @method SettingsApi     settingsApi()
 * @method SyncApi         syncApi()
 * @method UserAccountsApi userAccountsApi()
 *
 * @deprecated
 */
class Discovery extends DiscoveryBase {}
