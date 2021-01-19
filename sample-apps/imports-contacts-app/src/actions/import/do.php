<?php

use Helpers\HubspotClientHelper;

if (!array_key_exists('file', $_FILES)) {
    header('Location: /import/start');

    exit();
}

$fileName = $_FILES['file']['name'];
$file = '/app/tmp/'.$fileName;

move_uploaded_file($_FILES['file']['tmp_name'], $file);

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
                    ],
                ],
            ],
        ],
    ],
]);

$import = $hubSpot->crm()->imports()->coreApi()->create($file, $request);

@unlink($file);

include __DIR__.'/../../views/imports/done.php';
