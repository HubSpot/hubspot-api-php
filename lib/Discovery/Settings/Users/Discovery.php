<?php

namespace HubSpot\Discovery\Settings\Users;

use HubSpot\Client\Settings\Users\Api\BasicApi;
use HubSpot\Client\Settings\Users\Api\RolesApi;
use HubSpot\Client\Settings\Users\Api\TeamsApi;
use HubSpot\Client\Settings\Users\Api\UsersApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi basicApi()
 * @method RolesApi rolesApi()
 * @method TeamsApi teamsApi()
 * @method UsersApi usersApi()
 */
class Discovery extends DiscoveryBase {}
