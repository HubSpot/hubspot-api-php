<?php

use Helpers\HubspotClientHelper;

if (array_key_exists('id', $_GET)) {
    $hubSpot = HubspotClientHelper::createFactoryWithDeveloperAPIKey();
    
    $hubSpot->crm()->timeline()->templatesApi()->archiveEventTemplate(
            $_GET['id'],
            getEnvOrException('HUBSPOT_APPLICATION_ID')
        );
}

header('Location: /templates/list.php');
