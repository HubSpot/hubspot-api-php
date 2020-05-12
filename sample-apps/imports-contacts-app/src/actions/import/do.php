<?php

use Helpers\HubspotClientHelper;

if (!array_key_exists('file', $_FILES)) {
    header('Location: /import/start.php');
    exit();
}

$fileName = $_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], '/app/tmp/'.$fileName);

$hubSpot = HubspotClientHelper::createFactory();

$request = json_encode([
    'name' => 'Import ('.$fileName.')',
    'files' => [
        [
            'fileName' => $fileName,
            'fileImportPage' => [
                'hasHeader' => true,
                'columnMappings' => [
                    [
                        'columnName' => 'First Name',
                        'propertyName' => 'firstname',
                        'columnObjectType' => 'CONTACT',
                    ],
                    [
                        'columnName' => 'Email',
                        'propertyName' => 'email',
                        'columnObjectType' => 'CONTACT',
                    ]
                ]
            ]
        ]
    ]
]);

$file = new SplFileObject('/app/tmp/'.$fileName);
$response = $hubSpot->crm()->imports()->coreApi()->create($request, $file);

@unlink('/app/tmp/'.$fileName);

include __DIR__.'/../../views/imports/done.php';
