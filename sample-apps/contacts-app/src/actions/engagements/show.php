<?php

use Helpers\HubspotClientHelper;

if (isset($_POST['engagement'])) {
    $engagement = $_POST['engagement'];
    $associations = $_POST['associations'];
    $metadata = $_POST['metadata'];

    $metadata['startTime'] = !empty($metadata['startTime']) ? strtotime($metadata['startTime']) : null;
    $metadata['endTime'] = !empty($metadata['endTime']) ? strtotime($metadata['endTime']) : null;

    $hubSpot = Helpers\HubspotClientHelper::createFactory();

    //https://developers.hubspot.com/docs/methods/engagements/create_engagement
    $response = $hubSpot->engagements()->create($engagement, $associations, $metadata);
    if (HubspotClientHelper::isResponseSuccessful($response)) {
        $clientId = $associations['contactIds'][0];

        header('Location: /contacts/show.php?vid='.$clientId);
        exit();
    }
    $errorResponse = $response;
    include __DIR__.'/../../views/engagements/show.php';
}
