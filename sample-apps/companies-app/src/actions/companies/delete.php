<?php

use Helpers\HubspotClientHelper;
use HubSpot\Crm\ObjectType;

if (!isset($_GET['id'])) {
    throw new \Exception('Contact id is not specified');
}
HubspotClientHelper::createFactory()->crm()->objects()->basicApi()
    ->archive(ObjectType::COMPANIES, $_GET['id'])
;

header('Location: /companies/list.php');
exit();
