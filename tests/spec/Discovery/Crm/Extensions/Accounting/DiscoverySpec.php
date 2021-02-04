<?php

namespace spec\HubSpot\Discovery\Crm\Extensions\Accounting;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Extensions\Accounting\Api\CallbacksApi;
use HubSpot\Client\Crm\Extensions\Accounting\Api\InvoiceApi;
use HubSpot\Client\Crm\Extensions\Accounting\Api\SettingsApi;
use HubSpot\Client\Crm\Extensions\Accounting\Api\SyncApi;
use HubSpot\Client\Crm\Extensions\Accounting\Api\UserAccountsApi;
use HubSpot\Config;
use PhpSpec\ObjectBehavior;

class DiscoverySpec extends ObjectBehavior
{
    public function let(Client $client, Config $config)
    {
        $this->beConstructedWith($client, $config);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Extensions\Accounting\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->callbacksApi()->shouldHaveType(CallbacksApi::class);
        $this->invoiceApi()->shouldHaveType(InvoiceApi::class);
        $this->settingsApi()->shouldHaveType(SettingsApi::class);
        $this->syncApi()->shouldHaveType(SyncApi::class);
        $this->userAccountsApi()->shouldHaveType(UserAccountsApi::class);
    }
}
