<?php

use Helpers\HubspotClientHelper;

HubspotClientHelper::createFactory()->crm()->contacts()->basicApi()->getPage();
include __DIR__.'/../views/readme.php';
