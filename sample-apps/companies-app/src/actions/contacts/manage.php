<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Associations\Model\BatchInputPublicAssociation;
use HubSpot\Client\Crm\Associations\Model\PublicAssociation;
use HubSpot\Client\Crm\Associations\Model\PublicObjectId;
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
    $ation = $_POST['action'].'Batch';
    $redirectParams['action'] = $_POST['action'];

    $request = new BatchInputPublicAssociation();

    $request->setInputs(array_map(function ($id) use ($companyId) {
        return (new PublicAssociation())
            ->setFrom((new PublicObjectId())->setId($companyId))
            ->setTo((new PublicObjectId())->setId($id))
        ;
    }, array_keys($_POST['contactsIds'])));
    $hubSpot->crm()->associations()->batchApi()->{$ation}(
        ObjectType::COMPANIES,
        ObjectType::CONTACTS,
        $request
    );
}
header('Location: /companies/show.php?'.http_build_query($redirectParams));
exit();