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
    $action = $_POST['action'];
    $redirectParams['action'] = $action;

    // List all the valid association types available between two object types
    // $hubSpot->crm()->associations()->typesApi()->getTypes($from_object_type, $to_object_type);
    $type = 'company_to_contact';

    $request = new BatchInputPublicAssociation();
    $request->setInputs(array_map(function ($id) use ($companyId, $type) {
        return (new PublicAssociation())
            ->setFrom((new PublicObjectId())->setId($companyId))
            ->setTo((new PublicObjectId())->setId($id))
            ->setType($type)
        ;
    }, array_keys($_POST['contactsIds'])));
    $hubSpot->crm()->associations()->batchApi()->{$action}(
        ObjectType::COMPANIES,
        ObjectType::CONTACTS,
        $request
    );
}

header('Location: /companies/show?'.http_build_query($redirectParams));

exit();
