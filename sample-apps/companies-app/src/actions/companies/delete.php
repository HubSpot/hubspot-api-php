<?php

use Helpers\HubspotClientHelper;

if (!isset($_GET['id'])) {
    throw new \Exception('Contact id is not specified');
}
HubspotClientHelper::createFactory()->crm()->companies()->basicApi()
    ->archive($_GET['id'])
;

header('Location: /companies/list.php');
exit();
