<?php

use Helpers\HubspotClientHelper;
use HubSpot\Crm\ObjectType;

if (!isset($_GET['companyId']) || !isset($_POST['action'])) {
    throw new Exception('Something went wrong ...');
}
$hubSpot = HubspotClientHelper::createFactory();
$companyId = $_GET['companyId'];
$redirectParams = [
    'id' => $companyId,
];

if (isset($_POST['contactsIds'])) {
    $ation = $_POST['action'].'Association';
    $redirectParams['action'] = $_POST['action'];

    foreach (array_keys($_POST['contactsIds']) as $id) {
        $hubSpot->crm()->objects()->associationsApi()->{$ation}(
            ObjectType::COMPANIES,
            $companyId,
            ObjectType::CONTACTS,
            $id
        );
    }
}
header('Location: /companies/show.php?'.http_build_query($redirectParams));
exit();
