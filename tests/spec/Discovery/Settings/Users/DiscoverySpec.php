<?php

namespace spec\HubSpot\Discovery\Settings\Users;

use GuzzleHttp\Client;
use HubSpot\Client\Settings\Users\Api\RolesApi;
use HubSpot\Client\Settings\Users\Api\TeamsApi;
use HubSpot\Client\Settings\Users\Api\UsersApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Settings\Users\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->rolesApi()->shouldHaveType(RolesApi::class);
        $this->teamsApi()->shouldHaveType(TeamsApi::class);
        $this->usersApi()->shouldHaveType(UsersApi::class);
    }
}
